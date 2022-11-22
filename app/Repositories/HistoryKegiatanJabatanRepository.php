<?php

namespace App\Repositories;

use App\Models\HistoryKegiatanJabatan;
use App\Models\LaporanKegiatanJabatan;
use App\Models\User;
use App\Models\UserAparatur;

class HistoryKegiatanJabatanRepository
{
    private HistoryKegiatanJabatan $historyKegiatanJabatan;

    public function __construct(HistoryKegiatanJabatan $historyKegiatanJabatan)
    {
        $this->historyKegiatanJabatan = $historyKegiatanJabatan;
    }

    public function storeStatusSelesai(LaporanKegiatanJabatan $laporanKegiatanJabatan): HistoryKegiatanJabatan
    {
        return $laporanKegiatanJabatan->historyKegiatanJabatans()->create([
            'keterangan' => 'Laporan dinyatakan selesai oleh ATASAN LANGSUNG',
            'status' => $this->historyKegiatanJabatan::STATUS_SELESAI,
            'current_date' => $laporanKegiatanJabatan->current_date,
            'icon' => $this->historyKegiatanJabatan::ICON_CHECK
        ]);
    }

    public function storeStatusRevisi(LaporanKegiatanJabatan $laporanKegiatanJabatan, User $user, string $catatan): HistoryKegiatanJabatan
    {
        $user = $user->load(['userAparatur', 'roles']);
        return $laporanKegiatanJabatan->historyKegiatanJabatans()->create([
            'keterangan' => 'Laporan perlu direvisi oleh '.$user->userAparatur->nama.' - '.$user->roles()->first()->display_name,
            'status' => $this->historyKegiatanJabatan::STATUS_REVISI,
            'catatan' => $catatan,
            'current_date' => $laporanKegiatanJabatan->current_date,
            'icon' => $this->historyKegiatanJabatan::ICON_FILE_PEN
        ]);
    }

    public function storeStatusTolak(LaporanKegiatanJabatan $laporanKegiatanJabatan, string $catatan): HistoryKegiatanJabatan
    {
        return $laporanKegiatanJabatan->historyKegiatanJabatans()->create([
            'keterangan' => 'Laporan ditolak oleh ATASAN LANGSUNG',
            'status' => $this->historyKegiatanJabatan::STATUS_TOLAK,
            'catatan' => $catatan,
            'current_date' => $laporanKegiatanJabatan->current_date,
            'icon' => $this->historyKegiatanJabatan::ICON_X
        ]);
    }
}
