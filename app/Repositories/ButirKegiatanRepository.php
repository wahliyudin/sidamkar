<?php

namespace App\Repositories;

use App\Models\ButirKegiatan;

class ButirKegiatanRepository
{
    private ButirKegiatan $butirKegiatan;

    public function __construct(ButirKegiatan $butirKegiatan)
    {
        $this->butirKegiatan = $butirKegiatan;
    }

    public function getById($id): ButirKegiatan
    {
        return $this->butirKegiatan->query()->findOrFail($id);
    }
}
