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
            [
                'name' => 'damkar',
                'display_name' => 'Damkar',
                'description' => ''
            ],
            [
                'name' => 'analis_kebakaran',
                'display_name' => 'Analis Kebakaran',
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
                'name' => 'penilai_ak',
                'display_name' => 'Penilai AK',
                'description' => ''
            ],
            [
                'name' => 'penetap_ak',
                'display_name' => 'Penetap AK',
                'description' => ''
            ]
        ];
        Role::query()->upsert($roles, 'id');
    }
}
