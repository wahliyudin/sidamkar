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

    public function getPenilaiAndPenetapByKabKota($kab_kota_id)
    {
        return $this->kabProvPenilaiAndPenetap->with([
            'penilaiAngkaKreditDamkar.userPejabatStruktural',
            'penetapAngkaKreditDamkar.userPejabatStruktural',
            'penilaiAngkaKreditAnalis.userPejabatStruktural',
            'penetapAngkaKreditAnalis.userPejabatStruktural'
        ])
            ->where('kab_kota_id', $kab_kota_id)
            ->where('tingkat_aparatur', 'kab_kota')
            ->first();
    }

    public function getPenilaiAndPenetapByProvinsi($provinsi)
    {
        return $this->kabProvPenilaiAndPenetap->with([
            'penilaiAngkaKreditDamkar.userPejabatStruktural',
            'penetapAngkaKreditDamkar.userPejabatStruktural',
            'penilaiAngkaKreditAnalis.userPejabatStruktural',
            'penetapAngkaKreditAnalis.userPejabatStruktural'
        ])
            ->where('provinsi_id', $provinsi)
            ->where('tingkat_aparatur', 'provinsi')
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

    public function provinsiJenisAparatur($provinsi_id, $jenis_aparatur)
    {
        return $this->kabProvPenilaiAndPenetap->query()
            ->where('provinsi_id', $provinsi_id)
            ->jenisAparaturIs($jenis_aparatur)
            ->first();
    }

    public function checkPenilaiAngkaKreditByProvinsi($provinsi_id, $jenis_aparatur)
    {
        $isExist = isset($this->provinsiJenisAparatur($provinsi_id, $jenis_aparatur)?->penilai_ak_id);
        if (!$isExist) {
            $isExist = $this->crossPenilaiAndPenetapRepository->checkPenilaiByProvinsi($provinsi_id, $jenis_aparatur);
        }
        return $isExist;
    }

    public function checkPenetapAngkaKreditByProvinsi($provinsi_id, $jenis_aparatur)
    {
        $isExist = isset($this->provinsiJenisAparatur($provinsi_id, $jenis_aparatur)?->penetap_ak_id);
        if (!$isExist) {
            $isExist = $this->crossPenilaiAndPenetapRepository->checkPenetapByProvinsi($provinsi_id, $jenis_aparatur);
        }
        return $isExist;
    }
}