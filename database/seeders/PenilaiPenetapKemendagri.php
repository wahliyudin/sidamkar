<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PenilaiPenetapKemendagri extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $penilaiDamkarKemendagri = User::query()->create([
            'username' => 'penilai.damkar.kemendagri',
            'email' => 'penilaidamkarkemendagri@gmail.com',
            'password' => Hash::make('sdmdamkar2022'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('penilai_ak_damkar_kemendagri');
        $penilaiDamkarKemendagri->userPejabatStruktural()->create([
            'nama' => 'Penilai Damkar Kemendagri'
        ]);

        $penetapDamkarKemendagri = User::query()->create([
            'username' => 'penetap.damkar.kemendagri',
            'email' => 'penetapdamkarkemendagri@gmail.com',
            'password' => Hash::make('sdmdamkar2022'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('penetap_ak_damkar_kemendagri');
        $penetapDamkarKemendagri->userPejabatStruktural()->create([
            'nama' => 'Penetap Damkar Kemendagri'
        ]);

        $penilaiAnalisKemendagri = User::query()->create([
            'username' => 'penilai.analis.kemendagri',
            'email' => 'penilaianaliskemendagri@gmail.com',
            'password' => Hash::make('sdmdamkar2022'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('penilai_ak_analis_kemendagri');
        $penilaiAnalisKemendagri->userPejabatStruktural()->create([
            'nama' => 'Penilai Analis Kemendagri'
        ]);

        $penetapAnalisKemendagri = User::query()->create([
            'username' => 'penetap.analis.kemendagri',
            'email' => 'penetapanaliskemendagri@gmail.com',
            'password' => Hash::make('sdmdamkar2022'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('penetap_ak_analis_kemendagri');
        $penetapAnalisKemendagri->userPejabatStruktural()->create([
            'nama' => 'Penetap Analis Kemendagri'
        ]);
    }
}
