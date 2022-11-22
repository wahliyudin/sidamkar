<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KetentuanNilai;
class KetentuanNilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ketentuanNilai = [
            //Damkar
            [
                'role_id' => 1,
                'pangkat_golongan_tmt_id' => 5,
                'ak_min' => 3.5,
                'ak_max' => 5.25,
                'ak_kp' => 15,
                'akk_kj' => 15,
                'ak_pemeliharaan' => 2.8,
                'ak_bangprof' => null,
                'ak_dasar' => 0,
                'ak_max_bangprof_penunjang' => 1.75,
                'ak_max_penunjang' => 3
            ],
            [
                'role_id' => 2,
                'pangkat_golongan_tmt_id' => 6,
                'ak_min' => 5,
                'ak_max' => 7.5,
                'ak_kp' => 20,
                'akk_kj' => null,
                'ak_pemeliharaan' => 4,
                'ak_bangprof' => null,
                'ak_dasar' => 0,
                'ak_max_bangprof_penunjang' => 2.5,
                'ak_max_penunjang' => 4
            ],
            [
                'role_id' => 2,
                'pangkat_golongan_tmt_id' => 7,
                'ak_min' => 5,
                'ak_max' => 7.5,
                'ak_kp' => 20,
                'akk_kj' => null,
                'ak_pemeliharaan' => 4,
                'ak_bangprof' => null,
                'ak_dasar' => 20,
                'ak_max_bangprof_penunjang' => 2.5,
                'ak_max_penunjang' => 4
            ],
            [
                'role_id' => 2,
                'pangkat_golongan_tmt_id' => 8,
                'ak_min' => 5,
                'ak_max' => 7.5,
                'ak_kp' => 20,
                'akk_kj' => 60,
                'ak_pemeliharaan' => 4,
                'ak_bangprof' => null,
                'ak_dasar' => 40,
                'ak_max_bangprof_penunjang' => 2.5,
                'ak_max_penunjang' => 4
            ],
            [
                'role_id' => 3,
                'pangkat_golongan_tmt_id' => 9,
                'ak_min' => 12.5,
                'ak_max' => 18.75,
                'ak_kp' => 50,
                'akk_kj' => null,
                'ak_pemeliharaan' => 10,
                'ak_bangprof' => 4,
                'ak_dasar' => 0,
                'ak_max_bangprof_penunjang' => 6.25,
                'ak_max_penunjang' => 10
            ],
            [
                'role_id' => 3,
                'pangkat_golongan_tmt_id' => 10,
                'ak_min' => 12.5,
                'ak_max' => 18.75,
                'ak_kp' => 50,
                'akk_kj' => 100,
                'ak_pemeliharaan' => 10,
                'ak_bangprof' => 4,
                'ak_dasar' => 50,
                'ak_max_bangprof_penunjang' => 6.25,
                'ak_max_penunjang' => 10
            ],
            [
                'role_id' => 4,
                'pangkat_golongan_tmt_id' => 11,
                'ak_min' => 25,
                'ak_max' => 37.5,
                'ak_kp' => 100,
                'akk_kj' => null,
                'ak_pemeliharaan' => 20,
                'ak_bangprof' => null,
                'ak_dasar' => 0,
                'ak_max_bangprof_penunjang' => 12.5,
                'ak_max_penunjang' => 20
            ],
            [
                'role_id' => 4,
                'pangkat_golongan_tmt_id' => 12,
                'ak_min' => 25,
                'ak_max' => 37.5,
                'ak_kp' => null,
                'akk_kj' => null,
                'ak_pemeliharaan' => 20,
                'ak_bangprof' => null,
                'ak_dasar' => 0,
                'ak_max_bangprof_penunjang' => 12.5,
                'ak_max_penunjang' => 20
            ],

            // //analis Kebakaran
            [
                'role_id' => 5,
                'pangkat_golongan_tmt_id' => 9,
                'ak_min' => 12.5,
                'ak_max' => 18.75,
                'ak_kp' => 50,
                'akk_kj' => null,
                'ak_pemeliharaan' => 10,
                'ak_bangprof' => null,
                'ak_dasar' => 0,
                'ak_max_bangprof_penunjang' => 6.25,
                'ak_max_penunjang' => 10
            ],
            [
                'role_id' => 5,
                'pangkat_golongan_tmt_id' => 10,
                'ak_min' => 12.5,
                'ak_max' => 18.75,
                'ak_kp' => 50,
                'akk_kj' => 100,
                'ak_pemeliharaan' => 10,
                'ak_bangprof' => null,
                'ak_dasar' => 50,
                'ak_max_bangprof_penunjang' => 6.25,
                'ak_max_penunjang' => 10
            ],
            [
                'role_id' => 6,
                'pangkat_golongan_tmt_id' => 11,
                'ak_min' => 25,
                'ak_max' => 37.5,
                'ak_kp' => 100,
                'akk_kj' => null,
                'ak_pemeliharaan' => 20,
                'ak_bangprof' => 6,
                'ak_dasar' => 0,
                'ak_max_bangprof_penunjang' => 12.25,
                'ak_max_penunjang' => 20
            ],
            [
                'role_id' => 6,
                'pangkat_golongan_tmt_id' => 12,
                'ak_min' => 25,
                'ak_max' => 37.5,
                'ak_kp' => 100,
                'akk_kj' => 200,
                'ak_pemeliharaan' => 20,
                'ak_bangprof' => 6,
                'ak_dasar' => 100,
                'ak_max_bangprof_penunjang' => 12.25,
                'ak_max_penunjang' => 20
            ],
            [
                'role_id' => 7,
                'pangkat_golongan_tmt_id' => 13,
                'ak_min' => 37.5,
                'ak_max' => 56.25,
                'ak_kp' => 150,
                'akk_kj' => null,
                'ak_pemeliharaan' => 30,
                'ak_bangprof' => null,
                'ak_dasar' => 0,
                'ak_max_bangprof_penunjang' => 18.75,
                'ak_max_penunjang' => 30
            ],
            [
                'role_id' => 7,
                'pangkat_golongan_tmt_id' => 14,
                'ak_min' => 37.5,
                'ak_max' => 56.25,
                'ak_kp' => 150,
                'akk_kj' => null,
                'ak_pemeliharaan' => 30,
                'ak_bangprof' => null,
                'ak_dasar' => 150,
                'ak_max_bangprof_penunjang' => 18.75,
                'ak_max_penunjang' => 30
            ],
            [
                'role_id' => 7,
                'pangkat_golongan_tmt_id' => 15,
                'ak_min' => 37.5,
                'ak_max' => 56.25,
                'ak_kp' => null,
                'akk_kj' => null,
                'ak_pemeliharaan' => 30,
                'ak_bangprof' => null,
                'ak_dasar' => 150,
                'ak_max_bangprof_penunjang' => 18.75,
                'ak_max_penunjang' => 30
            ],
        ];

        KetentuanNilai::query()->upsert($ketentuanNilai, 'id');
    }
}
