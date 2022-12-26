<?php

namespace App\Repositories;

use App\Models\ButirKegiatan;
use App\Models\LaporanKegiatanJabatan;
use App\Models\Periode;
use App\Models\User;

class KegiatanJabatanRepository
{
    private LaporanKegiatanJabatan $laporanKegiatanJabatan;

    public function __construct(LaporanKegiatanJabatan $laporanKegiatanJabatan)
    {
        $this->laporanKegiatanJabatan = $laporanKegiatanJabatan;
    }

    private function laporanKegiatanJabatanByUser(ButirKegiatan $butirKegiatan, User $user, Periode $periode)
    {
        return $this->laporanKegiatanJabatan->query()
            ->with(['rencana', 'dokumenKegiatanJabatans', 'butirKegiatan.subUnsur.unsur', 'historyKegiatanJabatans.historyDokumenKegiatanJabatans'])
            ->whereHas('rencana', function ($query) use ($user) {
                $query->where('user_id', $user->id)->with(['user.roles', 'user.userAparatur']);
            })
            ->where('butir_kegiatan_id', $butirKegiatan->id)
            ->where('periode_id', $periode->id)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function laporanKegiatanJabatanCount(ButirKegiatan $butirKegiatan, User $user, Periode $periode): int
    {
        return $this->laporanKegiatanJabatanByUser($butirKegiatan, $user, $periode)->count();
    }

    public function laporanKegiatanJabatanStatusValidasi(ButirKegiatan $butirKegiatan, User $user, Periode $periode)
    {
        return $this->laporanKegiatanJabatanByUser($butirKegiatan, $user, $periode)->where('status', LaporanKegiatanJabatan::VALIDASI);
    }

    public function laporanKegiatanJabatanStatusRevisi(ButirKegiatan $butirKegiatan, User $user, Periode $periode)
    {
        return $this->laporanKegiatanJabatanByUser($butirKegiatan, $user, $periode)->where('status', LaporanKegiatanJabatan::REVISI);
    }

    public function laporanKegiatanJabatanStatusSelesai(ButirKegiatan $butirKegiatan, User $user, Periode $periode)
    {
        return $this->laporanKegiatanJabatanByUser($butirKegiatan, $user, $periode)->where('status', LaporanKegiatanJabatan::SELESAI);
    }

    public function laporanKegiatanJabatanStatusTolak(ButirKegiatan $butirKegiatan, User $user, Periode $periode)
    {
        return $this->laporanKegiatanJabatanByUser($butirKegiatan, $user, $periode)->where('status', LaporanKegiatanJabatan::TOLAK);
    }

    public function laporanLast(ButirKegiatan $butirKegiatan, User $user, Periode $periode)
    {
        return $this->laporanKegiatanJabatanByUser($butirKegiatan, $user, $periode)->first();
    }
}