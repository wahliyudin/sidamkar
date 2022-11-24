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
                    ->with(['kabKota.kabProvPenilaiAndPenetap' => function ($query) {
                        $query->where('tingkat', 'kab_kota')
                            ->with([
                                'penilaiAngkaKredit.userPejabatStruktural',
                                'penetapAngkaKredit.userPejabatStruktural'
                            ]);
                    }])
                    ->where('tingkat_aparatur', 'kab_kota');
            })
            ->where('status_akun', 1)
            ->whereRoleIs(getAllRoleFungsional())->get();
    }
}