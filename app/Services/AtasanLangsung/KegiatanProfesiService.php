<?php

namespace App\Services\AtasanLangsung;

use App\Models\ButirKegiatan;
use App\Models\JenisKegiatan;
use App\Models\LaporanKegiatanJabatan;
use App\Models\Periode;
use App\Models\Unsur;
use App\Models\User;
use App\Repositories\ButirKegiatanRepository;
use App\Repositories\HistoryKegiatanJabatanRepository;
use App\Repositories\LaporanKegiatanJabatanRepository;
use App\Repositories\PeriodeRepository;
use App\Repositories\UserRepository;
use App\Services\KegiatanJabatanService as ServicesKegiatanJabatanService;
use Illuminate\Http\Request;

class KegiatanProfesiService
{
    private PeriodeRepository $periodeRepository;
    private UserRepository $userRepository;
    private ButirKegiatanRepository $butirKegiatanRepository;

    public function __construct(
        PeriodeRepository $periodeRepository,
        UserRepository $userRepository,
        ButirKegiatanRepository $butirKegiatanRepository,
        ServicesKegiatanJabatanService $kegiatanJabatanService,
        LaporanKegiatanJabatanRepository $laporanKegiatanJabatanRepository,
        HistoryKegiatanJabatanRepository $historyKegiatanJabatanRepository
    ) {
        $this->periodeRepository = $periodeRepository;
        $this->userRepository = $userRepository;
        $this->butirKegiatanRepository = $butirKegiatanRepository;
        $this->kegiatanJabatanService = $kegiatanJabatanService;
        $this->laporanKegiatanJabatanRepository = $laporanKegiatanJabatanRepository;
        $this->historyKegiatanJabatanRepository = $historyKegiatanJabatanRepository;
    }

    public function periodeActive(): Periode
    {
        return $this->periodeRepository->isActive();
    }

    public function getUserById($id): User
    {
        return $this->userRepository->getUserById($id);
    }

    public function getButirKegiatanById($id): ButirKegiatan
    {
        return $this->butirKegiatanRepository->getById($id);
    }

    public function loadUnsurs(Periode $periode, string $search, $role_id)
    {
        $unsurs = Unsur::query()
            ->where('jenis_kegiatan_id', JenisKegiatan::JENIS_KEGIATAN_PROFESI)
            ->where('periode_id', $periode->id)
            ->withWhereHas('subUnsurs', function ($query)  use ($role_id, $search) {
                $query->withWhereHas('butirKegiatans', function ($query) use ($role_id, $search) {
                    $query->withWhereHas('laporanKegiatanJabatans', function ($query) {
                        $query->whereIn('status', [LaporanKegiatanJabatan::VALIDASI, LaporanKegiatanJabatan::REVISI]);
                    })->withWhereHas('role', function ($query) use ($search, $role_id) {
                        $query->whereIn('id', [$role_id + 1, $role_id - 1, $role_id])->where(
                            'name',
                            'like',
                            "%$search%"
                        );
                    });
                });
            })
            ->when($search, function ($query) use ($search) {
                $query->where('nama', 'like', "%$search%")
                    ->orWhereHas('subUnsurs', function ($query) use ($search) {
                        $query->where('nama', 'like', "%$search%")
                            ->orWhereHas('butirKegiatans', function ($query) use ($search) {
                                $query->where('nama', 'like', "%$search%");
                            });
                    });
            })
            ->get();
        return $unsurs;
    }

    public function laporanKegiatanPenunjangProfesiByUser($butirKegiatan, $user)
    {
    }

    public function laporanKegiatanPenunjangProfesiCount(ButirKegiatan $butirKegiatan, User $user)
    {
    }

    public function verifikasi($id)
    {
    }

    public function revisi(Request $request, $laporan_id, $user_id)
    {
    }

    public function tolak(Request $request, $id)
    {
    }
}