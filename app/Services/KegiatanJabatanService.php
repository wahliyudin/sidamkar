<?php

namespace App\Services;

use App\Models\ButirKegiatan;
use App\Models\User;
use App\Repositories\KegiatanJabatanRepository;

class KegiatanJabatanService
{
    private KegiatanJabatanRepository $kegiatanJabatanRepository;

    public function __construct(KegiatanJabatanRepository $kegiatanJabatanRepository)
    {
        $this->kegiatanJabatanRepository = $kegiatanJabatanRepository;
    }

    public function laporanKegiatanJabatanByUser(ButirKegiatan $butirKegiatan, User $user)
    {
        return [
            $this->kegiatanJabatanRepository->laporanKegiatanJabatanStatusValidasi($butirKegiatan, $user),
            $this->kegiatanJabatanRepository->laporanKegiatanJabatanStatusRevisi($butirKegiatan, $user),
            $this->kegiatanJabatanRepository->laporanKegiatanJabatanStatusSelesai($butirKegiatan, $user),
            $this->kegiatanJabatanRepository->laporanKegiatanJabatanStatusTolak($butirKegiatan, $user),
        ];
    }

    public function laporanKegiatanJabatanCount(ButirKegiatan $butirKegiatan, User $user): int
    {
        return $this->kegiatanJabatanRepository->laporanKegiatanJabatanCount($butirKegiatan, $user);
    }

    public function laporanLast(ButirKegiatan $butirKegiatan, User $user)
    {
        return $this->kegiatanJabatanRepository->laporanLast($butirKegiatan, $user);
    }
}
