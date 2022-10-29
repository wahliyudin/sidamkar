<?php

namespace App\Http\Controllers\Aparatur\Kegiatan;

use App\Http\Controllers\Controller;
use App\Models\JenisKegiatan;
use App\Models\Rencana;
use App\Models\Unsur;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class KegiatanJabatanController extends Controller
{
    public function index()
    {
        $rencanas = User::query()
            ->with(['rencanas.rencanaUnsurs' => function ($query) {
                $query->with(['unsur', 'rencanaSubUnsurs' => function ($query) {
                    $query->with(['subUnsur.butirKegiatans', 'rencanaButirKegiatans.butirKegiatan']);
                }]);
            }])
            ->find(auth()->user()->id)->rencanas;
        // return $rencanas;
        return view('aparatur.kegiatan.index', compact('rencanas'));
    }
}
