<?php

namespace App\Http\Controllers\Kemendagri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Periode;
use App\Models\UserAparatur;
use App\Models\UserPejabatStruktural;
use App\Models\RoleUser;
use Illuminate\Support\Facades\DB;
class OverviewController extends Controller
{
    public function index()
    {   
        $judul = 'Kemendagri Dashboard';
        $periode = Periode::query()->where('is_active', true)->first();
        $total_aparatur = UserAparatur::count() + UserPejabatStruktural::count();
        $total_damkar = RoleUser::query()->where('role_id', '<', 5 )->count();
        $total_analisis = RoleUser::query()->whereRaw('role_id > 4 and role_id < 8')->count();

        $total_provinsi = DB::table('user_prov_kab_kotas')->where('kab_kota_id', null)->count();
        $total_kab_kota = DB::table('user_prov_kab_kotas')->whereNotNull('kab_kota_id')->count();
        $total = [
            'kab_kota' => $total_kab_kota,
            'provinsi' => $total_provinsi,
            'damkar' => $total_damkar,
            'analisis' => $total_analisis,
            'aparatur' => $total_aparatur,
            'struktural' => UserPejabatStruktural::count()
        ];
        return view('kemendagri.overview',compact('judul', 'periode', 'total'));
    }
}
