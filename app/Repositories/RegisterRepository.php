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
            'kab_kota_id' => $data['kab_kota_id']
        ]);
    }

    public function storeAparatur(User $user, array $data)
    {
        return $user->userAparatur()->create([
            'nama' => $data['nama'],
            'jenjang' => $data['jenjang'],
            'nip' => $data['nip'],
            'pangkat_golongan_tmt' => $data['pangkat_golongan_tmt'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => Carbon::createFromFormat('Y-m-d', $data['tanggal_lahir'])->format('Y-m-d'),
            'jenis_kelamin' => $data['jenis_kelamin'],
            'pendidikan_terakhir' => $data['pendidikan_terakhir'],
            'nomor_karpeg' => $data['nomor_karpeg'],
        ]);
    }

    public function storeProvKabKota(User $user, array $data)
    {
        return $user->userProvKabKota()->create([
            'nomenklatur_perangkat_daerah' => $data['nomenklatur_perangkat_daerah'],
            'file_permohonan' => $data['file_permohonan']
        ]);
    }

    public function storeStruktural(User $user, array $data)
    {
        return $user->userPejabatStruktural()->create([
            'nama' => $data['nama'],
            'pangkat_golongan_tmt' => $data['pangkat_golongan_tmt'],
            'nomenklatur_jabatan' => $data['nomenklatur_jabatan'],
            'nip' => $data['nip'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'pendidikan_terakhir' => $data['pendidikan_terakhir'],
            'file_ttd' => $data['file_ttd']
        ]);
    }
}
