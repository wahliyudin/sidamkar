<?php

namespace App\Repositories;

use App\Models\LaporanKegiatanJabatan;

class LaporanKegiatanJabatanRepository
{
    private LaporanKegiatanJabatan $laporanKegiatanJabatan;

    public function __construct(LaporanKegiatanJabatan $laporanKegiatanJabatan)
    {
        $this->laporanKegiatanJabatan = $laporanKegiatanJabatan;
    }

    public function getById($id): LaporanKegiatanJabatan
    {
        return $this->laporanKegiatanJabatan->query()->findOrFail($id);
    }

    public function updateStatusAndCatatan(LaporanKegiatanJabatan $laporanKegiatanJabatan, $status, $catatan = null)
    {
        return $laporanKegiatanJabatan->update([
            'status' => $status,
            'catatan' => $catatan
        ]);
    }
}
