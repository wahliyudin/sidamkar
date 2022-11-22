<?php

namespace App\Services\AtasanLangsung;

use App\Models\ButirKegiatan;
use App\Models\Periode;
use App\Models\Unsur;
use App\Models\User;
use App\Repositories\ButirKegiatanRepository;
use App\Repositories\PeriodeRepository;
use App\Repositories\UserRepository;
use App\Services\KegiatanJabatanService;

class VerifikasiKegiatanService
{
    private PeriodeRepository $periodeRepository;
    private UserRepository $userRepository;
    private ButirKegiatanRepository $butirKegiatanRepository;
    private KegiatanJabatanService $kegiatanJabatanService;

    public function __construct(PeriodeRepository $periodeRepository, UserRepository $userRepository, ButirKegiatanRepository $butirKegiatanRepository, KegiatanJabatanService $kegiatanJabatanService)
    {
        $this->periodeRepository = $periodeRepository;
        $this->userRepository = $userRepository;
        $this->butirKegiatanRepository = $butirKegiatanRepository;
        $this->kegiatanJabatanService = $kegiatanJabatanService;
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
            ->where('jenis_kegiatan_id', 1)
            ->where('periode_id', $periode->id)
            ->with(['role' => function ($query) use ($role_id) {
                $query->whereIn('id', [$role_id + 1, $role_id - 1, $role_id]);
            }, 'subUnsurs.butirKegiatans'])
            ->whereHas('role', function ($query) use ($search) {
                $query->where(
                    'nama',
                    'like',
                    "%$search%"
                );
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

    public function laporanKegiatanJabatanByUser($butirKegiatan, $user)
    {
        return $this->kegiatanJabatanService->laporanKegiatanJabatanByUser($butirKegiatan, $user);
    }

    public function laporanKegiatanJabatanCount(ButirKegiatan $butirKegiatan, User $user): int
    {
        return $this->kegiatanJabatanService->laporanKegiatanJabatanCount($butirKegiatan, $user);
    }
}
