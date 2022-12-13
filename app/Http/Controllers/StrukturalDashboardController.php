<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Periode;
use Illuminate\Support\Facades\DB;
use App\Models\Mente;

class StrukturalDashboardController extends Controller
{
    public function index()
    {
        $user = User::query()->with(['userPejabatStruktural.provinsi.kabkotas', 'dokKepegawaians', 'dokKompetensis'])->find(Auth::user()->id);
        $judul = 'Aparatur Struktural Dashboard';

        $role = DB::table('users')->join('role_user', 'role_user.user_id', '=', 'users.id')->where('users.id', '=', Auth::user()->id)->select('*')->get();
        $informasi = DB::table('informasis')->join('role_informasis', 'role_informasis.informasi_id', '=', 'informasis.id')->where('role_informasis.role_id', $role[0]->role_id)->get();
        return view('struktural.dashboard', compact('user', 'judul', 'informasi'));
    }
}
