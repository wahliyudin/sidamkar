<?php

namespace App\Http\Controllers\Kemendagri\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\KegiatanJabatanRequest;
use App\Imports\UnsursImport;
use App\Models\JenisKegiatan;
use App\Models\Role;
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
            $this->storeKegiatan($request);
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
        Unsur::query()->with('subUnsurs')->findOrFail($id)->delete();
        $this->storeKegiatan($request);
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil diubah'
        ]);
    }

    public function storeKegiatan($request)
    {
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
