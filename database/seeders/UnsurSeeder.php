<?php

namespace Database\Seeders;

use App\Models\Unsur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnsurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $damkarPemula = [
            [
                'role_id' => 1,
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Kesiapsiagaan petugas pemadam kebakaran dan penyelamatan'
            ],
            [
                'role_id' => 1,
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pelaksanaan prosedur pelaporan informasi kejadian kebakaran'
            ],
            [
                'role_id' => 1,
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pelaksanaan operasional pemadaman kebakaran'
            ],
            [
                'role_id' => 1,
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pelaksanaan prosedur pelaporan informasi kejadian evakuasi dan penyelamatan'
            ]
        ];
        Unsur::query()->upsert($damkarPemula, 'id');

        $terampil = [
            [
                'role_id' => 2,
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Kesiapsiagaan petugas pengemudi mobil pemadam kebakaran dan penyelamatan'
            ],
            [
                'role_id' => 2,
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pelaksanaan prosedur pelaporan informasi penanggulangan kebakaran'
            ],
            [
                'role_id' => 2,
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pelaksanaan operasional mobil pemadam kebakaran'
            ],
            [
                'role_id' => 2,
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pelaksanaan prosedur pelaporan informasi kejadian evakuasi dan penyelamatan'
            ],
            [
                'role_id' => 2,
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pelaksanaan operasional evakuasi dan penyelamatan'
            ],
        ];
        Unsur::query()->upsert($terampil, 'id');

        $mahir = [
            [
                'role_id' => 3,
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Kesiapsiagaan kepala regu pemadam kebakaran dan penyelamatan'
            ],
            [
                'role_id' => 3,
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pengelolaan prosedur pelaporan informasi kejadian kebakaran'
            ],
            [
                'role_id' => 3,
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pelaksanaan operasional pemadaman kebakaran'
            ],
        ];
        Unsur::query()->upsert($mahir, 'id');
    }
}
