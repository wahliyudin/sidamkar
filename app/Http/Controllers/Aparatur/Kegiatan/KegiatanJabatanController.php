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
        $rencanas = User::query()->with([
            'rencanas.rencanaSubUnsurs.subUnsur.unsur',
            'rencanas.rencanaSubUnsurs.subUnsur.butirKegiatans',
        ])->findOrFail(auth()->user()->id)->rencanas->map(function (Rencana $rencana) {
            $unsurs = [];
            $subUnsurs = [];
            foreach ($rencana->rencanaSubUnsurs as $rencanaSubUnsur) {
                array_push($unsurs, $rencanaSubUnsur->subUnsur->unsur->id);
                array_push($subUnsurs, $rencanaSubUnsur->subUnsur);
            }
            $unsurs = array_unique($unsurs);
            for ($i = 0; $i < count($unsurs); $i++) {
                $unsur = Unsur::query()->find($unsurs[$i]);
                $data = [];
                foreach ($rencana->rencanaSubUnsurs as $rencanaSubUnsur) {
                    array_push($data, array_merge([
                        'id' => $unsur->id,
                        'role_id' => $unsur->role_id,
                        'jenis_kegiatan_id' => $unsur->jenis_kegiatan_id,
                        'nama' => $unsur->nama
                    ], [
                        'sub_unsurs' => $subUnsurs
                    ]));
                }
                return array_merge([
                    'id' => $rencana->id,
                    'nama' => $rencana->nama
                ], ['unsurs'=>$data]);
            }
            // return $rencana;
        });
        // return $rencanas;
        return view('aparatur.kegiatan.index', compact('rencanas'));
    }
}
