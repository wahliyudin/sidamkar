<?php

namespace App\Repositories;

use App\Models\KetentuanNilai;

class KetentuanNilaiRepository
{
    protected KetentuanNilai $ketentuanNilai;

    public function __construct(KetentuanNilai $ketentuanNilai)
    {
        $this->ketentuanNilai = $ketentuanNilai;
    }

    public function getByRolePangkat($role_id, $pangkat_id)
    {
        return $this->ketentuanNilai->query()
            ->where('role_id', $role_id)
            ->where('pangkat_golongan_tmt_id', $pangkat_id)
            ->first();
    }
}