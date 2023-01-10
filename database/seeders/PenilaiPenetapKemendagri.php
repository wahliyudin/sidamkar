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
            'email' => 'sdmdamkar.penilaidamkar@gmail.com',
            'password' => Hash::make('sdmdamkar2022'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('penilai_ak_damkar_kemendagri');
        $penilaiDamkarKemendagri->userPejabatStruktural()->create([
            'nama' => 'Danang Insita Putra, S.T., M.Si (Han)., Ph.D'
        ]);

        $penetapDamkarKemendagri = User::query()->create([
            'username' => 'penetap.damkar.penilai.analis.kemendagri',
            'email' => 'dit.mpbk@gmail.com',
            'password' => Hash::make('sdmdamkar2022'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('penetap_ak_damkar_kemendagri')->attachRole('penilai_ak_analis_kemendagri');
        $penetapDamkarKemendagri->userPejabatStruktural()->create([
            'nama' => 'Drs. Edy Suharmanto, M.Si'
        ]);

        // $penilaiAnalisKemendagri = User::query()->create([
        //     'username' => 'penilai.analis.kemendagri',
        //     'email' => 'dit.mpbk@gmail.com',
        //     'password' => Hash::make('sdmdamkar2022'),
        //     'email_verified_at' => now(),
        //     'status_akun' => 1
        // ])->attachRole('penilai_ak_analis_kemendagri');
        // $penilaiAnalisKemendagri->userPejabatStruktural()->create([
        //     'nama' => 'Drs. Edy Suharmanto, M.Si'
        // ]);

        $penetapAnalisKemendagri = User::query()->create([
            'username' => 'penetap.analis.kemendagri',
            'email' => 'ditjenadwil01@gmail.com',
            'password' => Hash::make('sdmdamkar2022'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('penetap_ak_analis_kemendagri');
        $penetapAnalisKemendagri->userPejabatStruktural()->create([
            'nama' => 'Dr. Drs. Safrizal ZA, M.Si'
        ]);
    }
}
