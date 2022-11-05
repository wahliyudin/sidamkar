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
        $rencanaButirKegiatan = RencanaButirKegiatan::query()->find($id);
        $rencanaButirKegiatan->update([
            'status' => 3,
            'catatan' => $request->catatan
        ]);
        $rencanaButirKegiatan->historyButirKegiatans()->create([
            'keterangan' => 'Laporan ditolak'
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil ditolak'
        ]);
    }

    public function revisi(Request $request, $id)
    {
        $rencanaButirKegiatan = RencanaButirKegiatan::query()->find($id);
        $rencanaButirKegiatan->update([
            'status' => 2,
            'catatan' => $request->catatan
        ]);
        $rencanaButirKegiatan->historyButirKegiatans()->create([
            'keterangan' => 'Laporan direvisi'
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil direvisi'
        ]);
    }

    public function verifikasi($id)
    {
        $rencanaButirKegiatan = RencanaButirKegiatan::query()->find($id);
        $rencanaButirKegiatan->update([
            'status' => 4,
            'catatan' => null
        ]);
        $rencanaButirKegiatan->historyButirKegiatans()->create([
            'keterangan' => 'Laporan diverifikasi'
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil diverifikasi'
        ]);
    }
}
