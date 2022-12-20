<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Periode;
use Illuminate\Support\Facades\DB;
use App\Models\Mente;
use App\Traits\AuthTrait;
use App\Services\MenteService;

class StrukturalDashboardController extends Controller
{
    use AuthTrait;

    private MenteService $menteService;
    public function __construct(MenteService $menteService)
    {
        $this->menteService = $menteService;
    }
    public function index()
    {
        $user = User::query()->with(['userPejabatStruktural.provinsi.kabkotas', 'dokKepegawaians', 'dokKompetensis'])->find(Auth::user()->id);
        $judul = 'Aparatur Struktural Dashboard';

        $role = DB::table('users')->join('role_user', 'role_user.user_id', '=', 'users.id')->where('users.id', '=', Auth::user()->id)->select('*')->get();
        $informasi = DB::table('informasis')->join('role_informasis', 'role_informasis.informasi_id', '=', 'informasis.id')->where('role_informasis.role_id', $role[0]->role_id)->orderBy('informasis.created_at', 'desc')->get();

        $struktural = DB::table('user_pejabat_strukturals')->where('user_id', Auth::user()->id)->get();

        if ($struktural[0]->tingkat_aparatur == 'kab_kota') {
            $penilaiAndPenetap = $this->menteService->getCurrentPenilaiAndPenetapByKabKota($struktural[0]->kab_kota_id);
            if (!isset($penilaiAndPenetap)) {
                $penilaiAndPenetap = $this->menteService->getCurrentPenilaiAndPenetapByKabKota($struktural[0]->kab_kota_id);
            }
        } else {
            $penilaiAndPenetap = '';
        }
        return view('struktural.dashboard', compact('user', 'judul', 'informasi', 'penilaiAndPenetap'));
    }
}
