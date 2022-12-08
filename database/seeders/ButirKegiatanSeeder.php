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
        // Bagian Butir Kegiatan Pokok dengan id 1 sampai dengan 270 adalah bagian dari tugas kegiatan pokok JABATAN FUNGSIONAL PEMADAM KEBAKARAN
        $damkarPemula = [
            // 1
            [
                'role_id' => 1,
                'sub_unsur_id' => 1,
                'nama' => 'Mempersiapkan kelengkapan pemadaman',
                'satuan_hasil' => 'Dokumen kelengkapan',
                'score' => 0.02
            ],
            // 2
            [
                'role_id' => 1,
                'sub_unsur_id' => 1,
                'nama' => 'Melaksanakan Apel Pagi',
                'satuan_hasil' => 'Laporan Apel Pagi',
                'score' => 0.02
            ],
            // 3
            [
                'role_id' => 1,
                'sub_unsur_id' => 1,
                'nama' => 'Melaksanakan serah terima tugas jaga',
                'satuan_hasil' => 'Laporan serah terima tugas jaga',
                'score' => 0.02
            ],
            // 4
            [
                'role_id' => 1,
                'sub_unsur_id' => 1,
                'nama' => 'Melaksanakan pemeriksaan jumlah peralatan operasional',
                'satuan_hasil' => 'Laporan pemeriksaan jumlah peralatan operasional',
                'score' => 0.02
            ],
            // 5
            [
                'role_id' => 1,
                'sub_unsur_id' => 1,
                'nama' => 'Melaksanakan pengecekan fungsi peralatan operasional',
                'satuan_hasil' => 'Laporan pengecekan fungsi peralatan operasional',
                'score' => 0.02
            ],
            // 6
            [
                'role_id' => 1,
                'sub_unsur_id' => 1,
                'nama' => 'Membuat laporan sesuai dengan form check list',
                'satuan_hasil' => 'Dokumen sesuai dengan form check list',
                'score' => 0.02
            ],
            // 7
            [
                'role_id' => 1,
                'sub_unsur_id' => 2,
                'nama' => 'Melaksanakan piket sesuai dengan consignus jaga (tata kelola)',
                'satuan_hasil' => 'Laporan piket sesuai dengan consignus jaga (tata kelola)',
                'score' => 0.02
            ],
            // 8
            [
                'role_id' => 1,
                'sub_unsur_id' => 2,
                'nama' => 'Melakukan Monitoring kejadian kebakaran dan penyelamatan',
                'satuan_hasil' => 'Laporan Monitoring kejadian kebakaran dan penyelamatan',
                'score' => 0.02
            ],
            // 9
            [
                'role_id' => 1,
                'sub_unsur_id' => 3,
                'nama' => 'Mempersiapkan kelengkapan operasional pemadaman dan penyelamatan',
                'satuan_hasil' => 'Laporan kelengkapan',
                'score' => 0.02
            ],
            // 10
            [
                'role_id' => 1,
                'sub_unsur_id' => 3,
                'nama' => 'Melaksanakan apel malam',
                'satuan_hasil' => 'Laporan apel malam',
                'score' => 0.02
            ],
            // 11
            [
                'role_id' => 1,
                'sub_unsur_id' => 3,
                'nama' => 'Melaksanakan pemeriksaan jumlah peralatan operasional',
                'satuan_hasil' => 'Laporan pemeriksaan jumlah peralatan operasional',
                'score' => 0.02
            ],
            // 12
            [
                'role_id' => 1,
                'sub_unsur_id' => 3,
                'nama' => 'Melaksanakan pengecekan fungsi peralatan operasional',
                'satuan_hasil' => 'Laporan pengecekan fungsi peralatan operasional',
                'score' => 0.02
            ],
            // 13
            [
                'role_id' => 1,
                'sub_unsur_id' => 3,
                'nama' => 'Membuat laporan sesuai dengan form check list',
                'satuan_hasil' => 'Dokumen sesuai dengan form check list',
                'score' => 0.02
            ],
            // 14
            [
                'role_id' => 1,
                'sub_unsur_id' => 4,
                'nama' => 'Mempersiapkan peralatan latihan',
                'satuan_hasil' => 'Laporan peralatan latihan ',
                'score' => 0.02
            ],
            // 15
            [
                'role_id' => 1,
                'sub_unsur_id' => 4,
                'nama' => 'Melakukan latihan penggunaan peralatan',
                'satuan_hasil' => 'Laporan latihan penggunaan peralatan',
                'score' => 0.02
            ],
            // 16
            [
                'role_id' => 1,
                'sub_unsur_id' => 4,
                'nama' => 'Merapikan kembali peralatan yang digunakan',
                'satuan_hasil' => 'Laporan kembali peralatan yang digunakan',
                'score' => 0.02
            ],
            // 17
            [
                'role_id' => 1,
                'sub_unsur_id' => 5,
                'nama' => 'Melaksanakan kegiatan pembinaan fisik',
                'satuan_hasil' => 'Laporan kegiatan pembinaan fisik',
                'score' => 0.02
            ],
            // 18
            [
                'role_id' => 1,
                'sub_unsur_id' => 6,
                'nama' => 'Melaksanakan korve di lingkungan kerja',
                'satuan_hasil' => 'Laporan korve di lingkungan kerja',
                'score' => 0.02
            ],
            // 19
            [
                'role_id' => 1,
                'sub_unsur_id' => 6,
                'nama' => 'Melaksanakan pembersihan unit mobil',
                'satuan_hasil' => 'Laporan pembersihan unit mobil',
                'score' => 0.02
            ],
            //20
            [
                'role_id' => 1,
                'sub_unsur_id' => 7,
                'nama' => 'Mencatat informasi kejadian kebakaran',
                'satuan_hasil' => 'Laporan informasi kejadian kebakaran',
                'score' => 0.02
            ],
            // 21
            [
                'role_id' => 1,
                'sub_unsur_id' => 7,
                'nama' => 'Melaporkan informasi kejadian kebakaran',
                'satuan_hasil' => 'Laporan informasi kejadian kebakaran',
                'score' => 0.02
            ],
            // 22
            [
                'role_id' => 1,
                'sub_unsur_id' => 8,
                'nama' => 'Menerima perintah dari Kepala Regu pasca Informasi kejadian kebakaran',
                'satuan_hasil' => 'Laporan saat diperintah oleh Kepala Regu pasca Informasi kejadian kebakaran',
                'score' => 0.02
            ],
            // 23
            [
                'role_id' => 1,
                'sub_unsur_id' => 8,
                'nama' => 'Melaksanakan perintah dari Kepala Regu pasca Informasi kejadian kebakaran',
                'satuan_hasil' => 'Laporan dalam melaksanakan perintah dari Kepala Regu pasca Informasi kejadian kebakaran',
                'score' => 0.02
            ],
            // 24
            [
                'role_id' => 1,
                'sub_unsur_id' => 8,
                'nama' => 'Melakukan koordinasi dengan tim atau dengan anggota tim lain',
                'satuan_hasil' => 'Laporan koordinasi dengan tim atau dengan anggota tim lain',
                'score' => 0.02
            ],
            // 25
            [
                'role_id' => 1,
                'sub_unsur_id' => 9,
                'nama' => 'Memakai alat pelindung diri',
                'satuan_hasil' => 'Laporan alat pelindung diri',
                'score' => 0.02
            ],
            // 26
            [
                'role_id' => 1,
                'sub_unsur_id' => 9,
                'nama' => 'Menempati posisi duduk sesuai dengan formasi unit',
                'satuan_hasil' => 'Laporan posisi duduk sesuai dengan formasi unit',
                'score' => 0.02
            ],
            // 27
            [
                'role_id' => 1,
                'sub_unsur_id' => 9,
                'nama' => 'Melakukan koordinasi internal unit',
                'satuan_hasil' => 'Laporan koordinasi internal unit',
                'score' => 0.02
            ],
            // 28
            [
                'role_id' => 1,
                'sub_unsur_id' => 10,
                'nama' => 'Mengeluarkan peralatan pemadaman kebakaran dari unit mobil',
                'satuan_hasil' => 'Laporan peralatan pemadaman kebakaran dari unit mobil',
                'score' => 0.02
            ],
            // 29
            [
                'role_id' => 1,
                'sub_unsur_id' => 10,
                'nama' => 'Mengoperasikan peralatan pemadaman kebakaran',
                'satuan_hasil' => 'Laporan mengoperasikan peralatan pemadaman kebakaran',
                'score' => 0.006
            ],
            // 30
            [
                'role_id' => 1,
                'sub_unsur_id' => 10,
                'nama' => 'Melaksanakan pemadaman kebakaran',
                'satuan_hasil' => 'Laporan pelaksanakan pemadaman kebakaran',
                'score' => 0.006
            ],
            // 31
            [
                'role_id' => 1,
                'sub_unsur_id' => 11,
                'nama' => 'Melakukan penyiraman untuk pendinginan',
                'satuan_hasil' => 'Laporan penyiraman untuk pendinginan',
                'score' => 0.02
            ],
            // 32
            [
                'role_id' => 1,
                'sub_unsur_id' => 11,
                'nama' => 'Melakukan penyisiran titik api yang tersisa',
                'satuan_hasil' => 'Laporan penyisiran titik api yang tersisa',
                'score' => 0.02
            ],
            // 33
            [
                'role_id' => 1,
                'sub_unsur_id' => 11,
                'nama' => 'Melaporkan kepada kepala regu',
                'satuan_hasil' => 'Laporan kepada kepala regu',
                'score' => 0.02
            ],
            // 34
            [
                'role_id' => 1,
                'sub_unsur_id' => 12,
                'nama' => 'Mengemas peralatan yang telah digunakan',
                'satuan_hasil' => 'Laporan pengemasan peralatan yang telah digunakan',
                'score' => 0.02
            ],
            // 35
            [
                'role_id' => 1,
                'sub_unsur_id' => 12,
                'nama' => 'Mengecek kelengkapan peralatan',
                'satuan_hasil' => 'Laporan kelengkapan peralatan',
                'score' => 0.02
            ],
            // 36
            [
                'role_id' => 1,
                'sub_unsur_id' => 12,
                'nama' => 'mengikuti apel pengecekan personil',
                'satuan_hasil' => 'Laporan apel pengecekan personil',
                'score' => 0.02
            ],
            // 37
            [
                'role_id' => 1,
                'sub_unsur_id' => 13,
                'nama' => 'Membersihkan unit, APD dan peralatan',
                'satuan_hasil' => 'Laporan pembersihan unit, APD dan peralatan',
                'score' => 0.02
            ],
            // 38
            [
                'role_id' => 1,
                'sub_unsur_id' => 13,
                'nama' => 'Menempatkan kembali peralatan yang telah digunakan',
                'satuan_hasil' => 'Laporan penempatan kembali peralatan yang telah digunakan',
                'score' => 0.02
            ],
            // 39
            [
                'role_id' => 1,
                'sub_unsur_id' => 14,
                'nama' => 'Menerima informasi evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan informasi evakuasi dan penyelamatan',
                'score' => 0.02
            ],
            // 40
            [
                'role_id' => 1,
                'sub_unsur_id' => 14,
                'nama' => 'Mencatat informasi evakuasi dan penyelamatan',
                'satuan_hasil' => 'Dokumen informasi evakuasi dan penyelamatan',
                'score' => 0.02
            ],
            // 41
            [
                'role_id' => 1,
                'sub_unsur_id' => 15,
                'nama' => 'Melaporkan kejadian evakuasi dan penyelamatan kepada kepala regu',
                'satuan_hasil' => 'Laporan kejadian evakuasi dan penyelamatan kepada kepala regu',
                'score' => 0.02
            ],
            // 42
            [
                'role_id' => 1,
                'sub_unsur_id' => 15,
                'nama' => 'Melaksanakan perintah dari Kepala Reguu',
                'satuan_hasil' => 'Laporan menerima perintah dari kepala regu',
                'score' => 0.02
            ],
            // 43
            [
                'role_id' => 1,
                'sub_unsur_id' => 15,
                'nama' => 'Melakukan koordinasi dengan anggota Tim',
                'satuan_hasil' => 'Laporan koordinasi dengan anggota Tim',
                'score' => 0.02
            ],
            // 44
            [
                'role_id' => 1,
                'sub_unsur_id' => 16,
                'nama' => 'menggunakan APD dan berangkat menuju TKP',
                'satuan_hasil' => 'Laporan menggunakan APD dan berangkat menuju TKP',
                'score' => 0.02
            ],
            // 45
            [
                'role_id' => 1,
                'sub_unsur_id' => 16,
                'nama' => 'Melaksanakan Evakuasi dan Penyelamatan',
                'satuan_hasil' => 'Laporan Evakuasi dan Penyelamatan',
                'score' => 0.02
            ],
            // 46
            [
                'role_id' => 1,
                'sub_unsur_id' => 17,
                'nama' => 'Menghimpun data evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan data evakuasi dan penyelamatan',
                'score' => 0.02
            ],
            // 47
            [
                'role_id' => 1,
                'sub_unsur_id' => 17,
                'nama' => 'Menyusun laporan kejadian evakuasi dan penyelamatan',
                'satuan_hasil' => 'Menyusun laporan kejadian evakuasi dan penyelamatan',
                'score' => 0.02
            ],
            // 48
            [
                'role_id' => 1,
                'sub_unsur_id' => 17,
                'nama' => 'Mendokumentasikan dan melaporkan kejadian evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan kejadian evakuasi dan penyelamatan',
                'score' => 0.02
            ]
        ];
        ButirKegiatan::query()->upsert($damkarPemula, 'id');



        $terampil = [
            // 49
            [
                'role_id' => 2,
                'sub_unsur_id' => 18,
                'nama' => 'Mempersiapkan personil',
                'satuan_hasil' => 'Laporan kesiapan personil',
                'score' => 0.04
            ],
            // 50
            [
                'role_id' => 2,
                'sub_unsur_id' => 18,
                'nama' => 'Mengkoordinir Apel Tingkat Regu',
                'satuan_hasil' => 'Laporan Apel Tingkat Regu',
                'score' => 0.04
            ],
            // 51
            [
                'role_id' => 2,
                'sub_unsur_id' => 18,
                'nama' => 'Memeriksa kondisi volume air tangki unit',
                'satuan_hasil' => 'Laporan kondisi volume air tangki unit',
                'score' => 0.04
            ],
            // 52
            [
                'role_id' => 2,
                'sub_unsur_id' => 18,
                'nama' => 'Melaksanakan pengecekan peralatan unit mobil',
                'satuan_hasil' => 'Laporan pengecekan peralatan unit mobil',
                'score' => 0.04
            ],
            // 53
            [
                'role_id' => 2,
                'sub_unsur_id' => 18,
                'nama' => 'Memeriksa fungsi Pompa/ PTO, rem, level bahan bakar, Oli, Radiator, Accu, Minyak Kopling, tekanan angin roda',
                'satuan_hasil' => 'Laporan fungsi Pompa/ PTO, rem, level bahan bakar, Oli, Radiator, Accu,Minyak Kopling, tekanan angin roda',
                'score' => 0.04
            ],
            // 54
            [
                'role_id' => 2,
                'sub_unsur_id' => 18,
                'nama' => 'Memanaskan mesin kendaraan',
                'satuan_hasil' => 'Laporan mesin kendaraan',
                'score' => 0.04
            ],
            // 55
            [
                'role_id' => 2,
                'sub_unsur_id' => 18,
                'nama' => 'Memeriksa fungsi lampu rotary, sirine, dan lampu kendaraan',
                'satuan_hasil' => 'Memeriksa fungsi lampu rotary, sirine,dan lampu kendaraan',
                'score' => 0.04
            ],
            // 56
            [
                'role_id' => 2,
                'sub_unsur_id' => 18,
                'nama' => 'Memeriksa fungsi alat komunikasi Rig dan HT',
                'satuan_hasil' => 'Memeriksa fungsi alat komunikasi Rig dan HT',
                'score' => 0.04
            ],
            // 57
            [
                'role_id' => 2,
                'sub_unsur_id' => 18,
                'nama' => 'Melaksanakan serah terima unit mobil',
                'satuan_hasil' => 'Laporan serah terima unit mobil',
                'score' => 0.04
            ],
            // 58
            [
                'role_id' => 2,
                'sub_unsur_id' => 18,
                'nama' => 'Membuat laporan sesuai dengan form check list',
                'satuan_hasil' => 'Dokumen sesuai dengan form check list',
                'score' => 0.04
            ],
            // 59
            [
                'role_id' => 2,
                'sub_unsur_id' => 19,
                'nama' => 'Melaksanakan piket sesuai dengan consignus jaga (tata kelola)',
                'satuan_hasil' => 'Laporan piket sesuai dengan consignus jaga (tata kelola)',
                'score' => 0.04
            ],
            // 60
            [
                'role_id' => 2,
                'sub_unsur_id' => 19,
                'nama' => 'Melakukan Monitoring kejadian kebakaran dan penyelamatan',
                'satuan_hasil' => 'Laporan kejadian kebakaran dan penyelamatan',
                'score' => 0.008
            ],
            // 61
            [
                'role_id' => 2,
                'sub_unsur_id' => 20,
                'nama' => 'Mempersiapkan kelengkapan unit mobil',
                'satuan_hasil' => 'Laporan kelengkapan unit mobil',
                'score' => 0.04
            ],
            // 62
            [
                'role_id' => 2,
                'sub_unsur_id' => 20,
                'nama' => 'Melaksanakan apel malam',
                'satuan_hasil' => 'Laporan apel malam',
                'score' => 0.04
            ],
            // 63
            [
                'role_id' => 2,
                'sub_unsur_id' => 20,
                'nama' => 'Melaksanakan pengecekan fungsi peralatan unit mobil',
                'satuan_hasil' => 'Laporan pengecekan fungsi peralatan unit mobil',
                'score' => 0.04
            ],
            // 64
            [
                'role_id' => 2,
                'sub_unsur_id' => 20,
                'nama' => 'Memanaskan mesin unit mobil',
                'satuan_hasil' => 'Laporan mesin unit mobil',
                'score' => 0.04
            ],
            // 65
            [
                'role_id' => 2,
                'sub_unsur_id' => 20,
                'nama' => 'Memeriksa fungsi lampu rotary, sirine, dan lampu kendaraan',
                'satuan_hasil' => 'Laporan fungsi lampu rotary, sirine, dan lampu kendaraan',
                'score' => 0.04
            ],
            // 66
            [
                'role_id' => 2,
                'sub_unsur_id' => 20,
                'nama' => 'Memeriksa fungsi alat komunikasi Rig dan HT',
                'satuan_hasil' => 'Laporan fungsi alat komunikasi Rig dan HT',
                'score' => 0.04
            ],
            // 67
            [
                'role_id' => 2,
                'sub_unsur_id' => 20,
                'nama' => 'Memeriksa kondisi volume air tangki unit mobil',
                'satuan_hasil' => 'Laporan kondisi volume air tangki unit mobil',
                'score' => 0.04
            ],
            // 68
            [
                'role_id' => 2,
                'sub_unsur_id' => 20,
                'nama' => 'Membuat laporan sesuai dengan form check list.',
                'satuan_hasil' => 'Dokumen sesuai dengan form check list.',
                'score' => 0.04
            ],
            // 69
            [
                'role_id' => 2,
                'sub_unsur_id' => 21,
                'nama' => 'Mempersiapkan peralatan latihan',
                'satuan_hasil' => 'Laporan peralatan latihan',
                'score' => 0.04
            ],
            // 70
            [
                'role_id' => 2,
                'sub_unsur_id' => 21,
                'nama' => 'Melakukan latihan penggunaan peralatan khusus',
                'satuan_hasil' => 'Laporan latihan penggunaan peralatan khusus',
                'score' => 0.04
            ],
            // 71
            [
                'role_id' => 2,
                'sub_unsur_id' => 21,
                'nama' => 'Merapikan kembali peralatan yang',
                'satuan_hasil' => 'Laporan peralatan yang digunakan',
                'score' => 0.04
            ],
            // 72
            [
                'role_id' => 2,
                'sub_unsur_id' => 22,
                'nama' => 'Melaksanakan kegiatan pembinaan fisik',
                'satuan_hasil' => 'Laporan kegiatan pembinaan fisik',
                'score' => 0.04
            ],
            // 73
            [
                'role_id' => 2,
                'sub_unsur_id' => 23,
                'nama' => 'Melaksanakan korve di lingkungan kerja',
                'satuan_hasil' => 'Laporan korve di lingkungan kerja',
                'score' => 0.04
            ],
            // 74
            [
                'role_id' => 2,
                'sub_unsur_id' => 23,
                'nama' => 'Melaksanakan kebersihan unit',
                'satuan_hasil' => 'Laporan kebersihan unit',
                'score' => 0.04
            ],
            // 75
            [
                'role_id' => 2,
                'sub_unsur_id' => 24,
                'nama' => 'Mencatat kondisi sistem pengendalian komunikasi penanggulangan kebakaran',
                'satuan_hasil' => 'Dokumen kondisi sistem pengendalian komunikasi penanggulangan kebakaran',
                'score' => 0.04
            ],
            // 76
            [
                'role_id' => 2,
                'sub_unsur_id' => 25,
                'nama' => 'Menyiapkan kelengkapan Poskotis (Pos Komando Taktis) penanggulangan kebakaran',
                'satuan_hasil' => 'Laporan kelengkapan Poskotis (Pos Komando Taktis) penanggulangan kebakaran',
                'score' => 0.04
            ],
            // 77
            [
                'role_id' => 2,
                'sub_unsur_id' => 25,
                'nama' => 'Mengumpulkan data untuk kebutuhan poskotis penanggulangan kebakaran',
                'satuan_hasil' => 'Dokumen data untuk kebutuhan poskotis penanggulangan kebakaran',
                'score' => 0.04
            ],
            // 78
            [
                'role_id' => 2,
                'sub_unsur_id' => 25,
                'nama' => 'Melaporkan data dan informasi penanggulangan kebakaran',
                'satuan_hasil' => 'Dokumen data dan informasi penanggulangan kebakaran',
                'score' => 0.04
            ],
            // 79
            [
                'role_id' => 2,
                'sub_unsur_id' => 26,
                'nama' => 'Melaksanakan inventarisasi sarana prasarana komunikasi penanggulangan kebakaran',
                'satuan_hasil' => 'Laporan inventarisasi sarana prasarana komunikasi penanggulangan kebakaran',
                'score' => 0.04
            ],
            // 80
            [
                'role_id' => 2,
                'sub_unsur_id' => 26,
                'nama' => 'Melaksanakan pengecekan sarana prasarana komunikasi penanggulangan kebakaran',
                'satuan_hasil' => 'Laporan pengecekan sarana prasarana komunikasi penanggulangan kebakaran',
                'score' => 0.04
            ],
            // 81
            [
                'role_id' => 2,
                'sub_unsur_id' => 26,
                'nama' => 'Melakukan pemeliharaan peralatan komunikasi penanggulangan kebakaran',
                'satuan_hasil' => 'Laporan pemeliharaan peralatan komunikasi penanggulangan kebakaran',
                'score' => 0.04
            ],
            // 82
            [
                'role_id' => 2,
                'sub_unsur_id' => 26,
                'nama' => 'Memakai alat pelindung diri pengemudi',
                'satuan_hasil' => 'Laporan alat pelindung diri pengemudi',
                'score' => 0.04
            ],
            // 83
            [
                'role_id' => 2,
                'sub_unsur_id' => 27,
                'nama' => 'Menyiapkan peralatan komunikasi pengemudi',
                'satuan_hasil' => 'Laporan peralatan komunikasi pengemudi',
                'score' => 0.04
            ],
            // 84
            [
                'role_id' => 2,
                'sub_unsur_id' => 27,
                'nama' => 'Mengemudikan Mobil Pemadam Kebakaran menuju TKP',
                'satuan_hasil' => 'Laporan Mobil Pemadam Kebakaran menuju TKP',
                'score' => 0.04
            ],
            // 85
            [
                'role_id' => 2,
                'sub_unsur_id' => 27,
                'nama' => 'Mengatur posisi Unit Mobil Pemadam Kebakaran di TKP',
                'satuan_hasil' => 'Laporan posisi Unit Mobil Pemadam Kebakaran di TKP',
                'score' => 0.04
            ],
            // 86
            [
                'role_id' => 2,
                'sub_unsur_id' => 27,
                'nama' => 'Melakukan koordinasi internal unit',
                'satuan_hasil' => 'Laporan koordinasi internal unit',
                'score' => 0.04
            ],
            // 87
            [
                'role_id' => 2,
                'sub_unsur_id' => 28,
                'nama' => 'Mempersiapkan sistem pompa/PTO unit',
                'satuan_hasil' => 'Laporan sistem pompa/PTO unit ',
                'score' => 0.04
            ],
            // 88
            [
                'role_id' => 2,
                'sub_unsur_id' => 28,
                'nama' => 'Mengoperasikan pompa / PTO unit',
                'satuan_hasil' => 'Laporan pompa / PTO unit',
                'score' => 0.04
            ],
            // 89
            [
                'role_id' => 2,
                'sub_unsur_id' => 28,
                'nama' => 'Menyambung kopling selang ke kopling unit',
                'satuan_hasil' => 'Laporan kopling selang ke kopling unit ',
                'score' => 0.04
            ],
            // 90
            [
                'role_id' => 2,
                'sub_unsur_id' => 28,
                'nama' => 'Melayani kebutuhan air dan tekanan pompa yang diperlukan',
                'satuan_hasil' => 'Laporan kebutuhan air dan tekanan pompa yang diperlukan',
                'score' => 0.04
            ],
            // 91
            [
                'role_id' => 2,
                'sub_unsur_id' => 28,
                'nama' => 'Melaksanakan pengisian tangki air',
                'satuan_hasil' => 'Laporan pengisian tangki air',
                'score' => 0.04
            ],
            // 92
            [
                'role_id' => 2,
                'sub_unsur_id' => 28,
                'nama' => 'Melaksanakan suplai air',
                'satuan_hasil' => 'Laporan suplai air',
                'score' => 0.04
            ],
            // 93
            [
                'role_id' => 2,
                'sub_unsur_id' => 29,
                'nama' => 'Mengemas peralatan yang digunakan',
                'satuan_hasil' => 'Laporan peralatan yang digunakan',
                'score' => 0.04
            ],
            // 94
            [
                'role_id' => 2,
                'sub_unsur_id' => 29,
                'nama' => 'Mengecek kelengkapan peralatan',
                'satuan_hasil' => 'Laporan kelengkapan peralatan',
                'score' => 0.04
            ],
            // 95
            [
                'role_id' => 2,
                'sub_unsur_id' => 29,
                'nama' => 'Mengikuti apel pengecekan personil',
                'satuan_hasil' => 'Laporan apel pengecekan personil',
                'score' => 0.04
            ],
            // 96
            [
                'role_id' => 2,
                'sub_unsur_id' => 29,
                'nama' => 'Melakukan pengisian tangki air unit',
                'satuan_hasil' => 'Laporan pengisian tangki air unit',
                'score' => 0.04
            ],
            // 97
            [
                'role_id' => 2,
                'sub_unsur_id' => 29,
                'nama' => 'Mengemudikan unit menuju pos pemadam kebakaran',
                'satuan_hasil' => 'Laporan unit menuju pos pemadam kebakaran',
                'score' => 0.04
            ],
            // 98
            [
                'role_id' => 2,
                'sub_unsur_id' => 30,
                'nama' => 'Membersihkan unit, APD dan peralatan',
                'satuan_hasil' => 'Laporan unit, APD dan peralatan',
                'score' => 0.04
            ],
            // 99
            [
                'role_id' => 2,
                'sub_unsur_id' => 30,
                'nama' => 'Menguras dan mengisi tangki air mobil pemadam kebakaran',
                'satuan_hasil' => 'Laporan tangki air mobil pemadam kebakaran',
                'score' => 0.04
            ],
            // 100
            [
                'role_id' => 2,
                'sub_unsur_id' => 30,
                'nama' => 'Memeriksa kondisi mobil pemadam kebakaran',
                'satuan_hasil' => 'Laporan kondisi mobil pemadam kebakaran',
                'score' => 0.04
            ],
            // 101
            [
                'role_id' => 2,
                'sub_unsur_id' => 30,
                'nama' => 'Menempatkan kembali mobil pemada kebakaran pada posisi yang telah ditentukan',
                'satuan_hasil' => 'Laporan mobil pemadam kebakaran pada posisi yang telah ditentukan',
                'score' => 0.04
            ],
            // 102
            [
                'role_id' => 2,
                'sub_unsur_id' => 31,
                'nama' => 'mencatat data informasi kejadian evakuasi dan penyelamatan',
                'satuan_hasil' => 'Dokumen data informasi kejadian evakuasi dan penyelamatan',
                'score' => 0.04
            ],
            // 103
            [
                'role_id' => 2,
                'sub_unsur_id' => 32,
                'nama' => 'Membuat poskotis evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan poskotis evakuasi dan penyelamatan',
                'score' => 0.04
            ],
            // 104
            [
                'role_id' => 2,
                'sub_unsur_id' => 32,
                'nama' => 'Mengumpulkan dan mengolah data untuk kebutuhan poskotis evakuasi dan penyelamatan',
                'satuan_hasil' => 'Dokumen data untuk kebutuhan poskotis evakuasi dan penyelamatan',
                'score' => 0.04
            ],
            // 105
            [
                'role_id' => 2,
                'sub_unsur_id' => 32,
                'nama' => 'Melaporkan data dan informasi evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan data dan informasi evakuasi dan penyelamatan',
                'score' => 0.04
            ],
            // 106
            [
                'role_id' => 2,
                'sub_unsur_id' => 33,
                'nama' => 'Melaksanakan inventarisasi sarana prasarana komunikasi evakuasi dan penyelamatan',
                'satuan_hasil' => 'Dokumen inventarisasi sarana prasarana komunikasi evakuasi dan penyelamatan',
                'score' => 0.04
            ],
            // 107
            [
                'role_id' => 2,
                'sub_unsur_id' => 33,
                'nama' => 'Melaksanakan pengecekan sarana prasarana komunikasi evakuasi dan penyelamatan',
                'satuan_hasil' => 'Dokumen pengecekan sarana prasarana komunikasi evakuasi dan penyelamatan',
                'score' => 0.04
            ],
            // 108
            [
                'role_id' => 2,
                'sub_unsur_id' => 33,
                'nama' => 'Melakukan pemeliharaan peralatan komunikasi evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan pemeliharaan peralatan komunikasi evakuasi dan penyelamatan',
                'score' => 0.04
            ],
            // 109
            [
                'role_id' => 2,
                'sub_unsur_id' => 34,
                'nama' => 'Memakai alat pelindung diri pengemudi',
                'satuan_hasil' => 'Laporan alat pelindung diri pengemudi',
                'score' => 0.04
            ],
            // 110
            [
                'role_id' => 2,
                'sub_unsur_id' => 34,
                'nama' => 'Menyiapkan peralatan komunikasi pengemudi',
                'satuan_hasil' => 'Laporan peralatan komunikasi pengemudi',
                'score' => 0.04
            ],
            // 111
            [
                'role_id' => 2,
                'sub_unsur_id' => 34,
                'nama' => 'Mengemudikan Unit Evakuasi dan Penyelamatan menuju TKP',
                'satuan_hasil' => 'Laporan Unit Evakuasi dan Penyelamatan menuju TKP',
                'score' => 0.04
            ],
            // 112
            [
                'role_id' => 2,
                'sub_unsur_id' => 34,
                'nama' => 'Mengatur posisi Unit Evakuasi dan Penyelamatan di TKP',
                'satuan_hasil' => 'Laporan posisi Unit Evakuasi dan Penyelamatan di TKP',
                'score' => 0.04
            ],
            // 113
            [
                'role_id' => 2,
                'sub_unsur_id' => 34,
                'nama' => 'Melakukan koordinasi internal unit Evakuasi dan Penyelamatan',
                'satuan_hasil' => 'Laporan koordinasi internal unit Evakuasi dan Penyelamatan',
                'score' => 0.04
            ],
            // 114
            [
                'role_id' => 2,
                'sub_unsur_id' => 35,
                'nama' => 'Mempersiapkan peralatan Evakuasi dan Penyelamatan',
                'satuan_hasil' => 'Laporan peralatan Evakuasi dan Penyelamatan',
                'score' => 0.04
            ],
            // 115
            [
                'role_id' => 2,
                'sub_unsur_id' => 35,
                'nama' => 'Menentukan peralatan Evakuasi dan Penyelamatan yang akan digunakan',
                'satuan_hasil' => 'Laporan peralatan Evakuasi dan Penyelamatan yang akan digunakan',
                'score' => 0.04
            ],
            // 116
            [
                'role_id' => 2,
                'sub_unsur_id' => 35,
                'nama' => 'Mengoperasikan peralatan Evakuasi dan Penyelamatan',
                'satuan_hasil' => 'Laporan peralatan Evakuasi dan Penyelamatan',
                'score' => 0.04
            ],
            // 117
            [
                'role_id' => 2,
                'sub_unsur_id' => 35,
                'nama' => 'Mengevakuasi dan Penyelamatan korban',
                'satuan_hasil' => 'Laporan evakuasi dan Penyelamatan korban',
                'score' => 0.04
            ],
            // 118
            [
                'role_id' => 2,
                'sub_unsur_id' => 36,
                'nama' => 'Mengemas peralatan Evakuasi dan Penyelamatan yang digunakan',
                'satuan_hasil' => 'Laporan peralatan Evakuasi dan Penyelamatan yang digunakan',
                'score' => 0.04
            ],
            // 119
            [
                'role_id' => 2,
                'sub_unsur_id' => 36,
                'nama' => 'Mengecek kelengkapan peralatan Evakuasi dan Penyelamatan',
                'satuan_hasil' => 'Laporan kelengkapan peralatan Evakuasi dan Penyelamatan',
                'score' => 0.04
            ],
            // 120
            [
                'role_id' => 2,
                'sub_unsur_id' => 36,
                'nama' => 'Mengembalikan Peralatan Evakuasi dan Penyelamatan pada unit yang telah ditentukan',
                'satuan_hasil' => 'Laporan Peralatan Evakuasi dan Penyelamatan pada unit yang telah ditentukan',
                'score' => 0.04
            ],
            // 121
            [
                'role_id' => 2,
                'sub_unsur_id' => 36,
                'nama' => 'Mengikuti apel pengecekan personil dalam operasi Evakuasi dan Penyelamatan',
                'satuan_hasil' => 'Laporan apel pengecekan personil dalam operasi Evakuasi dan Penyelamatan',
                'score' => 0.04
            ],
            // 122
            [
                'role_id' => 2,
                'sub_unsur_id' => 37,
                'nama' => 'Mengemudikan unit menuju pos pemadam kebakaran dan penyelamatan',
                'satuan_hasil' => 'Laporan unit menuju pos pemadam kebakaran dan penyelamatan',
                'score' => 0.04
            ],
            // 123
            [
                'role_id' => 2,
                'sub_unsur_id' => 37,
                'nama' => 'Membersihkan unit, APD dan peralatan evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan unit, APD dan peralatan evakuasi dan penyelamatan',
                'score' => 0.04
            ],
            // 124
            [
                'role_id' => 2,
                'sub_unsur_id' => 37,
                'nama' => 'Mengembalikan unit mobil evakuasi dan penyelamatan pada posisi yang telah ditentukan',
                'satuan_hasil' => 'Laporan unit mobil evakuasi dan penyelamatan pada posisi yang telah ditentukan',
                'score' => 0.04
            ],
        ];
        ButirKegiatan::query()->upsert($terampil, 'id');

        $mahir = [
            // 125
            [
                'role_id' => 3,
                'sub_unsur_id' => 38,
                'nama' => 'Melakukan verifikasi kelengkapan',
                'satuan_hasil' => 'Laporan verifikasi kelengkapan',
                'score' => 0.001
            ],
            // 126
            [
                'role_id' => 3,
                'sub_unsur_id' => 38,
                'nama' => 'Memimpin Apel Pagi',
                'satuan_hasil' => 'Laporan Apel Pagi',
                'score' => 0.001
            ],
            // 127
            [
                'role_id' => 3,
                'sub_unsur_id' => 38,
                'nama' => 'Memimpin serah terima tugas jaga',
                'satuan_hasil' => 'Laporan serah terima tugas jaga',
                'score' => 0.001
            ],
            // 128
            [
                'role_id' => 3,
                'sub_unsur_id' => 38,
                'nama' => 'Memimpin pemeriksaan jumlah peralatan operasional',
                'satuan_hasil' => 'Laporan pemeriksaan jumlah peralatan operasional',
                'score' => 0.001
            ],
            // 129
            [
                'role_id' => 3,
                'sub_unsur_id' => 38,
                'nama' => 'Memimpin pengecekan fungsi peralatan operasional',
                'satuan_hasil' => 'Laporan pengecekan fungsi peralatan operasional',
                'score' => 0.001
            ],
            // 130
            [
                'role_id' => 3,
                'sub_unsur_id' => 38,
                'nama' => 'Memeriksa laporan sesuai dengan form check list',
                'satuan_hasil' => 'Dokumen sesuai dengan form check list',
                'score' => 0.001
            ],
            // 131
            [
                'role_id' => 3,
                'sub_unsur_id' => 38,
                'nama' => 'Melakukan verifikasi fungsi alat komunikasi Rig dan HT',
                'satuan_hasil' => 'Dokumen verifikasi fungsi alat komunikasi Rig dan HT',
                'score' => 0.001
            ],
            // 132
            [
                'role_id' => 3,
                'sub_unsur_id' => 39,
                'nama' => 'Melakukan verifikasi kondisi volume air tangki unit mobil',
                'satuan_hasil' => 'Dokumen verifikasi kondisi volume air tangki unit mobil',
                'score' => 0.001
            ],
            // 133
            [
                'role_id' => 3,
                'sub_unsur_id' => 39,
                'nama' => 'Memvalidasi laporan sesuai dengan form check list',
                'satuan_hasil' => 'Dokumen validasi sesuai dengan form check list',
                'score' => 0.001
            ],
            // 134
            [
                'role_id' => 3,
                'sub_unsur_id' => 40,
                'nama' => 'Melakukan verifikasi kelengkapan personil dalam regu',
                'satuan_hasil' => 'Laporan verifikasi kelengkapan personil dalam regu',
                'score' => 0.001
            ],
            // 135
            [
                'role_id' => 3,
                'sub_unsur_id' => 40,
                'nama' => 'Mengatur anggota regu pada pelaksanaan apel malam',
                'satuan_hasil' => 'Laporan pelaksanaan apel malam',
                'score' => 0.001
            ],
            // 136
            [
                'role_id' => 3,
                'sub_unsur_id' => 40,
                'nama' => 'Mengatur anggota regu pada pemeriksaan peralatan unit mobil',
                'satuan_hasil' => 'Laporan pelaksanaan apel malam',
                'score' => 0.001
            ],
            // 137
            [
                'role_id' => 3,
                'sub_unsur_id' => 40,
                'nama' => 'Mengatur anggota regu pada pengecekan peralatan unit mobil',
                'satuan_hasil' => 'Laporan pengecekan peralatan unit mobil',
                'score' => 0.001
            ],
            // 138
            [
                'role_id' => 3,
                'sub_unsur_id' => 40,
                'nama' => 'Mengatur anggota regu pada pemeriksaan kondisi unit',
                'satuan_hasil' => 'Laporan pemeriksaan kondisi unit',
                'score' => 0.001
            ],
            // 139
            [
                'role_id' => 3,
                'sub_unsur_id' => 41,
                'nama' => 'Mengatur anggota regu pada Memimpin persiapan peralatan latihan',
                'satuan_hasil' => 'Laporan persiapan peralatan latihan',
                'score' => 0.001
            ],
            // 140
            [
                'role_id' => 3,
                'sub_unsur_id' => 41,
                'nama' => 'Mengatur anggota regu pada latihan penggunaan peralatan',
                'satuan_hasil' => 'Laporan latihan penggunaan peralatan',
                'score' => 0.001
            ],
            // 141
            [
                'role_id' => 3,
                'sub_unsur_id' => 41,
                'nama' => 'Mengatur anggota regu pada proses pengemasan peralatan yang telah digunakan',
                'satuan_hasil' => 'Laporan proses pengemasan peralatan yang telah digunakan',
                'score' => 0.001
            ],
            // 142
            [
                'role_id' => 3,
                'sub_unsur_id' => 42,
                'nama' => 'Mengatur anggota regu pada kegiatan',
                'satuan_hasil' => 'Laporan kegiatan pembinaan fisik',
                'score' => 0.001
            ],
            // 143
            [
                'role_id' => 3,
                'sub_unsur_id' => 43,
                'nama' => 'Mengatur anggota regu pada korve di lingkungan kerja',
                'satuan_hasil' => 'Laporan korve di lingkungan kerja',
                'score' => 0.001
            ],
            // 144
            [
                'role_id' => 3,
                'sub_unsur_id' => 43,
                'nama' => 'Mengatur anggota regu pada kebersihan unit',
                'satuan_hasil' => 'Laporan kebersihan unit',
                'score' => 0.001
            ],
            // 145
            [
                'role_id' => 3,
                'sub_unsur_id' => 44,
                'nama' => 'Melakukan validasi informasi kejadian kebakaran',
                'satuan_hasil' => 'Laporan validasi informasi kejadian kebakaran',
                'score' => 0.001
            ],
            // 146
            [
                'role_id' => 3,
                'sub_unsur_id' => 44,
                'nama' => 'Menginformasikan kejadian kebakaran',
                'satuan_hasil' => 'Laporan informasi kejadian kebakaran',
                'score' => 0.001
            ],
            // 147
            [
                'role_id' => 3,
                'sub_unsur_id' => 45,
                'nama' => 'Melaporkan tindak lanjut informasi kejadian kebakaran',
                'satuan_hasil' => 'Laporan tindak lanjut informasi kejadian kebakaran',
                'score' => 0.001
            ],
            // 148
            [
                'role_id' => 3,
                'sub_unsur_id' => 45,
                'nama' => 'Melakukan koordinasi dengan regu lainnya',
                'satuan_hasil' => 'Laporan koordinasi dengan regu lainnya',
                'score' => 0.001
            ],
            // 149
            [
                'role_id' => 3,
                'sub_unsur_id' => 45,
                'nama' => 'Melakukan Koordinasi dengan instansi lainnya',
                'satuan_hasil' => 'Laporan Koordinasi dengan instansi lainnya',
                'score' => 0.001
            ],
            // 150
            [
                'role_id' => 3,
                'sub_unsur_id' => 46,
                'nama' => 'Memakai alat pelindung diri dan mengawasi pemakaian APD',
                'satuan_hasil' => 'Laporan alat pelindung diri dan mengawasi pemakaian APD',
                'score' => 0.001
            ],
            // 151
            [
                'role_id' => 3,
                'sub_unsur_id' => 46,
                'nama' => 'Mengatur anggota regu pada penempatanposisi duduk anggota regu sesuai dengan formasi unit',
                'satuan_hasil' => 'Laporan penempatan posisi duduk anggota regu sesuai dengan formasi unit ',
                'score' => 0.001
            ],
            // 152
            [
                'role_id' => 3,
                'sub_unsur_id' => 46,
                'nama' => 'Memerintahkan regu menuju ke tempat kejadian kebakaran',
                'satuan_hasil' => 'Laporan regu menuju ke tempat kejadian kebakaran',
                'score' => 0.001
            ],
            // 153
            [
                'role_id' => 3,
                'sub_unsur_id' => 46,
                'nama' => 'Mengatur anggota regu pada Memimpin koordinasi internal unit',
                'satuan_hasil' => 'Laporan koordinasi internal unit',
                'score' => 0.001
            ],
            // 154
            [
                'role_id' => 3,
                'sub_unsur_id' => 46,
                'nama' => 'Mengatur anggota regu pada size up (penilaian awal) pada saat di perjalanan',
                'satuan_hasil' => 'Laporan size up (penilaian awal) pada saat di perjalanan',
                'score' => 0.001
            ],
            // 155
            [
                'role_id' => 3,
                'sub_unsur_id' => 47,
                'nama' => 'Mengatur anggota regu pada size up (penilaian awal) situasi kondisi kejadian kebakaran',
                'satuan_hasil' => 'Laporan size up (penilaian awal) situasi kondisi kejadian kebakaran',
                'score' => 0.001
            ],
            // 156
            [
                'role_id' => 3,
                'sub_unsur_id' => 47,
                'nama' => 'Mengatur anggota regu pada teknik taktik strategi operasional pemadaman',
                'satuan_hasil' => 'Laporan teknik taktik strategi operasional pemadaman',
                'score' => 0.001
            ],
            // 157
            [
                'role_id' => 3,
                'sub_unsur_id' => 47,
                'nama' => 'Mengatur prosedur pemadaman dari sumber air ke titik api',
                'satuan_hasil' => 'Laporan prosedur pemadaman dari sumber air ke titik api',
                'score' => 0.001
            ],
            // 158
            [
                'role_id' => 3,
                'sub_unsur_id' => 47,
                'nama' => 'Mengatur anggota regu untuk peran dan tugas anggota regu',
                'satuan_hasil' => 'Laporan peran dan tugas anggota regu',
                'score' => 0.001
            ],
            // 159
            [
                'role_id' => 3,
                'sub_unsur_id' => 47,
                'nama' => 'Mengatur anggota regu pada kebutuhan penggunaan peralatan operasional kebakaran',
                'satuan_hasil' => 'Laporan kebutuhan penggunaan peralatan operasional kebakaran',
                'score' => 0.001
            ],
            // 160
            [
                'role_id' => 3,
                'sub_unsur_id' => 47,
                'nama' => 'Mengendalikan prosedur dan keselamatan kerja anggota regu',
                'satuan_hasil' => 'Laporan prosedur dan keselamatan kerja anggota regu',
                'score' => 0.001
            ],
            // 161
            [
                'role_id' => 3,
                'sub_unsur_id' => 47,
                'nama' => 'Memantau dan melaporkan perkembangan situasi kondisi kejadian kebakaran',
                'satuan_hasil' => 'Laporan perkembangan situasi kondisi kejadian kebakaran',
                'score' => 0.001
            ],
            // 162
            [
                'role_id' => 3,
                'sub_unsur_id' => 47,
                'nama' => 'Mengatur anggota regu pada pendataan awal di tempat kejadian kebakaran',
                'satuan_hasil' => 'Laporan pendataan awal di tempat kejadian kebakaran',
                'score' => 0.001
            ],
            // 163
            [
                'role_id' => 3,
                'sub_unsur_id' => 48,
                'nama' => 'Mengatur anggota regu pada proses pendinginan',
                'satuan_hasil' => 'Laporan proses pendinginan',
                'score' => 0.001
            ],
            // 164
            [
                'role_id' => 3,
                'sub_unsur_id' => 48,
                'nama' => 'Mengatur anggota regu pada pelaksanaan Over Houl (pemeriksaan titik api yang tersisa)',
                'satuan_hasil' => 'Laporan pelaksanaan Over Houl (pemeriksaan titik api yang tersisa)',
                'score' => 0.001
            ],
            // 165
            [
                'role_id' => 3,
                'sub_unsur_id' => 48,
                'nama' => 'Melaporkan hasil over houl kepada atasan',
                'satuan_hasil' => 'Laporan hasil over houl kepada atasan',
                'score' => 0.001
            ],
            // 166
            [
                'role_id' => 3,
                'sub_unsur_id' => 48,
                'nama' => 'Melaporkan situasi akhir kondisi kebakaran',
                'satuan_hasil' => 'Laporan situasi akhir kondisi kebakaran',
                'score' => 0.001
            ],
            // 167
            [
                'role_id' => 3,
                'sub_unsur_id' => 49,
                'nama' => 'Mengatur anggota regu pada proses pengemasan peralatan yang digunakan',
                'satuan_hasil' => 'Laporan proses pengemasan peralatan yang digunakan',
                'score' => 0.001
            ],
            // 168
            [
                'role_id' => 3,
                'sub_unsur_id' => 49,
                'nama' => 'Mengatur anggota regu pada pengecekan kelengkapan peralatan',
                'satuan_hasil' => 'Laporan pengecekan kelengkapan peralatan',
                'score' => 0.02
            ],
            // 169
            [
                'role_id' => 3,
                'sub_unsur_id' => 49,
                'nama' => 'Mengatur anggota regu pada apel pengecekan personil',
                'satuan_hasil' => 'Laporan apel pengecekan personil',
                'score' => 0.001
            ],
            // 170
            [
                'role_id' => 3,
                'sub_unsur_id' => 50,
                'nama' => 'Mengatur anggota regu pada proses kebersihan unit, APD dan peralatan',
                'satuan_hasil' => 'Laporan proses kebersihan unit, APD dan peralatan',
                'score' => 0.001
            ],
            // 171
            [
                'role_id' => 3,
                'sub_unsur_id' => 50,
                'nama' => 'Mengatur anggota regu pada proses pengurasan dan pengisi tangki air unit',
                'satuan_hasil' => 'Laporan proses pengurasan dan pengisi tangki air unit',
                'score' => 0.001
            ],
            // 172
            [
                'role_id' => 3,
                'sub_unsur_id' => 50,
                'nama' => 'Mengatur anggota regu pada penempatan kembali peralatan yang telah digunakan',
                'satuan_hasil' => 'Laporan penempatan kembali peralatan yang telah digunakan',
                'score' => 0.001
            ],
            // 173
            [
                'role_id' => 3,
                'sub_unsur_id' => 50,
                'nama' => 'Mengolah laporan kejadian kebakaran',
                'satuan_hasil' => 'Laporan kejadian kebakaran',
                'score' => 0.001
            ],
            // 174
            [
                'role_id' => 3,
                'sub_unsur_id' => 51,
                'nama' => 'Memakai dan mengawasi pemakaian alat pelindung diri evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan pemakaian alat pelindung diri evakuasi dan penyelamatan',
                'score' => 0.001
            ],
            // 175
            [
                'role_id' => 3,
                'sub_unsur_id' => 51,
                'nama' => 'Mengatur anggota regu pada penempatan posisi duduk anggota regu sesuai dengan formasi unit',
                'satuan_hasil' => 'Laporan penempatan posisi duduk anggota regu sesuai dengan formasi unit',
                'score' => 0.001
            ],
            // 176
            [
                'role_id' => 3,
                'sub_unsur_id' => 51,
                'nama' => 'Memerintahkan regu menuju ke tempat kejadian evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan regu menuju ke tempat kejadian evakuasi dan penyelamatan',
                'score' => 0.001
            ],
            // 177
            [
                'role_id' => 3,
                'sub_unsur_id' => 51,
                'nama' => 'Mengatur anggota regu pada koordinasi internal unit',
                'satuan_hasil' => 'Laporan koordinasi internal unit',
                'score' => 0.001
            ],
            // 178
            [
                'role_id' => 3,
                'sub_unsur_id' => 51,
                'nama' => 'Menyusun pra size up (penilaian situasi awal ) pada saat di perjalan',
                'satuan_hasil' => 'Laporan pra size up (penilaian situasi awal ) pada saat di perjalan',
                'score' => 0.001
            ],
            // 179
            [
                'role_id' => 3,
                'sub_unsur_id' => 52,
                'nama' => 'Memimpin size up (penilaian situasi) kondisi evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan size up (penilaian situasi) kondisi evakuasi dan penyelamatan',
                'score' => 0.001
            ],
            // 180
            [
                'role_id' => 3,
                'sub_unsur_id' => 52,
                'nama' => 'Mengatur teknik taktik strategi operasional evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan teknik taktik strategi operasional evakuasi dan penyelamatan',
                'score' => 0.001
            ],
            // 181
            [
                'role_id' => 3,
                'sub_unsur_id' => 52,
                'nama' => 'Mengatur prosedur evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan prosedur evakuasi dan penyelamatan',
                'score' => 0.001
            ],
            // 182
            [
                'role_id' => 3,
                'sub_unsur_id' => 52,
                'nama' => 'Mengatur peran dan tugas anggota regu evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan peran dan tugas anggota regu evakuasi dan penyelamatan',
                'score' => 0.001
            ],
            // 183
            [
                'role_id' => 3,
                'sub_unsur_id' => 52,
                'nama' => 'Mengatur kebutuhan penggunaan peralatan operasional evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan kebutuhan penggunaan peralatan operasional evakuasi dan penyelamatan',
                'score' => 0.001
            ],
            // 184
            [
                'role_id' => 3,
                'sub_unsur_id' => 52,
                'nama' => 'Mengendalikan prosedur kerja dan keselamatan anggota regu evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan prosedur kerja dan keselamatan anggota regu evakuasi dan penyelamatan',
                'score' => 0.001
            ],
            // 185
            [
                'role_id' => 3,
                'sub_unsur_id' => 52,
                'nama' => 'Melaporkan perkembangan situasi kondisi kejadian evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan perkembangan situasi kondisi kejadian evakuasi dan penyelamatan',
                'score' => 0.001
            ],
            // 186
            [
                'role_id' => 3,
                'sub_unsur_id' => 52,
                'nama' => 'Mengatur anggota regu pada pelaksanaan Over Houl (pemeriksaan dengan seksama) terhadap evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan pelaksanaan Over Houl (pemeriksaan dengan seksama) terhadap evakuasi dan penyelamatan',
                'score' => 0.001
            ],
            // 187
            [
                'role_id' => 3,
                'sub_unsur_id' => 52,
                'nama' => 'Mengatur anggota regu pada pendataan awal di tempat kejadian evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan pendataan awal di tempat kejadian evakuasi dan penyelamatan',
                'score' => 0.001
            ],
            // 188
            [
                'role_id' => 3,
                'sub_unsur_id' => 53,
                'nama' => 'Mengatur anggota regu pada proses pengemasan peralatan yang digunakan untuk evakuasi dan penyelamata',
                'satuan_hasil' => 'Laporan proses pengemasan peralatan yang digunakan untuk evakuasi dan penyelamatan',
                'score' => 0.001
            ],
            // 189
            [
                'role_id' => 3,
                'sub_unsur_id' => 53,
                'nama' => 'Mengatur anggota regu pada pengecekan kelengkapan peralatan evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan pengecekan kelengkapan peralatan evakuasi dan penyelamatan',
                'score' => 0.02
            ],
            // 190
            [
                'role_id' => 3,
                'sub_unsur_id' => 53,
                'nama' => 'Mengatur anggota regu pada apel pengecekan personil evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan apel pengecekan personil evakuasi dan penyelamatan',
                'score' => 0.001
            ],
            // 191
            [
                'role_id' => 3,
                'sub_unsur_id' => 54,
                'nama' => 'Mengatur anggota regu pada proses kebersihan unit, APD dan peralatan evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan proses kebersihan unit, APD dan peralatan evakuasi dan penyelamatan',
                'score' => 0.001
            ],
        ];
        ButirKegiatan::query()->upsert($mahir, 'id');

        $penyelia = [

            // 192
            [
                'role_id' => 4,
                'sub_unsur_id' => 55,
                'nama' => 'Memverifikasi hasil pemeriksaan kelengkapan personil antar regu',
                'satuan_hasil' => 'Laporan pemeriksaan kelengkapan personil antar regu',
                'score' => 0.02
            ],
            // 193
            [
                'role_id' => 4,
                'sub_unsur_id' => 55,
                'nama' => 'Mengarahkan personil pada pelaksanaan apel pagi tingkat peleton',
                'satuan_hasil' => 'Laporan pelaksanaan apel pagi tingkat peleton',
                'score' => 0.02
            ],
            // 194
            [
                'role_id' => 4,
                'sub_unsur_id' => 55,
                'nama' => 'Mengarahkan personil pada serah terima tugas jaga tingkat peleton',
                'satuan_hasil' => 'Laporan pada serah terima tugas jaga tingkat peleton',
                'score' => 0.02
            ],
            // 195
            [
                'role_id' => 4,
                'sub_unsur_id' => 55,
                'nama' => 'Mengarahkan personil pada pemeriksaan peralatan unit mobil tingkat peleton',
                'satuan_hasil' => 'Laporan pemeriksaan peralatan unit mobil tingkat peleton',
                'score' => 0.02
            ],
            // 196
            [
                'role_id' => 4,
                'sub_unsur_id' => 55,
                'nama' => 'Mengarahkan personil pada pengecekan peralatan unit mobil tingkat peleton',
                'satuan_hasil' => 'Laporan pengecekan peralatan unit mobil tingkat peleton',
                'score' => 0.02
            ],
            // 197
            [
                'role_id' => 4,
                'sub_unsur_id' => 55,
                'nama' => 'Memverifikasi pemeriksaan kondisi unit tingkat peleton',
                'satuan_hasil' => 'Laporan pemeriksaan kondisi unit tingkat peleton',
                'score' => 0.02
            ],
            // 198
            [
                'role_id' => 4,
                'sub_unsur_id' => 55,
                'nama' => 'Menanda tangani laporan sesuai dengan form check list tingkat peleton',
                'satuan_hasil' => 'Dokumen sesuai dengan form check list tingkat peleton',
                'score' => 0.02
            ],
            // 199
            [
                'role_id' => 4,
                'sub_unsur_id' => 56,
                'nama' => 'Mengarahkan personil pada pelaksanaan piket sesuai dengan consignus jaga (tata kelola) tingkat peleton',
                'satuan_hasil' => 'Laporan pelaksanaan piket sesuai dengan consignus jaga ( tata kelola) tingkat pleton',
                'score' => 0.02
            ],
            // 200
            [
                'role_id' => 4,
                'sub_unsur_id' => 56,
                'nama' => 'Mengarahkan personil pada monitoring kekuatan personil dan unit dalam peleton',
                'satuan_hasil' => 'Laporan Monitoring kekuatan personil dan unit dalam peleton',
                'score' => 0.02
            ],
            // 201
            [
                'role_id' => 4,
                'sub_unsur_id' => 57,
                'nama' => 'Mengarahkan personil pada pemeriksaan kelengkapan personil dalam peleton',
                'satuan_hasil' => 'Laporan pemeriksaan kelengkapan personil dalam peleton',
                'score' => 0.02
            ],
            // 202
            [
                'role_id' => 4,
                'sub_unsur_id' => 57,
                'nama' => 'Mengarahkan personil pada pelaksanaan apel malam tingkat peleton',
                'satuan_hasil' => 'Laporan pelaksanaan apel malam tingkat peleton',
                'score' => 0.02
            ],
            // 203
            [
                'role_id' => 4,
                'sub_unsur_id' => 57,
                'nama' => 'Mengarahkan personil pada pemeriksaan peralatan unit mobil',
                'satuan_hasil' => 'Laporan pemeriksaan peralatan unit mobil',
                'score' => 0.02
            ],
            // 204
            [
                'role_id' => 4,
                'sub_unsur_id' => 57,
                'nama' => 'Mengarahkan personil pada pengecekan peralatan unit mobil',
                'satuan_hasil' => 'Laporan pengecekan peralatan unit mobil',
                'score' => 0.02
            ],
            // 205
            [
                'role_id' => 4,
                'sub_unsur_id' => 57,
                'nama' => 'Mengarahkan personil pada pemeriksaan kondisi unit',
                'satuan_hasil' => 'Laporan pemeriksaan kondisi unit',
                'score' => 0.02
            ],
            // 206
            [
                'role_id' => 4,
                'sub_unsur_id' => 58,
                'nama' => 'Mengarahkan personil pada pelaksanaan latihan',
                'satuan_hasil' => 'Laporan pelaksanaan latihan',
                'score' => 0.02
            ],
            // 207
            [
                'role_id' => 4,
                'sub_unsur_id' => 58,
                'nama' => 'Mengarahkan pelaksanaan latihan',
                'satuan_hasil' => 'Laporan latihan',
                'score' => 0.02
            ],
            // 208
            [
                'role_id' => 4,
                'sub_unsur_id' => 58,
                'nama' => 'Melakukan evaluasi pelaksanaan latihan',
                'satuan_hasil' => 'Laporan evaluasi pelaksanaan latihan',
                'score' => 0.04
            ],
            // 209
            [
                'role_id' => 4,
                'sub_unsur_id' => 59,
                'nama' => 'Mengarahkan personil pada pelaksanaan kegiatan pembinaan fisik',
                'satuan_hasil' => 'Laporan pelaksanaan kegiatan pembinaan fisik',
                'score' => 0.02
            ],
            // 210
            [
                'role_id' => 4,
                'sub_unsur_id' => 59,
                'nama' => 'Mengarahkan pelaksanaan kegiatan pembinaan fisik',
                'satuan_hasil' => 'Laporan kegiatan pembinaan fisik',
                'score' => 0.02
            ],
            // 211
            [
                'role_id' => 4,
                'sub_unsur_id' => 59,
                'nama' => 'Melakukan evaluasi pelaksanaan pembinaan fisik',
                'satuan_hasil' => 'Laporan evaluasi pelaksanaan pembinaan fisik',
                'score' => 0.02
            ],
            // 212
            [
                'role_id' => 4,
                'sub_unsur_id' => 60,
                'nama' => 'Mengarahkan personil pada pelaksanaan kegiatan kebersihan lingkungan kerja',
                'satuan_hasil' => 'Laporan pelaksanaan kegiatan kebersihan lingkungan kerja',
                'score' => 0.02
            ],
            // 213
            [
                'role_id' => 4,
                'sub_unsur_id' => 60,
                'nama' => 'Mengarahkan pelaksanaan kegiatan kebersihan lingkungan kerja',
                'satuan_hasil' => 'Laporan kegiatan kebersihan lingkungan kerja',
                'score' => 0.02
            ],
            // 214
            [
                'role_id' => 4,
                'sub_unsur_id' => 60,
                'nama' => 'Melakukan evaluasi pelaksanaan kebersihan lingkungan kerja',
                'satuan_hasil' => 'Laporan evaluasi pelaksanaan kebersihan lingkungan kerja',
                'score' => 0.02
            ],
            // 215
            [
                'role_id' => 4,
                'sub_unsur_id' => 61,
                'nama' => 'Menerima hasil validasi informasi kejadian kebakaran',
                'satuan_hasil' => 'Laporan validasi informasi kejadian kebakaran',
                'score' => 0.02
            ],
            // 216
            [
                'role_id' => 4,
                'sub_unsur_id' => 61,
                'nama' => 'Memverifikasi hasil validasi informasi kejadian kebakaran kepada atasan',
                'satuan_hasil' => 'Dokumen validasi informasi kejadian kebakaran kepada atasan',
                'score' => 0.02
            ],
            // 217
            [
                'role_id' => 4,
                'sub_unsur_id' => 62,
                'nama' => 'Mengarahkan personil pada tindak lanjut informasi kejadian kebakaran',
                'satuan_hasil' => 'Laporan tindak lanjut informasi kejadian kebakaran',
                'score' => 0.02
            ],
            // 218
            [
                'role_id' => 4,
                'sub_unsur_id' => 62,
                'nama' => 'Mengarahkan personil pada koordinasi antar regu lainnya',
                'satuan_hasil' => 'Laporan koordinasi antar regu lainnya',
                'score' => 0.02
            ],
            // 219
            [
                'role_id' => 4,
                'sub_unsur_id' => 62,
                'nama' => 'Bertanggungjawab pada koordinasi dengan instansi terkait',
                'satuan_hasil' => 'Laporan koordinasi dengan instansi terkait',
                'score' => 0.02
            ],
            // 220
            [
                'role_id' => 4,
                'sub_unsur_id' => 63,
                'nama' => 'Memeriksa penggunaan APD',
                'satuan_hasil' => 'Laporan penggunaan APD',
                'score' => 0.02
            ],
            // 221
            [
                'role_id' => 4,
                'sub_unsur_id' => 63,
                'nama' => 'Memerintahkan peleton menuju ke tempat kejadian kebakaran',
                'satuan_hasil' => 'Laporan peleton menuju ke tempat kejadian kebakaran',
                'score' => 0.02
            ],
            // 222
            [
                'role_id' => 4,
                'sub_unsur_id' => 63,
                'nama' => 'Mengarahkan personil pada koordinasi internal tingkat peleton',
                'satuan_hasil' => 'Laporan koordinasi internal tingkat peleton',
                'score' => 0.02
            ],
            // 223
            [
                'role_id' => 4,
                'sub_unsur_id' => 63,
                'nama' => 'Mengarahkan personil pra size up (penilaian awal situasi) pada saat di perjalanan',
                'satuan_hasil' => 'Laporan pra size up (penilaian awal situasi) pada saat di perjalanan',
                'score' => 0.02
            ],
            // 224
            [
                'role_id' => 4,
                'sub_unsur_id' => 64,
                'nama' => 'Mengarahkan personil size up (penilaian situasi) kondisi kejadian kebakaran',
                'satuan_hasil' => 'Mengarahkan personil size up (penilaian situasi) kondisi kejadian kebakaran',
                'score' => 0.02
            ],
            // 225
            [
                'role_id' => 4,
                'sub_unsur_id' => 64,
                'nama' => 'Mengendalikan teknik taktik strategi operasional pemadaman',
                'satuan_hasil' => 'Laporan teknik taktik strategi operasional pemadaman',
                'score' => 0.02
            ],
            // 226
            [
                'role_id' => 4,
                'sub_unsur_id' => 64,
                'nama' => 'Mengendalikan prosedur pemadaman dari sumber air ke titik api',
                'satuan_hasil' => 'Laporan prosedur pemadaman dari sumber air ke titik api',
                'score' => 0.02
            ],
            // 227
            [
                'role_id' => 4,
                'sub_unsur_id' => 64,
                'nama' => 'Mengendalikan peran dan tugas antar regu',
                'satuan_hasil' => 'Laporan peran dan tugas antar regu',
                'score' => 0.02
            ],
            // 228
            [
                'role_id' => 4,
                'sub_unsur_id' => 64,
                'nama' => 'Mengendalikan penyerangan ke sumber api/penyalur suplai air antar unit/pengelolaan sumber air/logistik operasional kebakaran',
                'satuan_hasil' => 'Laporan penyerangan ke sumber api/penyalur suplai air antar unit/pengelolaan sumber air/logistik operasional kebakaran',
                'score' => 0.02
            ],
            // 229
            [
                'role_id' => 4,
                'sub_unsur_id' => 64,
                'nama' => 'Mengendalikan pengerahan unit operasional dan personil tambahan',
                'satuan_hasil' => 'Laporan kebutuhan unit operasional dan personil',
                'score' => 0.02
            ],
            // 230
            [
                'role_id' => 4,
                'sub_unsur_id' => 64,
                'nama' => 'Mengendalikan pengerahan unit perasional dan personil tambahan',
                'satuan_hasil' => 'Laporan pengerahan unit operasional dan personil tambahan',
                'score' => 0.02
            ],
            // 231
            [
                'role_id' => 4,
                'sub_unsur_id' => 64,
                'nama' => 'melakukan koordinasi dengan instansi terkait',
                'satuan_hasil' => 'Laporan koordinasi dengan instansi terkait',
                'score' => 0.02
            ],
            // 232
            [
                'role_id' => 4,
                'sub_unsur_id' => 64,
                'nama' => 'Mengendalikan penerapan prosedur kerja dan keselamatan seluruh anggota',
                'satuan_hasil' => 'Laporan penerapan prosedur kerja dan keselamatan seluruh anggota',
                'score' => 0.02
            ],
            // 233
            [
                'role_id' => 4,
                'sub_unsur_id' => 64,
                'nama' => 'Mengendalikan perkembangan situasi kondisi kejadian kebakaran kepada atasan',
                'satuan_hasil' => 'Dokumen perkembangan situasi kondisi kejadian kebakaran kepada atasan',
                'score' => 0.02
            ],
            // 234
            [
                'role_id' => 4,
                'sub_unsur_id' => 64,
                'nama' => 'Mengendalikan laporan pendataan di tempat kejadian kebakaran',
                'satuan_hasil' => 'Dokumen pendataan di tempat kejadian kebakaran',
                'score' => 0.02
            ],
            // 235
            [
                'role_id' => 4,
                'sub_unsur_id' => 65,
                'nama' => 'Mengendalikan proses pendinginan',
                'satuan_hasil' => 'Laporan proses pendinginan',
                'score' => 0.02
            ],
            // 236
            [
                'role_id' => 4,
                'sub_unsur_id' => 65,
                'nama' => 'Mengendalikan pelaksanaan Over Houl (pemeriksaan dengan seksama) terhadap titik api yang tersisa',
                'satuan_hasil' => 'Laporan pelaksanaan Over Houl (pemeriksaan dengan seksama) terhadap titik api yang tersisa',
                'score' => 0.02
            ],
            // 237
            [
                'role_id' => 4,
                'sub_unsur_id' => 65,
                'nama' => 'Memvalidasi hasil over houl kepada atasan',
                'satuan_hasil' => 'Dokumen validasi hasil over houl kepada atasan',
                'score' => 0.02
            ],
            // 238
            [
                'role_id' => 4,
                'sub_unsur_id' => 65,
                'nama' => 'Memvalidasi laporan situasi akhir kondisi kebakaran',
                'satuan_hasil' => 'Dokumen situasi akhir kondisi kebakaran',
                'score' => 0.02
            ],
            // 239
            [
                'role_id' => 4,
                'sub_unsur_id' => 66,
                'nama' => 'Mengendalikan proses pengemasan peralatan yang digunakan tingkat peleton',
                'satuan_hasil' => 'Laporan proses pengemasan peralatan yang digunakan tingkat peleton',
                'score' => 0.02
            ],
            // 240
            [
                'role_id' => 4,
                'sub_unsur_id' => 66,
                'nama' => 'Mengendalikan pengecekan kelengkapan peralatan tingkat peleton',
                'satuan_hasil' => 'Laporan pengecekan kelengkapan peralatan tingkat peleton',
                'score' => 0.02
            ],
            // 241
            [
                'role_id' => 4,
                'sub_unsur_id' => 67,
                'nama' => 'Mengendalikan pelaksanaan kebersihan unit, APD dan peralatan tingkat peleton',
                'satuan_hasil' => 'Laporan pelaksanaankebersihan unit, APD dan peralatan tingkat peleton',
                'score' => 0.02
            ],
            // 242
            [
                'role_id' => 4,
                'sub_unsur_id' => 67,
                'nama' => 'Mengendalikan pengaturan penempatan kembali peralatan yang telah digunakan',
                'satuan_hasil' => 'Laporan pengaturan penempatan kembali peralatan yang telah digunakan',
                'score' => 0.02
            ],
            // 243
            [
                'role_id' => 4,
                'sub_unsur_id' => 67,
                'nama' => 'Mengevaluasi pasca kebakaran',
                'satuan_hasil' => 'Dokumen evaluasi pasca kebakaran',
                'score' => 0.02
            ],
            // 244
            [
                'role_id' => 4,
                'sub_unsur_id' => 67,
                'nama' => 'Memvalidasi laporan kejadian kebakaran',
                'satuan_hasil' => 'Dokumen validasi laporan kejadian kebakaran',
                'score' => 0.02
            ],
            // 245
            [
                'role_id' => 4,
                'sub_unsur_id' => 68,
                'nama' => 'Menerima hasil validasi informasi kejadian evakuasi dan penyelamatan',
                'satuan_hasil' => 'Dokumen hasil validasi informasi kejadian evakuasi dan penyelamatan',
                'score' => 0.02
            ],
            // 246
            [
                'role_id' => 4,
                'sub_unsur_id' => 68,
                'nama' => 'Melaporkan hasil validasi informasi kejadian evakuasi dan penyelamatan kepada atasan',
                'satuan_hasil' => 'Dokumen hasil validasi informasi kejadian evakuasi dan penyelamatan kepada atasan',
                'score' => 0.02
            ],
            // 247
            [
                'role_id' => 4,
                'sub_unsur_id' => 69,
                'nama' => 'Memverifikasi tindak lanjut informasi kejadian evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan tindak lanjut informasi kejadian evakuasi dan penyelamatan',
                'score' => 0.02
            ],
            // 248
            [
                'role_id' => 4,
                'sub_unsur_id' => 69,
                'nama' => 'Mengendalikan koordinasi antar regu dan peleton lainnya',
                'satuan_hasil' => 'Laporan koordinasi antar regu dan pleton lainnya',
                'score' => 0.02
            ],
            // 249
            [
                'role_id' => 4,
                'sub_unsur_id' => 69,
                'nama' => 'Mengendalikan koordinasi dengan instansi terkait',
                'satuan_hasil' => 'Laporan koordinasi dengan instansi terkait',
                'score' => 0.02
            ],
            // 250
            [
                'role_id' => 4,
                'sub_unsur_id' => 70,
                'nama' => 'Mengawasi pemakaian APD Evakuasi dan Penyelamatan',
                'satuan_hasil' => 'Laporan pemakaian APD Evakuasi dan Penyelamatan',
                'score' => 0.02
            ],
            // 251
            [
                'role_id' => 4,
                'sub_unsur_id' => 70,
                'nama' => 'Mengontrol peleton menuju ke tempat evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan peleton menuju ke tempat evakuasi dan penyelamatan',
                'score' => 0.02
            ],
            // 252
            [
                'role_id' => 4,
                'sub_unsur_id' => 70,
                'nama' => 'Mengendalikan koordinasi internal tingkat peleton',
                'satuan_hasil' => 'Laporan internal tingkat peleton',
                'score' => 0.02
            ],
            // 253
            [
                'role_id' => 4,
                'sub_unsur_id' => 70,
                'nama' => 'Mengendalikan pra size up (penilaian awal situasi) pada saat di perjalanan evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan pra size up (penilaian awal situasi) pada saat di perjalanan evakuasi dan penyelamatan',
                'score' => 0.02
            ],
            // 254
            [
                'role_id' => 4,
                'sub_unsur_id' => 71,
                'nama' => 'Mengendalikan size up (penilaian situasi) kondisi kejadian evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan size up (penilaian situasi) kondisi kejadian evakuasi dan penyelamatan',
                'score' => 0.02
            ],
            // 255
            [
                'role_id' => 4,
                'sub_unsur_id' => 71,
                'nama' => 'Mengendalikan teknik taktik strategi operasional evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan teknik taktik strategi operasional evakuasi dan penyelamatan',
                'score' => 0.02
            ],
            // 256
            [
                'role_id' => 4,
                'sub_unsur_id' => 71,
                'nama' => 'Mengendalikan prosedur evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan prosedur evakuasi dan penyelamatan',
                'score' => 0.02
            ],
            // 257
            [
                'role_id' => 4,
                'sub_unsur_id' => 71,
                'nama' => 'Mengendalikan peran dan tugas antar regu',
                'satuan_hasil' => 'Laporan peran dan tugas antar regu',
                'score' => 0.02
            ],
            // 258
            [
                'role_id' => 4,
                'sub_unsur_id' => 71,
                'nama' => 'Menganalisa kebutuhan unit operasional dan personil evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan analisa kebutuhan unit operasional dan personil evakuasi dan penyelamatan',
                'score' => 0.02
            ],
            // 259
            [
                'role_id' => 4,
                'sub_unsur_id' => 71,
                'nama' => 'Melakukan koordinasi pengerahan unit operasional dan personil tambahan evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan pengerahan unit operasional dan personil tambahan evakuasi dan penyelamatan',
                'score' => 0.02
            ],
            // 260
            [
                'role_id' => 4,
                'sub_unsur_id' => 71,
                'nama' => 'Melakukan koordinasi dengan instansi terkait',
                'satuan_hasil' => 'Laporan dengan instansi terkait',
                'score' => 0.02
            ],
            // 261
            [
                'role_id' => 4,
                'sub_unsur_id' => 71,
                'nama' => 'Mengendalikan penerapan prosedur kerja dan keselamatan seluruh anggota',
                'satuan_hasil' => 'Laporan prosedur kerja dan keselamatan seluruh anggota',
                'score' => 0.02
            ],
            // 262
            [
                'role_id' => 4,
                'sub_unsur_id' => 71,
                'nama' => 'Mengendalikan perkembangan situasi kondisi evakuasi dan penyelamatan kepada atasan',
                'satuan_hasil' => 'Laporan perkembangan situasi kondisi evakuasi dan penyelamatan kepada atasan',
                'score' => 0.02
            ],
            // 263
            [
                'role_id' => 4,
                'sub_unsur_id' => 71,
                'nama' => 'Mengendalikan pelaksanaan Over Houl (pemeriksaan dengan seksama) terhadap evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan pelaksanaan Over Houl (pemeriksaan dengan seksama) terhadap evakuasi dan penyelamatan',
                'score' => 0.02
            ],
            // 264
            [
                'role_id' => 4,
                'sub_unsur_id' => 71,
                'nama' => 'Memvalidasi laporan pendataan di tempat kejadian evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan validasi laporan pendataan di tempat kejadian evakuasi dan penyelamatan',
                'score' => 0.02
            ],
            // 265
            [
                'role_id' => 4,
                'sub_unsur_id' => 72,
                'nama' => 'Mengendalikan proses pengemasan peralatan yang digunakan',
                'satuan_hasil' => 'Laporan proses pengemasan peralatan yang digunakan',
                'score' => 0.02
            ],
            // 266
            [
                'role_id' => 4,
                'sub_unsur_id' => 72,
                'nama' => 'Mengendalikan pengecekan kelengkapan peralatan evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan pengecekan kelengkapan peralatan evakuasi dan penyelamatan',
                'score' => 0.02
            ],
            // 267
            [
                'role_id' => 4,
                'sub_unsur_id' => 72,
                'nama' => 'Mengendalikan apel pengecekan personil tingkat peleton',
                'satuan_hasil' => 'Dokumen apel pengecekan personil tingkat peleton',
                'score' => 0.02
            ],
            // 268
            [
                'role_id' => 4,
                'sub_unsur_id' => 73,
                'nama' => 'Mengendalikan proses kebersihan unit, APD dan peralatan tingkat peleton',
                'satuan_hasil' => 'Laporan kebersihan unit, APD dan peralatan tingkat peleton',
                'score' => 0.02
            ],
            // 269
            [
                'role_id' => 4,
                'sub_unsur_id' => 73,
                'nama' => 'Mengendalikan pengaturan penempatan kembali peralatan yang telah digunakan',
                'satuan_hasil' => 'Laporan pengaturan penempatan kembali peralatan yang telah digunakan',
                'score' => 0.02
            ],
            // 270
            [
                'role_id' => 4,
                'sub_unsur_id' => 73,
                'nama' => 'Memvalidasi laporan evakuasi dan penyelamatan',
                'satuan_hasil' => 'Dokumen evakuasi dan penyelamatan',
                'score' => 0.02
            ],
        ];
        ButirKegiatan::query()->upsert($penyelia, 'id');
        // End Bagian Butir Kegiatan Pokok dengan id 1 sampai dengan 270 adalah bagian dari tugas kegiatan pokok JABATAN FUNGSIONAL PEMADAM KEBAKARAN

        // Bagian Butir Kegiatan Pokok dengan id .. sampai dengan ..adalah bagian dari tugas kegiatan pokok RINCIAN KEGIATAN JABATAN FUNGSIONAL ANALIS KEBAKARAN DAN ANGKA KREDITNYA
        $analis_kebakaran_ahli_pertama_dan_analis_kebakaran_ahli_muda1 = [
            //271
            [
                'role_id' => 5,
                'sub_unsur_id' => 74,
                'nama' => 'Mengkaji UU yang terkait tentang kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Dokumen UU terkait tentang kebakaran',
                'score' => 0.01
            ],
            //272
            [
                'role_id' => 5,
                'sub_unsur_id' => 74,
                'nama' => 'Mengkaji PP yang terkait tentang kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Dokumen PP yang terkait tentang kebakaran',
                'score' => 0.01
            ],
            //273
            [
                'role_id' => 5,
                'sub_unsur_id' => 74,
                'nama' => 'Mengkaji PERMEN yang terkait tentang kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Dokumen Permen yang terkait tentang kebarakan',
                'score' => 0.01
            ],
            //274
            [
                'role_id' => 5,
                'sub_unsur_id' => 74,
                'nama' => 'Mengkaji PERDA yang terkait tentang kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Dokumen Perda yang terkait tentang kebarakan',
                'score' => 0.01
            ],
            //275
            [
                'role_id' => 5,
                'sub_unsur_id' => 74,
                'nama' => 'Mengkaji PERGUB/PERBUP/PERWAL yang terkait tentang kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Dokumen Pergub/Perbup/Perwali yang terkait tentang kebarakan',
                'score' => 0.01
            ],
            //276
            [
                'role_id' => 5,
                'sub_unsur_id' => 74,
                'nama' => 'Mengkaji standar lainnya yang terkait tentang kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Dokumen standar lainnya yang terkait tentang kebarakan',
                'score' => 0.01
            ],
            //277
            [
                'role_id' => 6,
                'sub_unsur_id' => 74,
                'nama' => 'Menganalisis UU yang terkait tentang kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Laporan analisis UU yang terkait tentang kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],
            //278
            [
                'role_id' => 6,
                'sub_unsur_id' => 74,
                'nama' => 'Menganalisis PP yang terkait tentang kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Laporan analisis PP yang terkait tentang kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],
            //279
            [
                'role_id' => 6,
                'sub_unsur_id' => 74,
                'nama' => 'Menganalisis PERMEN yang terkait tentang kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Laporan analisis PERMEN yang terkait tentang kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],
            //280
            [
                'role_id' => 6,
                'sub_unsur_id' => 74,
                'nama' => 'Menganalisis PERDA yang terkait tentang kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Laporan analisis PERDA yang terkait tentang kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],
            //281
            [
                'role_id' => 6,
                'sub_unsur_id' => 74,
                'nama' => 'Menganalisis PERGUB/PERBUP/PERWAL yang terkait tentang kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Laporan analisis PERGUB/PERBUP/PERWAL yang terkait tentang kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],
            //282
            [
                'role_id' => 6,
                'sub_unsur_id' => 74,
                'nama' => 'Menganalisis standar lainnya yang terkait tentang kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Laporan analisis standar lainnya yang terkait tentang kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],

            //

            //283
            [
                'role_id' => 5,
                'sub_unsur_id' => 75,
                'nama' => 'Menyusun surat pemberitahuan pemeriksaan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Dokumen surat pemberitahuan pemeriksaan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'score' => 0.01
            ],
            //284
            [
                'role_id' => 5,
                'sub_unsur_id' => 75,
                'nama' => 'Menyusun surat tugas tim pemeriksa pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Dokumen surat tugas tim pemeriksa pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'score' => 0.01
            ],
            //285
            [
                'role_id' => 5,
                'sub_unsur_id' => 75,
                'nama' => 'Menyusun form check list pemeriksaan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Dokumen pemeriksaan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'score' => 0.01
            ],
            //286
            [
                'role_id' => 5,
                'sub_unsur_id' => 75,
                'nama' => 'Menyusun dan memahami dokumen pendukung lainnya pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Dokumen pendukung lainnya pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'score' => 0.01
            ],
            //287
            [
                'role_id' => 5,
                'sub_unsur_id' => 75,
                'nama' => 'Menginventarisasi kendaraan, peralatan untuk pemeriksaan dan pengujian pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Dokumen kendaraan, peralatan untuk pemeriksaan dan pengujian pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'score' => 0.01
            ],
            //288
            [
                'role_id' => 5,
                'sub_unsur_id' => 75,
                'nama' => 'Melakukan komunikasi dengan pihak pengelola bangunan gedung pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Laporan hasil komunikasi dengan pihak pengelola bangunan gedung pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'score' => 0.01
            ],
            //289
            [
                'role_id' => 6,
                'sub_unsur_id' => 75,
                'nama' => 'Mengkaji surat pemberitahuan pemeriksaan pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Dokumen surat pemberitahuan pemeriksaan pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],
            //290
            [
                'role_id' => 6,
                'sub_unsur_id' => 75,
                'nama' => 'Mengkaji surat tugas tim pemeriksa pada bangunan tinggi,bangunan industri dan obyek vital',
                'satuan_hasil' => 'Dokumen surat tugas tim pemeriksa pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],
            //291
            [
                'role_id' => 6,
                'sub_unsur_id' => 75,
                'nama' => 'Mengkaji form check list pemeriksaan pada bangunan tinggi,bangunan industri dan obyek vital',
                'satuan_hasil' => 'Dokumen check list pemeriksaan pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],
            //292
            [
                'role_id' => 6,
                'sub_unsur_id' => 75,
                'nama' => 'Mengkaji dan memahami dokumen pendukung lainnya pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Laporan pendukung lainnya pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],
            //293
            [
                'role_id' => 6,
                'sub_unsur_id' => 75,
                'nama' => 'Menginventarisasi kendaraan, peralatan untuk pemeriksaan dan pengujian pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Laporan kendaraan, peralatan untuk pemeriksaan dan pengujian pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],
            //294
            [
                'role_id' => 6,
                'sub_unsur_id' => 75,
                'nama' => 'Melakukan komunikasi dengan pihak pengelola bangunan gedung pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Laporan komunikasi dengan pihak pengelola bangunan gedung pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],

            //

            //295
            [
                'role_id' => 5,
                'sub_unsur_id' => 76,
                'nama' => 'Menyusun dokumen-dokumen perijinan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Laporan perijinan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'score' => 0.01
            ],
            //296
            [
                'role_id' => 5,
                'sub_unsur_id' => 76,
                'nama' => 'Menyusun gambar bangunan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Laporan hasil gambar bangunan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'score' => 0.01
            ],
            //297
            [
                'role_id' => 5,
                'sub_unsur_id' => 76,
                'nama' => 'Menginventarisasi spesifikasi proteksi kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Laporan spesifikasi proteksi kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'score' => 0.01
            ],
            //298
            [
                'role_id' => 5,
                'sub_unsur_id' => 76,
                'nama' => 'Mengindentifikasi sistem proteksi aktif pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Laporan sistem proteksi aktif pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'score' => 0.01
            ],
            //299
            [
                'role_id' => 5,
                'sub_unsur_id' => 76,
                'nama' => 'Mengidentifikasi sistem proteksi pasif pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Kegiatan sistem proteksi pasif pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'score' => 0.01
            ],
            //300
            [
                'role_id' => 5,
                'sub_unsur_id' => 76,
                'nama' => 'Mengevaluasi tentang manajemen keselamatan kebakaran gedung (MKKG) pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Laporan manajemen keselamatan kebakaran gedung (MKKG) pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'score' => 0.01
            ],
            //301
            [
                'role_id' => 5,
                'sub_unsur_id' => 76,
                'nama' => 'Mengindentifikasi akses pemadam kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Laporan akses pemadam kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan',
                'score' => 0.01
            ],
            //302
            [
                'role_id' => 5,
                'sub_unsur_id' => 76,
                'nama' => 'Mengindetifikasi sarana penyelamatan jiwa pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Laporan indentifikasi sarana penyelamatan jiwa pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'score' => 0.01
            ],
            //303
            [
                'role_id' => 6,
                'sub_unsur_id' => 76,
                'nama' => 'Melakukan kajian terhadap dokumen-dokumen perijinan pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Laporan perijinan pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],
            //304
            [
                'role_id' => 6,
                'sub_unsur_id' => 76,
                'nama' => 'Melakukan kajian terhadap gambar bangunan pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Laporan gambar bangunan pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],
            //305
            [
                'role_id' => 6,
                'sub_unsur_id' => 76,
                'nama' => 'Melakukan kajian spesifikasi proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Laporan spesifikasi proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],
            //306
            [
                'role_id' => 6,
                'sub_unsur_id' => 76,
                'nama' => 'Melakukan kajian sistem proteksi aktif pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Laporan sistem proteksi aktif pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],
            //307
            [
                'role_id' => 6,
                'sub_unsur_id' => 76,
                'nama' => 'Melakukan kajian sistem proteksi pasif pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Laporan sistem proteksi pasif pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],
            //308
            [
                'role_id' => 6,
                'sub_unsur_id' => 76,
                'nama' => 'Melakukan kajian tentang manajemen keselamatan kebakaran gedung (MKKG) pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Laporan kajian tentang manajemen keselamatan kebakaran gedung (MKKG) pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],
            //309
            [
                'role_id' => 6,
                'sub_unsur_id' => 76,
                'nama' => 'Melakukan kajian akses pemadam kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Laporan kajian akses pemadam kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],
            //310
            [
                'role_id' => 6,
                'sub_unsur_id' => 76,
                'nama' => 'Melakukan kajian sarana penyelamatan jiwa pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Laporan kajian sarana penyelamatan jiwa pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],

            //

            //311
            [
                'role_id' => 5,
                'sub_unsur_id' => 77,
                'nama' => 'Melaksanakan rapat koordinasi dengan pengelola gedung pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Laporan rapat koordinasi dengan pengelola gedung pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'score' => 0.01
            ],
            //312
            [
                'role_id' => 5,
                'sub_unsur_id' => 77,
                'nama' => 'Mengkaji dokumen-dokumen perijinan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Laporan dokumen-dokumen perijinan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'score' => 0.01
            ],
            //313
            [
                'role_id' => 5,
                'sub_unsur_id' => 77,
                'nama' => 'Mengkaji gambar bangunan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Laporan olahan gambar bangunan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'score' => 0.01
            ],
            //314
            [
                'role_id' => 5,
                'sub_unsur_id' => 77,
                'nama' => 'Mengevaluasi tentang manajemen keselamatan kebakaran gedung (MKKG) pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Dokumen manajemen keselamatan kebakaran gedung (MKKG) pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'score' => 0.01
            ],
            //315
            [
                'role_id' => 6,
                'sub_unsur_id' => 77,
                'nama' => 'Mengkoordinir rapat koordinasi dengan pengelola gedung bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Laporan rapat koordinasi dengan pengelola gedung bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],
            //316
            [
                'role_id' => 6,
                'sub_unsur_id' => 77,
                'nama' => 'Memverifikasi dokumen-dokumen perijinan pada bangunan tinggi, bangunan industri dan obyek vital proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Laporan perijinan pada bangunan tinggi, bangunan industri dan obyek vitalproteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],
            //317
            [
                'role_id' => 6,
                'sub_unsur_id' => 77,
                'nama' => 'Memeriksa tentang manajemen keselamatan kebakaran gedung (MKKG) pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Dokumen tentang manajemen keselamatan kebakaran gedung (MKKG) pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],

            //

            //318
            [
                'role_id' => 5,
                'sub_unsur_id' => 78,
                'nama' => 'Memeriksa dan menguji spesifikasi proteksi kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Laporan spesifikasi proteksi kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'score' => 0.01
            ],
            //319
            [
                'role_id' => 5,
                'sub_unsur_id' => 78,
                'nama' => 'Memeriksa akses pemadam kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Kegiatan akses pemadam kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'score' => 0.01
            ],
            //320
            [
                'role_id' => 5,
                'sub_unsur_id' => 78,
                'nama' => 'Memeriksa sarana penyelamatan jiwa (tangga kebakaran, lampu darurat, penunjuk arah darurat ,kipas penekan asap, lift kebakaran) pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Laporan sarana penyelamatan jiwa (tangga kebakaran, lampu darurat, penunjuk arah darurat ,kipas penekan asap, lift kebakaran) pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'score' => 0.01
            ],
            //321
            [
                'role_id' => 5,
                'sub_unsur_id' => 78,
                'nama' => 'Memeriksa dan menguji sistem hidran kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Laporan sistem hidran kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'score' => 0.01
            ],
            //322
            [
                'role_id' => 5,
                'sub_unsur_id' => 78,
                'nama' => 'Memeriksa dan menguji sistem springkler otomatis pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Laporan Memeriksa dan menguji sistem springkler otomatis pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'score' => 0.01
            ],
            //323
            [
                'role_id' => 5,
                'sub_unsur_id' => 78,
                'nama' => 'Memeriksa dan menguji sistem deteksi dan alarm kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Kegiatan emeriksa dan menguji sistem deteksi dan alarm kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'score' => 0.01
            ],
            //324
            [
                'role_id' => 5,
                'sub_unsur_id' => 78,
                'nama' => 'Memeriksa dan menguji sistem deteksi dan alarm kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Kegiatan memeriksa dan menguji sistem deteksi dan alarm kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'score' => 0.01
            ],
            //325
            [
                'role_id' => 5,
                'sub_unsur_id' => 78,
                'nama' => 'Memeriksa Alat Pemadam Api Ringan (APAR) pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Laporan Memeriksa Alat Pemadam Api Ringan (APAR) pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'score' => 0.01
            ],
            //326
            [
                'role_id' => 5,
                'sub_unsur_id' => 78,
                'nama' => 'Memeriksa sistem proteksi pasif (fire stopping , saf, bukaan, kompartemenisasi dll ) pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Laporan Memeriksa sistem proteksi pasif (fire stopping, saf, bukaan, kompartemenisasi dll ) pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'score' => 0.01
            ],
            //327
            [
                'role_id' => 6,
                'sub_unsur_id' => 78,
                'nama' => 'Memeriksa dan menguji spesifikasi proteksi kebakaran proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Laporan proteksi kebakaran proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],
            //328
            [
                'role_id' => 6,
                'sub_unsur_id' => 78,
                'nama' => 'Memeriksa akses pemadam kebakaran proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Laporan proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],
            //329
            [
                'role_id' => 6,
                'sub_unsur_id' => 78,
                'nama' => 'Memeriksa sarana penyelamatan jiwa (tangga kebakaran, lampu darurat, penunjuk arah darurat ,kipas penekan asap, lift kebakaran) proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Laporan sarana penyelamatan jiwa (tangga kebakaran, lampu darurat, penunjuk arah darurat ,kipas penekan asap, lift kebakaran) proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],
            //330
            [
                'role_id' => 6,
                'sub_unsur_id' => 78,
                'nama' => 'Memeriksa dan menguji sistem hidran kebakaran proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Laporan pemeriksaan dan pengujian sistem hidran kebakaran proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],
            //331
            [
                'role_id' => 6,
                'sub_unsur_id' => 78,
                'nama' => 'Memeriksa dan menguji sistem springkler otomatis proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Laporan sistem springkler otomatis proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],
            //332
            [
                'role_id' => 6,
                'sub_unsur_id' => 78,
                'nama' => 'Memeriksa dan menguji sistem deteksi dan alarm kebakaran proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Laporan sistem deteksi dan alarm kebakaran proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],
            //333
            [
                'role_id' => 6,
                'sub_unsur_id' => 78,
                'nama' => 'Memeriksa Alat Pemadam Api Ringan (APAR) proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Laporan Alat Pemadam Api Ringan (APAR) proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],
            //334
            [
                'role_id' => 6,
                'sub_unsur_id' => 78,
                'nama' => 'Memeriksa sistem proteksi pasif (fire stopping , saf, bukaan, kompartemenisasi dll ) proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Laporan sistem proteksi pasif (fire stopping , saf, bukaan, kompartemenisasi dll ) proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],
            //335
            [
                'role_id' => 6,
                'sub_unsur_id' => 78,
                'nama' => 'Memberikan rekomendasi tindak lanjut atas hasil pemeriksaan dan pengujian proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Laporan rekomendasi tindak lanjut atas hasil pemeriksaan dan pengujian proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],

            //

            //336
            [
                'role_id' => 5,
                'sub_unsur_id' => 79,
                'nama' => 'Mengkaji hasil pemeriksaan dan pengujian pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Dokumen pemeriksaan dan pengujian pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'score' => 0.01
            ],
            //337
            [
                'role_id' => 5,
                'sub_unsur_id' => 79,
                'nama' => 'Mengkaji hasil pemeriksaan dan pengujian pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Laporan pemeriksaan dan pengujian pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'score' => 0.01
            ],
            //338
            [
                'role_id' => 5,
                'sub_unsur_id' => 79,
                'nama' => 'Mengkaji berita acara pemeriksaan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Dokumen berita acara pemeriksaan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'score' => 0.01
            ],
            //339
            [
                'role_id' => 5,
                'sub_unsur_id' => 79,
                'nama' => 'Memberi masukan dan saran kepada pengelola gedung dari hasil pemeriksaan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Dokumen masukan dan saran kepada pengelola gedung dari hasil pemeriksaan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'score' => 0.01
            ],
            //340
            [
                'role_id' => 5,
                'sub_unsur_id' => 79,
                'nama' => 'Mengkaji hasil pemeriksaan dan pengujian pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Dokumen hasil pemeriksaan dan pengujian pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'score' => 0.01
            ],
            //341
            [
                'role_id' => 5,
                'sub_unsur_id' => 79,
                'nama' => 'Mengkaji hasil pemeriksaan dan pengujian kepada atasan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'satuan_hasil' => 'Laporan hasil pemeriksaan dan pengujian kepada atasan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
                'score' => 0.01
            ],
            //342
            [
                'role_id' => 5,
                'sub_unsur_id' => 79,
                'nama' => 'Menginvetarisasi jumlah nilai retribusi hasil pemeriksaan dan pengujian',
                'satuan_hasil' => 'Dokumen jumlah nilai retribusi hasil pemeriksaan dan pengujian',
                'score' => 0.01
            ],

            //

            //343
            [
                'role_id' => 6,
                'sub_unsur_id' => 80,
                'nama' => 'Menelaah hasil pemeriksaan dan pengujian proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Dokumen hasil pemeriksaan dan pengujian proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],
            //344
            [
                'role_id' => 6,
                'sub_unsur_id' => 80,
                'nama' => 'Menelaah hasil pemeriksaan dan pengujian proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Laporan hasil pemeriksaan dan pengujian proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],
            //345
            [
                'role_id' => 6,
                'sub_unsur_id' => 80,
                'nama' => 'Menyusun berita acara pemeriksaan proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Dokumen berita acara pemeriksaan proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],
            //346
            [
                'role_id' => 6,
                'sub_unsur_id' => 80,
                'nama' => 'Memberikan masukan dan saran kepada pengelola gedung dari hasil pemeriksaan proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Dokumen masukan dan saran kepada pengelola gedung dari hasil pemeriksaan proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],
            //347
            [
                'role_id' => 6,
                'sub_unsur_id' => 80,
                'nama' => 'Memvalidasi hasil pemeriksaan dan pengujian proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'satuan_hasil' => 'Dokumen hasil pemeriksaan dan pengujian proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
                'score' => 0.02
            ],
            //348
            [
                'role_id' => 6,
                'sub_unsur_id' => 80,
                'nama' => 'Memvalidasi hasil pemeriksaan dan pengujian proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital kepada atasan',
                'satuan_hasil' => 'Laporan hasil pemeriksaan dan pengujian proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital kepada atasan',
                'score' => 0.02
            ],
            //349
            [
                'role_id' => 6,
                'sub_unsur_id' => 80,
                'nama' => 'Menginvetarisasi jumlah nilai retribusi hasil pemeriksaan dan pengujian',
                'satuan_hasil' => 'Dokumen nilai retribusi hasil pemeriksaan dan pengujian',
                'score' => 0.02
            ],

            //

            //350
            [
                'role_id' => 5,
                'sub_unsur_id' => 81,
                'nama' => 'Menyusun materi tentang peraturan dan perundangan pencegahan kebakaran',
                'satuan_hasil' => 'Laporan penyusunan materi tentang peraturan dan perundangan pencegahan kebakaran',
                'score' => 0.01
            ],
            //351
            [
                'role_id' => 5,
                'sub_unsur_id' => 81,
                'nama' => 'Menyusun materi pencegahan kebakaran',
                'satuan_hasil' => 'Laporan penyusunan materi pencegahan kebakaran',
                'score' => 0.01
            ],
            //352
            [
                'role_id' => 5,
                'sub_unsur_id' => 81,
                'nama' => 'Menyusun materi penanggulangan kebakaran',
                'satuan_hasil' => 'Laporan penyusunan materi penanggulangan kebakaran',
                'score' => 0.01
            ],
            //353
            [
                'role_id' => 5,
                'sub_unsur_id' => 81,
                'nama' => 'Menyusun materi praktek pemadaman secara tradisional',
                'satuan_hasil' => 'Laporan Penyusunan materi praktek pemadaman secara tradisional',
                'score' => 0.01
            ],
            //354
            [
                'role_id' => 5,
                'sub_unsur_id' => 81,
                'nama' => 'Menyusun materi praktek penggunaan APAR',
                'satuan_hasil' => 'Laporan Penyusunan materi praktek penggunaan APAR',
                'score' => 0.01
            ],
            //355
            [
                'role_id' => 5,
                'sub_unsur_id' => 81,
                'nama' => 'Menyusun materi praktek pompa portable',
                'satuan_hasil' => 'Laporan Penyusunan materi praktek pompa portable',
                'score' => 0.01
            ],

            //

            //356
            [
                'role_id' => 5,
                'sub_unsur_id' => 82,
                'nama' => 'Mengidentifikasi lokasi dan waktu penyuluhan',
                'satuan_hasil' => 'Laporan lokasi dan waktu penyuluhan',
                'score' => 0.01
            ],
            //357
            [
                'role_id' => 5,
                'sub_unsur_id' => 82,
                'nama' => 'Mengidentifikasi peserta penyuluhan',
                'satuan_hasil' => 'Dokumen identifikasi peserta penyuluhan',
                'score' => 0.01
            ],
            //358
            [
                'role_id' => 5,
                'sub_unsur_id' => 82,
                'nama' => 'Melakukan koordinasi dengan pihak terkait',
                'satuan_hasil' => 'Laporan koordinasi dengan pihak terkait',
                'score' => 0.01
            ],
            //359
            [
                'role_id' => 5,
                'sub_unsur_id' => 82,
                'nama' => 'Mengidentifikasi kebutuhan penyuluhan',
                'satuan_hasil' => 'Laporan identifikasi kebutuhan penyuluhan',
                'score' => 0.01
            ],
            //360
            [
                'role_id' => 5,
                'sub_unsur_id' => 82,
                'nama' => 'menelaah aspek sosial budaya peserta',
                'satuan_hasil' => 'menelaah aspek sosial budaya peserta',
                'score' => 0.01
            ],
            //361
            [
                'role_id' => 5,
                'sub_unsur_id' => 82,
                'nama' => 'menelaah aspek sosial budaya peserta',
                'satuan_hasil' => 'Laporan sasaran tujuan penyuluhan',
                'score' => 0.01
            ],
            //362
            [
                'role_id' => 5,
                'sub_unsur_id' => 82,
                'nama' => 'Menyusun dokumen administrasi surat pemberitahuan, surat undangan, surat tugas',
                'satuan_hasil' => 'Dokumen administrasi surat pemberitahuan, surat undangan, surat tugas',
                'score' => 0.01
            ],

            //

            //363
            [
                'role_id' => 5,
                'sub_unsur_id' => 83,
                'nama' => 'Mengolah cara memberikan instruksi',
                'satuan_hasil' => 'Laporan cara memberikan instruksi',
                'score' => 0.01
            ],
            //364
            [
                'role_id' => 5,
                'sub_unsur_id' => 83,
                'nama' => 'Mengolah metode penyuluhan',
                'satuan_hasil' => 'Laporan metode penyuluhan',
                'score' => 0.01
            ],
            //365
            [
                'role_id' => 5,
                'sub_unsur_id' => 83,
                'nama' => 'Mengolah cara menggunakan alat bantu penyuluhan',
                'satuan_hasil' => 'Laporan cara menggunakan alat bantu penyuluhan',
                'score' => 0.01
            ],
            //366
            [
                'role_id' => 5,
                'sub_unsur_id' => 83,
                'nama' => 'Mengolah cara menyampaikan materi',
                'satuan_hasil' => 'Laporan cara menyampaikan materi',
                'score' => 0.01
            ],

            //

            //367
            [
                'role_id' => 5,
                'sub_unsur_id' => 84,
                'nama' => 'Menginventarisasi sarana dan prasarana penunjang',
                'satuan_hasil' => 'Laporan sarana dan prasarana penunjang',
                'score' => 0.01
            ],
            //368
            [
                'role_id' => 5,
                'sub_unsur_id' => 84,
                'nama' => 'Melaksanakan registrasi peserta',
                'satuan_hasil' => 'Dokumen registrasi peserta',
                'score' => 0.01
            ],
            //369
            [
                'role_id' => 5,
                'sub_unsur_id' => 84,
                'nama' => 'Mendistribusikan kebutuhan peserta',
                'satuan_hasil' => 'Laporan kebutuhan peserta',
                'score' => 0.01
            ],
            //370
            [
                'role_id' => 5,
                'sub_unsur_id' => 84,
                'nama' => 'Mengarahkan maksud dan tujuan penyuluhan',
                'satuan_hasil' => 'Laporan maksud dan tujuan penyuluhan',
                'score' => 0.01
            ],
            //371
            [
                'role_id' => 5,
                'sub_unsur_id' => 84,
                'nama' => 'Mengarahkan pengarahan kepada Tim penyuluh',
                'satuan_hasil' => 'Laporan pengarahan kepada Tim penyuluh',
                'score' => 0.01
            ],

            //

            //372
            [
                'role_id' => 5,
                'sub_unsur_id' => 85,
                'nama' => 'Memberi petunjuk tentang peraturan dan perundangan pencegahan kebakaran',
                'satuan_hasil' => 'Laporan pemberian petunjuk peraturan dan perundangan pencegahan kebakaran',
                'score' => 0.01
            ],
            //373
            [
                'role_id' => 5,
                'sub_unsur_id' => 85,
                'nama' => 'Memberi petunjuk tentang upaya pencegahan kebakaran dan teori api',
                'satuan_hasil' => 'Laporan pemberian petunjuk peraturan dan perundangan pencegahan kebakaran',
                'score' => 0.01
            ],
            //374
            [
                'role_id' => 5,
                'sub_unsur_id' => 85,
                'nama' => 'Memberi petunjuk tentang alat pemadam api tradisional',
                'satuan_hasil' => 'Laporan tentang alat pemadam api tradisional',
                'score' => 0.01
            ],
            //375
            [
                'role_id' => 5,
                'sub_unsur_id' => 85,
                'nama' => 'Memberi petunjuk tentang alat pemadam api ringan (APAR)',
                'satuan_hasil' => 'Laporan tentang alat pemadam api ringan (APAR)',
                'score' => 0.01
            ],
            //376
            [
                'role_id' => 5,
                'sub_unsur_id' => 85,
                'nama' => 'Memberi petunjuk tentang pompa portable',
                'satuan_hasil' => 'Laporan tentang pompa portable',
                'score' => 0.01
            ],
            //377
            [
                'role_id' => 5,
                'sub_unsur_id' => 85,
                'nama' => 'Memberi petunjuk tentang prosedur pelaporan kejadian kebakaran',
                'satuan_hasil' => 'Laporan tentang prosedur pelaporan kejadian kebakaran',
                'score' => 0.01
            ],

            //

            //378
            [
                'role_id' => 5,
                'sub_unsur_id' => 86,
                'nama' => 'Memberi petunjuk tentang metoda pemadaman',
                'satuan_hasil' => 'Laporan tentang prosedur pelaporan kejadian kebakaran',
                'score' => 0.01
            ],
            //379
            [
                'role_id' => 5,
                'sub_unsur_id' => 86,
                'nama' => 'Memberi petunjuk tentang praktek penggunaan alat pemadam api tradisional',
                'satuan_hasil' => 'Memberi petunjuk tentang praktek penggunaan alat pemadam api tradisional',
                'score' => 0.01
            ],
            //380
            [
                'role_id' => 5,
                'sub_unsur_id' => 86,
                'nama' => 'Memberi petunjuk tentang praktek alat pemadam api ringan (APAR)',
                'satuan_hasil' => 'Laporan tentang praktek alat pemadam api ringan (APAR)',
                'score' => 0.01
            ],
            //381
            [
                'role_id' => 5,
                'sub_unsur_id' => 86,
                'nama' => 'Memberi petunjuk tentang praktek penggunaan pompa portable',
                'satuan_hasil' => 'Memberi petunjuk tentang praktek penggunaan pompa portable',
                'score' => 0.01
            ],
            //382
            [
                'role_id' => 5,
                'sub_unsur_id' => 86,
                'nama' => 'Mengevaluasi materi penyuluhan',
                'satuan_hasil' => 'Laporan evaluasi materi penyuluhan',
                'score' => 0.01
            ],

            //

            //383
            [
                'role_id' => 5,
                'sub_unsur_id' => 87,
                'nama' => 'Mengevaluasi penyelenggaran penyuluhan',
                'satuan_hasil' => 'Laporan evaluasi penyelenggaran penyuluhan',
                'score' => 0.01
            ],
            //384
            [
                'role_id' => 5,
                'sub_unsur_id' => 87,
                'nama' => 'Menghimpun hasil isian form evaluasi penyelenggaraan penyuluhan',
                'satuan_hasil' => 'Laporan hasil isian form evaluasi penyelenggaraan penyuluhan',
                'score' => 0.01
            ],
            //385
            [
                'role_id' => 5,
                'sub_unsur_id' => 87,
                'nama' => 'Melakukan rekapitulasi hasil isian formulir evaluasi penyelenggaraan penyuluhan',
                'satuan_hasil' => 'Laporan rekapitulasi hasil isian form evaluasi penyelenggaraan penyuluhan',
                'score' => 0.01
            ],
            //386
            [
                'role_id' => 5,
                'sub_unsur_id' => 87,
                'nama' => 'Menyusun laporan evaluasi kegiatan penyuluhan',
                'satuan_hasil' => 'Dokumen evaluasi kegiatan penyuluhan',
                'score' => 0.01
            ],
            //387
            [
                'role_id' => 5,
                'sub_unsur_id' => 87,
                'nama' => 'Melaporkan hasil pelaksanaan kegiatan penyuluhan kepada atasan',
                'satuan_hasil' => 'Dokumen hasil pelaksanaan kegiatan penyuluhan kepada atasan',
                'score' => 0.01
            ],

            //  

            //388
            [
                'role_id' => 6,
                'sub_unsur_id' => 88,
                'nama' => 'Mengevaluasi kerangka acuan kerja',
                'satuan_hasil' => 'Laporan evaluasi kerangka acuan kerja',
                'score' => 0.02
            ],
            //389
            [
                'role_id' => 6,
                'sub_unsur_id' => 88,
                'nama' => 'Mengevaluasi program pendidikan dan pelatihan',
                'satuan_hasil' => 'Laporan evaluasi program pendidikan dan pelatihan',
                'score' => 0.02
            ],
            //390
            [
                'role_id' => 6,
                'sub_unsur_id' => 88,
                'nama' => 'Mengidentifkasi calon peserta pendidikan dan pelatihan',
                'satuan_hasil' => 'Laporan identifkasi calon peserta pendidikan dan pelatihan',
                'score' => 0.02
            ],
            //391
            [
                'role_id' => 6,
                'sub_unsur_id' => 88,
                'nama' => 'Mengevaluasi bahan ajar',
                'satuan_hasil' => 'Laporan evaluasi bahan ajar',
                'score' => 0.02
            ],
            //392
            [
                'role_id' => 6,
                'sub_unsur_id' => 88,
                'nama' => 'Mengevaluasi calon tenaga pengajar',
                'satuan_hasil' => 'Laporan evaluasi calon tenaga pengajar',
                'score' => 0.02
            ],
            //393
            [
                'role_id' => 6,
                'sub_unsur_id' => 88,
                'nama' => 'Mengevaluasi waktu dan jadwal pembelajaran',
                'satuan_hasil' => 'Laporan evaluasi calon tenaga pengajar',
                'score' => 0.02
            ],
            //394
            [
                'role_id' => 6,
                'sub_unsur_id' => 88,
                'nama' => 'Mengidentifikasi sarana dan prasarana pendukung',
                'satuan_hasil' => 'Laporan identifikasi sarana dan prasarana pendukung',
                'score' => 0.02
            ],
            //395
            [
                'role_id' => 6,
                'sub_unsur_id' => 88,
                'nama' => 'Mengevaluasi materi pencegahan kebakaran',
                'satuan_hasil' => 'Laporan evaluasi materi pencegahan kebakaran',
                'score' => 0.02
            ],
            //396
            [
                'role_id' => 6,
                'sub_unsur_id' => 88,
                'nama' => 'Mengevaluasi materi penanggulangan kebakaran',
                'satuan_hasil' => 'Laporan evaluasi materi',
                'score' => 0.02
            ],
            //397
            [
                'role_id' => 6,
                'sub_unsur_id' => 88,
                'nama' => 'Mengevaluasi materi penyelamatan',
                'satuan_hasil' => 'Laporan evaluasi materi',
                'score' => 0.02
            ],
            //398
            [
                'role_id' => 6,
                'sub_unsur_id' => 88,
                'nama' => 'Mengevaluasi materi tentang B3 (Bahan berbahaya dan beracun)',
                'satuan_hasil' => 'Laporan evaluasi materi tentang B3 (Bahan berbahaya dan beracun)',
                'score' => 0.02
            ],

            //

            //399
            [
                'role_id' => 6,
                'sub_unsur_id' => 89,
                'nama' => 'Mengevaluasi cara memberikan instruksi',
                'satuan_hasil' => 'Laporan evaluasi cara memberikan instruksi',
                'score' => 0.02
            ],
            //400
            [
                'role_id' => 6,
                'sub_unsur_id' => 89,
                'nama' => 'Mengkaji metode pembelajaran',
                'satuan_hasil' => 'Laporan kajian metode pembelajaran',
                'score' => 0.02
            ],
            //401
            [
                'role_id' => 6,
                'sub_unsur_id' => 89,
                'nama' => 'Mengidentifikasi cara menggunakan alat bantu latihan',
                'satuan_hasil' => 'Laporan cara menggunakan alat bantu latihan',
                'score' => 0.02
            ],
            //402
            [
                'role_id' => 6,
                'sub_unsur_id' => 89,
                'nama' => 'Menganalisis cara menyampaikan materi',
                'satuan_hasil' => 'Laporan cara menyampaikan materi',
                'score' => 0.02
            ],

            //

            //403
            [
                'role_id' => 6,
                'sub_unsur_id' => 90,
                'nama' => 'Menganalisis studi literatur',
                'satuan_hasil' => 'Laporan studi literatur',
                'score' => 0.02
            ],
            //404
            [
                'role_id' => 6,
                'sub_unsur_id' => 90,
                'nama' => 'Menganalisis literatur sebagai bahan ajar',
                'satuan_hasil' => 'Laporan analisis literatur sebagai bahan ajar',
                'score' => 0.02
            ],
            //405
            [
                'role_id' => 6,
                'sub_unsur_id' => 90,
                'nama' => 'Menganalisis aplikasi software untuk bahan ajar',
                'satuan_hasil' => 'Laporan analisis aplikasi software untuk bahan ajar',
                'score' => 0.02
            ],
            //406
            [
                'role_id' => 6,
                'sub_unsur_id' => 90,
                'nama' => 'Mengidentifikasi alat simulasi peraga pembelajaran',
                'satuan_hasil' => 'Laporan identifikasi alat simulasi peraga pembelajaran',
                'score' => 0.02
            ],

            //

            //407
            [
                'role_id' => 6,
                'sub_unsur_id' => 91,
                'nama' => 'Mengevaluasi pre test',
                'satuan_hasil' => 'Laporan evaluasi pre test',
                'score' => 0.1
            ],
            //408
            [
                'role_id' => 6,
                'sub_unsur_id' => 91,
                'nama' => 'Menginventrisasi literatur sebagai bahan ajar',
                'satuan_hasil' => 'Laporan literatur sebagai bahan ajar',
                'score' => 0.1
            ],
            //409
            [
                'role_id' => 6,
                'sub_unsur_id' => 91,
                'nama' => 'Mengolah bahan ajar dengan aplikasi perangkat lunak',
                'satuan_hasil' => 'Laporan aplikasi software untuk bahan ajar',
                'score' => 0.1
            ],
            //410
            [
                'role_id' => 6,
                'sub_unsur_id' => 91,
                'nama' => 'Menginventrisasi alat simulasi peraga pembelajaran',
                'satuan_hasil' => 'Laporan alat simulasi peraga pembelajaran',
                'score' => 0.1
            ],
            //411
            [
                'role_id' => 6,
                'sub_unsur_id' => 91,
                'nama' => 'Mengajar materi pencegahan kebakaran',
                'satuan_hasil' => 'Laporan materi pencegahan kebakaran',
                'score' => 0.1
            ],
            //412
            [
                'role_id' => 6,
                'sub_unsur_id' => 91,
                'nama' => 'Mengajar materi penanggulangan kebakaran',
                'satuan_hasil' => 'Laporan materi penanggulangan kebakaran',
                'score' => 0.1
            ],
            //413
            [
                'role_id' => 6,
                'sub_unsur_id' => 91,
                'nama' => 'Mengajar materi penyelamatan',
                'satuan_hasil' => 'Laporan materi penyelamatan',
                'score' => 0.1
            ],
            //414
            [
                'role_id' => 6,
                'sub_unsur_id' => 91,
                'nama' => 'Mengajar materi tentang B3',
                'satuan_hasil' => 'Laporan materi tentang B3',
                'score' => 0.1
            ],
            //415
            [
                'role_id' => 6,
                'sub_unsur_id' => 91,
                'nama' => 'Mengajar materi penunjang lainnya',
                'satuan_hasil' => 'Laporan materi penunjang lainnya',
                'score' => 0.1
            ],
            //416
            [
                'role_id' => 6,
                'sub_unsur_id' => 91,
                'nama' => 'mengevaluasi post test',
                'satuan_hasil' => 'Laporan post test',
                'score' => 0.1
            ],

            //

            //417
            [
                'role_id' => 6,
                'sub_unsur_id' => 92,
                'nama' => 'Mengevaluasi terhadap pengajar',
                'satuan_hasil' => 'Dokumen evaluasi terhadap pengajar',
                'score' => 0.02
            ],
            //418
            [
                'role_id' => 6,
                'sub_unsur_id' => 92,
                'nama' => 'Mengevaluasi terhadap penyelenggaraan pendidikan dan pelatihan',
                'satuan_hasil' => 'Dokumen evaluasi terhadap penyelenggaraan pendidikan dan pelatihan',
                'score' => 0.02
            ],
            //419
            [
                'role_id' => 6,
                'sub_unsur_id' => 92,
                'nama' => 'Mengkaji hasil isian form evaluasi pengajar dan penyelenggaraan pendidikan dan pelatihan',
                'satuan_hasil' => 'Dokumen hasil isian form evaluasi pengajar dan penyelenggaraan pendidikan dan pelatihan',
                'score' => 0.02
            ],
            //420
            [
                'role_id' => 6,
                'sub_unsur_id' => 92,
                'nama' => 'Memverifikasi rekapitulasi hasil isian form evaluasi pengajar penyelenggaraan pendidikan dan pelatihan',
                'satuan_hasil' => 'Dokumen rekapitulasi hasil isian form evaluasi pengajar penyelenggaraan pendidikan dan pelatihan',
                'score' => 0.02
            ],

            //

            //421
            [
                'role_id' => 7,
                'sub_unsur_id' => 93,
                'nama' => 'Menelaah Peraturan Perundang undangan tentang pencegahan kebakaran',
                'satuan_hasil' => 'Laporan hasil telaahan Peraturan Perundang undangan tentang pencegahan kebakaran',
                'score' => 1.98
            ],
            //422
            [
                'role_id' => 7,
                'sub_unsur_id' => 93,
                'nama' => 'Mengindetifikasi data potensi ancaman kebakaran',
                'satuan_hasil' => 'Dokumen indetifikasi data potensi ancaman kebakaran',
                'score' => 1.98
            ],
            //423
            [
                'role_id' => 7,
                'sub_unsur_id' => 93,
                'nama' => 'mengindefikasi data pemetaan wilayah rawan kebakaran',
                'satuan_hasil' => 'Dokumen indefikasi data pemetaan wilayah rawan kebakaran',
                'score' => 1.98
            ],
            //424
            [
                'role_id' => 7,
                'sub_unsur_id' => 93,
                'nama' => 'Mengkaji kebutuhan data WMK (wilayah manajamen kebakaran)',
                'satuan_hasil' => 'Laporan kebutuhan data WMK (wilayah manajamen kebakaran)',
                'score' => 1.98
            ],
            //425
            [
                'role_id' => 7,
                'sub_unsur_id' => 93,
                'nama' => 'Mengkaji data kebutuhan Pos Pemadam Kebakaran',
                'satuan_hasil' => 'Laporan data kebutuhan Pos Pemadam Kebakaran',
                'score' => 1.98
            ],
            //426
            [
                'role_id' => 7,
                'sub_unsur_id' => 93,
                'nama' => 'Menganalisis data kebutuhan Sarana prasarana Unit Pemadam Kebakaran',
                'satuan_hasil' => 'Laporan analisis data kebutuhan Sarana prasarana Unit Pemadam Kebakaran',
                'score' => 1.98
            ],
            //427
            [
                'role_id' => 7,
                'sub_unsur_id' => 93,
                'nama' => 'Menganalisis kebutuhan data sumber daya manusia pemadam kebakaran',
                'satuan_hasil' => 'Laporan analisis kebutuhan data sumber daya manusia pemadam kebakaran',
                'score' => 1.98
            ],
            //428
            [
                'role_id' => 7,
                'sub_unsur_id' => 93,
                'nama' => 'Mengkaji data program dan kegiatan pencegahan dan penanggulangan kebakaran',
                'satuan_hasil' => 'Dokumen data program dan kegiatan pencegahan dan penanggulangan kebakaran',
                'score' => 1.98
            ],
            //429
            [
                'role_id' => 7,
                'sub_unsur_id' => 93,
                'nama' => 'Mengkaji data produk hukum perundangan tentang pencegahan dan penanggulangan kebakaran',
                'satuan_hasil' => 'Dokumen data produk hukum perundangan tentang pencegahan dan penanggulangan kebakaran',
                'score' => 1.98
            ],

            //

            //430
            [
                'role_id' => 7,
                'sub_unsur_id' => 94,
                'nama' => 'mengidentifikasi jumlah, jenis dan lokasi keberadaan B3',
                'satuan_hasil' => 'Laporan identifikasi jumlah, jenis dan lokasi keberadaan B3',
                'score' => 0.6
            ],
            //431
            [
                'role_id' => 7,
                'sub_unsur_id' => 94,
                'nama' => 'mengklasifikasi jenis B3',
                'satuan_hasil' => 'mengklasifikasi jenis B3',
                'score' => 0.6
            ],
            //432
            [
                'role_id' => 7,
                'sub_unsur_id' => 94,
                'nama' => 'mengkaji MSDS (material safety data sheet) jenis B3',
                'satuan_hasil' => 'Dokumen MSDS (material safety data sheet) jenis B3',
                'score' => 0.6
            ],
            //433
            [
                'role_id' => 7,
                'sub_unsur_id' => 94,
                'nama' => 'mengevaluasi SOP penanganan B3',
                'satuan_hasil' => 'Dokumen SOP penanganan B3',
                'score' => 0.6
            ],
            //434
            [
                'role_id' => 7,
                'sub_unsur_id' => 94,
                'nama' => 'menganalisis kebutuhan APD dalam penanganan B3',
                'satuan_hasil' => 'Dokumen kebutuhan APD dalam penanganan B3',
                'score' => 0.6
            ],
            //435
            [
                'role_id' => 7,
                'sub_unsur_id' => 94,
                'nama' => 'mengkaji pengendalian B3 kepada masing-masing perusahaan',
                'satuan_hasil' => 'Laporan pengendalian B3 kepada masing-masing perusahaan',
                'score' => 0.6
            ],
            //436
            [
                'role_id' => 7,
                'sub_unsur_id' => 94,
                'nama' => 'mengkaji pengawasan pola angkut dan penempatan B3',
                'satuan_hasil' => 'Laporan pengawasan pola angkut dan penempatan B3',
                'score' => 0.6
            ],
            //437
            [
                'role_id' => 7,
                'sub_unsur_id' => 94,
                'nama' => 'mengindetifikasi data sosialisasi bahaya B',
                'satuan_hasil' => 'Laporan indetifikasi data sosialisasi bahaya B',
                'score' => 0.6
            ],

            //

            //438
            [
                'role_id' => 7,
                'sub_unsur_id' => 95,
                'nama' => 'memverifikasi data hasil pemeriksaan',
                'satuan_hasil' => 'Laporan verifikasi data hasil pemeriksaan',
                'score' => 0.6
            ],
            //439
            [
                'role_id' => 7,
                'sub_unsur_id' => 95,
                'nama' => 'memverifikasi data hasil pemeriksaan ke lapangan',
                'satuan_hasil' => 'Laporan verifikasi data hasil pemeriksaan ke lapangan',
                'score' => 0.6
            ],
            //440
            [
                'role_id' => 7,
                'sub_unsur_id' => 95,
                'nama' => 'mengevaluasi hasil pemeriksaan keselamatan kebakaran dengan instansi terkait',
                'satuan_hasil' => 'Laporan evaluasi dengan instansi terkait',
                'score' => 0.6
            ],
            //441
            [
                'role_id' => 7,
                'sub_unsur_id' => 95,
                'nama' => 'melaksanakan rapat koordinasi tentang tindak lanjut hasil verifikasi',
                'satuan_hasil' => 'Laporan rapat koordinasi tentang tindak lanjut hasil verifikasi',
                'score' => 0.6
            ],
            //442
            [
                'role_id' => 7,
                'sub_unsur_id' => 95,
                'nama' => 'memberikan tindakan sanksi terhadap pelanggaran keselamatan gedung.',
                'satuan_hasil' => 'Laporan tindakan sanksi terhadap pelanggaran keselamatan gedung.',
                'score' => 0.6
            ],

            //

            //443
            [
                'role_id' => 7,
                'sub_unsur_id' => 96,
                'nama' => 'mengkaji prosedur dan metode teknik investigasi',
                'satuan_hasil' => 'Laporan prosedur dan metode teknik investigasi.',
                'score' => 2.25
            ],
            //444
            [
                'role_id' => 7,
                'sub_unsur_id' => 96,
                'nama' => 'Mengindentifikasi penggunaan alat bantu investigasi',
                'satuan_hasil' => 'Laporan indetifikasi penggunaan alat bantu investigasi',
                'score' => 2.25
            ],
            //445
            [
                'role_id' => 7,
                'sub_unsur_id' => 96,
                'nama' => 'Mengkoordinasikan hasil investigasi dengan Puslabforpolri/instansi terkait',
                'satuan_hasil' => 'Laporan koordinasi hasil investigasi dengan Puslabforpolri/instansi terkait',
                'score' => 2.25
            ],
            //446
            [
                'role_id' => 7,
                'sub_unsur_id' => 96,
                'nama' => 'Menganalisis teori dasar penyelidikan kebakaran',
                'satuan_hasil' => 'Laporan teori dasar penyelidikan kebakaran',
                'score' => 2.25
            ],
            //447
            [
                'role_id' => 7,
                'sub_unsur_id' => 96,
                'nama' => 'Mengkaji pengaturan standar teknis proteksi kebakaran',
                'satuan_hasil' => 'Dokumen pengaturan standar teknis proteksi kebakaran',
                'score' => 2.25
            ],
            //448
            [
                'role_id' => 7,
                'sub_unsur_id' => 96,
                'nama' => 'Mengindetifikasi data laporan investigasi',
                'satuan_hasil' => 'Dokumen indetifikasi data laporan investigasi',
                'score' => 2.25
            ],

            //

        ];
        ButirKegiatan::query()->upsert($analis_kebakaran_ahli_pertama_dan_analis_kebakaran_ahli_muda1, 'id');
    }
}
