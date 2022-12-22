<?php

namespace App\Services;

use App\Models\CrossPenilaiAndPenetap;
use App\Models\KabProvPenilaiAndPenetap;
use App\Repositories\CrossPenilaiAndPenetapRepository;
use App\Repositories\KabProvPenilaiAndPenetapRepository;
use App\Repositories\MenteRepository;
use App\Repositories\PeriodeRepository;
use App\Repositories\UserRepository;
use App\Traits\AuthTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\ValidationException;

class MenteService
{
    use AuthTrait;

    protected PeriodeRepository $periodeRepository;
    protected MenteRepository $menteRepository;
    protected UserRepository $userRepository;
    protected KabProvPenilaiAndPenetapRepository $kabProvPenilaiAndPenetapRepository;
    protected CrossPenilaiAndPenetapRepository $crossPenilaiAndPenetapRepository;

    public function __construct(PeriodeRepository $periodeRepository, MenteRepository $menteRepository, UserRepository $userRepository, KabProvPenilaiAndPenetapRepository $kabProvPenilaiAndPenetapRepository, CrossPenilaiAndPenetapRepository $crossPenilaiAndPenetapRepository)
    {
        $this->periodeRepository = $periodeRepository;
        $this->menteRepository = $menteRepository;
        $this->userRepository = $userRepository;
        $this->kabProvPenilaiAndPenetapRepository = $kabProvPenilaiAndPenetapRepository;
        $this->crossPenilaiAndPenetapRepository = $crossPenilaiAndPenetapRepository;
    }

    public function getPeriodeActive()
    {
        return $this->periodeRepository->isActive();
    }

    public function getFungsionalKabKota(): Collection
    {
        $mentes = $this->menteRepository->getFungsionalIds();
        return $this->userRepository->getFungsionalMenteByKabKota($mentes);
    }

    public function getAtasanLangsungKabKota(): Collection
    {
        $kab_kota_id = $this->authUser()->load('userProvKabKota')->userProvKabKota->kab_kota_id;
        return $this->userRepository->getAllAtasanLangsungByKabKota($kab_kota_id);
    }

    public function getFungsionalProvinsi(): Collection
    {
        $mentes = $this->menteRepository->getFungsionalIds();
        return $this->userRepository->getFungsionalMenteByProvinsi($mentes);
    }

    public function getAtasanLangsungProvinsi(): Collection
    {
        $provinsi_id = $this->authUser()->load('userProvKabKota')->userProvKabKota->provinsi_id;
        return $this->userRepository->getAllAtasanLangsungByProvinsi($provinsi_id);
    }

    public function getCurrentPenilaiByProvinsi($provinsi_id, $jenis_aparatur)
    {
        $kabProvPenilaiAndPenetap = KabProvPenilaiAndPenetap::query()
            ->with(['penilaiAngkaKredit.userPejabatStruktural'])
            ->where('provinsi_id', $provinsi_id)
            ->jenisAparaturIs($jenis_aparatur)
            ->first();
        if (!isset($kabProvPenilaiAndPenetap)) {
            $kabProvPenilaiAndPenetap = CrossPenilaiAndPenetap::query()
                ->with(['kabProvPenilaiAndPenetap.penilaiAngkaKredit.userPejabatStruktural'])
                ->where('provinsi_id', $provinsi_id)
                ->jenisAparaturIs($jenis_aparatur)
                ->first();
            $kabProvPenilaiAndPenetap = $kabProvPenilaiAndPenetap?->kabProvPenilaiAndPenetap;
        }
        return $kabProvPenilaiAndPenetap;
    }

    public function getCurrentPenetapByProvinsi($provinsi_id, $jenis_aparatur)
    {
        $kabProvPenilaiAndPenetap = KabProvPenilaiAndPenetap::query()
            ->with(['penetapAngkaKredit.userPejabatStruktural'])
            ->where('provinsi_id', $provinsi_id)
            ->first();
        if (!isset($kabProvPenilaiAndPenetap)) {
            $kabProvPenilaiAndPenetap = CrossPenilaiAndPenetap::query()
                ->with(['kabProvPenilaiAndPenetap.penetapAngkaKredit.userPejabatStruktural'])
                ->where('provinsi_id', $provinsi_id)
                ->first();
            $kabProvPenilaiAndPenetap = $kabProvPenilaiAndPenetap?->kabProvPenilaiAndPenetap;
        }
        return $kabProvPenilaiAndPenetap;
    }

