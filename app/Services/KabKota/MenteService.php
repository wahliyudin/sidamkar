<?php

namespace App\Services\KabKota;

use App\Models\CrossPenilaiAndPenetap;
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

    public function getCurrentPenilaiAndPenetapByProvinsi($provinsi_id)
    {
        $kabProvPenilaiAndPenetap = KabProvPenilaiAndPenetap::query()
            ->with(['penilaiAngkaKredit.userPejabatStruktural', 'penetapAngkaKredit.userPejabatStruktural'])
            ->where('provinsi_id', $provinsi_id)
            ->first();
        if (!$kabProvPenilaiAndPenetap) {
            $kabProvPenilaiAndPenetap = CrossPenilaiAndPenetap::query()
                ->with(['kabProvPenilaiAndPenetap.penilaiAngkaKredit.userPejabatStruktural', 'kabProvPenilaiAndPenetap.penetapAngkaKredit.userPejabatStruktural'])
                ->where('provinsi_id', $provinsi_id)
                ->first()?->kabProvPenilaiAndPenetap;
        }
        return $kabProvPenilaiAndPenetap;
    }

    public function getCurrentPenilaiAndPenetapByKabKota($kab_kota_id)
    {
        $kabProvPenilaiAndPenetap = KabProvPenilaiAndPenetap::query()
            ->with(['penilaiAngkaKredit.userPejabatStruktural', 'penetapAngkaKredit.userPejabatStruktural'])
            ->where('kab_kota_id', $kab_kota_id)
            ->first();
        if (!$kabProvPenilaiAndPenetap) {
            $kabProvPenilaiAndPenetap = CrossPenilaiAndPenetap::query()
                ->with(['kabProvPenilaiAndPenetap.penilaiAngkaKredit.userPejabatStruktural', 'kabProvPenilaiAndPenetap.penetapAngkaKredit.userPejabatStruktural'])
                ->where('kab_kota_id', $kab_kota_id)
                ->first()?->kabProvPenilaiAndPenetap;
        }
        return $kabProvPenilaiAndPenetap;
    }

    public function storePenilaiAndPenetapKabKota($penilai_ak_id, $penetap_ak_id, $kab_kota_id, $provinsi_id, $current_provinsi_id, $current_kab_kota_id)
    {
        if ($current_kab_kota_id == $kab_kota_id) {
            $kabProvPenilaiAndPenetap = KabProvPenilaiAndPenetap::query()->updateOrCreate([
                'kab_kota_id' => $current_kab_kota_id,
            ], [
                'penilai_ak_id' => $penilai_ak_id,
                'penetap_ak_id' => $penetap_ak_id,
                'kab_kota_id' => $current_kab_kota_id,
            ]);
        } else {
            $kabProvPenilaiAndPenetap = KabProvPenilaiAndPenetap::query()
                ->where('kab_kota_id', $kab_kota_id)
                ->orWhere('provinsi_id', $provinsi_id)
                ->first();
            CrossPenilaiAndPenetap::query()->where('kab_kota_id', $current_kab_kota_id)->first()->update([
                'kab_kota_id' => $current_kab_kota_id,
                'kab_prov_penilai_and_penetap_id' => $kabProvPenilaiAndPenetap->id
            ]);
        }
        return $kabProvPenilaiAndPenetap;
    }

    public function storePenilaiAndPenetapProvinsi($penilai_ak_id, $penetap_ak_id, $provinsi_id, $current_provinsi_id)
    {
        if ($current_provinsi_id == $provinsi_id) {
            $kabProvPenilaiAndPenetap = KabProvPenilaiAndPenetap::query()->updateOrCreate([
                'provinsi_id' => $current_provinsi_id,
            ], [
                'penilai_ak_id' => $penilai_ak_id,
                'penetap_ak_id' => $penetap_ak_id,
                'provinsi_id' => $current_provinsi_id,
            ]);
            CrossPenilaiAndPenetap::query()
                ->where('provinsi_id', $current_provinsi_id)
                ->first()?->delete();
        } else {
            $kabProvPenilaiAndPenetap = KabProvPenilaiAndPenetap::query()
                ->where('provinsi_id', $provinsi_id)
                ->first()->crossPenilaiAndPenetaps()->updateOrCreate([
                    'provinsi_id' => $current_provinsi_id
                ], [
                    'provinsi_id' => $current_provinsi_id
                ]);
            KabProvPenilaiAndPenetap::query()
                ->where('provinsi_id', $current_provinsi_id)
                ->first()?->delete();
        }
        return $kabProvPenilaiAndPenetap;
    }
}