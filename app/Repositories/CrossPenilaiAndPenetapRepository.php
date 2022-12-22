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

    public function getPenilaiAndPenetapByKabKota($kab_kota_id)
    {
        return $this->crossPenilaiAndPenetap
            ->with([
                'kabProvPenilaiAndPenetap.penilaiAngkaKreditDamkar.userPejabatStruktural',
                'kabProvPenilaiAndPenetap.penetapAngkaKreditDamkar.userPejabatStruktural',
                'kabProvPenilaiAndPenetap.penilaiAngkaKreditAnalis.userPejabatStruktural',
                'kabProvPenilaiAndPenetap.penetapAngkaKreditAnalis.userPejabatStruktural'
            ])
            ->where('tingkat_aparatur', 'kab_kota')
            ->where('kab_kota_id', $kab_kota_id)
            ->first();
    }

    public function getPenilaiAndPenetapByProvinsi($provinsi)
    {
        return $this->crossPenilaiAndPenetap
            ->with([
                'kabProvPenilaiAndPenetap.penilaiAngkaKreditDamkar.userPejabatStruktural',
                'kabProvPenilaiAndPenetap.penetapAngkaKreditDamkar.userPejabatStruktural',
                'kabProvPenilaiAndPenetap.penilaiAngkaKreditAnalis.userPejabatStruktural',
                'kabProvPenilaiAndPenetap.penetapAngkaKreditAnalis.userPejabatStruktural'
            ])
            ->where('tingkat_aparatur', 'provinsi')
            ->where('provinsi_id', $provinsi)
            ->first();
    }

    public function checkPenilaiByKabKota($kab_kota_id, $jenis_aparatur)
    {
        $penilai = false;
        $result = $this->crossPenilaiAndPenetap->query()
            ->whereHas('kabProvPenilaiAndPenetap', function (Builder $query) use (&$penilai) {
                $penilai = isset($query->penilai_ak_id);
            })
            ->where('kab_kota_id', $kab_kota_id)
            ->first();
        return isset($result) || $penilai;
    }

    public function checkPenetapByKabKota($kab_kota_id, $jenis_aparatur)
    {
        $penetap = false;
        $result = $this->crossPenilaiAndPenetap->query()
            ->whereHas('kabProvPenilaiAndPenetap', function (Builder $query) use (&$penetap) {
                $penetap = isset($query->penetap_ak_id);
            })
            ->where('kab_kota_id', $kab_kota_id)
            ->first();
        return isset($result) && $penetap;
    }

    public function checkPenilaiByProvinsi($provinsi_id, $jenis_aparatur)
    {
        $penilai = false;
        $result = $this->crossPenilaiAndPenetap->query()
            ->whereHas('kabProvPenilaiAndPenetap', function (Builder $query) use (&$penilai) {
                $penilai = isset($query->penilai_ak_id);
            })
            ->where('provinsi_id', $provinsi_id)
            ->first();
        return isset($result) || $penilai;
    }

    public function checkPenetapByProvinsi($provinsi_id, $jenis_aparatur)
    {
        $penetap = false;
        $result = $this->crossPenilaiAndPenetap->query()
            ->whereHas('kabProvPenilaiAndPenetap', function (Builder $query) use (&$penetap) {
                $penetap = isset($query->penetap_ak_id);
            })
            ->where('provinsi_id', $provinsi_id)
            ->first();
        return isset($result) && $penetap;
    }
}
