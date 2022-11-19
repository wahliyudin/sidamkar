<?php

namespace App\Repositories\Aparatur\LaporanKegiatan;

use App\Models\ButirKegiatan;
use App\Models\LaporanKegiatanJabatan;
use App\Models\User;

class KegiatanJabatanRepository
{
    private function laporanKegiatanJabatanByUser(ButirKegiatan $butirKegiatan, User $user)
    {
        return LaporanKegiatanJabatan::query()
            ->with(['rencana'])
            ->whereHas('rencana', function ($query) use ($user) {
                $query->where('user_id', $user->id)->with(['user.roles', 'user.userAparatur']);
            })
            ->where('butir_kegiatan_id', $butirKegiatan->id)
            ->get();
    }

    public function laporanKegiatanJabatanStatusValidasi(ButirKegiatan $butirKegiatan, User $user)
    {
        return $this->laporanKegiatanJabatanByUser($butirKegiatan, $user)->where('status', LaporanKegiatanJabatan::VALIDASI);
    }

    public function laporanKegiatanJabatanStatusRevisi(ButirKegiatan $butirKegiatan, User $user)
    {
        return $this->laporanKegiatanJabatanByUser($butirKegiatan, $user)->where('status', LaporanKegiatanJabatan::REVISI);
    }

    public function laporanKegiatanJabatanStatusSelesai(ButirKegiatan $butirKegiatan, User $user)
    {
        return $this->laporanKegiatanJabatanByUser($butirKegiatan, $user)->where('status', LaporanKegiatanJabatan::SELESAI);
    }

    public function laporanKegiatanJabatanStatusTolak(ButirKegiatan $butirKegiatan, User $user)
    {
        return $this->laporanKegiatanJabatanByUser($butirKegiatan, $user)->where('status', LaporanKegiatanJabatan::TOLAK);
    }
}
