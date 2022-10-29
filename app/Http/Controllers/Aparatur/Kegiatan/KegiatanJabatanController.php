<?php

namespace App\Http\Controllers\Aparatur\Kegiatan;

use App\Http\Controllers\Controller;
use App\Models\JenisKegiatan;
use App\Models\Rencana;
use App\Models\Unsur;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Http\Request;

class KegiatanJabatanController extends Controller
{
    public function index()
    {
        $rencanas = Rencana::query()->where('user_id', auth()->user()->id)->get();
        return view('aparatur.kegiatan.index', compact('rencanas'));
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
}
