<?php

namespace App\Repositories;

use App\Models\Periode;

class PeriodeRepository
{
    private Periode $periode;

    public function __construct()
    {
        $this->periode = new Periode();
    }

    public function isActive(): Periode
    {
        $cek_periode = $this->periode->query()->where('is_active', true)->first();
        if ($cek_periode) {
            return $cek_periode;
        } else {
            return null;
        }
    }
}
