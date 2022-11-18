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
        $rencanas = Rencana::query()->get();
        $judul = 'Rencana Kinerja';
        return view('aparatur.kegiatan.index', compact('rencanas', 'judul'));
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $search = str($request->search)->lower()->trim();
            $rencanas = User::query()
                ->with([
                    'rencanas' => function ($query) use ($search) {
                        $query->where('nama', 'like', "%$search%");
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
        User::query()->findOrFail(auth()->user()->id)->rencanas()->create([
            'nama' => $request->rencana
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
