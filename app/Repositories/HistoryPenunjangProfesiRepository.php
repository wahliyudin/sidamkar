<?php

namespace App\Repositories;

use App\Models\HistoryPenunjangProfesi;
use App\Models\LaporanKegiatanPenunjangProfesi;
use App\Models\User;
use App\Models\UserAparatur;

class HistoryPenunjangProfesiRepository
{
    private HistoryPenunjangProfesi $historyPenunjangProfesi;

    public function __construct(HistoryPenunjangProfesi $historyPenunjangProfesi)
    {
        $this->historyPenunjangProfesi = $historyPenunjangProfesi;
    }

    public function storeStatusSelesai(LaporanKegiatanPenunjangProfesi $laporanKegiatanPenunjangProfesi): HistoryPenunjangProfesi
    {
        return $laporanKegiatanPenunjangProfesi->historyPenunjangProfesis()->create([
            'keterangan' => 'Laporan dinyatakan selesai oleh ATASAN LANGSUNG',
            'status' => $this->historyPenunjangProfesi::STATUS_SELESAI,
            'current_date' => $laporanKegiatanPenunjangProfesi->current_date,
            'icon' => $this->historyPenunjangProfesi::ICON_CHECK
        ]);
    }

    public function storeStatusRevisi(LaporanKegiatanPenunjangProfesi $laporanKegiatanPenunjangProfesi, User $user, string $catatan): HistoryPenunjangProfesi
    {
        $user = $user->load(['userAparatur', 'roles']);
        return $laporanKegiatanPenunjangProfesi->historyPenunjangProfesis()->create([
            'keterangan' => 'Laporan perlu direvisi oleh ' . $user->userAparatur->nama . ' - ' . $user->roles()->first()->display_name,
            'status' => $this->historyPenunjangProfesi::STATUS_REVISI,
            'catatan' => $catatan,
            'current_date' => $laporanKegiatanPenunjangProfesi->current_date,
            'icon' => $this->historyPenunjangProfesi::ICON_FILE_PEN
        ]);
    }

    public function storeStatusTolak(LaporanKegiatanPenunjangProfesi $laporanKegiatanPenunjangProfesi, string $catatan): HistoryPenunjangProfesi
    {
        return $laporanKegiatanPenunjangProfesi->historyPenunjangProfesis()->create([
            'keterangan' => 'Laporan ditolak oleh ATASAN LANGSUNG',
            'status' => $this->historyPenunjangProfesi::STATUS_TOLAK,
            'catatan' => $catatan,
            'current_date' => $laporanKegiatanPenunjangProfesi->current_date,
            'icon' => $this->historyPenunjangProfesi::ICON_X
        ]);
    }
}