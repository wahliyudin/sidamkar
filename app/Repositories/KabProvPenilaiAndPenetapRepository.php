<?php

namespace App\Repositories;

use App\Models\KabProvPenilaiAndPenetap;

class KabProvPenilaiAndPenetapRepository
{
    protected KabProvPenilaiAndPenetap $kabProvPenilaiAndPenetap;
    protected CrossPenilaiAndPenetapRepository $crossPenilaiAndPenetapRepository;

    public function __construct(KabProvPenilaiAndPenetap $kabProvPenilaiAndPenetap, CrossPenilaiAndPenetapRepository $crossPenilaiAndPenetapRepository)
    {
        $this->kabProvPenilaiAndPenetap = $kabProvPenilaiAndPenetap;
        $this->crossPenilaiAndPenetapRepository = $crossPenilaiAndPenetapRepository;
    }

    public function kabKotaJenisAparatur($kab_kota_id, $jenis_aparatur)
    {
        return $this->kabProvPenilaiAndPenetap->query()
            ->where('kab_kota_id', $kab_kota_id)
            ->jenisAparaturIs($jenis_aparatur)
            ->first();
    }

    public function checkPenilaiAngkaKreditByKabKota($kab_kota_id, $jenis_aparatur)
    {
        $isExist = isset($this->kabKotaJenisAparatur($kab_kota_id, $jenis_aparatur)?->penilai_ak_id);
        if (!$isExist) {
            $isExist = $this->crossPenilaiAndPenetapRepository->checkPenilaiByKabKota($kab_kota_id, $jenis_aparatur);
        }
        return $isExist;
    }

    public function checkPenetapAngkaKreditByKabKota($kab_kota_id, $jenis_aparatur)
    {
        $isExist = isset($this->kabKotaJenisAparatur($kab_kota_id, $jenis_aparatur)?->penetap_ak_id);
        if (!$isExist) {
            $isExist = $this->crossPenilaiAndPenetapRepository->checkPenetapByKabKota($kab_kota_id, $jenis_aparatur);
        }
        return $isExist;
    }
}