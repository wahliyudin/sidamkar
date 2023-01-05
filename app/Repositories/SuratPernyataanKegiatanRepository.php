<?php

namespace App\Repositories;

use App\Models\Periode;
use App\Models\SuratPernyataanKegiatan;
use App\Models\User;

class SuratPernyataanKegiatanRepository
{
    protected SuratPernyataanKegiatan $suratPernyataanKegiatan;

    public function __construct(SuratPernyataanKegiatan $suratPernyataanKegiatan)
    {
        $this->suratPernyataanKegiatan = $suratPernyataanKegiatan;
    }

    public function getByFungsionalAndPeriode(User $user, $periode)
    {
        return $this->suratPernyataanKegiatan->query()
            ->where('fungsional_id', $user->id)
            ->where('periode_id', $periode?->id)
            ->first();
    }

    public function updateOrCreate($user_id, $periode_id, $link, $name)
    {
        $suratPernyataanKegiatan = $this->suratPernyataanKegiatan->query()
            ->where('fungsional_id', $user_id)
            ->where('periode_id', $periode_id)
            ->first();
        if ($suratPernyataanKegiatan instanceof SuratPernyataanKegiatan) {
            deleteImage($suratPernyataanKegiatan->link);
            return $suratPernyataanKegiatan->update([
                'fungsional_id' => $user_id,
                'periode_id' => $periode_id,
                'link' => $link,
                'name' => $name
            ]);
        } else {
            return $this->suratPernyataanKegiatan->query()->create([
                'fungsional_id' => $user_id,
                'periode_id' => $periode_id,
                'link' => $link,
                'name' => $name
            ]);
        }
    }
}
