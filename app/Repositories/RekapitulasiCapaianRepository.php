<?php

namespace App\Repositories;

use App\Models\Periode;
use App\Models\RekapitulasiCapaian;
use App\Models\User;

class RekapitulasiCapaianRepository
{
    protected RekapitulasiCapaian $rekapitulasiCapaian;

    public function __construct(RekapitulasiCapaian $rekapitulasiCapaian)
    {
        $this->rekapitulasiCapaian = $rekapitulasiCapaian;
    }

    public function getByFungsionalAndPeriode(User $user, $periode)
    {
        return $this->rekapitulasiCapaian->query()
            ->where('fungsional_id', $user->id)
            ->where('periode_id', $periode?->id)
            ->first();
    }

    public function updateOrCreate($user_id, $periode_id, $total_capaian, $link, $name)
    {
        $rekapitulasiCapaian = $this->rekapitulasiCapaian->query()
            ->where('fungsional_id', $user_id)
            ->where('periode_id', $periode_id)
            ->first();
        if ($rekapitulasiCapaian instanceof RekapitulasiCapaian) {
            deleteImage($rekapitulasiCapaian->link);
            $rekapitulasiCapaian->update([
                'fungsional_id' => $user_id,
                'periode_id' => $periode_id,
                'total_capaian' => $total_capaian,
                'link' => $link,
                'name' => $name
            ]);
        } else {
            $this->rekapitulasiCapaian->query()->create([
                'fungsional_id' => $user_id,
                'periode_id' => $periode_id,
                'total_capaian' => $total_capaian,
                'link' => $link,
                'name' => $name
            ]);
        }
    }
}
