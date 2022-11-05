<?php

namespace App\Http\Controllers\AtasanLangsung;

use App\DataTables\AtasanLangsung\PengajuanKegiatanDataTable;
use App\Http\Controllers\Controller;
use App\Models\RencanaButirKegiatan;
use App\Models\User;
use Illuminate\Http\Request;

class PengajuanKegiatanController extends Controller
{
    public function index(PengajuanKegiatanDataTable $dataTable)
    {
        return $dataTable->render('atasan-langsung.pengajuan-kegiatan.index');
    }

    public function show($id)
    {
        $rencanas = User::query()
            ->with([
                'rencanas',
                'rencanas.rencanaUnsurs.unsur',
                'rencanas.rencanaUnsurs.rencanaSubUnsurs.subUnsur',
                'rencanas.rencanaUnsurs.rencanaSubUnsurs.rencanaButirKegiatans.butirKegiatan',
                'rencanas.rencanaUnsurs.rencanaSubUnsurs.rencanaButirKegiatans.dokumenKegiatanPokoks',
            ])
            ->findOrFail($id)->rencanas;
        return view('atasan-langsung.pengajuan-kegiatan.show', compact('rencanas'));
    }

    public function tolak(Request $request, $id)
    {
        RencanaButirKegiatan::query()->find($id)->update([
            'status' => 3,
            'catatan' => $request->catatan
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil ditolak'
        ]);
    }
}
