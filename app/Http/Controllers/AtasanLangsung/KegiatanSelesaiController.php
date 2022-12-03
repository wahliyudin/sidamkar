<?php

namespace App\Http\Controllers\AtasanLangsung;

use App\Http\Controllers\Controller;
use App\Models\KabProvPenilaiAndPenetap;
use App\Models\LaporanKegiatanJabatan;
use App\Models\User;
use App\Repositories\PeriodeRepository;
use App\Services\MenteService;
use App\Traits\AuthTrait;
use Illuminate\Http\Request;

class KegiatanSelesaiController extends Controller
{
    use AuthTrait;

    private PeriodeRepository $periodeRepository;
    private MenteService $menteService;

    public function __construct(PeriodeRepository $periodeRepository, MenteService $menteService)
    {
        $this->periodeRepository = $periodeRepository;
        $this->menteService = $menteService;
    }

    public function index()
    {
        $judul = 'Kegiatan Selesai';
        $periode = $this->periodeRepository->isActive();
        $user = $this->authUser()->load('userPejabatStruktural');
        $fungsionals = User::query()
            ->where('status_akun', User::STATUS_ACTIVE)
            ->whereRoleIs(getAllRoleFungsional())
            ->with(['roles'])
            ->withWhereHas('userAparatur', function ($query) use ($user) {
                $query->where('tingkat_aparatur', 'kab_kota')
                    ->where('kab_kota_id', $user?->userPejabatStruktural?->kab_kota_id)
                    ->with(['pangkatGolonganTmt']);
            })
            ->whereHas('rekapitulasiKegiatan', function($query){
                $query->where('is_send', true);
            })
            ->withSum(['laporanKegiatanJabatans' => function ($query) use ($periode) {
                $query->where('status', LaporanKegiatanJabatan::SELESAI)->whereBetween('current_date', [$periode->awal, $periode->akhir]);
            }], 'score')
            ->get()->map(function (User $user) {
                foreach ($user->roles as $role) {
                    if (in_array($role->name, getAllRoleFungsional())) {
                        $user->role = $role;
                    }
                }
                return $user;
            });
        $penilaiAndPenetaps = $this->menteService->getCurrentPenilaiAndPenetapByKabKota($user->userPejabatStruktural->kab_kota_id, ['damkar', 'analis']);
        if (!isset($penilaiAndPenetaps)) {
            $penilaiAndPenetaps = $this->menteService->getCurrentPenilaiAndPenetapByProvinsi($user->userPejabatStruktural->provinsi_id, ['damkar', 'analis']);
        }
        $penilaiPenetapDamkar = null;
        $penilaiPenetapAnalis = null;
        $penilaiAndPenetaps->map(function(KabProvPenilaiAndPenetap $kabProvPenilaiAndPenetap) use (&$penilaiPenetapDamkar, &$penilaiPenetapAnalis){
            if ($kabProvPenilaiAndPenetap->jenis_aparatur == 'damkar') {
                $penilaiPenetapDamkar = $kabProvPenilaiAndPenetap;
            } else {
                $penilaiPenetapAnalis = $kabProvPenilaiAndPenetap;
            }
        });
        return view('atasan-langsung.kegiatan-selesai.index', compact('fungsionals', 'penilaiPenetapDamkar', 'penilaiPenetapAnalis', 'judul'));
    }

    public function show()
    {

    }
}