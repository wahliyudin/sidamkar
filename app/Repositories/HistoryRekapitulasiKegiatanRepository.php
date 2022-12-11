<?php

namespace App\Repositories;

use App\Models\HistoryRekapitulasiKegiatan;

class HistoryRekapitulasiKegiatanRepository
{
    private HistoryRekapitulasiKegiatan $historyRekapitulasiKegiatan;

    public function __construct(HistoryRekapitulasiKegiatan $historyRekapitulasiKegiatan)
    {
        $this->historyRekapitulasiKegiatan = $historyRekapitulasiKegiatan;
    }

    public function store($content)
    {
        return $this->historyRekapitulasiKegiatan->create(['content' => $content]);
    }
}