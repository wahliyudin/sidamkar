<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\KabProvPenilaiAndPenetap;
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

    public function updateStatusAkunVerified(User $user)
    {
        return $user->update(['status_akun' => $user::STATUS_ACTIVE]);
    }

    public function updateStatusAkunReject(User $user)
    {
        return $user->update(['status_akun' => $user::STATUS_REJECT]);
    }

    public function destroyStruktural(User $user)
    {
        $KabProvPenilaiAndPenetap = KabProvPenilaiAndPenetap::where('penilai_ak_damkar_id',$user["id"])->orWhere("penilai_ak_analis_id", $user["id"])->orwhere("penetap_ak_damkar_id", $user["id"])->orWhere("penetap_ak_analis_id", $user["id"])->first();
        if ($KabProvPenilaiAndPenetap->penilai_ak_damkar_id == $user["id"])
        {
            $KabProvPenilaiAndPenetap->update(['penilai_ak_damkar_id' => null]);
        }
        if ($KabProvPenilaiAndPenetap->penilai_ak_analis_id == $user["id"])
        {
            $KabProvPenilaiAndPenetap->update(['penilai_ak_analis_id' => null]);
        }
        if ($KabProvPenilaiAndPenetap->penetap_ak_damkar_id == $user["id"])
        {
            $KabProvPenilaiAndPenetap->update(['penetap_ak_damkar_id' => null]);
        }
        if ($KabProvPenilaiAndPenetap->penetap_ak_analis_id == $user["id"])
        {
            $KabProvPenilaiAndPenetap->update(['penetap_ak_analis_id' => null]);
        }

        if (isset($user->userPejabatStruktural?->file_ttd)) deleteImage($user->userPejabatStruktural->file_ttd);
        if (isset($user->userPejabatStruktural?->foto_pegawai)) deleteImage($user->userPejabatStruktural->foto_pegawai);
        return $user->delete();
    }

    public function destroyProvKabKota(User $user)
    {
        if (isset($user->userProvKabKota?->file_permohonan)) deleteImage($user->userProvKabKota->file_permohonan);
        return $user->delete();
    }

    public function destroyFungsional(User $user)
    {
        if (isset($user->userPejabatStruktural?->foto_pegawai)) deleteImage($user->userPejabatStruktural->foto_pegawai);
        return $user->delete();
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

    public function getAllPenilaiKabKota()
    {
        return $this->user->query()
            ->withWhereHas('userPejabatStruktural', function ($query) {
                $query->where('tingkat_aparatur', 'kab_kota');
            })
            ->where('status_akun', $this->user::STATUS_ACTIVE)
            ->whereRoleIs('penilai_ak')
            ->get();
    }

    public function getAllPenetapKabKota()
    {
        return $this->user->query()
            ->withWhereHas('userPejabatStruktural', function ($query) {
                $query->where('tingkat_aparatur', 'kab_kota');
            })
            ->where('status_akun', $this->user::STATUS_ACTIVE)
            ->whereRoleIs('penetap_ak')
            ->get();
    }
}
