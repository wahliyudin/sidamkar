<?php

namespace App\Services\KabKota;

use App\Models\Periode;
use App\Repositories\MenteRepository;
use App\Repositories\PeriodeRepository;
use App\Repositories\UserRepository;
use App\Traits\AuthTrait;
use Illuminate\Database\Eloquent\Collection;

class MenteService
{
    use AuthTrait;

    private PeriodeRepository $periodeRepository;
    private MenteRepository $menteRepository;
    private UserRepository $userRepository;

    public function __construct(PeriodeRepository $periodeRepository, MenteRepository $menteRepository, UserRepository $userRepository)
    {
        $this->periodeRepository = $periodeRepository;
        $this->menteRepository = $menteRepository;
        $this->userRepository = $userRepository;
    }

    public function getPeriodeActive(): Periode
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
}
