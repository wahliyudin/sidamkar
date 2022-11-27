<?php

namespace App\Http\Controllers;

use App\Models\CrossPenilaiAndPenetap;
use App\Models\KabProvPenilaiAndPenetap;
use App\Models\Unsur;
use App\Models\User;
use App\Traits\AuthTrait;
use App\Traits\ScoringTrait;
use Illuminate\Http\Request;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class CobaController extends Controller
{
    use ScoringTrait, AuthTrait;

    public function index()
    {
        return User::query()
            ->with([
                'mente:id,atasan_langsung_id,fungsional_id',
                'mente.atasanLangsung:id',
                'mente.atasanLangsung.userPejabatStruktural:id,nama,user_id'
                ])
            ->withWhereHas('userAparatur', function ($query) {
                $query->where('kab_kota_id', $this->authUser()->load('userProvKabKota')->userProvKabKota->kab_kota_id)
                    ->where('tingkat_aparatur', 'kab_kota')
                    ->with([
                        'kabKota:id',
                        'kabKota.kabProvPenilaiAndPenetaps:id,penilai_ak_id,penetap_ak_id,jenis_aparatur,kab_kota_id',
                        'kabKota.kabProvPenilaiAndPenetaps.penilaiAngkaKredit:id',
                        'kabKota.kabProvPenilaiAndPenetaps.penilaiAngkaKredit.userPejabatStruktural:id,nama,user_id',
                        'kabKota.kabProvPenilaiAndPenetaps.penetapAngkaKredit:id',
                        'kabKota.kabProvPenilaiAndPenetaps.penetapAngkaKredit.userPejabatStruktural:id,nama,user_id',
                        'kabKota.crossPenilaiAndPenetap:id,kab_kota_id,provinsi_id,jenis_aparatur,kab_prov_penilai_and_penetap_id',
                        'kabKota.crossPenilaiAndPenetap.kabProvPenilaiAndPenetap:id,penilai_ak_id,penetap_ak_id,jenis_aparatur,kab_kota_id',
                        'kabKota.crossPenilaiAndPenetap.kabProvPenilaiAndPenetap.penilaiAngkaKredit:id',
                        'kabKota.crossPenilaiAndPenetap.kabProvPenilaiAndPenetap.penilaiAngkaKredit.userPejabatStruktural:id,nama,user_id',
                        'kabKota.crossPenilaiAndPenetap.kabProvPenilaiAndPenetap.penetapAngkaKredit:id',
                        'kabKota.crossPenilaiAndPenetap.kabProvPenilaiAndPenetap.penetapAngkaKredit.userPejabatStruktural:id,nama,user_id',
                    ]);
            })
            ->where('status_akun', 1)
            ->whereRoleIs(getAllRoleFungsional())->get(['id']);
    }
}