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

    public function isActive()
    {
        return $this->periode->query()->where('is_active', true)->first();
    }
}