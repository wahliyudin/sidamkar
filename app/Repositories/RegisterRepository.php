<?php

namespace App\Repositories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class RegisterRepository
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function storeUser(array $data)
    {
        return $this->user->create([
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function storeAparatur(User $user, array $data)
    {
        return $user->userAparatur()->create([
            'nama' => $data['nama'],
            'provinsi_id' => $data['provinsi_id'],
            'kab_kota_id' => $data['kab_kota_id']
        ]);
    }

    public function storeProvKabKota(User $user, array $data)
    {
        return $user->userProvKabKota()->create([
            'nomenklatur_perangkat_daerah' => $data['nomenklatur_perangkat_daerah'],
            'file_permohonan' => $data['file_permohonan'],
            'kab_kota_id' => isset($data['kab_kota_id']) ? $data['kab_kota_id'] : '',
            'provinsi_id' => isset($data['provinsi_id']) ? $data['provinsi_id'] : ''
        ]);
    }

    public function storeStruktural(User $user, array $data)
    {
        return $user->userPejabatStruktural()->create([
            'nama' => $data['nama'],
            'file_sk' => $data['file_sk'],
            'kab_kota_id' => $data['kab_kota_id'],
            'provinsi_id' => $data['provinsi_id']
        ]);
    }
}
