<?php

namespace App\Http\Controllers\Kemendagri\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\KegiatanJabatanRequest;
use App\Imports\UnsursImport;
use App\Models\ButirKegiatan;
use App\Models\JenisKegiatan;
use App\Models\Role;
use App\Models\SubUnsur;
use App\Models\Unsur;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class KegiatanJabatanController extends Controller
{
    public function index()
    {
        $roles = Role::query()->whereIn('name', getAllRoleFungsional())->get(['id', 'display_name']);
        $kegiatan = JenisKegiatan::query()
            ->with([
                'unsurs.role',
                'unsurs.subUnsurs.butirKegiatans',
            ])
            ->findOrFail(1);
        return view('kemendagri.cms.kegiatan-jabatan.index', compact('roles', 'kegiatan'));
    }

    public function store(KegiatanJabatanRequest $request)
    {
        try {
            $unsur = Unsur::query()->create([
                'role_id' => $request->role_id ?? null,
                'jenis_kegiatan_id' => 1,
                'nama' => $request->unsur
            ]);
            for ($i = 0; $i < count($request->sub_unsurs); $i++) {
                $sub_unsur = $this->storeSubUnsur($unsur, $request->sub_unsurs[$i]['name']);
                for ($j = 0; $j < count($request->sub_unsurs[$i]['butir_kegiatans']); $j++) {
                    $this->storeButirKegiatan($sub_unsur, $request->sub_unsurs[$i]['butir_kegiatans'][$j]['name'], $request->sub_unsurs[$i]['butir_kegiatans'][$j]['angka_kredit']);
                }
            }
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil ditambahkan'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => $th->getCode(),
                'message' => $th->getMessage()
            ]);
        }
    }

    public function edit($id)
    {
        $unsur = Unsur::query()->with([
            'jenisKegiatan',
            'role',
            'subUnsurs.butirKegiatans'
        ])->findOrFail($id);
        return response()->json([
            'status' => 200,
            'data' => $unsur
        ]);
    }

    public function update(KegiatanJabatanRequest $request, $id)
    {
        $unsur = Unsur::query()->with('subUnsurs')->findOrFail($id);
        $unsur->update([
            'role_id' => $request->role_id ?? null,
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
                if (isset($request->sub_unsurs[$i]['butir_kegiatans'][$j]['id'])) {
                    $butirKegiatan = $this->updatebutirKegiatan(
                        $subUnsur,
                        $request->sub_unsurs[$i]['butir_kegiatans'][$j]['id'],
                        $request->sub_unsurs[$i]['butir_kegiatans'][$j]['name'],
                        $request->sub_unsurs[$i]['butir_kegiatans'][$j]['angka_kredit']
                    );
                    array_push($tmpbutirKegiatans, $request->sub_unsurs[$i]['butir_kegiatans'][$j]['id']);
                } else {
                    $butirKegiatan = $this->storebutirKegiatan($subUnsur, $request->sub_unsurs[$i]['butir_kegiatans'][$j]['name'], $request->sub_unsurs[$i]['butir_kegiatans'][$j]['angka_kredit']);
                    array_push($tmpbutirKegiatans, $butirKegiatan->id);
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

    public function storeButirKegiatan(SubUnsur $subUnsur, string $name, $angka_kredit)
    {
        return $subUnsur->butirKegiatans()->create([
            'nama' => $name,
            'score' => $angka_kredit,
        ]);
    }

    public function updateButirKegiatan(SubUnsur $subUnsur, $id, string $name, $angka_kredit)
    {
        return $subUnsur->butirKegiatans()->find($id)->update([
            'nama' => $name,
            'score' => $angka_kredit,
        ]);
    }

    public function import(Request $request)
    {
        try {
            Excel::import(new UnsursImport(), $request->file('file_import'));
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
        return response()->download(public_path('assets/import-pokok.xlsx'), 'template.xlsx');
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
