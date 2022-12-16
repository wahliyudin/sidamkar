<?php

namespace App\Repositories;

use App\Models\SubButirKegiatan;

class SubButirKegiatanRepository
{
    private SubButirKegiatan $subButirKegiatan;

    public function __construct(SubButirKegiatan $subButirKegiatan)
    {
        $this->subButirKegiatan = $subButirKegiatan;
    }

    public function getById($id): SubButirKegiatan
    {
        return $this->subButirKegiatan->query()->findOrFail($id);
    }
}