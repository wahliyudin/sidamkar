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


        //unsur no 19 sampai dengan 28 adalah RINCIAN KEGIATAN JABATAN FUNGSIONAL ANALIS KEBAKARAN DAN ANGKA KREDITNYA
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
            // 22
            [
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pemberdayaan dan pembinaan masyarakat'
            ],
            // 23
            [
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Evaluasi pemberdayaan dan pembinaan masyarakat'
            ],
            // 24
            [
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Perencanaan pelaksanaan dan evaluasi pendidikan dan pelatihan',
            ],
            // 25
            [
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Penyusunan rencana Induk Sistem Proteksi Kebakaran (RISPK)',
            ],
            // 26
            [
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Penanganan Resiko Kebakaran B3 (bahan beracun dan berbahaya)',
            ],
            // 27
            [
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Penindakan terhadap penyimpangan standar keselamatan kebakaran',
            ],
            // 28
            [
                'jenis_kegiatan_id' => 1,
                'periode_id' => 1,
                'nama' => 'Pelaksanaan investigasi pasca kebakaran',
            ],
        ];
        Unsur::query()->upsert($ahli_pratama, 'id');

        // End unsur no 19 sampai dengan 28 adalah RINCIAN KEGIATAN JABATAN FUNGSIONAL ANALIS KEBAKARAN DAN ANGKA KREDITNYA
        $kegiatanProfesiFungsionalDamkar = [
            //29
            [
                'jenis_kegiatan_id' => 3,
                'periode_id' => 1,
                'jenis_aparatur' => 'damkar',
                'nama' => 'Pengembangan Profesi Pemadam Kebakaran'
            ],
            //30
            [
                'jenis_kegiatan_id' => 2,
                'periode_id' => 1,
                'jenis_aparatur' => 'damkar',
                'nama' => 'Penunjang Tugas Pemadam Kebakaran'
            ],
        ];

        Unsur::query()->upsert($kegiatanProfesiFungsionalDamkar, 'id');

        $kegiatanProfesiAnalisDamkar = [
            //31
            [
                'jenis_kegiatan_id' => 3,
                'periode_id' => 1,
                'jenis_aparatur' => 'analis',
                'nama' => 'Pengembangan Profesi Analis Kebakaran'
            ],
            //32
            [
                'jenis_kegiatan_id' => 2,
                'periode_id' => 1,
                'jenis_aparatur' => 'analis',
                'nama' => 'Penunjang Tugas Analis Kebakaran'
            ],
        ];

        Unsur::query()->upsert($kegiatanProfesiAnalisDamkar, 'id');
    }
}