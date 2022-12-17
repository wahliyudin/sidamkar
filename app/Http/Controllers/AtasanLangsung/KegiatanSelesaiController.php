<?php

namespace App\Http\Controllers\AtasanLangsung;

use App\Http\Controllers\Controller;
use App\Models\LaporanKegiatanJabatan;
use App\Models\RekapitulasiKegiatan;
use App\Models\User;
use App\Repositories\PeriodeRepository;
use App\Repositories\RekapitulasiKegiatanRepository;
use App\Repositories\UserRepository;
use App\Services\GeneratePdfService;
use App\Services\MenteService;
use App\Traits\AuthTrait;

class KegiatanSelesaiController extends Controller
{
    use AuthTrait;

    private PeriodeRepository $periodeRepository;
    private MenteService $menteService;
    private GeneratePdfService $generatePdfService;
    private RekapitulasiKegiatanRepository $rekapitulasiKegiatanRepository;
    private UserRepository $userRepository;

    public function __construct(PeriodeRepository $periodeRepository, MenteService $menteService, GeneratePdfService $generatePdfService, RekapitulasiKegiatanRepository $rekapitulasiKegiatanRepository, UserRepository $userRepository)
    {
        $this->periodeRepository = $periodeRepository;
        $this->menteService = $menteService;
        $this->generatePdfService = $generatePdfService;
        $this->rekapitulasiKegiatanRepository = $rekapitulasiKegiatanRepository;
        $this->userRepository = $userRepository;
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
                $query->where('is_send', RekapitulasiKegiatan::IS_SEND_KE_ATASAN_LANGSUNG);
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
        $user = User::query()->findOrFail($id);
        $rekapitulasiKegiatan = $this->rekapitulasiKegiatanRepository->getRekapByFungsionalAndPeriode($user, $periode);
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

    public function sendToPenilai($user_id)
    {
        $periode = $this->periodeRepository->isActive();
        $user = $this->userRepository->getUserById($user_id);
        $rekap = $this->rekapitulasiKegiatanRepository->getRekapByFungsionalAndPeriode($user, $periode);
        $this->rekapitulasiKegiatanRepository->sendToPenilai($rekap);
        return response()->json([
            'message' => 'Berhasil dikirim ke Penilai'
        ]);
    }
}