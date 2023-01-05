<?php

namespace App\Repositories;

use App\Models\LaporanKegiatanPenunjangProfesi;
use App\Models\Periode;

class LaporanKegiatanPenunjangProfesiRepository
{
    protected LaporanKegiatanPenunjangProfesi $laporanKegiatanPenunjangProfesi;

    public function __construct(LaporanKegiatanPenunjangProfesi $laporanKegiatanPenunjangProfesi)
    {
        $this->laporanKegiatanPenunjangProfesi = $laporanKegiatanPenunjangProfesi;
    }

    public function getById($id): LaporanKegiatanPenunjangProfesi
    {
        return $this->laporanKegiatanPenunjangProfesi->query()->findOrFail($id);
    }

    public function sumScoreByUser($user_id, $periode)
    {
        return $this->laporanKegiatanPenunjangProfesi->query()
            ->where('user_id', $user_id)
            ->where('periode_id', $periode?->id)
            ->where('status', 3)
            ->sum('score');
    }

    public function updateStatusAndCatatan(LaporanKegiatanPenunjangProfesi $laporanKegiatanPenunjangProfesi, $status, $catatan = null)
    {
        return $laporanKegiatanPenunjangProfesi->update([
            'status' => $status,
            'catatan' => $catatan
        ]);
    }
}
