<?php

namespace App\Services\KabKota;

use App\Models\KabKota;
use App\Models\KabProvPenilaiAndPenetap;
use App\Models\PenilaiAndPenetapAngkaKredit;
use App\Models\Periode;
use App\Models\Provinsi;
use App\Models\User;
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

    public function __construct(PeriodeRepository $periodeRepository, MenteRepository $menteRepository, UserRepository $userRepository)
    {
        $this->periodeRepository = $periodeRepository;
        $this->menteRepository = $menteRepository;
        $this->userRepository = $userRepository;
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

    public function getAllPenilaiAndPenetapByProvinsi($provinsi_id)
    {
        return KabProvPenilaiAndPenetap::query()
            ->with(['penilaiAngkaKredit.userPejabatStruktural', 'penetapAngkaKredit.userPejabatStruktural'])
            ->where('tingkat', 'provinsi')
            ->where('provinsi_id', $provinsi_id)
            ->get();
    }

    public function getAllPenilaiAndPenetapByKabKota($kab_kota_id)
    {
        return KabProvPenilaiAndPenetap::query()
            ->with(['penilaiAngkaKredit.userPejabatStruktural', 'penetapAngkaKredit.userPejabatStruktural'])
            ->where('tingkat', 'kab_kota')
            ->where('kab_kota_id', $kab_kota_id)
            ->get();
    }

    public function getCurrentPenilaiAndPenetapByProvinsi($provinsi_id)
    {
        return KabProvPenilaiAndPenetap::query()
            ->with(['penilaiAngkaKredit.userPejabatStruktural', 'penetapAngkaKredit.userPejabatStruktural'])
            ->where('tingkat', 'provinsi')
            ->whereNot('is_cross')
            ->where('provinsi_id', $provinsi_id)
            ->first();
    }

    public function getCurrentPenilaiAndPenetapByKabKota($kab_kota_id)
    {
        return KabProvPenilaiAndPenetap::query()
            ->with(['penilaiAngkaKredit.userPejabatStruktural', 'penetapAngkaKredit.userPejabatStruktural'])
            ->where('tingkat', 'kab_kota')
            ->whereNot('is_cross')
            ->where('kab_kota_id', $kab_kota_id)
            ->first();
    }

    public function storePenilaiAndPenetapKabKota($penilai_ak_id, $penetap_ak_id, $kab_kota_id, $current_kab_kota_id)
    {
        $kabKota = KabKota::query()->find($current_kab_kota_id)->first();
        if (!$kabKota) {
            throw ValidationException::withMessages(['message' => 'Kabupaten Kota tidak ditemukan']);
        }
        $is_cross = true;
        if ($current_kab_kota_id == $kab_kota_id) $is_cross = false;
        return $kabKota->kabProvPenilaiAndPenetaps()->updateOrCreate([
            'is_cross' => $is_cross,
            'kab_kota_id' => $kabKota->id,
        ],[
            'penilai_ak_id' => $penilai_ak_id,
            'penetap_ak_id' => $penetap_ak_id,
            'tingkat' => 'kab_kota',
            'is_cross' => $is_cross,
        ]);
    }

    public function storePenilaiAndPenetapProvinsi($penilai_ak_id, $penetap_ak_id, $provinsi_id, $current_provinsi_id)
    {
        $provinsi = Provinsi::query()->find($current_provinsi_id)->first();
        if (!$provinsi) {
            throw ValidationException::withMessages(['message' => 'Provinsi tidak ditemukan']);
        }
        $is_cross = true;
        if ($current_provinsi_id == $provinsi_id) $is_cross = false;
        return $provinsi->kabProvPenilaiAndPenetaps()->updateOrCreate([
            'is_cross' => $is_cross,
            'provinsi_id' => $provinsi->id,
        ],[
            'penilai_ak_id' => $penilai_ak_id,
            'penetap_ak_id' => $penetap_ak_id,
            'tingkat' => 'provinsi',
            'is_cross' => $is_cross,
        ]);
    }
}