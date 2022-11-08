<?php

namespace Database\Seeders;

use App\Models\ButirKegiatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ButirKegiatanSeeder extends Seeder
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
                'sub_unsur_id' => 1,
                'nama' => 'Mempersiapkan kelengkapan pemadaman',
                'satuan_hasil' => 'Dokumen kelengkapan',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 1,
                'nama' => 'Melaksanakan Apel Pagi',
                'satuan_hasil' => 'Laporan Apel Pagi',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 1,
                'nama' => 'Melaksanakan serah terima tugas jaga',
                'satuan_hasil' => 'Laporan serah terima tugas jaga',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 1,
                'nama' => 'Melaksanakan pemeriksaan jumlah peralatan operasional',
                'satuan_hasil' => 'Laporan pemeriksaan jumlah peralatan operasional',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 1,
                'nama' => 'Melaksanakan pengecekan fungsi peralatan operasional',
                'satuan_hasil' => 'Laporan pengecekan fungsi peralatan operasional',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 1,
                'nama' => 'Membuat laporan sesuai dengan form check list',
                'satuan_hasil' => 'Dokumen sesuai dengan form check list',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 2,
                'nama' => 'Melaksanakan piket sesuai dengan consignus jaga (tata kelola)',
                'satuan_hasil' => 'Laporan piket sesuai dengan consignus jaga (tata kelola)',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 2,
                'nama' => 'Melakukan Monitoring kejadian kebakaran dan penyelamatan',
                'satuan_hasil' => 'Laporan Monitoring kejadian kebakaran dan penyelamatan',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 3,
                'nama' => 'Mempersiapkan kelengkapan operasional pemadaman dan penyelamatan',
                'satuan_hasil' => 'Laporan kelengkapan',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 3,
                'nama' => 'Melaksanakan apel malam',
                'satuan_hasil' => 'Laporan apel malam',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 3,
                'nama' => 'Melaksanakan pemeriksaan jumlah peralatan operasional',
                'satuan_hasil' => 'Laporan pemeriksaan jumlah peralatan operasional',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 3,
                'nama' => 'Melaksanakan pengecekan fungsi peralatan operasional',
                'satuan_hasil' => 'Laporan pengecekan fungsi peralatan operasional',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 3,
                'nama' => 'Membuat laporan sesuai dengan form check list',
                'satuan_hasil' => 'Dokumen sesuai dengan form check list',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 4,
                'nama' => 'Mempersiapkan peralatan latihan',
                'satuan_hasil' => 'Laporan peralatan latihan ',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 4,
                'nama' => 'Melakukan latihan penggunaan peralatan',
                'satuan_hasil' => 'Laporan latihan penggunaan peralatan',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 4,
                'nama' => 'Merapikan kembali peralatan yang digunakan',
                'satuan_hasil' => 'Laporan kembali peralatan yang digunakan',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 5,
                'nama' => 'Melaksanakan kegiatan pembinaan fisik',
                'satuan_hasil' => 'Laporan kegiatan pembinaan fisik',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 6,
                'nama' => 'Melaksanakan korve di lingkungan kerja',
                'satuan_hasil' => 'Laporan korve di lingkungan kerja',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 6,
                'nama' => 'Melaksanakan pembersihan unit mobil',
                'satuan_hasil' => 'Laporan pembersihan unit mobil',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 7,
                'nama' => 'Mencatat informasi kejadian kebakaran',
                'satuan_hasil' => 'Laporan informasi kejadian kebakaran',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 7,
                'nama' => 'Melaporkan informasi kejadian kebakaran',
                'satuan_hasil' => 'Laporan informasi kejadian kebakaran',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 8,
                'nama' => 'Menerima perintah dari Kepala Regu pasca Informasi kejadian kebakaran',
                'satuan_hasil' => 'Laporan saat diperintah oleh Kepala Regu pasca Informasi kejadian kebakaran',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 8,
                'nama' => 'Melaksanakan perintah dari Kepala Regu pasca Informasi kejadian kebakaran',
                'satuan_hasil' => 'Laporan dalam melaksanakan perintah dari Kepala Regu pasca Informasi kejadian kebakaran',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 8,
                'nama' => 'Melakukan koordinasi dengan tim atau dengan anggota tim lain',
                'satuan_hasil' => 'Laporan koordinasi dengan tim atau dengan anggota tim lain',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 9,
                'nama' => 'Memakai alat pelindung diri',
                'satuan_hasil' => 'Laporan alat pelindung diri',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 9,
                'nama' => 'Menempati posisi duduk sesuai dengan formasi unit',
                'satuan_hasil' => 'Laporan posisi duduk sesuai dengan formasi unit',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 9,
                'nama' => 'Melakukan koordinasi internal unit',
                'satuan_hasil' => 'Laporan koordinasi internal unit',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 10,
                'nama' => 'Mengeluarkan peralatan pemadaman kebakaran dari unit mobil',
                'satuan_hasil' => 'Laporan peralatan pemadaman kebakaran dari unit mobil',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 10,
                'nama' => 'Mengoperasikan peralatan pemadaman kebakaran',
                'satuan_hasil' => 'Laporan mengoperasikan peralatan pemadaman kebakaran',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 10,
                'nama' => 'Melaksanakan pemadaman kebakaran',
                'satuan_hasil' => 'Laporan pelaksanakan pemadaman kebakaran',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 11,
                'nama' => 'Melakukan penyiraman untuk pendinginan',
                'satuan_hasil' => 'Laporan penyiraman untuk pendinginan',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 11,
                'nama' => 'Melakukan penyisiran titik api yang tersisa',
                'satuan_hasil' => 'Laporan penyisiran titik api yang tersisa',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 11,
                'nama' => 'Melaporkan kepada kepala regu',
                'satuan_hasil' => 'Laporan kepada kepala regu',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 12,
                'nama' => 'Mengemas peralatan yang telah digunakan',
                'satuan_hasil' => 'Laporan pengemasan peralatan yang telah digunakan',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 12,
                'nama' => 'Mengecek kelengkapan peralatan',
                'satuan_hasil' => 'Laporan kelengkapan peralatan',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 12,
                'nama' => 'mengikuti apel pengecekan personil',
                'satuan_hasil' => 'Laporan apel pengecekan personil',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 13,
                'nama' => 'Membersihkan unit, APD dan peralatan',
                'satuan_hasil' => 'Laporan pembersihan unit, APD dan peralatan',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 13,
                'nama' => 'Menempatkan kembali peralatan yang telah digunakan',
                'satuan_hasil' => 'Laporan penempatan kembali peralatan yang telah digunakan',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 14,
                'nama' => 'Menerima informasi evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan informasi evakuasi dan penyelamatan',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 14,
                'nama' => 'Mencatat informasi evakuasi dan penyelamatan',
                'satuan_hasil' => 'Dokumen informasi evakuasi dan penyelamatan',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 15,
                'nama' => 'Melaporkan kejadian evakuasi dan penyelamatan kepada kepala regu',
                'satuan_hasil' => 'Laporan kejadian evakuasi dan penyelamatan kepada kepala regu',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 15,
                'nama' => 'Melaksanakan perintah dari Kepala Reguu',
                'satuan_hasil' => 'Laporan menerima perintah dari kepala regu',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 15,
                'nama' => 'Melakukan koordinasi dengan anggota Tim',
                'satuan_hasil' => 'Laporan koordinasi dengan anggota Tim',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 16,
                'nama' => 'menggunakan APD dan berangkat menuju TKP',
                'satuan_hasil' => 'Laporan menggunakan APD dan berangkat menuju TKP',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 16,
                'nama' => 'Melaksanakan Evakuasi dan Penyelamatan',
                'satuan_hasil' => 'Laporan Evakuasi dan Penyelamatan',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 17,
                'nama' => 'Menghimpun data evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan data evakuasi dan penyelamatan',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 17,
                'nama' => 'Menyusun laporan kejadian evakuasi dan penyelamatan',
                'satuan_hasil' => 'Menyusun laporan kejadian evakuasi dan penyelamatan',
                'score' => 0.002
            ],
            [
                'sub_unsur_id' => 17,
                'nama' => 'Mendokumentasikan dan melaporkan kejadian evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan kejadian evakuasi dan penyelamatan',
                'score' => 0.002
            ]
        ];
        ButirKegiatan::query()->upsert($damkarPemula, 'id');

        $terampil = [
            [
                'sub_unsur_id' => 18,
                'nama' => 'Mempersiapkan personil',
                'satuan_hasil' => 'Laporan kesiapan personil',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 18,
                'nama' => 'Mengkoordinir Apel Tingkat Regu',
                'satuan_hasil' => 'Laporan Apel Tingkat Regu',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 18,
                'nama' => 'Memeriksa kondisi volume air tangki unit',
                'satuan_hasil' => 'Laporan kondisi volume air tangki unit',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 18,
                'nama' => 'Melaksanakan pengecekan peralatan unit mobil',
                'satuan_hasil' => 'Laporan pengecekan peralatan unit mobil',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 18,
                'nama' => 'Memeriksa fungsi Pompa/ PTO, rem, level bahan bakar, Oli, Radiator, Accu, Minyak Kopling, tekanan angin roda',
                'satuan_hasil' => 'Laporan fungsi Pompa/ PTO, rem, level bahan bakar, Oli, Radiator, Accu,Minyak Kopling, tekanan angin roda',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 18,
                'nama' => 'Memanaskan mesin kendaraan',
                'satuan_hasil' => 'Laporan mesin kendaraan',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 18,
                'nama' => 'Memeriksa fungsi lampu rotary, sirine, dan lampu kendaraan',
                'satuan_hasil' => 'Memeriksa fungsi lampu rotary, sirine,dan lampu kendaraan',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 18,
                'nama' => 'Memeriksa fungsi alat komunikasi Rig dan HT',
                'satuan_hasil' => 'Memeriksa fungsi alat komunikasi Rig dan HT',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 18,
                'nama' => 'Melaksanakan serah terima unit mobil',
                'satuan_hasil' => 'Laporan serah terima unit mobil',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 18,
                'nama' => 'Membuat laporan sesuai dengan form check list',
                'satuan_hasil' => 'Dokumen sesuai dengan form check list',
                'score' => 0.004
            ],
        ];
        ButirKegiatan::query()->upsert($terampil, 'id');
    }
}
