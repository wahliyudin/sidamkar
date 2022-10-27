<?php

namespace App\Http\Controllers\Kemendagri\CMS;

use App\Http\Controllers\Controller;
use App\Imports\UnsurPenunjangImport;
use App\Imports\UnsursImport;
use App\Models\JenisKegiatan;
use App\Models\Role;
use App\Models\Unsur;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class KegiatanProfesiController extends Controller
{
    public function index()
    {
        $roles = Role::query()->get(['id', 'display_name']);
        $kegiatan = JenisKegiatan::query()
            ->with([
                'unsurs.role',
                'unsurs.subUnsurs.butirKegiatans.subButirKegiatans',
            ])
            ->findOrFail(2);
        return view('kemendagri.cms.kegiatan-profesi.index', compact('roles', 'kegiatan'));
    }

    public function store(Request $request)
    {
        try {
            $unsur = Unsur::query()->create([
                'role_id' => $request->role_id ?? null,
                'jenis_kegiatan_id' => 2,
                'nama' => $request->unsur
            ]);
            for ($i = 0; $i < count($request->sub_unsurs); $i++) {
                $sub_unsur = $unsur->subUnsurs()->create([
                    'nama' => $request->sub_unsurs[$i]['name']
                ]);
                for ($j = 0; $j < count($request->sub_unsurs[$i]['butir_kegiatans']); $j++) {
                    if (isset($request->sub_unsurs[$i]['butir_kegiatans'][$j]['angka_kredit'])) {
                        $sub_unsur->butirKegiatans()->create([
                            'nama' => $request->sub_unsurs[$i]['butir_kegiatans'][$j]['name'],
                            'score' => $request->sub_unsurs[$i]['butir_kegiatans'][$j]['angka_kredit']
                        ]);
                    } else {
                        $butir_kegiatan = $sub_unsur->butirKegiatans()->create([
                            'nama' => $request->sub_unsurs[$i]['butir_kegiatans'][$j]['name']
                        ]);
                        for ($k=0; $k < count($request->sub_unsurs[$i]['butir_kegiatans'][$j]['sub_butir_kegiatans']); $k++) {
                            $butir_kegiatan->subButirKegiatans()->create([
                                'nama' => $request->sub_unsurs[$i]['butir_kegiatans'][$j]['sub_butir_kegiatans'][$k]['name'],
                                'score' => $request->sub_unsurs[$i]['butir_kegiatans'][$j]['sub_butir_kegiatans'][$k]['angka_kredit']
                            ]);
                        }
                    }

                }
            }
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil ditambahkan'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function import(Request $request)
    {
        try {
            Excel::import(new UnsurPenunjangImport(), $request->file('file_import'));
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
