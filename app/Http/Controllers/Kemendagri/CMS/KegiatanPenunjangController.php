<?php

namespace App\Http\Controllers\Kemendagri\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\KegiatanPenunjangRequest;
use App\Imports\UnsurPenunjangImport;
use App\Models\ButirKegiatan;
use App\Models\JenisKegiatan;
use App\Models\Periode;
use App\Models\Role;
use App\Models\SubUnsur;
use App\Models\Unsur;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class KegiatanPenunjangController extends Controller
{
    public function index()
    {
        $roles = Role::query()->whereIn('name', getAllRoleFungsional())->get(['id', 'display_name']);
        $periodes = Periode::query()->get()->map(function (Periode $periode) {
            $periode->concat = Carbon::make($periode->awal)->format('F Y') . ' - ' . Carbon::make($periode->akhir)->format('F Y');
            return $periode;
        });
        $kegiatan = JenisKegiatan::query()
            ->with([
                'unsurs',
                'unsurs.subUnsurs.butirKegiatans.subButirKegiatans',
            ])
            ->findOrFail(2);
        return view('kemendagri.cms.kegiatan-penunjang.index', compact('roles', 'kegiatan', 'periodes'));
    }

    public function store(KegiatanPenunjangRequest $request)
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

    public function update(KegiatanPenunjangRequest $request, $id)
    {
        $unsur = Unsur::query()->with('subUnsurs')->findOrFail($id);
        $unsur->update([
            'role_id' => $request->role_id ?? null,
            'periode_id' => $request->periode_id,
            'nama' => $request->unsur
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
                if (!isset($request->sub_unsurs[$i]['butir_kegiatans'][$j]['sub_butir_kegiatans'])) {
                    if (isset($request->sub_unsurs[$i]['butir_kegiatans'][$j]['id'])) {
                        $butirKegiatan = $this->updatebutirKegiatan(
                            $subUnsur,
                            $request->sub_unsurs[$i]['butir_kegiatans'][$j]['id'],
                            $request->sub_unsurs[$i]['butir_kegiatans'][$j]['name'],
                            $request->sub_unsurs[$i]['butir_kegiatans'][$j]['angka_kredit']
                        );
                        $butirKegiatan->subButirKegiatans()->delete();
                        array_push($tmpbutirKegiatans, $request->sub_unsurs[$i]['butir_kegiatans'][$j]['id']);
                    } else {
                        $butirKegiatan = $this->storeButirKegiatan(
                            $subUnsur,
                            $request->sub_unsurs[$i]['butir_kegiatans'][$j]['name'],
                            $request->sub_unsurs[$i]['butir_kegiatans'][$j]['angka_kredit']
                        );
                        array_push($tmpbutirKegiatans, $butirKegiatan->id);
                    }
                } else {
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
                    if (isset($butirKegiatan->subButirKegiatans)) {
                        $tmpSubButirKegiatans = [];
                        for ($k = 0; $k < count($request->sub_unsurs[$i]['butir_kegiatans'][$j]['sub_butir_kegiatans']); $k++) {
                            if (isset($request->sub_unsurs[$i]['butir_kegiatans'][$j]['sub_butir_kegiatans'][$k]['id'])) {
                                $subButirKegiatan = $this->updateSubButirKegiatan(
                                    $butirKegiatan,
                                    $request->sub_unsurs[$i]['butir_kegiatans'][$j]['sub_butir_kegiatans'][$k]['id'],
                                    $request->sub_unsurs[$i]['butir_kegiatans'][$j]['sub_butir_kegiatans'][$k]['name'],
                                    $request->sub_unsurs[$i]['butir_kegiatans'][$j]['sub_butir_kegiatans'][$k]['angka_kredit']
                                );
                                array_push($tmpSubButirKegiatans, $request->sub_unsurs[$i]['butir_kegiatans'][$j]['sub_butir_kegiatans'][$k]['id']);
                            } else {
                                $subButirKegiatan = $this->storeSubButirKegiatan(
                                    $butirKegiatan,
                                    $request->sub_unsurs[$i]['butir_kegiatans'][$j]['sub_butir_kegiatans'][$k]['name'],
                                    $request->sub_unsurs[$i]['butir_kegiatans'][$j]['sub_butir_kegiatans'][$k]['angka_kredit']
                                );
                                array_push($tmpSubButirKegiatans, $subButirKegiatan->id);
                            }
                        }
                        $butirKegiatan->subButirKegiatans()->whereNotIn('id', $tmpSubButirKegiatans)->delete();
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

    public function storeButirKegiatan(SubUnsur $subUnsur, string $name, $angka_kredit = null)
    {
        $butirKegiatan = $subUnsur->butirKegiatans()->create([
            'nama' => $name,
            'score' => $angka_kredit,
        ]);
        return $butirKegiatan;
    }

    public function updateButirKegiatan(SubUnsur $subUnsur, $id, string $name, $angka_kredit = null)
    {
        $butirKegiatan = $subUnsur->butirKegiatans()->find($id);
        $butirKegiatan->update([
            'nama' => $name,
            'score' => $angka_kredit,
        ]);
        return $butirKegiatan;
    }

    public function storeSubButirKegiatan(ButirKegiatan $butirKegiatan, string $name, $angka_kredit)
    {
        $subButirKegiatan = $butirKegiatan->subButirKegiatans()->create([
            'nama' => $name,
            'score' => $angka_kredit,
        ]);
        return $subButirKegiatan;
    }

    public function updateSubButirKegiatan(ButirKegiatan $butirKegiatan, $id, string $name, $angka_kredit)
    {
        return $butirKegiatan->subButirKegiatans()->find($id)->update([
            'nama' => $name,
            'score' => $angka_kredit,
        ]);
    }

    public function storeKegiatan($request)
    {
        $unsur = Unsur::query()->create([
            'role_id' => $request->role_id ?? null,
            'jenis_kegiatan_id' => 2,
            'periode_id' => $request->periode_id,
            'nama' => $request->unsur
        ]);
        for ($i = 0; $i < count($request->sub_unsurs); $i++) {
            $sub_unsur = $unsur->subUnsurs()->create([
                'nama' => $request->sub_unsurs[$i]['name']
            ]);
            for ($j = 0; $j < count($request->sub_unsurs[$i]['butir_kegiatans']); $j++) {
                if (!isset($request->sub_unsurs[$i]['butir_kegiatans'][$j]['sub_butir_kegiatans'])) {
                    if (isset($request->sub_unsurs[$i]['butir_kegiatans'][$j]['angka_kredit'])) {
                        $sub_unsur->butirKegiatans()->create([
                            'nama' => $request->sub_unsurs[$i]['butir_kegiatans'][$j]['name'],
                            'score' => $request->sub_unsurs[$i]['butir_kegiatans'][$j]['angka_kredit']
                        ]);
                    } else {
                        $sub_unsur->butirKegiatans()->create([
                            'nama' => $request->sub_unsurs[$i]['butir_kegiatans'][$j]['name'],
                            'percent' => $request->sub_unsurs[$i]['butir_kegiatans'][$j]['percent']
                        ]);
                    }
                } else {
                    $butir_kegiatan = $sub_unsur->butirKegiatans()->create([
                        'nama' => $request->sub_unsurs[$i]['butir_kegiatans'][$j]['name']
                    ]);
                    for ($k = 0; $k < count($request->sub_unsurs[$i]['butir_kegiatans'][$j]['sub_butir_kegiatans']); $k++) {
                        if (isset($request->sub_unsurs[$i]['butir_kegiatans'][$j]['sub_butir_kegiatans'][$k]['angka_kredit'])) {
                            $butir_kegiatan->subButirKegiatans()->create([
                                'nama' => $request->sub_unsurs[$i]['butir_kegiatans'][$j]['sub_butir_kegiatans'][$k]['name'],
                                'score' => $request->sub_unsurs[$i]['butir_kegiatans'][$j]['sub_butir_kegiatans'][$k]['angka_kredit']
                            ]);
                        } else {
                            $butir_kegiatan->subButirKegiatans()->create([
                                'nama' => $request->sub_unsurs[$i]['butir_kegiatans'][$j]['sub_butir_kegiatans'][$k]['name'],
                                'percent' => $request->sub_unsurs[$i]['butir_kegiatans'][$j]['sub_butir_kegiatans'][$k]['percent']
                            ]);
                        }
                    }
                }
            }
        }
    }

    public function import(Request $request)
    {
        $request->validate([
            'periode_id' => 'required',
            'file_import' => 'required'
        ], [
            'periode_id.required' => 'Periode harus diisi',
            'file_import.required' => 'File harus diisi'
        ]);
        try {
            Excel::import(new UnsurPenunjangImport($request->periode_id), $request->file('file_import'));
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
        return response()->download(public_path('assets/import-penunjang.xlsx'), 'template.xlsx');
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
