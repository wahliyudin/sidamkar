<?php

namespace App\Http\Controllers\Aparatur\LaporanKegiatan;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class KegiatanJabatanController extends Controller
{
    public function index()
    {
        $rencanas = User::query()
            ->with([
                'rencanas',
                'rencanas.rencanaUnsurs.unsur',
                'rencanas.rencanaUnsurs.rencanaSubUnsurs.subUnsur.butirKegiatans',
                'rencanas.rencanaUnsurs.rencanaSubUnsurs.rencanaButirKegiatans.butirKegiatan'
            ])
            ->find(auth()->user()->id)->rencanas;
        return view('aparatur.laporan-kegiatan.index', compact('rencanas'));
    }

    public function storeLaporan(Request $request)
    {
        # code...
    }
}
