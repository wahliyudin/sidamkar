<?php

namespace App\Http\Controllers\Kemendagri\CMS;

use App\Exports\KegiatanProfesiExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\KegiatanProfesiRequest;
use App\Imports\KegiatanPenunjangProfesiImport;
use App\Imports\KegiatanProfesiImport;
use App\Imports\UnsurPenunjangImport;
use App\Imports\UnsursImport;
use App\Models\ButirKegiatan;
use App\Models\JenisKegiatan;
use App\Models\Periode;
use App\Models\Role;
use App\Models\SubUnsur;
use App\Models\Unsur;
use App\Services\Kemendagri\KegiatanSubButirKegiatanService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class KegiatanProfesiController extends Controller
{
    protected KegiatanSubButirKegiatanService $kegiatanSubButirKegiatanService;

    public function __construct(KegiatanSubButirKegiatanService $kegiatanSubButirKegiatanService)
    {
        $this->kegiatanSubButirKegiatanService = $kegiatanSubButirKegiatanService;
    }

    public function index()
    {
        $judul = 'CMS Kegiatan Profesi';
        $roles = Role::query()->whereIn('name', getAllRoleFungsional())->get(['id', 'display_name']);
        $kegiatan = JenisKegiatan::query()
            ->with([
                'unsurs' => function ($query) {
                    $query->orderBy('created_at', 'desc');
                },
                'unsurs.subUnsurs.butirKegiatans.subButirKegiatans',
            ])
            ->findOrFail(3);
        return view('kemendagri.cms.kegiatan-profesi.index', compact('roles', 'kegiatan', 'judul'));
    }

    public function store(KegiatanProfesiRequest $request)
    {
        try {
            $this->storeKegiatan($request);
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil ditambahkan'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit($id)
    {
        $unsur = Unsur::query()->with([
            'jenisKegiatan',
            'subUnsurs.butirKegiatans.subButirKegiatans'
        ])->findOrFail($id);
        return response()->json([
            'status' => 200,
            'data' => $unsur
        ]);
    }

    public function update(KegiatanProfesiRequest $request, $id)
    {
        $unsur = Unsur::query()->with('subUnsurs')->findOrFail($id);
        $unsur->update([
            'nama' => $request->unsur,
            'jenis_aparatur' => $request->jenis_aparatur,
        ]);
        $tmpSubUnsurs = [];
        for ($i = 0; $i < count($request->sub_unsurs); $i++) {
            if (isset($request->sub_unsurs[$i]['id'])) {
                $subUnsur = $this->updateSubUnsur($unsur, $request->sub_unsurs[$i]['id'], $request->sub_unsurs[$i]['name']);
                array_push($tmpSubUnsurs, $request->sub_unsurs[$i]['id']);
            } else {
                $subUnsur = $this->storeSubUnsur($unsur, $request->sub_unsurs[$i]['name']);
                array_push($tmpSubUnsurs, $subUnsur->id);
            }
            $tmpbutirKegiatans = [];
            for ($j = 0; $j < count($request->sub_unsurs[$i]['butir_kegiatans']); $j++) {
                if (isset($request->sub_unsurs[$i]['butir_kegiatans'][$j]['sub_butir_kegiatans'])) {
                    if (isset($request->sub_unsurs[$i]['butir_kegiatans'][$j]['id'])) {
                        $butirKegiatan = $this->updateButirKegiatan(
                            $subUnsur,
                            $request->sub_unsurs[$i]['butir_kegiatans'][$j]['id'],
                            $request->sub_unsurs[$i]['butir_kegiatans'][$j]['name']
                        );
                        array_push($tmpbutirKegiatans, $request->sub_unsurs[$i]['butir_kegiatans'][$j]['id']);
                    } else {
                        $butirKegiatan = $this->storeButirKegiatan(
                            $subUnsur,
                            $request->sub_unsurs[$i]['butir_kegiatans'][$j]['name']
                        );
                        array_push($tmpbutirKegiatans, $butirKegiatan->id);
                    }
                    $tmpSubButirKegiatans = [];
                    for ($k = 0; $k < count($request->sub_unsurs[$i]['butir_kegiatans'][$j]['sub_butir_kegiatans']); $k++) {
                        if (isset($request->sub_unsurs[$i]['butir_kegiatans'][$j]['sub_butir_kegiatans'][$k]['id'])) {
                            $subButirKegiatan = $this->kegiatanSubButirKegiatanService->updateSubButirKegiatan($butirKegiatan, $request->sub_unsurs[$i]['butir_kegiatans'][$j]['sub_butir_kegiatans'][$k]);
                            array_push($tmpSubButirKegiatans, $request->sub_unsurs[$i]['butir_kegiatans'][$j]['sub_butir_kegiatans'][$k]['id']);
                        } else {
                            $subButirKegiatan = $this->kegiatanSubButirKegiatanService->storeSubButirKegiatan($butirKegiatan, $request->sub_unsurs[$i]['butir_kegiatans'][$j]['sub_butir_kegiatans'][$k]);
                            array_push($tmpSubButirKegiatans, $subButirKegiatan->id);
                        }
                    }
                    $butirKegiatan->subButirKegiatans()->whereNotIn('id', $tmpSubButirKegiatans)->delete();
                } else {
                    if (isset($request->sub_unsurs[$i]['butir_kegiatans'][$j]['id'])) {
                        $butirKegiatan = $this->kegiatanSubButirKegiatanService->updateButirKegiatan($subUnsur, $request->sub_unsurs[$i]['butir_kegiatans'][$j]);
                        $butirKegiatan->subButirKegiatans()->delete();
                        array_push($tmpbutirKegiatans, $request->sub_unsurs[$i]['butir_kegiatans'][$j]['id']);
                    } else {
                        $butirKegiatan = $this->kegiatanSubButirKegiatanService->storeButirKegiatan($subUnsur, $request->sub_unsurs[$i]['butir_kegiatans'][$j]);
                        array_push($tmpbutirKegiatans, $butirKegiatan->id);
                    }
                }
            }
            $subUnsur->butirKegiatans()->whereNotIn('id', $tmpbutirKegiatans)->delete();
        }
        $unsur->subUnsurs()->whereNotIn('id', $tmpSubUnsurs)->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil diubah'
        ]);
    }

    public function storeSubUnsur(Unsur $unsur, string $name)
    {
        return $unsur->subUnsurs()->create([
            'nama' => $name
        ]);
    }

    public function updateSubUnsur(Unsur $unsur, $id, string $name)
    {
        $subUnsur = $unsur->subUnsurs()->find($id);
        $subUnsur->update([
            'nama' => $name
        ]);
        return $subUnsur;
    }

    public function storeButirKegiatan(SubUnsur $subUnsur, string $name, $satuan_hasil = null, $angka_kredit = null, $role_id = null)
    {
        $butirKegiatan = $subUnsur->butirKegiatans()->create([
            'nama' => $name,
            'satuan_hasil' => $satuan_hasil,
            'score' => $angka_kredit,
            'role_id' => $role_id
        ]);
        return $butirKegiatan;
    }

    public function updateButirKegiatan(SubUnsur $subUnsur, $id, string $name, $satuan_hasil = null, $angka_kredit = null, $role_id = null)
    {
        $butirKegiatan = $subUnsur->butirKegiatans()->find($id);
        $butirKegiatan->update([
            'nama' => $name,
            'satuan_hasil' => $satuan_hasil,
            'score' => $angka_kredit,
            'role_id' => $role_id,
        ]);
        return $butirKegiatan;
    }

    public function storeSubButirKegiatan(ButirKegiatan $butirKegiatan, string $name, $satuan_hasil = null, $angka_kredit = null, $role_id = null)
    {
        $subButirKegiatan = $butirKegiatan->subButirKegiatans()->create([
            'nama' => $name,
            'satuan_hasil' => $satuan_hasil,
            'score' => $angka_kredit,
            'role_id' => $role_id,
        ]);
        return $subButirKegiatan;
    }

    public function updateSubButirKegiatan(ButirKegiatan $butirKegiatan, $id, string $name, $satuan_hasil = null, $angka_kredit = null, $role_id = null)
    {
        return $butirKegiatan->subButirKegiatans()->find($id)->update([
            'nama' => $name,
            'satuan_hasil' => $satuan_hasil,
            'score' => $angka_kredit,
            'role_id' => $role_id,
        ]);
    }

    public function storeKegiatan($request)
    {
        $unsur = Unsur::query()->create([
            'jenis_kegiatan_id' => 3,
            'jenis_aparatur' => $request->jenis_aparatur,
            'nama' => $request->unsur
        ]);
        for ($i = 0; $i < count($request->sub_unsurs); $i++) {
            $sub_unsur = $unsur->subUnsurs()->create([
                'nama' => $request->sub_unsurs[$i]['name']
            ]);
            for ($j = 0; $j < count($request->sub_unsurs[$i]['butir_kegiatans']); $j++) {
                if (isset($request->sub_unsurs[$i]['butir_kegiatans'][$j]['sub_butir_kegiatans'])) {
                    $butir_kegiatan = $sub_unsur->butirKegiatans()->create([
                        'nama' => $request->sub_unsurs[$i]['butir_kegiatans'][$j]['name']
                    ]);
                    $this->kegiatanSubButirKegiatanService->storeSubButirKegiatans($butir_kegiatan, $request->sub_unsurs[$i]['butir_kegiatans'][$j]['sub_butir_kegiatans']);
                } else {
                    $this->kegiatanSubButirKegiatanService->storeButirKegiatan($sub_unsur, $request->sub_unsurs[$i]['butir_kegiatans'][$j]);
                }
            }
        }
    }

    public function import(Request $request)
    {
        $request->validate([
            'file_import' => 'required'
        ], [
            'file_import.required' => 'File harus diisi'
        ]);
        try {
            Excel::import(new KegiatanProfesiImport(), $request->file('file_import'));
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil diimport'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function downloadTemplate()
    {
        return Excel::download(new KegiatanProfesiExport(), 'kegiatan-profesi.xlsx');
    }

    public function destroy($id)
    {
        try {
            Unsur::query()->find($id)->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil dihapus'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}