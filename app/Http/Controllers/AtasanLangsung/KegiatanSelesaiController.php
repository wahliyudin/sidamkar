<?php

namespace App\Http\Controllers\AtasanLangsung;

use App\Http\Controllers\Controller;
use App\Models\KabProvPenilaiAndPenetap;
use App\Models\LaporanKegiatanJabatan;
use App\Models\RekapitulasiKegiatan;
use App\Models\User;
use App\Repositories\PeriodeRepository;
use App\Services\GeneratePdfService;
use App\Services\MenteService;
use App\Traits\AuthTrait;
use Illuminate\Http\Request;

class KegiatanSelesaiController extends Controller
{
    use AuthTrait;

    private PeriodeRepository $periodeRepository;
    private MenteService $menteService;
    private GeneratePdfService $generatePdfService;

    public function __construct(PeriodeRepository $periodeRepository, MenteService $menteService, GeneratePdfService $generatePdfService)
    {
        $this->periodeRepository = $periodeRepository;
        $this->menteService = $menteService;
        $this->generatePdfService = $generatePdfService;
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
            ->withWhereHas('rekapitulasiKegiatan', function ($query) {
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
        $penilaiAndPenetap = $this->menteService->getCurrentPenilaiAndPenetapByKabKota($user->userPejabatStruktural->kab_kota_id, ['damkar', 'analis']);
        if (!isset($penilaiAndPenetap)) {
            $penilaiAndPenetap = $this->menteService->getCurrentPenilaiAndPenetapByProvinsi($user->userPejabatStruktural->provinsi_id, ['damkar', 'analis']);
        }
        return view('atasan-langsung.kegiatan-selesai.index', compact('fungsionals', 'penilaiAndPenetap', 'judul'));
    }

    public function show($id)
    {
        $periode = $this->periodeRepository->isActive();
        $rekapitulasiKegiatan = RekapitulasiKegiatan::query()
            ->where('fungsional_id', $id)
            ->where('periode_id', $periode->id)->first();
        $user = User::query()->findOrFail($id);
        return view('atasan-langsung.kegiatan-selesai.show', compact('rekapitulasiKegiatan', 'user'));
    }

    public function ttd($id)
    {
        $user = User::query()->where('id', $id)->first();
        $this->generatePdfService->ttdRekapitulasi($user, 'Rekapitulasi Ditanda Tangani Oleh Atasan Langsung', public_path('storage/ttd.png'));
        return response()->json([
            'message' => 'Berhasil'
        ]);
    }
}