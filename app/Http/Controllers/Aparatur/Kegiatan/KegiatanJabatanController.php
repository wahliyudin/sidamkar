<?php

namespace App\Http\Controllers\Aparatur\Kegiatan;

use App\Http\Controllers\Controller;
use App\Models\JenisKegiatan;
use App\Models\Rencana;
use App\Models\Unsur;
use App\Models\User;
use App\Repositories\PeriodeRepository;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KegiatanJabatanController extends Controller
{
    protected PeriodeRepository $periodeRepository;

    public function __construct(PeriodeRepository $periodeRepository)
    {
        $this->periodeRepository = $periodeRepository;
    }

    public function index()
    {
        $periode = $this->periodeRepository->isActive();
        $rencanas = Rencana::query()->where('periode_id', $periode->id)->get();
        $judul = 'Rencana Kinerja';
        return view('aparatur.kegiatan.index', compact('rencanas', 'judul'));
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $periode = $this->periodeRepository->isActive();
            $search = str($request->search)->lower()->trim();
            $rencanas = User::query()
                ->with([
                    'rencanas' => function ($query) use ($search, $periode) {
                        $query->where('periode_id', $periode->id)->where('nama', 'like', "%$search%");
                    }
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
            'rencana' => 'required'
        ], [
            'rencana.required' => 'Rencana kinerja harus diisi'
        ]);
        $periode = $this->periodeRepository->isActive();
        User::query()->findOrFail(auth()->user()->id)->rencanas()->create([
            'nama' => $request->rencana,
            'periode_id' => $periode->id
        ]);
        return response()->json([
            'status' => 200,
            'message' => "Berhasil"
        ]);
    }

    public function edit($id)
    {
        $rencana = Rencana::query()->findOrFail($id);
        return response()->json([
            'rencana' => $rencana
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rencana' => 'required'
        ], [
            'rencana.required' => 'Rencana kinerja harus diisi'
        ]);
        Rencana::query()->findOrFail($id)->update([
            'nama' => $request->rencana
        ]);
        return response()->json([
            'message' => "Berhasil diubah"
        ]);
    }

    public function destroy($id)
    {
        Rencana::query()->findOrFail($id)->delete();
        return response()->json([
            'message' => "Berhasil dihapus"
        ]);
    }
}