<?php

namespace App\Http\Controllers\Aparatur;

use App\Http\Controllers\Controller;
use App\Models\JenisKegiatan;
use App\Models\Unsur;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class RencanaKinerjaController extends Controller
{
    public function index()
    {
        $unsurs = JenisKegiatan::query()
            ->with([
                'unsurs.role',
                'unsurs.subUnsurs' => function (Builder $subUnsur) {
                    User::query()->with(['rencanas.rencanaSubUnsurs' => function (Builder $rencanaSubUnsur) use (&$subUnsur) {
                        $subUnsur->with('butirKegiatans')->whereNotIn('id', $rencanaSubUnsur->pluck('sub_unsur_id')->toArray());
                    }])->find(auth()->user()->id);
                },
            ])
            ->findOrFail(1)->unsurs->map(function (Unsur $unsur) {
                $unsur->isSubUnsur = count($unsur->subUnsurs) != 0;
                return $unsur;
            });
        return view('aparatur.rencana-kinerja.index', compact('unsurs'));
    }

    public function store(Request $request)
    {
        $rencana_sub_unsurs = [];
        foreach ($request->sub_unsurs as $key => $value) {
            array_push($rencana_sub_unsurs, [
                'sub_unsur_id' => $value
            ]);
        }
        $user = User::query()->findOrFail(auth()->user()->id);
        $rencana = $user->rencanas()->create([
            'nama' => $request->rencana_kinerja
        ]);
        $rencana->rencanaSubUnsurs()->createMany($rencana_sub_unsurs);
        return back();
    }
}
