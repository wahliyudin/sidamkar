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
        $rencanas = Rencana::query()->with([
            'rencanaUnsurs.unsur',
            'rencanaUnsurs.rencanaSubUnsurs.subUnsur',
            'rencanaUnsurs.rencanaSubUnsurs.rencanaButirKegiatans.butirKegiatan',
        ])->where('user_id', auth()->user()->id)->get();
        $unsurs = JenisKegiatan::query()
            ->with([
                'unsurs.role',
                'unsurs.subUnsurs' => function (Builder $subUnsur) {
                    User::query()->with(['rencanas.rencanaUnsurs.rencanaSubUnsurs' => function (Builder
                    $rencanaSubUnsur) use (&$subUnsur) {
                        $subUnsur->with('butirKegiatans')->whereNotIn(
                            'id',
                            $rencanaSubUnsur->pluck('sub_unsur_id')->toArray()
                        );
                    }])->find(auth()->user()->id);
                },
            ])
            ->findOrFail(1)->unsurs->map(function (Unsur $unsur) {
                $unsur->isSubUnsur = count($unsur->subUnsurs) != 0;
                return $unsur;
            });
        $judul = 'Rencana Kinerja';
        return view('aparatur.kegiatan.index', compact('rencanas', 'unsurs', 'judul'));
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $search = str($request->search)->lower()->trim();
            $rencanas = User::query()
                ->with([
                    'rencanas' => function ($query) use ($search) {
                        $query->where('nama', 'like', "%$search%")
                            ->orWhereHas('rencanaUnsurs.unsur', function ($query) use ($search) {
                                $query->where('nama', 'like', "%$search%");
                            })->orWhereHas('rencanaUnsurs.rencanaSubUnsurs.subUnsur', function ($query) use ($search) {
                                $query->where('nama', 'like', "%$search%");
                            })->orWhereHas('rencanaUnsurs.rencanaSubUnsurs.subUnsur.butirKegiatans', function ($query) use ($search) {
                                $query->where('nama', 'like', "%$search%");
                            });
                    },
                    'rencanas.rencanaUnsurs.unsur',
                    'rencanas.rencanaUnsurs.rencanaSubUnsurs.subUnsur.butirKegiatans',
                    'rencanas.rencanaUnsurs.rencanaSubUnsurs.rencanaButirKegiatans.butirKegiatan'
                ])
                ->find(auth()->user()->id)->rencanas;
            return response()->json([
                'data' => $rencanas
            ]);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'rencana' => 'required',
            'sub_unsurs' => 'required|array',
        ], [
            'rencana.required' => 'Rencana kinerja harus diisi'
        ]);
        $user = User::query()->findOrFail(auth()->user()->id);
        $rencana = $user->rencanas()->create([
            'nama' => $request->rencana
        ]);
        $unsurId = null;
        $rencanaUnsurTmp = null;
        for ($i = 0; $i < count($request->sub_unsurs); $i++) {
            if ($unsurId == $request->sub_unsurs[$i]['unsur_id']) {
                $rencanaSubUnsur = $rencanaUnsurTmp?->rencanaSubUnsurs()->create([
                    'sub_unsur_id' => $request->sub_unsurs[$i]['sub_unsur_id']
                ]);
            } else {
                $rencanaUnsur = $rencana->rencanaUnsurs()->create([
                    'unsur_id' => $request->sub_unsurs[$i]['unsur_id']
                ]);
                $rencanaSubUnsur = $rencanaUnsur->rencanaSubUnsurs()->create([
                    'sub_unsur_id' => $request->sub_unsurs[$i]['sub_unsur_id']
                ]);
            }
            $butirKegiatans = [];
            foreach ($rencanaSubUnsur->subUnsur->butirKegiatans->pluck('id')->toArray() as $key => $value) {
                array_push($butirKegiatans, [
                    'butir_kegiatan_id' => $value
                ]);
            }
            $rencanaSubUnsur->rencanaButirKegiatans()->createMany($butirKegiatans);
            $unsurId = $request->sub_unsurs[$i]['unsur_id'];
            $rencanaUnsurTmp = $rencanaUnsur;
        }
        return response()->json([
            'status' => 200,
            'message' => "Berhasil"
        ]);
    }
}
