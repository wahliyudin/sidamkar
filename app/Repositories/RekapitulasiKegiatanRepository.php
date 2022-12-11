<?php

namespace App\Repositories;

use App\Models\Periode;
use App\Models\RekapitulasiKegiatan;
use App\Models\User;

/**
 * @method static \App\Repositories\RekapitulasiKegiatanRepository getRekapByFungsionalAndPeriode(User $user, Periode $periode)
 * @method static \App\Repositories\RekapitulasiKegiatanRepository store($user_id, $periode_id, $url_rekap, $name_rekap, $url_capaian, $name_capaian)
 * @method static \App\Repositories\RekapitulasiKegiatanRepository update(RekapitulasiKegiatan $rekapitulasiKegiatan, $user_id, $periode_id, $url_rekap, $name_rekap, $url_capaian, $name_capaian)
 */
class RekapitulasiKegiatanRepository
{
    private RekapitulasiKegiatan $rekapitulasiKegiatan;

    public function __construct(RekapitulasiKegiatan $rekapitulasiKegiatan)
    {
        $this->rekapitulasiKegiatan = $rekapitulasiKegiatan;
    }

    public function getRekapByFungsionalAndPeriode(User $user, Periode $periode)
    {
        return $this->rekapitulasiKegiatan->query()
            ->where('fungsional_id', $user->id)
            ->where('periode_id', $periode->id)->first();
    }

    public function store($user_id, $periode_id, $url_rekap, $name_rekap, $url_capaian, $name_capaian)
    {
        return $this->rekapitulasiKegiatan->query()->create([
            'fungsional_id' => $user_id,
            'periode_id' => $periode_id,
            'url_rekap' => $url_rekap,
            'name_rekap' => $name_rekap,
            'url_capaian' => $url_capaian,
            'name_capaian' => $name_capaian
        ]);
    }

    public function update(RekapitulasiKegiatan $rekapitulasiKegiatan, $user_id, $periode_id, $url_rekap, $name_rekap, $url_capaian, $name_capaian)
    {
        return $rekapitulasiKegiatan->update([
            'fungsional_id' => $user_id,
            'periode_id' => $periode_id,
            'url_rekap' => $url_rekap,
            'name_rekap' => $name_rekap,
            'url_capaian' => $url_capaian,
            'name_capaian' => $name_capaian
        ]);
    }
}
