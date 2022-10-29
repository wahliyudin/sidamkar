<?php

namespace App\Http\Controllers\Aparatur;

use App\Http\Controllers\Controller;
use App\Models\JenisKegiatan;
use App\Models\SubUnsur;
use App\Models\Unsur;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class RencanaKinerjaController extends Controller
{
    public function index()
    {
        $rencanas = User::query()
            ->with(['rencanas.rencanaUnsurs'=>function($query){
                $query->with(['unsur', 'rencanaSubUnsurs' => function($query){
                    $query->with(['subUnsur', 'rencanaButirKegiatans.butirKegiatan']);
                }]);
            }])
            ->find(auth()->user()->id);
        // return $rencanas;
        return view('aparatur.rencana-kinerja.index', compact('rencanas'));
    }

    public function store(Request $request)
    {
        $user = User::query()->findOrFail(auth()->user()->id);
        $rencana = $user->rencanas()->create([
            'nama' => $request->rencana
        ]);
        for ($i = 0; $i < count($request->sub_unsurs); $i++) {
            $rencanaUnsur = $rencana->rencanaUnsurs()->create([
                'unsur_id' => $request->sub_unsurs[$i]['unsur_id']
            ]);
            $rencanaSubUnsur = $rencanaUnsur->rencanaSubUnsurs()->create([
                'sub_unsur_id' => $request->sub_unsurs[$i]['sub_unsur_id']
            ]);
            $butirKegiatans = SubUnsur::query()->with('butirKegiatans')->find($request->sub_unsurs[$i]['sub_unsur_id'])->butirKegiatans->pluck('id')->toArray();
            $rencanaSubUnsur->rencanaButirKegiatans()->createMany($butirKegiatans);
        }
        return response()->json([
            'status' => 200,
            'message' => "Berhasil"
        ]);
    }
}
