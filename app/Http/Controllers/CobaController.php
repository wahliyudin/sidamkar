<?php

namespace App\Http\Controllers;

use App\Models\CrossPenilaiAndPenetap;
use App\Models\KabProvPenilaiAndPenetap;
use App\Models\LaporanKegiatanJabatan;
use App\Models\Provinsi;
use App\Models\Unsur;
use App\Models\User;
use App\Repositories\PeriodeRepository;
use App\Traits\AuthTrait;
use App\Traits\ScoringTrait;
use Illuminate\Http\Request;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Support\Facades\DB;

class CobaController extends Controller
{
    use ScoringTrait, AuthTrait;

    private PeriodeRepository $periodeRepository;

    public function __construct(PeriodeRepository $periodeRepository)
    {
        $this->periodeRepository = $periodeRepository;
    }

    public function index()
    {

            // ->whereHas('rekapitulasiKegiatan', function($query){
            //     $query->where('is_send', true);
            // })
        $periode = $this->periodeRepository->isActive();
        return User::query()
            ->where('status_akun', User::STATUS_ACTIVE)
            ->whereRoleIs(getAllRoleFungsional())
            ->with(['roles'])
            ->withWhereHas('userAparatur', function($query){
                $query->where('kab_kota_id', 1101)->with(['pangkatGolonganTmt']);
            })
            ->withSum(['laporanKegiatanJabatans' => function($query) use ($periode){
                $query->where('status', LaporanKegiatanJabatan::SELESAI)->whereBetween('current_date', [$periode->awal, $periode->akhir]);
            }], 'score')
            ->get()->map(function(User $user){
                foreach ($user->roles as $role) {
                    if (in_array($role->name, getAllRoleFungsional())) {
                        $user->role = $role;
                    }
                }
                return $user;
            });
    }
}