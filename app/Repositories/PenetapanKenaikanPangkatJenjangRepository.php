<?php

namespace App\Repositories;

use App\Models\PenetapanKenaikanPangkatJenjang;
use App\Models\Periode;
use App\Models\User;

class PenetapanKenaikanPangkatJenjangRepository
{
    public function storeNaikPangkatJenjang(User $user, Periode $periode)
    {
        return PenetapanKenaikanPangkatJenjang::query()->create([
            'fungsional_id' => $user->id,
            'periode_id' => $periode->id,
            'naik_jenjang' => true,
            'naik_pangkat' => true
        ]);
    }
}