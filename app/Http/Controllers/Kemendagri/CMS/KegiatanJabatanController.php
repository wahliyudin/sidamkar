<?php

namespace App\Http\Controllers\Kemendagri\CMS;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Unsur;
use Illuminate\Http\Request;

class KegiatanJabatanController extends Controller
{
    public function index()
    {
        $roles = Role::query()->get(['id', 'display_name']);
        return view('kemendagri.cms.kegiatan-jabatan.index', compact('roles'));
    }

    public function store(Request $request)
    {
        try {
            $unsur = Unsur::query()->create([
                'role_id' => $request->role_id,
                'jenis_kegiatan_id' => 1,
                'nama' => $request->unsur
            ]);
            for ($i=0; $i < count($request->sub_unsurs); $i++) {
                $sub_unsur = $unsur->subUnsurs()->create([
                    'nama' => $request->sub_unsurs[$i]['name']
                ]);
                for ($j=0; $j < count($request->sub_unsurs[$i]['butir_kegiatans']); $j++) {
                    $sub_unsur->butirKegiatan()->create([
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
            throw $th;
        }
    }

    public function import(Request $request)
    {
        dd($request->all());
    }
}
