<?php

namespace App\Http\Controllers\Aparatur;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Periode;
use Illuminate\Support\Facades\DB;
class OverviewController extends Controller
{
    public function index()
    {
        $user = User::query()->with(['userAparatur.provinsi.kabkotas', 'dokKepegawaians', 'dokKompetensis'])->find(Auth::user()->id);
        $periode = Periode::query()->where('is_active', true)->first();
        $judul = "Aparatur Fungsional Dashboard";

        $role = DB::table('users')->join('role_user', 'role_user.user_id', '=', 'users.id')->where('users.id', '=', Auth::user()->id)->select('*')->get();

        $informasi = DB::table('informasis')->join('role_informasis', 'role_informasis.informasi_id', '=', 'informasis.id')->where('role_informasis.role_id', $role[0]->role_id)->get();
        return view('aparatur.overview', compact('user', 'judul', 'periode', 'informasi') );
    }
}
