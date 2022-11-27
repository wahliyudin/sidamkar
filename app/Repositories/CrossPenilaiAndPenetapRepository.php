<?php

namespace App\Repositories;

use App\Models\CrossPenilaiAndPenetap;
use Illuminate\Database\Eloquent\Builder;

class CrossPenilaiAndPenetapRepository
{
    protected CrossPenilaiAndPenetap $crossPenilaiAndPenetap;

    public function __construct(CrossPenilaiAndPenetap $crossPenilaiAndPenetap)
    {
        $this->crossPenilaiAndPenetap = $crossPenilaiAndPenetap;
    }

    public function checkPenilaiByKabKota($kab_kota_id, $jenis_aparatur)
    {
        $penilai = false;
        $result = $this->crossPenilaiAndPenetap->query()
            ->whereHas('kabProvPenilaiAndPenetap', function(Builder $query) use (&$penilai) {
                $penilai = isset($query->penilai_ak_id);
            })
            ->where('kab_kota_id', $kab_kota_id)
            ->jenisAparaturIs($jenis_aparatur)
            ->first();
        return isset($result) || $penilai;
    }

    public function checkPenetapByKabKota($kab_kota_id, $jenis_aparatur)
    {
        $penetap = false;
        $result = $this->crossPenilaiAndPenetap->query()
            ->whereHas('kabProvPenilaiAndPenetap', function(Builder $query) use (&$penetap) {
                $penetap = isset($query->penetap_ak_id);
            })
            ->where('kab_kota_id', $kab_kota_id)
            ->jenisAparaturIs($jenis_aparatur)
            ->first();
        return isset($result) && $penetap;
    }
}