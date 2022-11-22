<?php

namespace App\Repositories;

use App\Models\User;
use App\Traits\AuthTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class UserRepository
{
    use AuthTrait;

    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUserById($id): User
    {
        return $this->user->query()->with('roles')->findOrFail($id);
    }

    public function getFungsionalMenteByKabKota(array $mentes): Collection
    {
        return $this->user->query()
            ->withWhereHas('userAparatur', function ($query) {
                $query->where('kab_kota_id', $this->authUser()->load('userProvKabKota')->userProvKabKota->kab_kota_id)
                    ->where('tingkat_aparatur', 'kab_kota');
            })
            ->where('status_akun', 1)
            ->whereNotIn('id', $mentes)
            ->whereRoleIs(getAllRoleFungsional())
            ->latest()
            ->get();
    }

    public function getAllAtasanLangsungByKabKota($kab_kota_id): Collection
    {
        return User::query()
            ->withWhereHas('userPejabatStruktural', function ($query) use ($kab_kota_id) {
                $query->where('tingkat_aparatur', 'kab_kota')
                    ->where('kab_kota_id', $kab_kota_id);
            })
            ->where('status_akun', $this->user::STATUS_ACTIVE)
            ->whereRoleIs('atasan_langsung')
            ->get();
    }

    public function getFungsionalMenteByProvinsi(array $mentes): Collection
    {
        return $this->user->query()
            ->withWhereHas('userAparatur', function ($query) {
                $query->where('provinsi_id', $this->authUser()->load('userProvKabKota')->userProvKabKota->provinsi_id)
                    ->where('tingkat_aparatur', 'provinsi');
            })
            ->where('status_akun', 1)
            ->whereNotIn('id', $mentes)
            ->whereRoleIs(getAllRoleFungsional())
            ->latest()
            ->get();
    }

    public function getAllAtasanLangsungByProvinsi($provinsi_id): Collection
    {
        return User::query()
            ->withWhereHas('userPejabatStruktural', function ($query) use ($provinsi_id) {
                $query->where('tingkat_aparatur', 'provinsi')
                    ->where('provinsi_id', $provinsi_id);
            })
            ->where('status_akun', $this->user::STATUS_ACTIVE)
            ->whereRoleIs('atasan_langsung')
            ->get();
    }

    private function scopeStrukturalByProvinsi($provinsi_id): Builder
    {
        return User::query()
            ->with('userPejabatStruktural', function ($query) use ($provinsi_id) {
                $query->where('tingkat_aparatur', 'provinsi')
                    ->where('provinsi_id', $provinsi_id);
            })
            ->where('status_akun', $this->user::STATUS_ACTIVE);
    }

    private function scopeStrukturalByKabKota($kab_kota_id): Builder
    {
        return User::query()
            ->with('userPejabatStruktural', function ($query) use ($kab_kota_id) {
                $query->where('tingkat_aparatur', 'kab_kota')
                    ->where('kab_kota_id', $kab_kota_id);
            })
            ->where('status_akun', $this->user::STATUS_ACTIVE);
    }

    public function getPenilaiAKByProvinsi($provinsi_id): Collection
    {
        return $this->scopeStrukturalByProvinsi($provinsi_id)->whereRoleIs('penilai_ak')->get();
    }

    public function getPenetapAKByProvinsi($provinsi_id): Collection
    {
        return $this->scopeStrukturalByProvinsi($provinsi_id)->whereRoleIs('penetap_ak')->get();
    }

    public function getPenilaiAKByKabKota($kab_kota_id): Collection
    {
        return $this->scopeStrukturalByKabKota($kab_kota_id)->whereRoleIs('penilai_ak')->get();
    }

    public function getPenetapAKByKabKota($kab_kota_id): Collection
    {
        return $this->scopeStrukturalByKabKota($kab_kota_id)->whereRoleIs('penetap_ak')->get();
    }
}
