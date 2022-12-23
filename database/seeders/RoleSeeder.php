<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            //role id 1
            [
                'name' => "damkar_pemula",
                'display_name' => 'Damkar Pemula',
                'description' => ''
            ],
            //role id 2
            [
                'name' => "damkar_terampil",
                'display_name' => 'Damkar Terampil',
                'description' => ''
            ],
            //role id 3
            [
                'name' => "damkar_mahir",
                'display_name' => 'Damkar Mahir',
                'description' => ''
            ],
            //role id 4
            [
                'name' => "damkar_penyelia",
                'display_name' => 'Damkar Penyelia',
                'description' => ''
            ],
            //role id 5
            [
                'name' => "analis_kebakaran_ahli_pertama",
                'display_name' => 'Analis Kebakaran Ahli Pertama',
                'description' => ''
            ],
            //role id 6
            [
                'name' => "analis_kebakaran_ahli_muda",
                'display_name' => 'Analis Kebakaran Ahli Muda',
                'description' => ''
            ],
            //role id 7
            [
                'name' => "analis_kebakaran_ahli_madya",
                'display_name' => 'Analis Kebakaran Ahli Madya',
                'description' => ''
            ],
            [
                'name' => 'kab_kota',
                'display_name' => 'Kab Kota',
                'description' => ''
            ],
            [
                'name' => 'provinsi',
                'display_name' => 'Provinsi',
                'description' => ''
            ],
            [
                'name' => 'kemendagri',
                'display_name' => 'Kemendagri',
                'description' => ''
            ],
            [
                'name' => 'atasan_langsung',
                'display_name' => 'Atasan Langsung',
                'description' => ''
            ],
            [
                'name' => 'penilai_ak_damkar',
                'display_name' => 'Penilai AK Damkar',
                'description' => ''
            ],
            [
                'name' => 'penetap_ak_damkar',
                'display_name' => 'Penetap AK Damkar',
                'description' => ''
            ],
            [
                'name' => 'penilai_ak_analis',
                'display_name' => 'Penilai AK Analis',
                'description' => ''
            ],
            [
                'name' => 'penetap_ak_analis',
                'display_name' => 'Penetap AK Analis',
                'description' => ''
            ],
            [
                'name' => 'penetap_ak_kemendagri',
                'display_name' => 'Penetap Kemendagri',
                'description' => ''
            ],
            [
                'name' => 'penilai_ak_kemendagri',
                'display_name' => 'Penilai Kemendagri',
                'description' => ''
            ]
        ];
        Role::query()->upsert($roles, 'id');
    }
}