    public function getCurrentPenilaiByKabKota($kab_kota_id, $jenis_aparatur)
    {
        $kabProvPenilaiAndPenetap = KabProvPenilaiAndPenetap::query()
            ->with(['penilaiAngkaKredit.userPejabatStruktural'])
            ->where('kab_kota_id', $kab_kota_id)
            ->first();
        if (!isset($kabProvPenilaiAndPenetap)) {
            $kabProvPenilaiAndPenetap = CrossPenilaiAndPenetap::query()
                ->with(['kabProvPenilaiAndPenetap.penilaiAngkaKredit.userPejabatStruktural'])
                ->where('kab_kota_id', $kab_kota_id)
                ->first();
            $kabProvPenilaiAndPenetap = $kabProvPenilaiAndPenetap?->kabProvPenilaiAndPenetap;
        }
        return $kabProvPenilaiAndPenetap;
    }

    public function getCurrentPenetapByKabKota($kab_kota_id, $jenis_aparatur)
    {
        $kabProvPenilaiAndPenetap = KabProvPenilaiAndPenetap::query()
            ->with(['penetapAngkaKredit.userPejabatStruktural'])
            ->where('kab_kota_id', $kab_kota_id)
            ->jenisAparaturIs($jenis_aparatur)
            ->first();
        if (!isset($kabProvPenilaiAndPenetap)) {
            $kabProvPenilaiAndPenetap = CrossPenilaiAndPenetap::query()
                ->with(['kabProvPenilaiAndPenetap.penetapAngkaKredit.userPejabatStruktural'])
                ->where('kab_kota_id', $kab_kota_id)
                ->jenisAparaturIs($jenis_aparatur)
                ->first();
            $kabProvPenilaiAndPenetap = $kabProvPenilaiAndPenetap?->kabProvPenilaiAndPenetap;
        }
        return $kabProvPenilaiAndPenetap;
    }

    public function getCurrentPenilaiAndPenetapByProvinsi($provinsi_id)
    {
        $kabProvPenilaiAndPenetap = $this->kabProvPenilaiAndPenetapRepository->getPenilaiAndPenetapByProvinsi($provinsi_id);
        if (!isset($kabProvPenilaiAndPenetap)) {
            $kabProvPenilaiAndPenetap = $this->crossPenilaiAndPenetapRepository->getPenilaiAndPenetapByProvinsi($provinsi_id);
            $kabProvPenilaiAndPenetap = $kabProvPenilaiAndPenetap?->kabProvPenilaiAndPenetap;
        }
        return $kabProvPenilaiAndPenetap;
    }

    public function getCurrentPenilaiAndPenetapByKabKota($kab_kota_id)
    {
        $kabProvPenilaiAndPenetap = $this->kabProvPenilaiAndPenetapRepository->getPenilaiAndPenetapByKabKota($kab_kota_id);
        if (!isset($kabProvPenilaiAndPenetap)) {
            $kabProvPenilaiAndPenetap = $this->crossPenilaiAndPenetapRepository->getPenilaiAndPenetapByKabKota($kab_kota_id);
            $kabProvPenilaiAndPenetap = $kabProvPenilaiAndPenetap?->kabProvPenilaiAndPenetap;
        }
        return $kabProvPenilaiAndPenetap;
    }

    public function storePenilaiAndPenetapKabKota($penilai_ak_id, $penetap_ak_id, $tingkat_aparatur, $kab_kota_id, $provinsi_id, $current_kab_kota_id, $current_provinsi_id)
    {
        if ($current_kab_kota_id == $kab_kota_id) {
            $kabProvPenilaiAndPenetap = KabProvPenilaiAndPenetap::query()
                ->updateOrCreate([
                    'kab_kota_id' => $current_kab_kota_id,
                    'tingkat_aparatur' => $tingkat_aparatur,
                ], [
                    'penilai_ak_id' => $penilai_ak_id,
                    'penetap_ak_id' => $penetap_ak_id,
                    'kab_kota_id' => $current_kab_kota_id,
                ]);
        } else {
            $kabProvPenilaiAndPenetap = KabProvPenilaiAndPenetap::query()
                ->where('kab_kota_id', $kab_kota_id)
                ->orWhere('provinsi_id', $provinsi_id)
                ->jenisAparaturIs($tingkat_aparatur)
                ->first();
            if (!$kabProvPenilaiAndPenetap) {
                throw ValidationException::withMessages(['message' => 'Penilai dan Penetap Tidak Ditemukan']);
            }
            CrossPenilaiAndPenetap::query()
                ->updateOrCreate([
                    'kab_kota_id' => $current_kab_kota_id,
                    'tingkat_aparatur' => $tingkat_aparatur,
                ], [
                    'kab_kota_id' => $current_kab_kota_id,
                    'kab_prov_penilai_and_penetap_id' => $kabProvPenilaiAndPenetap->id
                ]);
        }
        return $kabProvPenilaiAndPenetap;
    }

