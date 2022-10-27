<?php

namespace App\Http\Controllers\Aparatur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\UnsursImport;
use App\Models\JenisKegiatan;
use App\Models\Role;
use App\Models\Unsur;
use Maatwebsite\Excel\Facades\Excel;

class LaporanJabatanController extends Controller
{
   public function index()
    {
        $roles = Role::query()->get(['id', 'display_name']);
        $kegiatan = JenisKegiatan::query()
            ->with([
                'unsurs.role',
                'unsurs.subUnsurs.butirKegiatans',
            ])
            ->findOrFail(1);
        return view('aparatur.laporan-jabatan', compact('roles', 'kegiatan'));
    }

    public function store(Request $request)
    {
        try {
            $unsur = Unsur::query()->create([
                'role_id' => $request->role_id,
                'jenis_kegiatan_id' => 1,
                'nama' => $request->unsur
            ]);
            for ($i = 0; $i < count($request->sub_unsurs); $i++) {
                $sub_unsur = $unsur->subUnsurs()->create([
                    'nama' => $request->sub_unsurs[$i]['name']
                ]);
                for ($j = 0; $j < count($request->sub_unsurs[$i]['butir_kegiatans']); $j++) {
                    $sub_unsur->butirKegiatans()->create([
                        'nama' => $request->sub_unsurs[$i]['butir_kegiatans'][$j],
                        'score' => $request->sub_unsurs[$i]['angka_kredits'][$j]
                    ]);
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

    public function import(Request $request)
    {
        try {
            Excel::import(new UnsursImport(), $request->file('file_import'));
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil diimport'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => $th->getCode(),
                'message' => 'Ada Kesalahan Pada Sistem'
            ]);
        }
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
            return response()->json([
                'status' => $th->getCode(),
                'message' => 'Ada Kesalahan Pada Sistem'
            ]);
        }
    }
}
