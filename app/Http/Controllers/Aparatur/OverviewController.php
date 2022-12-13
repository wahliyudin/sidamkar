<?php

namespace App\Http\Controllers\Aparatur;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Periode;
use Illuminate\Support\Facades\DB;
use App\Models\Mente;

class OverviewController extends Controller
{
    public function index()
    {
        $user = User::query()->with(['userAparatur.provinsi.kabkotas', 'dokKepegawaians', 'dokKompetensis'])->find(Auth::user()->id);
        $periode = Periode::query()->where('is_active', true)->first();
        $judul = "Aparatur Fungsional Dashboard";

        $role = DB::table('users')->join('role_user', 'role_user.user_id', '=', 'users.id')->where('users.id', '=', Auth::user()->id)->select('*')->get();

        $informasi = DB::table('informasis')->join('role_informasis', 'role_informasis.informasi_id', '=', 'informasis.id')->where('role_informasis.role_id', $role[0]->role_id)->get();

        $ketentuan_ak = DB::table('ketentuan_nilais')->where('role_id', $role[0]->role_id)->where('pangkat_golongan_tmt_id', $user->userAparatur->pangkat_golongan_tmt_id)->get();

        $atasan_langsung = DB::table('mentes')->join('user_pejabat_strukturals', 'user_pejabat_strukturals.user_id', '=', 'mentes.atasan_langsung_id')->where('fungsional_id', Auth::user()->id)->get();
        return view('aparatur.overview', compact('user', 'judul', 'periode', 'informasi', 'ketentuan_ak', 'atasan_langsung'));
    }
}