    public function storePenilaiAndPenetapProvinsi($penilai_ak_id, $penetap_ak_id, $tingkat_aparatur, $kab_kota_id, $provinsi_id, $current_kab_kota_id, $current_provinsi_id)
    {
        if ($current_provinsi_id == $provinsi_id) {
            $kabProvPenilaiAndPenetap = KabProvPenilaiAndPenetap::query()
                ->updateOrCreate([
                    'provinsi_id' => $current_provinsi_id,
                    'tingkat_aparatur' => $tingkat_aparatur,
                ], [
                    'penilai_ak_id' => $penilai_ak_id,
                    'penetap_ak_id' => $penetap_ak_id,
                    'provinsi_id' => $current_provinsi_id,
                ]);
        } else {
            $kabProvPenilaiAndPenetap = KabProvPenilaiAndPenetap::query()
                ->where('kab_kota_id', $kab_kota_id)
                ->orWhere('provinsi_id', $provinsi_id)
                ->jenisAparaturIs($tingkat_aparatur)
                ->first();
            if (!$kabProvPenilaiAndPenetap) {
                throw ValidationException::withMessages(['message' => 'Penilai dan Penetap Tidak Ditemukan']);
            }
            CrossPenilaiAndPenetap::query()
                ->updateOrCreate([
                    'provinsi_id' => $current_provinsi_id,
                    'tingkat_aparatur' => $tingkat_aparatur,
                ], [
                    'provinsi_id' => $current_provinsi_id,
                    'kab_prov_penilai_and_penetap_id' => $kabProvPenilaiAndPenetap->id
                ]);
        }
        return $kabProvPenilaiAndPenetap;
    }

    public function getKabKotaPenilaiAKDamkar($kab_kota_id)
    {
        $kabProvPenilaiAndPenetap = KabProvPenilaiAndPenetap::query()
            ->with(['penilaiAngkaKreditDamkar.userPejabatStruktural'])
            ->where('kab_kota_id', $kab_kota_id)
            ->where('tingkat_aparatur', 'kab_kota')
            ->first();
        if (!isset($kabProvPenilaiAndPenetap->penilaiAngkaKreditDamkar)) throw ValidationException::withMessages(['message' => 'Belum mempunyai tim penilai ak damkar']);
        return [
            'id' => $kabProvPenilaiAndPenetap->penilai_ak_damkar_id,
            'nama' => $kabProvPenilaiAndPenetap->penilaiAngkaKreditDamkar->userPejabatStruktural->nama
        ];
    }

    public function getKabKotaPenetapAKDamkar($kab_kota_id)
    {
        $kabProvPenilaiAndPenetap = KabProvPenilaiAndPenetap::query()
            ->with(['penetapAngkaKreditDamkar.userPejabatStruktural'])
            ->where('kab_kota_id', $kab_kota_id)
            ->where('tingkat_aparatur', 'kab_kota')
            ->first();
        if (!isset($kabProvPenilaiAndPenetap->penetapAngkaKreditDamkar)) throw ValidationException::withMessages(['message' => 'Belum mempunyai tim penetap ak damkar']);
        return [
            'id' => $kabProvPenilaiAndPenetap->penetap_ak_damkar_id,
            'nama' => $kabProvPenilaiAndPenetap->penetapAngkaKreditDamkar->userPejabatStruktural->nama
        ];
    }

    public function getKabKotaPenilaiAKAnalis($kab_kota_id)
    {
        $kabProvPenilaiAndPenetap = KabProvPenilaiAndPenetap::query()
            ->with(['penilaiAngkaKreditAnalis.userPejabatStruktural'])
            ->where('kab_kota_id', $kab_kota_id)
            ->where('tingkat_aparatur', 'kab_kota')
            ->first();
        if (!isset($kabProvPenilaiAndPenetap->penilaiAngkaKreditAnalis)) throw ValidationException::withMessages(['message' => 'Belum mempunyai tim penilai ak analis']);
        return [
            'id' => $kabProvPenilaiAndPenetap->penilai_ak_analis_id,
            'nama' => $kabProvPenilaiAndPenetap->penilaiAngkaKreditAnalis->userPejabatStruktural->nama
        ];
    }

