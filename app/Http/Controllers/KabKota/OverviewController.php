<?php

namespace App\Http\Controllers\KabKota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Periode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class OverviewController extends Controller
{
    public function index()
    {
        $judul = 'Kab/Kota Dasboard';
        $periode = Periode::query()->where('is_active', true)->first();
        $user = DB::table('users')->join('user_prov_kab_kotas', 'user_prov_kab_kotas.user_id', '=', 'users.id')->where('users.id', Auth::user()->id)->get();
        $kab_kota_id = $user[0]->kab_kota_id;
        $total_fungsional = DB::table('user_aparaturs')->where('tingkat_aparatur', '=', 'kab_kota')->count();
        $total_struktural = DB::table('user_pejabat_strukturals')->where('tingkat_aparatur', '=', 'kab_kota')->count();

        $total_damkar = DB::table('users')->rightJoin('user_aparaturs', 'user_aparaturs.user_id', '=', 'users.id')->join('role_user', 'role_user.user_id', '=', 'users.id')->where('role_user.role_id', '<', 5)->where('user_aparaturs.tingkat_aparatur', '=', 'kab_kota')->count();

        $total_analis = DB::table('users')->rightJoin('user_aparaturs', 'user_aparaturs.user_id', '=', 'users.id')->join('role_user', 'role_user.user_id', '=', 'users.id')->whereRaw('role_user.user_id > 4 and role_user.user_id < 8')->where('user_aparaturs.tingkat_aparatur', '=', 'kab_kota')->count();

        $total = [
            'fungsional' => $total_fungsional,
            'struktural' => $total_struktural,
            'aparatur' => $total_fungsional + $total_struktural,
            'damkar' => $total_damkar,
            'analis' => $total_analis,
        ];

        $role = DB::table('users')->join('role_user', 'role_user.user_id', '=', 'users.id')->where('users.id', '=', Auth::user()->id)->select('*')->get();

        $informasi = DB::table('informasis')->join('role_informasis', 'role_informasis.informasi_id', '=', 'informasis.id')->where('role_informasis.role_id', $role[0]->role_id)->orderBy('informasis.created_at', 'desc')->get();
        return view('kabkota.overview', compact('judul', 'periode', 'total', 'informasi'));
    }
}
