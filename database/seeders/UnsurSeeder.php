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
        // unsur no 1 sampai dengan 18 adalah tugas kegiatan pokok milik // Sub Unsur dengan id 1 sampai dengan 73 adalah milik dari kegiatan pokok JABATAN FUNGSIONAL PEMADAM KEBAKARAN 
        $damkarPemula = [
            // 1
            [
                'role_id' => 1,
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Kesiapsiagaan petugas pemadam kebakaran dan penyelamatan'
            ],
            // 2
            [
                'role_id' => 1,
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pelaksanaan prosedur pelaporan informasi kejadian kebakaran'
            ],
            // 3
            [
                'role_id' => 1,
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pelaksanaan operasional pemadaman kebakaran'
            ],
            // 4
            [
                'role_id' => 1,
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pelaksanaan prosedur pelaporan informasi kejadian evakuasi dan penyelamatan'
            ]
        ];
        Unsur::query()->upsert($damkarPemula, 'id');

        $terampil = [
            // 5
            [
                'role_id' => 2,
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Kesiapsiagaan petugas pengemudi mobil pemadam kebakaran dan penyelamatan'
            ],
            // 6
            [
                'role_id' => 2,
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pelaksanaan prosedur pelaporan informasi penanggulangan kebakaran'
            ],
            // 7
            [
                'role_id' => 2,
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pelaksanaan operasional mobil pemadam kebakaran'
            ],
            // 8
            [
                'role_id' => 2,
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pelaksanaan prosedur pelaporan informasi kejadian evakuasi dan penyelamatan'
            ],
            // 9
            [
                'role_id' => 2,
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pelaksanaan operasional evakuasi dan penyelamatan'
            ],
        ];
        Unsur::query()->upsert($terampil, 'id');

        $mahir = [
            // 10
            [
                'role_id' => 3,
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Kesiapsiagaan kepala regu pemadam kebakaran dan penyelamatan'
            ],
            // 11
            [
                'role_id' => 3,
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pengelolaan prosedur pelaporan informasi kejadian kebakaran'
            ],
            //12
            [
                'role_id' => 3,
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pelaksanaan operasional pemadaman kebakaran'
            ],
            // 13
            [
                'role_id' => 3,
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pengendalian operasional evakuasi dan penyelamatan'
            ],
        ];
        Unsur::query()->upsert($mahir, 'id');

        $penyelia = [
            // 14
            [
                'role_id' => 4,
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Kesiapsiagaan kepala peleton pemadam kebakaran dan penyelamatan'
            ],
            // 15
            [
                'role_id' => 4,
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pengkoordinasian pengelolaan prosedur pelaporan informasi kejadian kebakaran'
            ],
            // 16
            [
                'role_id' => 4,
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pengkoordinasian operasional pemadaman kebakaran'
            ],
            // 17
            [
                'role_id' => 4,
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pengkoordinasian operasional evakuasi dan penyelamatan'
            ],
            // 18
            [
                'role_id' => 4,
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pengkoordinasian operasional evakuasi dan penyelamatan'
            ],
        ];
        Unsur::query()->upsert($penyelia, 'id');
        //end unsur no 1 sampai dengan 18 adalah tugas kegiatan pokok milik // Sub Unsur dengan id 1 sampai dengan 73 adalah milik dari kegiatan pokok JABATAN FUNGSIONAL PEMADAM KEBAKARAN 

        //     // 19
        //     [
        //         'role_id' => 5,
        //         'jenis_kegiatan_id' => 1,
        //         'periode_id' => 1,
        //         'nama' => 'Persiapan pemeriksaan bangunan gedung'
        //     ],
        //     // 20
        //     [
        //         'role_id' => 6,
        //         'jenis_kegiatan_id' => 1,
        //         'periode_id' => 1,
        //         'nama' => 'Persiapan pemeriksaan bangunan gedung'
        //     ],
        //     // 21
        //     [
        //         'role_id' => 5,
        //         'jenis_kegiatan_id' => 1,
        //         'periode_id' => 1,
        //         'nama' => 'Pelaksanaan pemeriksaan bangunan gedung'
        //     ],
        //     // 22
        //     [
        //         'role_id' => 6,
        //         'jenis_kegiatan_id' => 1,
        //         'periode_id' => 1,
        //         'nama' => 'Pelaksanaan pemeriksaan bangunan gedung'
        //     ],
        //     // 23
        //     [
        //         'role_id' => 5,
        //         'jenis_kegiatan_id' => 1,
        //         'periode_id' => 1,
        //         'nama' => 'Penyusunan laporan hasil pemeriksaan bangunan gedung'
        //     ],
        //     // 24
        //     [
        //         'role_id' => 6,
        //         'jenis_kegiatan_id' => 1,
        //         'periode_id' => 1,
        //         'nama' => 'Penyusunan laporan hasil pemeriksaan bangunan gedung'
        //     ],


        // ];
        // Unsur::query()->upsert($mahir, 'id');
    }
}