    public function getKabKotaPenetapAKAnalis($kab_kota_id)
    {
        $kabProvPenilaiAndPenetap = KabProvPenilaiAndPenetap::query()
            ->with(['penetapAngkaKreditAnalis.userPejabatStruktural'])
            ->where('kab_kota_id', $kab_kota_id)
            ->where('tingkat_aparatur', 'kab_kota')
            ->first();
        if (!isset($kabProvPenilaiAndPenetap->penetapAngkaKreditAnalis)) throw ValidationException::withMessages(['message' => 'Belum mempunyai tim penetap ak analis']);
        return [
            'id' => $kabProvPenilaiAndPenetap->penetap_ak_analis_id,
            'nama' => $kabProvPenilaiAndPenetap->penetapAngkaKreditAnalis->userPejabatStruktural->nama
        ];
    }

    public function getProvinsiPenilaiAKDamkar($provinsi_id)
    {
        $kabProvPenilaiAndPenetap = KabProvPenilaiAndPenetap::query()
            ->with(['penilaiAngkaKreditDamkar.userPejabatStruktural'])
            ->where('provinsi_id', $provinsi_id)
            ->where('tingkat_aparatur', 'provinsi')
            ->first();
        if (!isset($kabProvPenilaiAndPenetap->penilaiAngkaKreditDamkar)) throw ValidationException::withMessages(['message' => 'Belum mempunyai tim penilai ak damkar']);
        return [
            'id' => $kabProvPenilaiAndPenetap->penilai_ak_damkar_id,
            'nama' => $kabProvPenilaiAndPenetap->penilaiAngkaKreditDamkar->userPejabatStruktural->nama
        ];
    }

    public function getProvinsiPenetapAKDamkar($provinsi_id)
    {
        $kabProvPenilaiAndPenetap = KabProvPenilaiAndPenetap::query()
            ->with(['penetapAngkaKreditDamkar.userPejabatStruktural'])
            ->where('provinsi_id', $provinsi_id)
            ->where('tingkat_aparatur', 'provinsi')
            ->first();
        if (!isset($kabProvPenilaiAndPenetap->penetapAngkaKreditDamkar)) throw ValidationException::withMessages(['message' => 'Belum mempunyai tim penetap ak damkar']);
        return [
            'id' => $kabProvPenilaiAndPenetap->penetap_ak_damkar_id,
            'nama' => $kabProvPenilaiAndPenetap->penetapAngkaKreditDamkar->userPejabatStruktural->nama
        ];
    }

    public function getProvinsiPenilaiAKAnalis($provinsi_id)
    {
        $kabProvPenilaiAndPenetap = KabProvPenilaiAndPenetap::query()
            ->with(['penilaiAngkaKreditAnalis.userPejabatStruktural'])
            ->where('provinsi_id', $provinsi_id)
            ->where('tingkat_aparatur', 'provinsi')
            ->first();
        if (!isset($kabProvPenilaiAndPenetap->penilaiAngkaKreditAnalis)) throw ValidationException::withMessages(['message' => 'Belum mempunyai tim penilai ak analis']);
        return [
            'id' => $kabProvPenilaiAndPenetap->penilai_ak_analis_id,
            'nama' => $kabProvPenilaiAndPenetap->penilaiAngkaKreditAnalis->userPejabatStruktural->nama
        ];
    }

    public function getProvinsiPenetapAKAnalis($provinsi_id)
    {
        $kabProvPenilaiAndPenetap = KabProvPenilaiAndPenetap::query()
            ->with(['penetapAngkaKreditAnalis.userPejabatStruktural'])
            ->where('provinsi_id', $provinsi_id)
            ->where('tingkat_aparatur', 'provinsi')
            ->first();
        if (!isset($kabProvPenilaiAndPenetap->penetapAngkaKreditAnalis)) throw ValidationException::withMessages(['message' => 'Belum mempunyai tim penetap ak analis']);
        return [
            'id' => $kabProvPenilaiAndPenetap->penetap_ak_analis_id,
            'nama' => $kabProvPenilaiAndPenetap->penetapAngkaKreditAnalis->userPejabatStruktural->nama
        ];
    }
}
