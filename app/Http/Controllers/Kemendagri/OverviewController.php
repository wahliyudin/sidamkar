<?php

namespace App\Http\Controllers\Kemendagri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Periode;
use App\Models\UserAparatur;
use App\Models\UserPejabatStruktural;
use App\Models\RoleUser;
use App\Traits\AuthTrait;
use Illuminate\Support\Facades\DB;

class OverviewController extends Controller
{
    use AuthTrait;
    public function index()
    {
        $judul = 'Kemendagri Dashboard';
        $periode = Periode::query()->where('is_active', true)->first();
        $total_aparatur = UserAparatur::count() + UserPejabatStruktural::count();
        $total_damkar = RoleUser::query()->where('role_id', '<', 5)->count();
        $total_analisis = RoleUser::query()->whereRaw('role_id > 4 and role_id < 8')->count();

        $total_provinsi = DB::table('user_prov_kab_kotas')->join('users', 'users.id', '=', 'user_prov_kab_kotas.user_id')->where('user_prov_kab_kotas.kab_kota_id', null)->where('users.status_akun', 1)->count();

        $total_kab_kota = DB::table('user_prov_kab_kotas')->join('users', 'users.id', '=', 'user_prov_kab_kotas.user_id')->whereNotNull('kab_kota_id')->where('users.status_akun', 1)->count();

        $total_pengajuan_kab_kota = DB::table('users')->join('user_prov_kab_kotas', 'user_prov_kab_kotas.user_id', '=', 'users.id')->where([['users.status_akun', '=', 0], ['user_prov_kab_kotas.kab_kota_id', '!=', null]])->count();
        $total_pengajuan_provinsi = DB::table('users')->join('user_prov_kab_kotas', 'user_prov_kab_kotas.user_id', '=', 'users.id')->where([['users.status_akun', '=', 0], ['user_prov_kab_kotas.kab_kota_id', '=', null]])->count();
        $total = [
            'kab_kota' => $total_kab_kota,
            'provinsi' => $total_provinsi,
            'damkar' => $total_damkar,
            'analisis' => $total_analisis,
            'aparatur' => $total_aparatur,
            'pengajuan_kab_kota' => $total_pengajuan_kab_kota,
            'pengajuan_provinsi' => $total_pengajuan_provinsi,
            'struktural' => UserPejabatStruktural::count()
        ];
        $kemendagri = $this->authUser()->load(['userKemendagri']);
        return view('kemendagri.overview', compact('judul', 'periode', 'total', 'kemendagri'));
    }


    public function emailPenetapan(Request $request)
    {
        $request->validate([
            'email_penetapan' => 'required|email'
        ], [
            'email_penetapan.required' => 'Email wajib diisi'
        ]);
        $this->authUser()->userKemendagri()->update([
            'email_info_penetapan' => $request->email_penetapan
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil disimpan'
        ]);
    }
}
