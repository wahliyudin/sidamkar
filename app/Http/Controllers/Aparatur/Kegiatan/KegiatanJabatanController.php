<?php

namespace App\Http\Controllers\Aparatur\Kegiatan;

use App\Http\Controllers\Controller;
use App\Models\JenisKegiatan;
use App\Models\Rencana;
use App\Models\Unsur;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KegiatanJabatanController extends Controller
{
    public function index()
    {
        $user = User::query()->with(['userAparatur.provinsi.kabkotas', 'dokKepegawaians', 'dokKompetensis'])->find(Auth::user()->id);
        $rencanas = Rencana::query()->get();
        $judul = 'Rencana Kinerja';
        $role = DB::table('users')->join('role_user', 'role_user.user_id', '=', 'users.id')->where('users.id', '=', Auth::user()->id)->select('*')->get();
        $ketentuan_ak = DB::table('ketentuan_nilais')->where('role_id', $role[0]->role_id)->where('pangkat_golongan_tmt_id', $user->userAparatur->pangkat_golongan_tmt_id)->get();
        return view('aparatur.kegiatan.index', compact('rencanas', 'judul', 'ketentuan_ak'));
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
