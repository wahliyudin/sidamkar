<?php

namespace App\Services;

use App\Models\ButirKegiatan;
use App\Models\Periode;
use App\Models\User;
use App\Repositories\KegiatanJabatanRepository;

class KegiatanJabatanService
{
    private KegiatanJabatanRepository $kegiatanJabatanRepository;

    public function __construct(KegiatanJabatanRepository $kegiatanJabatanRepository)
    {
        $this->kegiatanJabatanRepository = $kegiatanJabatanRepository;
    }

    public function laporanKegiatanJabatanByUser(ButirKegiatan $butirKegiatan, User $user, Periode $periode)
    {
        return [
            $this->kegiatanJabatanRepository->laporanKegiatanJabatanStatusValidasi($butirKegiatan, $user, $periode),
            $this->kegiatanJabatanRepository->laporanKegiatanJabatanStatusRevisi($butirKegiatan, $user, $periode),
            $this->kegiatanJabatanRepository->laporanKegiatanJabatanStatusSelesai($butirKegiatan, $user, $periode),
            $this->kegiatanJabatanRepository->laporanKegiatanJabatanStatusTolak($butirKegiatan, $user, $periode),
        ];
    }

    public function laporanKegiatanJabatanCount(ButirKegiatan $butirKegiatan, User $user, Periode $periode): int
    {
        return $this->kegiatanJabatanRepository->laporanKegiatanJabatanCount($butirKegiatan, $user, $periode);
    }

    public function laporanLast(ButirKegiatan $butirKegiatan, User $user, Periode $periode)
    {
        return $this->kegiatanJabatanRepository->laporanLast($butirKegiatan, $user, $periode);
    }
}