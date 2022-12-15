<?php

namespace App\Traits;

use App\Models\ButirKegiatan;
use App\Models\SubButirKegiatan;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

trait KodeLaporanKegiatanTrait
{
    public function generateKodeButir(ButirKegiatan $butirKegiatan, Model $model)
    {
        $thnBulanTgl = substr(now()->year, -2) . now()->month . now()->day;
        if ($model::query()->count() === 0) return 'B' . $butirKegiatan->id . $thnBulanTgl . '0001';
        return 'B' . $butirKegiatan->id . $thnBulanTgl . $this->number($model::query()->get()->last()->kode);
    }

    public function generateKodeSubButir(SubButirKegiatan $subButirKegiatan, Model $model)
    {
        $thnBulanTgl = substr(now()->year, -2) . now()->month . now()->day;
        if ($model::query()->count() === 0) return 'B' . $subButirKegiatan->id . $thnBulanTgl . '0001';
        return 'B' . $subButirKegiatan->id . $thnBulanTgl . $this->number($model::query()->get()->last()->kode);
    }

    public function number(string $kode): string
    {
        $num = (int) substr($kode, -4) + 1;
        if ($num < 10) return '000' . $num;
        if ($num < 100) return '00' . $num;
        if ($num < 1000) return '0' . $num;
        return (string) $num;
    }
}