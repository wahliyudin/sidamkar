<?php

namespace App\Repositories;

use App\Models\TemporaryFile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
            'no_hp' => $data['no_hp'],
            'tingkat_aparatur' => $data['tingkat_aparatur'],
            'provinsi_id' => $data['provinsi_id'],
            'kab_kota_id' => isset($data['kab_kota_id']) ? $data['kab_kota_id'] : null
        ]);
    }

    public function storeProvKabKota(User $user, array $data)
    {
        $tmp_file = TemporaryFile::query()->where('folder', $data['file_permohonan'])->first();
        if ($tmp_file) {
            Storage::copy("tmp/$tmp_file->folder/$tmp_file->file", "provkabkota/$tmp_file->file");
            $tmp_file->delete();
            Storage::deleteDirectory("tmp/$tmp_file->folder");
        }
        return $user->userProvKabKota()->create([
            'nomenklatur_perangkat_daerah_id' => $data['nomenklatur_perangkat_daerah_id'],
            'file_permohonan' => url("storage/provkabkota/$tmp_file->file"),
            'kab_kota_id' => isset($data['kab_kota_id']) ? $data['kab_kota_id'] : null,
            'provinsi_id' => isset($data['provinsi_id']) ? $data['provinsi_id'] : null
        ]);
    }

    public function storeStruktural(User $user, array $data)
    {
        return $user->userPejabatStruktural()->create([
            'nama' => $data['nama'],
            'no_hp' => $data['no_hp'],
            'tingkat_aparatur' => $data['tingkat_aparatur'],
            'eselon' => $data['jenis_eselon'],
            'kab_kota_id' => isset($data['kab_kota_id']) ? $data['kab_kota_id'] : null,
            'provinsi_id' => $data['provinsi_id']
        ]);
    }
}
