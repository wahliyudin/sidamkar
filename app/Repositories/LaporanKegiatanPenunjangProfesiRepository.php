<?php

namespace App\Repositories;

use App\Models\LaporanKegiatanPenunjangProfesi;

class LaporanKegiatanPenunjangProfesiRepository
{
    protected LaporanKegiatanPenunjangProfesi $laporanKegiatanPenunjangProfesi;

    public function __construct(LaporanKegiatanPenunjangProfesi $laporanKegiatanPenunjangProfesi)
    {
        $this->laporanKegiatanPenunjangProfesi = $laporanKegiatanPenunjangProfesi;
    }

    public function sumScoreByUser($user_id)
    {
        return $this->laporanKegiatanPenunjangProfesi->query()
            ->where('user_id', $user_id)
            ->where('status', 3)
            ->sum('score');
    }
}