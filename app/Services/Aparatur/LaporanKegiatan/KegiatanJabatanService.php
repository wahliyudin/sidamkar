<?php

namespace App\Services\Aparatur\LaporanKegiatan;

use App\Enums\LaporanKegiatanStatus;
use App\Models\ButirKegiatan;
use App\Models\LaporanKegiatanJabatan;
use App\Models\Periode;
use App\Models\Role;
use App\Models\Unsur;
use App\Models\User;
use App\Repositories\Aparatur\LaporanKegiatan\KegiatanJabatanRepository;

class KegiatanJabatanService
{
    private KegiatanJabatanRepository $kegiatanJabatanRepository;

    public function __construct(KegiatanJabatanRepository $kegiatanJabatanRepository)
    {
        $this->kegiatanJabatanRepository = $kegiatanJabatanRepository;
    }

    public function loadUnsurs(Periode $periode, string $search, Role $role)
    {
        $unsurs = Unsur::query()
            ->where('jenis_kegiatan_id', 1)
            ->where('periode_id', $periode->id)
            ->with(['role' => function ($query) use ($role) {
                $query->whereIn('id', [$role->id + 1, $role->id - 1, $role->id]);
            }, 'subUnsurs.butirKegiatans'])
            ->whereHas('role', function ($query) use ($search, $role) {
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

    public function laporanKegiatanJabatanByUser(ButirKegiatan $butirKegiatan, User $user)
    {
        return [
            $this->kegiatanJabatanRepository->laporanKegiatanJabatanStatusValidasi($butirKegiatan, $user),
            $this->kegiatanJabatanRepository->laporanKegiatanJabatanStatusRevisi($butirKegiatan, $user),
            $this->kegiatanJabatanRepository->laporanKegiatanJabatanStatusSelesai($butirKegiatan, $user),
            $this->kegiatanJabatanRepository->laporanKegiatanJabatanStatusTolak($butirKegiatan, $user),
        ];
    }
}
