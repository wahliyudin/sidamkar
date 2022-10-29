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
        $unsurs = JenisKegiatan::query()
            ->with([
                'unsurs.role',
                'unsurs.subUnsurs' => function (Builder $subUnsur) {
                    User::query()->with(['rencanas.rencanaSubUnsurs' => function (Builder $rencanaSubUnsurs) use (&$subUnsur) {
                        $subUnsur->with('butirKegiatans')->whereIn('id', $rencanaSubUnsurs->pluck('sub_unsur_id')->toArray());
                    }])->find(auth()->user()->id);
                },
            ])
            ->findOrFail(1)->unsurs->map(function (Unsur $unsur) {
                $unsur->isSubUnsur = count($unsur->subUnsurs) != 0;
                return $unsur;
            });
        return $unsurs;
        // $data = User::query()->with(['rencanas.rencanaSubUnsurs' => function (Builder $query1) {
        //     $query1->with(['subUnsur.unsur.subUnsurs'=>function($query) use ($query1){
        //         $query->with('butirKegiatans')->whereIn('id',$query1->pluck('sub_unsur_id')->toArray());
        //     }]);
        // }])->findOrFail(auth()->user()->id);
        // $rencanas = [];
        // foreach ($data->rencanas as $rencana) {
        //     $tmp = [];
        //     $tmpUnsur = null;
        //     $unsurs = [];
        //     foreach ($rencana->rencanaSubUnsurs as $rencanaSubUnsur) {
        //         if ($rencanaSubUnsur->subUnsur->unsur->id != $tmpUnsur) {
        //             array_push($unsurs, $rencanaSubUnsur->subUnsur->unsur);
        //         }
        //     }
        //     array_push($rencanas, array_merge($tmp, [
        //         'nama' => $rencana->nama,
        //         'unsurs' => $unsurs
        //     ]));
        // }
        return view('aparatur.kegiatan.index', compact('unsurs'));
    }
}
