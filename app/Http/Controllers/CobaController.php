<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\AuthTrait;
use App\Traits\ScoringTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CobaController extends Controller
{
    use ScoringTrait, AuthTrait;

    public function index()
    {
        return User::query()->with('mente.atasanLangsung.userPejabatStruktural')
            ->withWhereHas('userAparatur', function ($query) {
                $query->where('kab_kota_id', $this->authUser()->load('userProvKabKota')->userProvKabKota->kab_kota_id)
                    ->where('tingkat_aparatur', 'kab_kota')
                    ->with([
                        'kabKota.kabProvPenilaiAndPenetap.penilaiAngkaKredit.userPejabatStruktural',
                        'kabKota.kabProvPenilaiAndPenetap.penetapAngkaKredit.userPejabatStruktural',
                        'kabKota.crossPenilaiAndPenetap.kabProvPenilaiAndPenetap.penilaiAngkaKredit.userPejabatStruktural',
                        'kabKota.crossPenilaiAndPenetap.kabProvPenilaiAndPenetap.penetapAngkaKredit.userPejabatStruktural',
                    ]);
            })
            ->where('status_akun', 1)
            ->whereRoleIs(getAllRoleFungsional())->get();
    }
}