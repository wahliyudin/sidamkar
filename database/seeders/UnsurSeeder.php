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
        // unsur no 1 sampai dengan 18 adalah RINCIAN KEGIATAN TUGAS JABATAN UNTUK JABATAN FUNGSIONAL PEMADAM KEBAKARAN
        // Sub Unsur dengan id 1 sampai dengan 73 adalah milik dari kegiatan pokok JABATAN FUNGSIONAL PEMADAM KEBAKARAN 
        $damkarPemula = [
            // 1
            [
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Kesiapsiagaan petugas pemadam kebakaran dan penyelamatan'
            ],
            // 2
            [
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pelaksanaan prosedur pelaporan informasi kejadian kebakaran'
            ],
            // 3
            [
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pelaksanaan operasional pemadaman kebakaran'
            ],
            // 4
            [
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pelaksanaan prosedur pelaporan informasi kejadian evakuasi dan penyelamatan'
            ]
        ];
        Unsur::query()->upsert($damkarPemula, 'id');

        $terampil = [
            // 5
            [
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Kesiapsiagaan petugas pengemudi mobil pemadam kebakaran dan penyelamatan'
            ],
            // 6
            [
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pelaksanaan prosedur pelaporan informasi penanggulangan kebakaran'
            ],
            // 7
            [
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pelaksanaan operasional mobil pemadam kebakaran'
            ],
            // 8
            [
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pelaksanaan prosedur pelaporan informasi kejadian evakuasi dan penyelamatan'
            ],
            // 9
            [
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pelaksanaan operasional evakuasi dan penyelamatan'
            ],
        ];
        Unsur::query()->upsert($terampil, 'id');

        $mahir = [
            // 10
            [
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Kesiapsiagaan kepala regu pemadam kebakaran dan penyelamatan'
            ],
            // 11
            [
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pengelolaan prosedur pelaporan informasi kejadian kebakaran'
            ],
            //12
            [
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pelaksanaan operasional pemadaman kebakaran'
            ],
            // 13
            [
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pengendalian operasional evakuasi dan penyelamatan'
            ],
        ];
        Unsur::query()->upsert($mahir, 'id');

        $penyelia = [
            // 14
            [
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Kesiapsiagaan kepala peleton pemadam kebakaran dan penyelamatan'
            ],
            // 15
            [
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pengkoordinasian pengelolaan prosedur pelaporan informasi kejadian kebakaran'
            ],
            // 16
            [
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pengkoordinasian operasional pemadaman kebakaran'
            ],
            // 17
            [
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pengkoordinasian operasional evakuasi dan penyelamatan'
            ],
            // 18
            [
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pengkoordinasian operasional evakuasi dan penyelamatan'
            ],
        ];
        Unsur::query()->upsert($penyelia, 'id');
        //end unsur no 1 sampai dengan 18 adalah RINCIAN KEGIATAN TUGAS JABATAN UNTUK JABATAN FUNGSIONAL PEMADAM KEBAKARAN
        

        //unsur no .. sampai dengan .. adalah RINCIAN KEGIATAN JABATAN FUNGSIONAL ANALIS KEBAKARAN DAN ANGKA KREDITNYA
        $ahli_pratama = [
        // 19
        [
            'jenis_kegiatan_id' => 1,
            'periode_id' => 1,
            'nama' => 'Persiapan pemeriksaan bangunan gedung'
        ],
        // 20
        [
            'jenis_kegiatan_id' => 1,
            'periode_id' => 1,
            'nama' => 'Pelaksanaan pemeriksaan bangunan gedung'
        ],
        // 21
        [
            'jenis_kegiatan_id' => 1,
            'periode_id' => 1,
            'nama' => 'Penyusunan laporan hasil pemeriksaan bangunan gedung'
        ],
        // 21
        [
            'jenis_kegiatan_id' => 1,
            'periode_id' => 1,
            'nama' => 'Pemberdayaan dan pembinaan masyarakat'
        ],
        // 22
        [
            'jenis_kegiatan_id' => 1,
            'periode_id' => 1,
            'nama' => 'Evaluasi pemberdayaan dan pembinaan masyarakat'
        ],
        // 22
        [
            'jenis_kegiatan_id' => 1,
            'periode_id' => 1,
            'nama' => 'Perencanaan pelaksanaan dan evaluasi pendidikan dan pelatihan',
        ],
        // 23
        [
            'jenis_kegiatan_id' => 1,
            'periode_id' => 1,
            'nama' => 'Penyusunan rencana Induk Sistem Proteksi Kebakaran (RISPK)',
        ],
        // 24
        [
            'jenis_kegiatan_id' => 1,
            'periode_id' => 1,
            'nama' => 'Penanganan Resiko Kebakaran B3 (bahan beracun dan berbahaya',
        ],
        // 25
        [
            'jenis_kegiatan_id' => 1,
            'periode_id' => 1,
            'nama' => 'Penindakan terhadap penyimpangan standar keselamatan kebakaran',
        ],
        // 26
        [
            'jenis_kegiatan_id' => 1,
            'periode_id' => 1,
            'nama' => 'Pelaksanaan investigasi pasca kebakaran',
        ],
        ];
        Unsur::query()->upsert($ahli_pratama,'id');

    }
}
