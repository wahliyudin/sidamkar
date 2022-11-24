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
                'sub_unsur_id' => 1,
                'nama' => 'Mempersiapkan kelengkapan pemadaman',
                'satuan_hasil' => 'Dokumen kelengkapan',
                'score' => 0.002
            ],
            // 2
            [
                'sub_unsur_id' => 1,
                'nama' => 'Melaksanakan Apel Pagi',
                'satuan_hasil' => 'Laporan Apel Pagi',
                'score' => 0.002
            ],
            // 3
            [
                'sub_unsur_id' => 1,
                'nama' => 'Melaksanakan serah terima tugas jaga',
                'satuan_hasil' => 'Laporan serah terima tugas jaga',
                'score' => 0.002
            ],
            // 4
            [
                'sub_unsur_id' => 1,
                'nama' => 'Melaksanakan pemeriksaan jumlah peralatan operasional',
                'satuan_hasil' => 'Laporan pemeriksaan jumlah peralatan operasional',
                'score' => 0.002
            ],
            // 5
            [
                'sub_unsur_id' => 1,
                'nama' => 'Melaksanakan pengecekan fungsi peralatan operasional',
                'satuan_hasil' => 'Laporan pengecekan fungsi peralatan operasional',
                'score' => 0.002
            ],
            // 6
            [
                'sub_unsur_id' => 1,
                'nama' => 'Membuat laporan sesuai dengan form check list',
                'satuan_hasil' => 'Dokumen sesuai dengan form check list',
                'score' => 0.002
            ],
            // 7
            [
                'sub_unsur_id' => 2,
                'nama' => 'Melaksanakan piket sesuai dengan consignus jaga (tata kelola)',
                'satuan_hasil' => 'Laporan piket sesuai dengan consignus jaga (tata kelola)',
                'score' => 0.002
            ],
            // 8
            [
                'sub_unsur_id' => 2,
                'nama' => 'Melakukan Monitoring kejadian kebakaran dan penyelamatan',
                'satuan_hasil' => 'Laporan Monitoring kejadian kebakaran dan penyelamatan',
                'score' => 0.002
            ],
            // 9
            [
                'sub_unsur_id' => 3,
                'nama' => 'Mempersiapkan kelengkapan operasional pemadaman dan penyelamatan',
                'satuan_hasil' => 'Laporan kelengkapan',
                'score' => 0.002
            ],
            // 10
            [
                'sub_unsur_id' => 3,
                'nama' => 'Melaksanakan apel malam',
                'satuan_hasil' => 'Laporan apel malam',
                'score' => 0.002
            ],
            // 11
            [
                'sub_unsur_id' => 3,
                'nama' => 'Melaksanakan pemeriksaan jumlah peralatan operasional',
                'satuan_hasil' => 'Laporan pemeriksaan jumlah peralatan operasional',
                'score' => 0.002
            ],
            // 12
            [
                'sub_unsur_id' => 3,
                'nama' => 'Melaksanakan pengecekan fungsi peralatan operasional',
                'satuan_hasil' => 'Laporan pengecekan fungsi peralatan operasional',
                'score' => 0.002
            ],
            // 13
            [
                'sub_unsur_id' => 3,
                'nama' => 'Membuat laporan sesuai dengan form check list',
                'satuan_hasil' => 'Dokumen sesuai dengan form check list',
                'score' => 0.002
            ],
            // 14
            [
                'sub_unsur_id' => 4,
                'nama' => 'Mempersiapkan peralatan latihan',
                'satuan_hasil' => 'Laporan peralatan latihan ',
                'score' => 0.002
            ],
            // 15
            [
                'sub_unsur_id' => 4,
                'nama' => 'Melakukan latihan penggunaan peralatan',
                'satuan_hasil' => 'Laporan latihan penggunaan peralatan',
                'score' => 0.002
            ],
            // 16
            [
                'sub_unsur_id' => 4,
                'nama' => 'Merapikan kembali peralatan yang digunakan',
                'satuan_hasil' => 'Laporan kembali peralatan yang digunakan',
                'score' => 0.002
            ],
            // 17
            [
                'sub_unsur_id' => 5,
                'nama' => 'Melaksanakan kegiatan pembinaan fisik',
                'satuan_hasil' => 'Laporan kegiatan pembinaan fisik',
                'score' => 0.002
            ],
            // 18
            [
                'sub_unsur_id' => 6,
                'nama' => 'Melaksanakan korve di lingkungan kerja',
                'satuan_hasil' => 'Laporan korve di lingkungan kerja',
                'score' => 0.002
            ],
            // 19
            [
                'sub_unsur_id' => 6,
                'nama' => 'Melaksanakan pembersihan unit mobil',
                'satuan_hasil' => 'Laporan pembersihan unit mobil',
                'score' => 0.002
            ],
            //20
            [
                'sub_unsur_id' => 7,
                'nama' => 'Mencatat informasi kejadian kebakaran',
                'satuan_hasil' => 'Laporan informasi kejadian kebakaran',
                'score' => 0.002
            ],
            // 21
            [
                'sub_unsur_id' => 7,
                'nama' => 'Melaporkan informasi kejadian kebakaran',
                'satuan_hasil' => 'Laporan informasi kejadian kebakaran',
                'score' => 0.002
            ],
            // 22
            [
                'sub_unsur_id' => 8,
                'nama' => 'Menerima perintah dari Kepala Regu pasca Informasi kejadian kebakaran',
                'satuan_hasil' => 'Laporan saat diperintah oleh Kepala Regu pasca Informasi kejadian kebakaran',
                'score' => 0.002
            ],
            // 23
            [
                'sub_unsur_id' => 8,
                'nama' => 'Melaksanakan perintah dari Kepala Regu pasca Informasi kejadian kebakaran',
                'satuan_hasil' => 'Laporan dalam melaksanakan perintah dari Kepala Regu pasca Informasi kejadian kebakaran',
                'score' => 0.002
            ],
            // 24
            [
                'sub_unsur_id' => 8,
                'nama' => 'Melakukan koordinasi dengan tim atau dengan anggota tim lain',
                'satuan_hasil' => 'Laporan koordinasi dengan tim atau dengan anggota tim lain',
                'score' => 0.002
            ],
            // 25
            [
                'sub_unsur_id' => 9,
                'nama' => 'Memakai alat pelindung diri',
                'satuan_hasil' => 'Laporan alat pelindung diri',
                'score' => 0.002
            ],
            // 26
            [
                'sub_unsur_id' => 9,
                'nama' => 'Menempati posisi duduk sesuai dengan formasi unit',
                'satuan_hasil' => 'Laporan posisi duduk sesuai dengan formasi unit',
                'score' => 0.002
            ],
            // 27
            [
                'sub_unsur_id' => 9,
                'nama' => 'Melakukan koordinasi internal unit',
                'satuan_hasil' => 'Laporan koordinasi internal unit',
                'score' => 0.002
            ],
            // 28
            [
                'sub_unsur_id' => 10,
                'nama' => 'Mengeluarkan peralatan pemadaman kebakaran dari unit mobil',
                'satuan_hasil' => 'Laporan peralatan pemadaman kebakaran dari unit mobil',
                'score' => 0.002
            ],
            // 29
            [
                'sub_unsur_id' => 10,
                'nama' => 'Mengoperasikan peralatan pemadaman kebakaran',
                'satuan_hasil' => 'Laporan mengoperasikan peralatan pemadaman kebakaran',
                'score' => 0.006
            ],
            // 30
            [
                'sub_unsur_id' => 10,
                'nama' => 'Melaksanakan pemadaman kebakaran',
                'satuan_hasil' => 'Laporan pelaksanakan pemadaman kebakaran',
                'score' => 0.006
            ],
            // 31
            [
                'sub_unsur_id' => 11,
                'nama' => 'Melakukan penyiraman untuk pendinginan',
                'satuan_hasil' => 'Laporan penyiraman untuk pendinginan',
                'score' => 0.002
            ],
            // 32
            [
                'sub_unsur_id' => 11,
                'nama' => 'Melakukan penyisiran titik api yang tersisa',
                'satuan_hasil' => 'Laporan penyisiran titik api yang tersisa',
                'score' => 0.002
            ],
            // 33
            [
                'sub_unsur_id' => 11,
                'nama' => 'Melaporkan kepada kepala regu',
                'satuan_hasil' => 'Laporan kepada kepala regu',
                'score' => 0.002
            ],
            // 34
            [
                'sub_unsur_id' => 12,
                'nama' => 'Mengemas peralatan yang telah digunakan',
                'satuan_hasil' => 'Laporan pengemasan peralatan yang telah digunakan',
                'score' => 0.002
            ],
            // 35
            [
                'sub_unsur_id' => 12,
                'nama' => 'Mengecek kelengkapan peralatan',
                'satuan_hasil' => 'Laporan kelengkapan peralatan',
                'score' => 0.002
            ],
            // 36
            [
                'sub_unsur_id' => 12,
                'nama' => 'mengikuti apel pengecekan personil',
                'satuan_hasil' => 'Laporan apel pengecekan personil',
                'score' => 0.002
            ],
            // 37
            [
                'sub_unsur_id' => 13,
                'nama' => 'Membersihkan unit, APD dan peralatan',
                'satuan_hasil' => 'Laporan pembersihan unit, APD dan peralatan',
                'score' => 0.002
            ],
            // 38
            [
                'sub_unsur_id' => 13,
                'nama' => 'Menempatkan kembali peralatan yang telah digunakan',
                'satuan_hasil' => 'Laporan penempatan kembali peralatan yang telah digunakan',
                'score' => 0.002
            ],
            // 39
            [
                'sub_unsur_id' => 14,
                'nama' => 'Menerima informasi evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan informasi evakuasi dan penyelamatan',
                'score' => 0.002
            ],
            // 40
            [
                'sub_unsur_id' => 14,
                'nama' => 'Mencatat informasi evakuasi dan penyelamatan',
                'satuan_hasil' => 'Dokumen informasi evakuasi dan penyelamatan',
                'score' => 0.002
            ],
            // 41
            [
                'sub_unsur_id' => 15,
                'nama' => 'Melaporkan kejadian evakuasi dan penyelamatan kepada kepala regu',
                'satuan_hasil' => 'Laporan kejadian evakuasi dan penyelamatan kepada kepala regu',
                'score' => 0.002
            ],
            // 42
            [
                'sub_unsur_id' => 15,
                'nama' => 'Melaksanakan perintah dari Kepala Reguu',
                'satuan_hasil' => 'Laporan menerima perintah dari kepala regu',
                'score' => 0.002
            ],
            // 43
            [
                'sub_unsur_id' => 15,
                'nama' => 'Melakukan koordinasi dengan anggota Tim',
                'satuan_hasil' => 'Laporan koordinasi dengan anggota Tim',
                'score' => 0.002
            ],
            // 44
            [
                'sub_unsur_id' => 16,
                'nama' => 'menggunakan APD dan berangkat menuju TKP',
                'satuan_hasil' => 'Laporan menggunakan APD dan berangkat menuju TKP',
                'score' => 0.002
            ],
            // 45
            [
                'sub_unsur_id' => 16,
                'nama' => 'Melaksanakan Evakuasi dan Penyelamatan',
                'satuan_hasil' => 'Laporan Evakuasi dan Penyelamatan',
                'score' => 0.002
            ],
            // 46
            [
                'sub_unsur_id' => 17,
                'nama' => 'Menghimpun data evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan data evakuasi dan penyelamatan',
                'score' => 0.002
            ],
            // 47
            [
                'sub_unsur_id' => 17,
                'nama' => 'Menyusun laporan kejadian evakuasi dan penyelamatan',
                'satuan_hasil' => 'Menyusun laporan kejadian evakuasi dan penyelamatan',
                'score' => 0.002
            ],
            // 48
            [
                'sub_unsur_id' => 17,
                'nama' => 'Mendokumentasikan dan melaporkan kejadian evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan kejadian evakuasi dan penyelamatan',
                'score' => 0.002
            ]
        ];
        ButirKegiatan::query()->upsert($damkarPemula, 'id');



        $terampil = [
            // 49
            [
                'sub_unsur_id' => 18,
                'nama' => 'Mempersiapkan personil',
                'satuan_hasil' => 'Laporan kesiapan personil',
                'score' => 0.004
            ],
            // 50
            [
                'sub_unsur_id' => 18,
                'nama' => 'Mengkoordinir Apel Tingkat Regu',
                'satuan_hasil' => 'Laporan Apel Tingkat Regu',
                'score' => 0.004
            ],
            // 51
            [
                'sub_unsur_id' => 18,
                'nama' => 'Memeriksa kondisi volume air tangki unit',
                'satuan_hasil' => 'Laporan kondisi volume air tangki unit',
                'score' => 0.004
            ],
            // 52
            [
                'sub_unsur_id' => 18,
                'nama' => 'Melaksanakan pengecekan peralatan unit mobil',
                'satuan_hasil' => 'Laporan pengecekan peralatan unit mobil',
                'score' => 0.004
            ],
            // 53
            [
                'sub_unsur_id' => 18,
                'nama' => 'Memeriksa fungsi Pompa/ PTO, rem, level bahan bakar, Oli, Radiator, Accu, Minyak Kopling, tekanan angin roda',
                'satuan_hasil' => 'Laporan fungsi Pompa/ PTO, rem, level bahan bakar, Oli, Radiator, Accu,Minyak Kopling, tekanan angin roda',
                'score' => 0.004
            ],
            // 54
            [
                'sub_unsur_id' => 18,
                'nama' => 'Memanaskan mesin kendaraan',
                'satuan_hasil' => 'Laporan mesin kendaraan',
                'score' => 0.004
            ],
            // 55
            [
                'sub_unsur_id' => 18,
                'nama' => 'Memeriksa fungsi lampu rotary, sirine, dan lampu kendaraan',
                'satuan_hasil' => 'Memeriksa fungsi lampu rotary, sirine,dan lampu kendaraan',
                'score' => 0.004
            ],
            // 56
            [
                'sub_unsur_id' => 18,
                'nama' => 'Memeriksa fungsi alat komunikasi Rig dan HT',
                'satuan_hasil' => 'Memeriksa fungsi alat komunikasi Rig dan HT',
                'score' => 0.004
            ],
            // 57
            [
                'sub_unsur_id' => 18,
                'nama' => 'Melaksanakan serah terima unit mobil',
                'satuan_hasil' => 'Laporan serah terima unit mobil',
                'score' => 0.004
            ],
            // 58
            [
                'sub_unsur_id' => 18,
                'nama' => 'Membuat laporan sesuai dengan form check list',
                'satuan_hasil' => 'Dokumen sesuai dengan form check list',
                'score' => 0.004
            ],
            // 59
            [
                'sub_unsur_id' => 19,
                'nama' => 'Melaksanakan piket sesuai dengan consignus jaga (tata kelola)',
                'satuan_hasil' => 'Laporan piket sesuai dengan consignus jaga (tata kelola)',
                'score' => 0.004
            ],
            // 60
            [
                'sub_unsur_id' => 19,
                'nama' => 'Melakukan Monitoring kejadian kebakaran dan penyelamatan',
                'satuan_hasil' => 'Laporan kejadian kebakaran dan penyelamatan',
                'score' => 0.008
            ],
            // 61
            [
                'sub_unsur_id' => 20,
                'nama' => 'Mempersiapkan kelengkapan unit mobil',
                'satuan_hasil' => 'Laporan kelengkapan unit mobil',
                'score' => 0.004
            ],
            // 62
            [
                'sub_unsur_id' => 20,
                'nama' => 'Melaksanakan apel malam',
                'satuan_hasil' => 'Laporan apel malam',
                'score' => 0.004
            ],
            // 63
            [
                'sub_unsur_id' => 20,
                'nama' => 'Melaksanakan pengecekan fungsi peralatan unit mobil',
                'satuan_hasil' => 'Laporan pengecekan fungsi peralatan unit mobil',
                'score' => 0.004
            ],
            // 64
            [
                'sub_unsur_id' => 20,
                'nama' => 'Memanaskan mesin unit mobil',
                'satuan_hasil' => 'Laporan mesin unit mobil',
                'score' => 0.004
            ],
            // 65
            [
                'sub_unsur_id' => 20,
                'nama' => 'Memeriksa fungsi lampu rotary, sirine, dan lampu kendaraan',
                'satuan_hasil' => 'Laporan fungsi lampu rotary, sirine, dan lampu kendaraan',
                'score' => 0.004
            ],
            // 66
            [
                'sub_unsur_id' => 20,
                'nama' => 'Memeriksa fungsi alat komunikasi Rig dan HT',
                'satuan_hasil' => 'Laporan fungsi alat komunikasi Rig dan HT',
                'score' => 0.004
            ],
            // 67
            [
                'sub_unsur_id' => 20,
                'nama' => 'Memeriksa kondisi volume air tangki unit mobil',
                'satuan_hasil' => 'Laporan kondisi volume air tangki unit mobil',
                'score' => 0.004
            ],
            // 68
            [
                'sub_unsur_id' => 20,
                'nama' => 'Membuat laporan sesuai dengan form check list.',
                'satuan_hasil' => 'Dokumen sesuai dengan form check list.',
                'score' => 0.004
            ],
            // 69
            [
                'sub_unsur_id' => 21,
                'nama' => 'Mempersiapkan peralatan latihan',
                'satuan_hasil' => 'Laporan peralatan latihan',
                'score' => 0.004
            ],
            // 70
            [
                'sub_unsur_id' => 21,
                'nama' => 'Melakukan latihan penggunaan peralatan khusus',
                'satuan_hasil' => 'Laporan latihan penggunaan peralatan khusus',
                'score' => 0.004
            ],
            // 71
            [
                'sub_unsur_id' => 21,
                'nama' => 'Merapikan kembali peralatan yang',
                'satuan_hasil' => 'Laporan peralatan yang digunakan',
                'score' => 0.004
            ],
            // 72
            [
                'sub_unsur_id' => 22,
                'nama' => 'Melaksanakan kegiatan pembinaan fisik',
                'satuan_hasil' => 'Laporan kegiatan pembinaan fisik',
                'score' => 0.004
            ],
            // 73
            [
                'sub_unsur_id' => 23,
                'nama' => 'Melaksanakan korve di lingkungan kerja',
                'satuan_hasil' => 'Laporan korve di lingkungan kerja',
                'score' => 0.004
            ],
            // 74
            [
                'sub_unsur_id' => 23,
                'nama' => 'Melaksanakan kebersihan unit',
                'satuan_hasil' => 'Laporan kebersihan unit',
                'score' => 0.004
            ],
            // 75
            [
                'sub_unsur_id' => 24,
                'nama' => 'Mencatat kondisi sistem pengendalian komunikasi penanggulangan kebakaran',
                'satuan_hasil' => 'Dokumen kondisi sistem pengendalian komunikasi penanggulangan kebakaran',
                'score' => 0.004
            ],
            // 76
            [
                'sub_unsur_id' => 25,
                'nama' => 'Menyiapkan kelengkapan Poskotis (Pos Komando Taktis) penanggulangan kebakaran',
                'satuan_hasil' => 'Laporan kelengkapan Poskotis (Pos Komando Taktis) penanggulangan kebakaran',
                'score' => 0.004
            ],
            // 77
            [
                'sub_unsur_id' => 25,
                'nama' => 'Mengumpulkan data untuk kebutuhan poskotis penanggulangan kebakaran',
                'satuan_hasil' => 'Dokumen data untuk kebutuhan poskotis penanggulangan kebakaran',
                'score' => 0.004
            ],
            // 78
            [
                'sub_unsur_id' => 25,
                'nama' => 'Melaporkan data dan informasi penanggulangan kebakaran',
                'satuan_hasil' => 'Dokumen data dan informasi penanggulangan kebakaran',
                'score' => 0.004
            ],
            // 79
            [
                'sub_unsur_id' => 26,
                'nama' => 'Melaksanakan inventarisasi sarana prasarana komunikasi penanggulangan kebakaran',
                'satuan_hasil' => 'Laporan inventarisasi sarana prasarana komunikasi penanggulangan kebakaran',
                'score' => 0.004
            ],
            // 80
            [
                'sub_unsur_id' => 26,
                'nama' => 'Melaksanakan pengecekan sarana prasarana komunikasi penanggulangan kebakaran',
                'satuan_hasil' => 'Laporan pengecekan sarana prasarana komunikasi penanggulangan kebakaran',
                'score' => 0.004
            ],
            // 81
            [
                'sub_unsur_id' => 26,
                'nama' => 'Melakukan pemeliharaan peralatan komunikasi penanggulangan kebakaran',
                'satuan_hasil' => 'Laporan pemeliharaan peralatan komunikasi penanggulangan kebakaran',
                'score' => 0.004
            ],
            // 82
            [
                'sub_unsur_id' => 26,
                'nama' => 'Memakai alat pelindung diri pengemudi',
                'satuan_hasil' => 'Laporan alat pelindung diri pengemudi',
                'score' => 0.004
            ],
            // 83
            [
                'sub_unsur_id' => 27,
                'nama' => 'Menyiapkan peralatan komunikasi pengemudi',
                'satuan_hasil' => 'Laporan peralatan komunikasi pengemudi',
                'score' => 0.004
            ],
            // 84
            [
                'sub_unsur_id' => 27,
                'nama' => 'Mengemudikan Mobil Pemadam Kebakaran menuju TKP',
                'satuan_hasil' => 'Laporan Mobil Pemadam Kebakaran menuju TKP',
                'score' => 0.004
            ],
            // 85
            [
                'sub_unsur_id' => 27,
                'nama' => 'Mengatur posisi Unit Mobil Pemadam Kebakaran di TKP',
                'satuan_hasil' => 'Laporan posisi Unit Mobil Pemadam Kebakaran di TKP',
                'score' => 0.004
            ],
            // 86
            [
                'sub_unsur_id' => 27,
                'nama' => 'Melakukan koordinasi internal unit',
                'satuan_hasil' => 'Laporan koordinasi internal unit',
                'score' => 0.004
            ],
            // 87
            [
                'sub_unsur_id' => 28,
                'nama' => 'Mempersiapkan sistem pompa/PTO unit',
                'satuan_hasil' => 'Laporan sistem pompa/PTO unit ',
                'score' => 0.004
            ],
            // 88
            [
                'sub_unsur_id' => 28,
                'nama' => 'Mengoperasikan pompa / PTO unit',
                'satuan_hasil' => 'Laporan pompa / PTO unit',
                'score' => 0.004
            ],
            // 89
            [
                'sub_unsur_id' => 28,
                'nama' => 'Menyambung kopling selang ke kopling unit',
                'satuan_hasil' => 'Laporan kopling selang ke kopling unit ',
                'score' => 0.004
            ],
            // 90
            [
                'sub_unsur_id' => 28,
                'nama' => 'Melayani kebutuhan air dan tekanan pompa yang diperlukan',
                'satuan_hasil' => 'Laporan kebutuhan air dan tekanan pompa yang diperlukan',
                'score' => 0.004
            ],
            // 91
            [
                'sub_unsur_id' => 28,
                'nama' => 'Melaksanakan pengisian tangki air',
                'satuan_hasil' => 'Laporan pengisian tangki air',
                'score' => 0.004
            ],
            // 92
            [
                'sub_unsur_id' => 28,
                'nama' => 'Melaksanakan suplai air',
                'satuan_hasil' => 'Laporan suplai air',
                'score' => 0.004
            ],
            // 93
            [
                'sub_unsur_id' => 29,
                'nama' => 'Mengemas peralatan yang digunakan',
                'satuan_hasil' => 'Laporan peralatan yang digunakan',
                'score' => 0.004
            ],
            // 94
            [
                'sub_unsur_id' => 29,
                'nama' => 'Mengecek kelengkapan peralatan',
                'satuan_hasil' => 'Laporan kelengkapan peralatan',
                'score' => 0.004
            ],
            // 95
            [
                'sub_unsur_id' => 29,
                'nama' => 'Mengikuti apel pengecekan personil',
                'satuan_hasil' => 'Laporan apel pengecekan personil',
                'score' => 0.004
            ],
            // 96
            [
                'sub_unsur_id' => 29,
                'nama' => 'Melakukan pengisian tangki air unit',
                'satuan_hasil' => 'Laporan pengisian tangki air unit',
                'score' => 0.004
            ],
            // 97
            [
                'sub_unsur_id' => 29,
                'nama' => 'Mengemudikan unit menuju pos pemadam kebakaran',
                'satuan_hasil' => 'Laporan unit menuju pos pemadam kebakaran',
                'score' => 0.004
            ],
            // 98
            [
                'sub_unsur_id' => 30,
                'nama' => 'Membersihkan unit, APD dan peralatan',
                'satuan_hasil' => 'Laporan unit, APD dan peralatan',
                'score' => 0.004
            ],
            // 99
            [
                'sub_unsur_id' => 30,
                'nama' => 'Menguras dan mengisi tangki air mobil pemadam kebakaran',
                'satuan_hasil' => 'Laporan tangki air mobil pemadam kebakaran',
                'score' => 0.004
            ],
            // 100
            [
                'sub_unsur_id' => 30,
                'nama' => 'Memeriksa kondisi mobil pemadam kebakaran',
                'satuan_hasil' => 'Laporan kondisi mobil pemadam kebakaran',
                'score' => 0.004
            ],
            // 101
            [
                'sub_unsur_id' => 30,
                'nama' => 'Menempatkan kembali mobil pemada kebakaran pada posisi yang telah ditentukan',
                'satuan_hasil' => 'Laporan mobil pemadam kebakaran pada posisi yang telah ditentukan',
                'score' => 0.004
            ],
            // 102
            [
                'sub_unsur_id' => 31,
                'nama' => 'mencatat data informasi kejadian evakuasi dan penyelamatan',
                'satuan_hasil' => 'Dokumen data informasi kejadian evakuasi dan penyelamatan',
                'score' => 0.004
            ],
            // 103
            [
                'sub_unsur_id' => 32,
                'nama' => 'Membuat poskotis evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan poskotis evakuasi dan penyelamatan',
                'score' => 0.004
            ],
            // 104
            [
                'sub_unsur_id' => 32,
                'nama' => 'Mengumpulkan dan mengolah data untuk kebutuhan poskotis evakuasi dan penyelamatan',
                'satuan_hasil' => 'Dokumen data untuk kebutuhan poskotis evakuasi dan penyelamatan',
                'score' => 0.004
            ],
            // 105
            [
                'sub_unsur_id' => 32,
                'nama' => 'Melaporkan data dan informasi evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan data dan informasi evakuasi dan penyelamatan',
                'score' => 0.004
            ],
            // 106
            [
                'sub_unsur_id' => 33,
                'nama' => 'Melaksanakan inventarisasi sarana prasarana komunikasi evakuasi dan penyelamatan',
                'satuan_hasil' => 'Dokumen inventarisasi sarana prasarana komunikasi evakuasi dan penyelamatan',
                'score' => 0.004
            ],
            // 107
            [
                'sub_unsur_id' => 33,
                'nama' => 'Melaksanakan pengecekan sarana prasarana komunikasi evakuasi dan penyelamatan',
                'satuan_hasil' => 'Dokumen pengecekan sarana prasarana komunikasi evakuasi dan penyelamatan',
                'score' => 0.004
            ],
            // 108
            [
                'sub_unsur_id' => 33,
                'nama' => 'Melakukan pemeliharaan peralatan komunikasi evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan pemeliharaan peralatan komunikasi evakuasi dan penyelamatan',
                'score' => 0.004
            ],
            // 109
            [
                'sub_unsur_id' => 34,
                'nama' => 'Memakai alat pelindung diri pengemudi',
                'satuan_hasil' => 'Laporan alat pelindung diri pengemudi',
                'score' => 0.004
            ],
            // 110
            [
                'sub_unsur_id' => 34,
                'nama' => 'Menyiapkan peralatan komunikasi pengemudi',
                'satuan_hasil' => 'Laporan peralatan komunikasi pengemudi',
                'score' => 0.004
            ],
            // 111
            [
                'sub_unsur_id' => 34,
                'nama' => 'Mengemudikan Unit Evakuasi dan Penyelamatan menuju TKP',
                'satuan_hasil' => 'Laporan Unit Evakuasi dan Penyelamatan menuju TKP',
                'score' => 0.004
            ],
            // 112
            [
                'sub_unsur_id' => 34,
                'nama' => 'Mengatur posisi Unit Evakuasi dan Penyelamatan di TKP',
                'satuan_hasil' => 'Laporan posisi Unit Evakuasi dan Penyelamatan di TKP',
                'score' => 0.004
            ],
            // 113
            [
                'sub_unsur_id' => 34,
                'nama' => 'Melakukan koordinasi internal unit Evakuasi dan Penyelamatan',
                'satuan_hasil' => 'Laporan koordinasi internal unit Evakuasi dan Penyelamatan',
                'score' => 0.004
            ],
            // 114
            [
                'sub_unsur_id' => 35,
                'nama' => 'Mempersiapkan peralatan Evakuasi dan Penyelamatan',
                'satuan_hasil' => 'Laporan peralatan Evakuasi dan Penyelamatan',
                'score' => 0.004
            ],
            // 115
            [
                'sub_unsur_id' => 35,
                'nama' => 'Menentukan peralatan Evakuasi dan Penyelamatan yang akan digunakan',
                'satuan_hasil' => 'Laporan peralatan Evakuasi dan Penyelamatan yang akan digunakan',
                'score' => 0.004
            ],
            // 116
            [
                'sub_unsur_id' => 35,
                'nama' => 'Mengoperasikan peralatan Evakuasi dan Penyelamatan',
                'satuan_hasil' => 'Laporan peralatan Evakuasi dan Penyelamatan',
                'score' => 0.004
            ],
            // 117
            [
                'sub_unsur_id' => 35,
                'nama' => 'Mengevakuasi dan Penyelamatan korban',
                'satuan_hasil' => 'Laporan evakuasi dan Penyelamatan korban',
                'score' => 0.004
            ],
            // 118
            [
                'sub_unsur_id' => 36,
                'nama' => 'Mengemas peralatan Evakuasi dan Penyelamatan yang digunakan',
                'satuan_hasil' => 'Laporan peralatan Evakuasi dan Penyelamatan yang digunakan',
                'score' => 0.004
            ],
            // 119
            [
                'sub_unsur_id' => 36,
                'nama' => 'Mengecek kelengkapan peralatan Evakuasi dan Penyelamatan',
                'satuan_hasil' => 'Laporan kelengkapan peralatan Evakuasi dan Penyelamatan',
                'score' => 0.004
            ],
            // 120
            [
                'sub_unsur_id' => 36,
                'nama' => 'Mengembalikan Peralatan Evakuasi dan Penyelamatan pada unit yang telah ditentukan',
                'satuan_hasil' => 'Laporan Peralatan Evakuasi dan Penyelamatan pada unit yang telah ditentukan',
                'score' => 0.004
            ],
            // 121
            [
                'sub_unsur_id' => 36,
                'nama' => 'Mengikuti apel pengecekan personil dalam operasi Evakuasi dan Penyelamatan',
                'satuan_hasil' => 'Laporan apel pengecekan personil dalam operasi Evakuasi dan Penyelamatan',
                'score' => 0.004
            ],
            // 122
            [
                'sub_unsur_id' => 37,
                'nama' => 'Mengemudikan unit menuju pos pemadam kebakaran dan penyelamatan',
                'satuan_hasil' => 'Laporan unit menuju pos pemadam kebakaran dan penyelamatan',
                'score' => 0.004
            ],
            // 123
            [
                'sub_unsur_id' => 37,
                'nama' => 'Membersihkan unit, APD dan peralatan evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan unit, APD dan peralatan evakuasi dan penyelamatan',
                'score' => 0.004
            ],
            // 124
            [
                'sub_unsur_id' => 37,
                'nama' => 'Mengembalikan unit mobil evakuasi dan penyelamatan pada posisi yang telah ditentukan',
                'satuan_hasil' => 'Laporan unit mobil evakuasi dan penyelamatan pada posisi yang telah ditentukan',
                'score' => 0.004
            ],
        ];
        ButirKegiatan::query()->upsert($terampil, 'id');

        $mahir = [
            // 125
            [
                'sub_unsur_id' => 38,
                'nama' => 'Melakukan verifikasi kelengkapan',
                'satuan_hasil' => 'Laporan verifikasi kelengkapan',
                'score' => 0.001
            ],
            // 126
            [
                'sub_unsur_id' => 38,
                'nama' => 'Memimpin Apel Pagi',
                'satuan_hasil' => 'Laporan Apel Pagi',
                'score' => 0.001
            ],
            // 127
            [
                'sub_unsur_id' => 38,
                'nama' => 'Memimpin serah terima tugas jaga',
                'satuan_hasil' => 'Laporan serah terima tugas jaga',
                'score' => 0.001
            ],
            // 128
            [
                'sub_unsur_id' => 38,
                'nama' => 'Memimpin pemeriksaan jumlah peralatan operasional',
                'satuan_hasil' => 'Laporan pemeriksaan jumlah peralatan operasional',
                'score' => 0.001
            ],
            // 129
            [
                'sub_unsur_id' => 38,
                'nama' => 'Memimpin pengecekan fungsi peralatan operasional',
                'satuan_hasil' => 'Laporan pengecekan fungsi peralatan operasional',
                'score' => 0.001
            ],
            // 130
            [
                'sub_unsur_id' => 38,
                'nama' => 'Memeriksa laporan sesuai dengan form check list',
                'satuan_hasil' => 'Dokumen sesuai dengan form check list',
                'score' => 0.001
            ],
            // 131
            [
                'sub_unsur_id' => 38,
                'nama' => 'Melakukan verifikasi fungsi alat komunikasi Rig dan HT',
                'satuan_hasil' => 'Dokumen verifikasi fungsi alat komunikasi Rig dan HT',
                'score' => 0.001
            ],
            // 132
            [
                'sub_unsur_id' => 39,
                'nama' => 'Melakukan verifikasi kondisi volume air tangki unit mobil',
                'satuan_hasil' => 'Dokumen verifikasi kondisi volume air tangki unit mobil',
                'score' => 0.001
            ],
            // 133
            [
                'sub_unsur_id' => 39,
                'nama' => 'Memvalidasi laporan sesuai dengan form check list',
                'satuan_hasil' => 'Dokumen validasi sesuai dengan form check list',
                'score' => 0.001
            ],
            // 134
            [
                'sub_unsur_id' => 40,
                'nama' => 'Melakukan verifikasi kelengkapan personil dalam regu',
                'satuan_hasil' => 'Laporan verifikasi kelengkapan personil dalam regu',
                'score' => 0.001
            ],
            // 135
            [
                'sub_unsur_id' => 40,
                'nama' => 'Mengatur anggota regu pada pelaksanaan apel malam',
                'satuan_hasil' => 'Laporan pelaksanaan apel malam',
                'score' => 0.001
            ],
            // 136
            [
                'sub_unsur_id' => 40,
                'nama' => 'Mengatur anggota regu pada pemeriksaan peralatan unit mobil',
                'satuan_hasil' => 'Laporan pelaksanaan apel malam',
                'score' => 0.001
            ],
            // 137
            [
                'sub_unsur_id' => 40,
                'nama' => 'Mengatur anggota regu pada pengecekan peralatan unit mobil',
                'satuan_hasil' => 'Laporan pengecekan peralatan unit mobil',
                'score' => 0.001
            ],
            // 138
            [
                'sub_unsur_id' => 40,
                'nama' => 'Mengatur anggota regu pada pemeriksaan kondisi unit',
                'satuan_hasil' => 'Laporan pemeriksaan kondisi unit',
                'score' => 0.001
            ],
            // 139
            [
                'sub_unsur_id' => 41,
                'nama' => 'Mengatur anggota regu pada Memimpin persiapan peralatan latihan',
                'satuan_hasil' => 'Laporan persiapan peralatan latihan',
                'score' => 0.001
            ],
            // 140
            [
                'sub_unsur_id' => 41,
                'nama' => 'Mengatur anggota regu pada latihan penggunaan peralatan',
                'satuan_hasil' => 'Laporan latihan penggunaan peralatan',
                'score' => 0.001
            ],
            // 141
            [
                'sub_unsur_id' => 41,
                'nama' => 'Mengatur anggota regu pada proses pengemasan peralatan yang telah digunakan',
                'satuan_hasil' => 'Laporan proses pengemasan peralatan yang telah digunakan',
                'score' => 0.001
            ],
            // 142
            [
                'sub_unsur_id' => 42,
                'nama' => 'Mengatur anggota regu pada kegiatan',
                'satuan_hasil' => 'Laporan kegiatan pembinaan fisik',
                'score' => 0.001
            ],
            // 143
            [
                'sub_unsur_id' => 43,
                'nama' => 'Mengatur anggota regu pada korve di lingkungan kerja',
                'satuan_hasil' => 'Laporan korve di lingkungan kerja',
                'score' => 0.001
            ],
            // 144
            [
                'sub_unsur_id' => 43,
                'nama' => 'Mengatur anggota regu pada kebersihan unit',
                'satuan_hasil' => 'Laporan kebersihan unit',
                'score' => 0.001
            ],
            // 145
            [
                'sub_unsur_id' => 44,
                'nama' => 'Melakukan validasi informasi kejadian kebakaran',
                'satuan_hasil' => 'Laporan validasi informasi kejadian kebakaran',
                'score' => 0.001
            ],
            // 146
            [
                'sub_unsur_id' => 44,
                'nama' => 'Menginformasikan kejadian kebakaran',
                'satuan_hasil' => 'Laporan informasi kejadian kebakaran',
                'score' => 0.001
            ],
            // 147
            [
                'sub_unsur_id' => 45,
                'nama' => 'Melaporkan tindak lanjut informasi kejadian kebakaran',
                'satuan_hasil' => 'Laporan tindak lanjut informasi kejadian kebakaran',
                'score' => 0.001
            ],
            // 148
            [
                'sub_unsur_id' => 45,
                'nama' => 'Melakukan koordinasi dengan regu lainnya',
                'satuan_hasil' => 'Laporan koordinasi dengan regu lainnya',
                'score' => 0.001
            ],
            // 149
            [
                'sub_unsur_id' => 45,
                'nama' => 'Melakukan Koordinasi dengan instansi lainnya',
                'satuan_hasil' => 'Laporan Koordinasi dengan instansi lainnya',
                'score' => 0.001
            ],
            // 150
            [
                'sub_unsur_id' => 46,
                'nama' => 'Memakai alat pelindung diri dan mengawasi pemakaian APD',
                'satuan_hasil' => 'Laporan alat pelindung diri dan mengawasi pemakaian APD',
                'score' => 0.001
            ],
            // 151
            [
                'sub_unsur_id' => 46,
                'nama' => 'Mengatur anggota regu pada penempatanposisi duduk anggota regu sesuai dengan formasi unit',
                'satuan_hasil' => 'Laporan penempatan posisi duduk anggota regu sesuai dengan formasi unit ',
                'score' => 0.001
            ],
            // 152
            [
                'sub_unsur_id' => 46,
                'nama' => 'Memerintahkan regu menuju ke tempat kejadian kebakaran',
                'satuan_hasil' => 'Laporan regu menuju ke tempat kejadian kebakaran',
                'score' => 0.001
            ],
            // 153
            [
                'sub_unsur_id' => 46,
                'nama' => 'Mengatur anggota regu pada Memimpin koordinasi internal unit',
                'satuan_hasil' => 'Laporan koordinasi internal unit',
                'score' => 0.001
            ],
            // 154
            [
                'sub_unsur_id' => 46,
                'nama' => 'Mengatur anggota regu pada size up (penilaian awal) pada saat di perjalanan',
                'satuan_hasil' => 'Laporan size up (penilaian awal) pada saat di perjalanan',
                'score' => 0.001
            ],
            // 155
            [
                'sub_unsur_id' => 47,
                'nama' => 'Mengatur anggota regu pada size up (penilaian awal) situasi kondisi kejadian kebakaran',
                'satuan_hasil' => 'Laporan size up (penilaian awal) situasi kondisi kejadian kebakaran',
                'score' => 0.001
            ],
            // 156
            [
                'sub_unsur_id' => 47,
                'nama' => 'Mengatur anggota regu pada teknik taktik strategi operasional pemadaman',
                'satuan_hasil' => 'Laporan teknik taktik strategi operasional pemadaman',
                'score' => 0.001
            ],
            // 157
            [
                'sub_unsur_id' => 47,
                'nama' => 'Mengatur prosedur pemadaman dari sumber air ke titik api',
                'satuan_hasil' => 'Laporan prosedur pemadaman dari sumber air ke titik api',
                'score' => 0.001
            ],
            // 158
            [
                'sub_unsur_id' => 47,
                'nama' => 'Mengatur anggota regu untuk peran dan tugas anggota regu',
                'satuan_hasil' => 'Laporan peran dan tugas anggota regu',
                'score' => 0.001
            ],
            // 159
            [
                'sub_unsur_id' => 47,
                'nama' => 'Mengatur anggota regu pada kebutuhan penggunaan peralatan operasional kebakaran',
                'satuan_hasil' => 'Laporan kebutuhan penggunaan peralatan operasional kebakaran',
                'score' => 0.001
            ],
            // 160
            [
                'sub_unsur_id' => 47,
                'nama' => 'Mengendalikan prosedur dan keselamatan kerja anggota regu',
                'satuan_hasil' => 'Laporan prosedur dan keselamatan kerja anggota regu',
                'score' => 0.001
            ],
            // 161
            [
                'sub_unsur_id' => 47,
                'nama' => 'Memantau dan melaporkan perkembangan situasi kondisi kejadian kebakaran',
                'satuan_hasil' => 'Laporan perkembangan situasi kondisi kejadian kebakaran',
                'score' => 0.001
            ],
            // 162
            [
                'sub_unsur_id' => 47,
                'nama' => 'Mengatur anggota regu pada pendataan awal di tempat kejadian kebakaran',
                'satuan_hasil' => 'Laporan pendataan awal di tempat kejadian kebakaran',
                'score' => 0.001
            ],
            // 163
            [
                'sub_unsur_id' => 48,
                'nama' => 'Mengatur anggota regu pada proses pendinginan',
                'satuan_hasil' => 'Laporan proses pendinginan',
                'score' => 0.001
            ],
            // 164
            [
                'sub_unsur_id' => 48,
                'nama' => 'Mengatur anggota regu pada pelaksanaan Over Houl (pemeriksaan titik api yang tersisa)',
                'satuan_hasil' => 'Laporan pelaksanaan Over Houl (pemeriksaan titik api yang tersisa)',
                'score' => 0.001
            ],
            // 165
            [
                'sub_unsur_id' => 48,
                'nama' => 'Melaporkan hasil over houl kepada atasan',
                'satuan_hasil' => 'Laporan hasil over houl kepada atasan',
                'score' => 0.001
            ],
            // 166
            [
                'sub_unsur_id' => 48,
                'nama' => 'Melaporkan situasi akhir kondisi kebakaran',
                'satuan_hasil' => 'Laporan situasi akhir kondisi kebakaran',
                'score' => 0.001
            ],
            // 167
            [
                'sub_unsur_id' => 49,
                'nama' => 'Mengatur anggota regu pada proses pengemasan peralatan yang digunakan',
                'satuan_hasil' => 'Laporan proses pengemasan peralatan yang digunakan',
                'score' => 0.001
            ],
            // 168
            [
                'sub_unsur_id' => 49,
                'nama' => 'Mengatur anggota regu pada pengecekan kelengkapan peralatan',
                'satuan_hasil' => 'Laporan pengecekan kelengkapan peralatan',
                'score' => 0.002
            ],
            // 169
            [
                'sub_unsur_id' => 49,
                'nama' => 'Mengatur anggota regu pada apel pengecekan personil',
                'satuan_hasil' => 'Laporan apel pengecekan personil',
                'score' => 0.001
            ],
            // 170
            [
                'sub_unsur_id' => 50,
                'nama' => 'Mengatur anggota regu pada proses kebersihan unit, APD dan peralatan',
                'satuan_hasil' => 'Laporan proses kebersihan unit, APD dan peralatan',
                'score' => 0.001
            ],
            // 171
            [
                'sub_unsur_id' => 50,
                'nama' => 'Mengatur anggota regu pada proses pengurasan dan pengisi tangki air unit',
                'satuan_hasil' => 'Laporan proses pengurasan dan pengisi tangki air unit',
                'score' => 0.001
            ],
            // 172
            [
                'sub_unsur_id' => 50,
                'nama' => 'Mengatur anggota regu pada penempatan kembali peralatan yang telah digunakan',
                'satuan_hasil' => 'Laporan penempatan kembali peralatan yang telah digunakan',
                'score' => 0.001
            ],
            // 173
            [
                'sub_unsur_id' => 50,
                'nama' => 'Mengolah laporan kejadian kebakaran',
                'satuan_hasil' => 'Laporan kejadian kebakaran',
                'score' => 0.001
            ],
            // 174
            [
                'sub_unsur_id' => 51,
                'nama' => 'Memakai dan mengawasi pemakaian alat pelindung diri evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan pemakaian alat pelindung diri evakuasi dan penyelamatan',
                'score' => 0.001
            ],
            // 175
            [
                'sub_unsur_id' => 51,
                'nama' => 'Mengatur anggota regu pada penempatan posisi duduk anggota regu sesuai dengan formasi unit',
                'satuan_hasil' => 'Laporan penempatan posisi duduk anggota regu sesuai dengan formasi unit',
                'score' => 0.001
            ],
            // 176
            [
                'sub_unsur_id' => 51,
                'nama' => 'Memerintahkan regu menuju ke tempat kejadian evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan regu menuju ke tempat kejadian evakuasi dan penyelamatan',
                'score' => 0.001
            ],
            // 177
            [
                'sub_unsur_id' => 51,
                'nama' => 'Mengatur anggota regu pada koordinasi internal unit',
                'satuan_hasil' => 'Laporan koordinasi internal unit',
                'score' => 0.001
            ],
            // 178
            [
                'sub_unsur_id' => 51,
                'nama' => 'Menyusun pra size up (penilaian situasi awal ) pada saat di perjalan',
                'satuan_hasil' => 'Laporan pra size up (penilaian situasi awal ) pada saat di perjalan',
                'score' => 0.001
            ],
            // 179
            [
                'sub_unsur_id' => 52,
                'nama' => 'Memimpin size up (penilaian situasi) kondisi evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan size up (penilaian situasi) kondisi evakuasi dan penyelamatan',
                'score' => 0.001
            ],
            // 180
            [
                'sub_unsur_id' => 52,
                'nama' => 'Mengatur teknik taktik strategi operasional evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan teknik taktik strategi operasional evakuasi dan penyelamatan',
                'score' => 0.001
            ],
            // 181
            [
                'sub_unsur_id' => 52,
                'nama' => 'Mengatur prosedur evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan prosedur evakuasi dan penyelamatan',
                'score' => 0.001
            ],
            // 182
            [
                'sub_unsur_id' => 52,
                'nama' => 'Mengatur peran dan tugas anggota regu evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan peran dan tugas anggota regu evakuasi dan penyelamatan',
                'score' => 0.001
            ],
            // 183
            [
                'sub_unsur_id' => 52,
                'nama' => 'Mengatur kebutuhan penggunaan peralatan operasional evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan kebutuhan penggunaan peralatan operasional evakuasi dan penyelamatan',
                'score' => 0.001
            ],
            // 184
            [
                'sub_unsur_id' => 52,
                'nama' => 'Mengendalikan prosedur kerja dan keselamatan anggota regu evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan prosedur kerja dan keselamatan anggota regu evakuasi dan penyelamatan',
                'score' => 0.001
            ],
            // 185
            [
                'sub_unsur_id' => 52,
                'nama' => 'Melaporkan perkembangan situasi kondisi kejadian evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan perkembangan situasi kondisi kejadian evakuasi dan penyelamatan',
                'score' => 0.001
            ],
            // 186
            [
                'sub_unsur_id' => 52,
                'nama' => 'Mengatur anggota regu pada pelaksanaan Over Houl (pemeriksaan dengan seksama) terhadap evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan pelaksanaan Over Houl (pemeriksaan dengan seksama) terhadap evakuasi dan penyelamatan',
                'score' => 0.001
            ],
            // 187
            [
                'sub_unsur_id' => 52,
                'nama' => 'Mengatur anggota regu pada pendataan awal di tempat kejadian evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan pendataan awal di tempat kejadian evakuasi dan penyelamatan',
                'score' => 0.001
            ],
            // 188
            [
                'sub_unsur_id' => 53,
                'nama' => 'Mengatur anggota regu pada proses pengemasan peralatan yang digunakan untuk evakuasi dan penyelamata',
                'satuan_hasil' => 'Laporan proses pengemasan peralatan yang digunakan untuk evakuasi dan penyelamatan',
                'score' => 0.001
            ],
            // 189
            [
                'sub_unsur_id' => 53,
                'nama' => 'Mengatur anggota regu pada pengecekan kelengkapan peralatan evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan pengecekan kelengkapan peralatan evakuasi dan penyelamatan',
                'score' => 0.002
            ],
            // 190
            [
                'sub_unsur_id' => 53,
                'nama' => 'Mengatur anggota regu pada apel pengecekan personil evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan apel pengecekan personil evakuasi dan penyelamatan',
                'score' => 0.001
            ],
            // 191
            [
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
                'sub_unsur_id' => 55,
                'nama' => 'Memverifikasi hasil pemeriksaan kelengkapan personil antar regu',
                'satuan_hasil' => 'Laporan pemeriksaan kelengkapan personil antar regu',
                'score' => 0.002
            ],
            // 193
            [
                'sub_unsur_id' => 55,
                'nama' => 'Mengarahkan personil pada pelaksanaan apel pagi tingkat peleton',
                'satuan_hasil' => 'Laporan pelaksanaan apel pagi tingkat peleton',
                'score' => 0.002
            ],
            // 194
            [
                'sub_unsur_id' => 55,
                'nama' => 'Mengarahkan personil pada serah terima tugas jaga tingkat peleton',
                'satuan_hasil' => 'Laporan pada serah terima tugas jaga tingkat peleton',
                'score' => 0.002
            ],
            // 195
            [
                'sub_unsur_id' => 55,
                'nama' => 'Mengarahkan personil pada pemeriksaan peralatan unit mobil tingkat peleton',
                'satuan_hasil' => 'Laporan pemeriksaan peralatan unit mobil tingkat peleton',
                'score' => 0.002
            ],
            // 196
            [
                'sub_unsur_id' => 55,
                'nama' => 'Mengarahkan personil pada pengecekan peralatan unit mobil tingkat peleton',
                'satuan_hasil' => 'Laporan pengecekan peralatan unit mobil tingkat peleton',
                'score' => 0.002
            ],
            // 197
            [
                'sub_unsur_id' => 55,
                'nama' => 'Memverifikasi pemeriksaan kondisi unit tingkat peleton',
                'satuan_hasil' => 'Laporan pemeriksaan kondisi unit tingkat peleton',
                'score' => 0.002
            ],
            // 198
            [
                'sub_unsur_id' => 55,
                'nama' => 'Menanda tangani laporan sesuai dengan form check list tingkat peleton',
                'satuan_hasil' => 'Dokumen sesuai dengan form check list tingkat peleton',
                'score' => 0.002
            ],
            // 199
            [
                'sub_unsur_id' => 56,
                'nama' => 'Mengarahkan personil pada pelaksanaan piket sesuai dengan consignus jaga (tata kelola) tingkat peleton',
                'satuan_hasil' => 'Laporan pelaksanaan piket sesuai dengan consignus jaga ( tata kelola) tingkat pleton',
                'score' => 0.002
            ],
            // 200
            [
                'sub_unsur_id' => 56,
                'nama' => 'Mengarahkan personil pada monitoring kekuatan personil dan unit dalam peleton',
                'satuan_hasil' => 'Laporan Monitoring kekuatan personil dan unit dalam peleton',
                'score' => 0.002
            ],
            // 201
            [
                'sub_unsur_id' => 57,
                'nama' => 'Mengarahkan personil pada pemeriksaan kelengkapan personil dalam peleton',
                'satuan_hasil' => 'Laporan pemeriksaan kelengkapan personil dalam peleton',
                'score' => 0.002
            ],
            // 202
            [
                'sub_unsur_id' => 57,
                'nama' => 'Mengarahkan personil pada pelaksanaan apel malam tingkat peleton',
                'satuan_hasil' => 'Laporan pelaksanaan apel malam tingkat peleton',
                'score' => 0.002
            ],
            // 203
            [
                'sub_unsur_id' => 57,
                'nama' => 'Mengarahkan personil pada pemeriksaan peralatan unit mobil',
                'satuan_hasil' => 'Laporan pemeriksaan peralatan unit mobil',
                'score' => 0.002
            ],
            // 204
            [
                'sub_unsur_id' => 57,
                'nama' => 'Mengarahkan personil pada pengecekan peralatan unit mobil',
                'satuan_hasil' => 'Laporan pengecekan peralatan unit mobil',
                'score' => 0.002
            ],
            // 205
            [
                'sub_unsur_id' => 57,
                'nama' => 'Mengarahkan personil pada pemeriksaan kondisi unit',
                'satuan_hasil' => 'Laporan pemeriksaan kondisi unit',
                'score' => 0.002
            ],
            // 206
            [
                'sub_unsur_id' => 58,
                'nama' => 'Mengarahkan personil pada pelaksanaan latihan',
                'satuan_hasil' => 'Laporan pelaksanaan latihan',
                'score' => 0.002
            ],
            // 207
            [
                'sub_unsur_id' => 58,
                'nama' => 'Mengarahkan pelaksanaan latihan',
                'satuan_hasil' => 'Laporan latihan',
                'score' => 0.002
            ],
            // 208
            [
                'sub_unsur_id' => 58,
                'nama' => 'Melakukan evaluasi pelaksanaan latihan',
                'satuan_hasil' => 'Laporan evaluasi pelaksanaan latihan',
                'score' => 0.004
            ],
            // 209
            [
                'sub_unsur_id' => 59,
                'nama' => 'Mengarahkan personil pada pelaksanaan kegiatan pembinaan fisik',
                'satuan_hasil' => 'Laporan pelaksanaan kegiatan pembinaan fisik',
                'score' => 0.002
            ],
            // 210
            [
                'sub_unsur_id' => 59,
                'nama' => 'Mengarahkan pelaksanaan kegiatan pembinaan fisik',
                'satuan_hasil' => 'Laporan kegiatan pembinaan fisik',
                'score' => 0.002
            ],
            // 211
            [
                'sub_unsur_id' => 59,
                'nama' => 'Melakukan evaluasi pelaksanaan pembinaan fisik',
                'satuan_hasil' => 'Laporan evaluasi pelaksanaan pembinaan fisik',
                'score' => 0.002
            ],
            // 212
            [
                'sub_unsur_id' => 60,
                'nama' => 'Mengarahkan personil pada pelaksanaan kegiatan kebersihan lingkungan kerja',
                'satuan_hasil' => 'Laporan pelaksanaan kegiatan kebersihan lingkungan kerja',
                'score' => 0.002
            ],
            // 213
            [
                'sub_unsur_id' => 60,
                'nama' => 'Mengarahkan pelaksanaan kegiatan kebersihan lingkungan kerja',
                'satuan_hasil' => 'Laporan kegiatan kebersihan lingkungan kerja',
                'score' => 0.002
            ],
            // 214
            [
                'sub_unsur_id' => 60,
                'nama' => 'Melakukan evaluasi pelaksanaan kebersihan lingkungan kerja',
                'satuan_hasil' => 'Laporan evaluasi pelaksanaan kebersihan lingkungan kerja',
                'score' => 0.002
            ],
            // 215
            [
                'sub_unsur_id' => 61,
                'nama' => 'Menerima hasil validasi informasi kejadian kebakaran',
                'satuan_hasil' => 'Laporan validasi informasi kejadian kebakaran',
                'score' => 0.002
            ],
            // 216
            [
                'sub_unsur_id' => 61,
                'nama' => 'Memverifikasi hasil validasi informasi kejadian kebakaran kepada atasan',
                'satuan_hasil' => 'Dokumen validasi informasi kejadian kebakaran kepada atasan',
                'score' => 0.002
            ],
            // 217
            [
                'sub_unsur_id' => 62,
                'nama' => 'Mengarahkan personil pada tindak lanjut informasi kejadian kebakaran',
                'satuan_hasil' => 'Laporan tindak lanjut informasi kejadian kebakaran',
                'score' => 0.002
            ],
            // 218
            [
                'sub_unsur_id' => 62,
                'nama' => 'Mengarahkan personil pada koordinasi antar regu lainnya',
                'satuan_hasil' => 'Laporan koordinasi antar regu lainnya',
                'score' => 0.002
            ],
            // 219
            [
                'sub_unsur_id' => 62,
                'nama' => 'Bertanggungjawab pada koordinasi dengan instansi terkait',
                'satuan_hasil' => 'Laporan koordinasi dengan instansi terkait',
                'score' => 0.002
            ],
            // 220
            [
                'sub_unsur_id' => 63,
                'nama' => 'Memeriksa penggunaan APD',
                'satuan_hasil' => 'Laporan penggunaan APD',
                'score' => 0.002
            ],
            // 221
            [
                'sub_unsur_id' => 63,
                'nama' => 'Memerintahkan peleton menuju ke tempat kejadian kebakaran',
                'satuan_hasil' => 'Laporan peleton menuju ke tempat kejadian kebakaran',
                'score' => 0.002
            ],
            // 222
            [
                'sub_unsur_id' => 63,
                'nama' => 'Mengarahkan personil pada koordinasi internal tingkat peleton',
                'satuan_hasil' => 'Laporan koordinasi internal tingkat peleton',
                'score' => 0.002
            ],
            // 223
            [
                'sub_unsur_id' => 63,
                'nama' => 'Mengarahkan personil pra size up (penilaian awal situasi) pada saat di perjalanan',
                'satuan_hasil' => 'Laporan pra size up (penilaian awal situasi) pada saat di perjalanan',
                'score' => 0.002
            ],
            // 224
            [
                'sub_unsur_id' => 64,
                'nama' => 'Mengarahkan personil size up (penilaian situasi) kondisi kejadian kebakaran',
                'satuan_hasil' => 'Mengarahkan personil size up (penilaian situasi) kondisi kejadian kebakaran',
                'score' => 0.002
            ],
            // 225
            [
                'sub_unsur_id' => 64,
                'nama' => 'Mengendalikan teknik taktik strategi operasional pemadaman',
                'satuan_hasil' => 'Laporan teknik taktik strategi operasional pemadaman',
                'score' => 0.002
            ],
            // 226
            [
                'sub_unsur_id' => 64,
                'nama' => 'Mengendalikan prosedur pemadaman dari sumber air ke titik api',
                'satuan_hasil' => 'Laporan prosedur pemadaman dari sumber air ke titik api',
                'score' => 0.002
            ],
            // 227
            [
                'sub_unsur_id' => 64,
                'nama' => 'Mengendalikan peran dan tugas antar regu',
                'satuan_hasil' => 'Laporan peran dan tugas antar regu',
                'score' => 0.002
            ],
            // 228
            [
                'sub_unsur_id' => 64,
                'nama' => 'Mengendalikan penyerangan ke sumber api/penyalur suplai air antar unit/pengelolaan sumber air/logistik operasional kebakaran',
                'satuan_hasil' => 'Laporan penyerangan ke sumber api/penyalur suplai air antar unit/pengelolaan sumber air/logistik operasional kebakaran',
                'score' => 0.002
            ],
            // 229
            [
                'sub_unsur_id' => 64,
                'nama' => 'Mengendalikan pengerahan unit operasional dan personil tambahan',
                'satuan_hasil' => 'Laporan kebutuhan unit operasional dan personil',
                'score' => 0.002
            ],
            // 230
            [
                'sub_unsur_id' => 64,
                'nama' => 'Mengendalikan pengerahan unit perasional dan personil tambahan',
                'satuan_hasil' => 'Laporan pengerahan unit operasional dan personil tambahan',
                'score' => 0.002
            ],
            // 231
            [
                'sub_unsur_id' => 64,
                'nama' => 'melakukan koordinasi dengan instansi terkait',
                'satuan_hasil' => 'Laporan koordinasi dengan instansi terkait',
                'score' => 0.002
            ],
            // 232
            [
                'sub_unsur_id' => 64,
                'nama' => 'Mengendalikan penerapan prosedur kerja dan keselamatan seluruh anggota',
                'satuan_hasil' => 'Laporan penerapan prosedur kerja dan keselamatan seluruh anggota',
                'score' => 0.002
            ],
            // 233
            [
                'sub_unsur_id' => 64,
                'nama' => 'Mengendalikan perkembangan situasi kondisi kejadian kebakaran kepada atasan',
                'satuan_hasil' => 'Dokumen perkembangan situasi kondisi kejadian kebakaran kepada atasan',
                'score' => 0.002
            ],
            // 234
            [
                'sub_unsur_id' => 64,
                'nama' => 'Mengendalikan laporan pendataan di tempat kejadian kebakaran',
                'satuan_hasil' => 'Dokumen pendataan di tempat kejadian kebakaran',
                'score' => 0.002
            ],
            // 235
            [
                'sub_unsur_id' => 65,
                'nama' => 'Mengendalikan proses pendinginan',
                'satuan_hasil' => 'Laporan proses pendinginan',
                'score' => 0.002
            ],
            // 236
            [
                'sub_unsur_id' => 65,
                'nama' => 'Mengendalikan pelaksanaan Over Houl (pemeriksaan dengan seksama) terhadap titik api yang tersisa',
                'satuan_hasil' => 'Laporan pelaksanaan Over Houl (pemeriksaan dengan seksama) terhadap titik api yang tersisa',
                'score' => 0.002
            ],
            // 237
            [
                'sub_unsur_id' => 65,
                'nama' => 'Memvalidasi hasil over houl kepada atasan',
                'satuan_hasil' => 'Dokumen validasi hasil over houl kepada atasan',
                'score' => 0.002
            ],
            // 238
            [
                'sub_unsur_id' => 65,
                'nama' => 'Memvalidasi laporan situasi akhir kondisi kebakaran',
                'satuan_hasil' => 'Dokumen situasi akhir kondisi kebakaran',
                'score' => 0.002
            ],
            // 239
            [
                'sub_unsur_id' => 66,
                'nama' => 'Mengendalikan proses pengemasan peralatan yang digunakan tingkat peleton',
                'satuan_hasil' => 'Laporan proses pengemasan peralatan yang digunakan tingkat peleton',
                'score' => 0.002
            ],
            // 240
            [
                'sub_unsur_id' => 66,
                'nama' => 'Mengendalikan pengecekan kelengkapan peralatan tingkat peleton',
                'satuan_hasil' => 'Laporan pengecekan kelengkapan peralatan tingkat peleton',
                'score' => 0.002
            ],
            // 241
            [
                'sub_unsur_id' => 67,
                'nama' => 'Mengendalikan pelaksanaan kebersihan unit, APD dan peralatan tingkat peleton',
                'satuan_hasil' => 'Laporan pelaksanaankebersihan unit, APD dan peralatan tingkat peleton',
                'score' => 0.002
            ],
            // 242
            [
                'sub_unsur_id' => 67,
                'nama' => 'Mengendalikan pengaturan penempatan kembali peralatan yang telah digunakan',
                'satuan_hasil' => 'Laporan pengaturan penempatan kembali peralatan yang telah digunakan',
                'score' => 0.002
            ],
            // 243
            [
                'sub_unsur_id' => 67,
                'nama' => 'Mengevaluasi pasca kebakaran',
                'satuan_hasil' => 'Dokumen evaluasi pasca kebakaran',
                'score' => 0.002
            ],
            // 244
            [
                'sub_unsur_id' => 67,
                'nama' => 'Memvalidasi laporan kejadian kebakaran',
                'satuan_hasil' => 'Dokumen validasi laporan kejadian kebakaran',
                'score' => 0.002
            ],
            // 245
            [
                'sub_unsur_id' => 68,
                'nama' => 'Menerima hasil validasi informasi kejadian evakuasi dan penyelamatan',
                'satuan_hasil' => 'Dokumen hasil validasi informasi kejadian evakuasi dan penyelamatan',
                'score' => 0.002
            ],
            // 246
            [
                'sub_unsur_id' => 68,
                'nama' => 'Melaporkan hasil validasi informasi kejadian evakuasi dan penyelamatan kepada atasan',
                'satuan_hasil' => 'Dokumen hasil validasi informasi kejadian evakuasi dan penyelamatan kepada atasan',
                'score' => 0.002
            ],
            // 247
            [
                'sub_unsur_id' => 69,
                'nama' => 'Memverifikasi tindak lanjut informasi kejadian evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan tindak lanjut informasi kejadian evakuasi dan penyelamatan',
                'score' => 0.002
            ],
            // 248
            [
                'sub_unsur_id' => 69,
                'nama' => 'Mengendalikan koordinasi antar regu dan peleton lainnya',
                'satuan_hasil' => 'Laporan koordinasi antar regu dan pleton lainnya',
                'score' => 0.002
            ],
            // 249
            [
                'sub_unsur_id' => 69,
                'nama' => 'Mengendalikan koordinasi dengan instansi terkait',
                'satuan_hasil' => 'Laporan koordinasi dengan instansi terkait',
                'score' => 0.002
            ],
            // 250
            [
                'sub_unsur_id' => 70,
                'nama' => 'Mengawasi pemakaian APD Evakuasi dan Penyelamatan',
                'satuan_hasil' => 'Laporan pemakaian APD Evakuasi dan Penyelamatan',
                'score' => 0.002
            ],
            // 251
            [
                'sub_unsur_id' => 70,
                'nama' => 'Mengontrol peleton menuju ke tempat evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan peleton menuju ke tempat evakuasi dan penyelamatan',
                'score' => 0.002
            ],
            // 252
            [
                'sub_unsur_id' => 70,
                'nama' => 'Mengendalikan koordinasi internal tingkat peleton',
                'satuan_hasil' => 'Laporan internal tingkat peleton',
                'score' => 0.002
            ],
            // 253
            [
                'sub_unsur_id' => 70,
                'nama' => 'Mengendalikan pra size up (penilaian awal situasi) pada saat di perjalanan evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan pra size up (penilaian awal situasi) pada saat di perjalanan evakuasi dan penyelamatan',
                'score' => 0.002
            ],
            // 254
            [
                'sub_unsur_id' => 71,
                'nama' => 'Mengendalikan size up (penilaian situasi) kondisi kejadian evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan size up (penilaian situasi) kondisi kejadian evakuasi dan penyelamatan',
                'score' => 0.002
            ],
            // 255
            [
                'sub_unsur_id' => 71,
                'nama' => 'Mengendalikan teknik taktik strategi operasional evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan teknik taktik strategi operasional evakuasi dan penyelamatan',
                'score' => 0.002
            ],
            // 256
            [
                'sub_unsur_id' => 71,
                'nama' => 'Mengendalikan prosedur evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan prosedur evakuasi dan penyelamatan',
                'score' => 0.002
            ],
            // 257
            [
                'sub_unsur_id' => 71,
                'nama' => 'Mengendalikan peran dan tugas antar regu',
                'satuan_hasil' => 'Laporan peran dan tugas antar regu',
                'score' => 0.002
            ],
            // 258
            [
                'sub_unsur_id' => 71,
                'nama' => 'Menganalisa kebutuhan unit operasional dan personil evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan analisa kebutuhan unit operasional dan personil evakuasi dan penyelamatan',
                'score' => 0.002
            ],
            // 259
            [
                'sub_unsur_id' => 71,
                'nama' => 'Melakukan koordinasi pengerahan unit operasional dan personil tambahan evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan pengerahan unit operasional dan personil tambahan evakuasi dan penyelamatan',
                'score' => 0.002
            ],
            // 260
            [
                'sub_unsur_id' => 71,
                'nama' => 'Melakukan koordinasi dengan instansi terkait',
                'satuan_hasil' => 'Laporan dengan instansi terkait',
                'score' => 0.002
            ],
            // 261
            [
                'sub_unsur_id' => 71,
                'nama' => 'Mengendalikan penerapan prosedur kerja dan keselamatan seluruh anggota',
                'satuan_hasil' => 'Laporan prosedur kerja dan keselamatan seluruh anggota',
                'score' => 0.002
            ],
            // 262
            [
                'sub_unsur_id' => 71,
                'nama' => 'Mengendalikan perkembangan situasi kondisi evakuasi dan penyelamatan kepada atasan',
                'satuan_hasil' => 'Laporan perkembangan situasi kondisi evakuasi dan penyelamatan kepada atasan',
                'score' => 0.002
            ],
            // 263
            [
                'sub_unsur_id' => 71,
                'nama' => 'Mengendalikan pelaksanaan Over Houl (pemeriksaan dengan seksama) terhadap evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan pelaksanaan Over Houl (pemeriksaan dengan seksama) terhadap evakuasi dan penyelamatan',
                'score' => 0.002
            ],
            // 264
            [
                'sub_unsur_id' => 71,
                'nama' => 'Memvalidasi laporan pendataan di tempat kejadian evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan validasi laporan pendataan di tempat kejadian evakuasi dan penyelamatan',
                'score' => 0.002
            ],
            // 265
            [
                'sub_unsur_id' => 72,
                'nama' => 'Mengendalikan proses pengemasan peralatan yang digunakan',
                'satuan_hasil' => 'Laporan proses pengemasan peralatan yang digunakan',
                'score' => 0.002
            ],
            // 266
            [
                'sub_unsur_id' => 72,
                'nama' => 'Mengendalikan pengecekan kelengkapan peralatan evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan pengecekan kelengkapan peralatan evakuasi dan penyelamatan',
                'score' => 0.002
            ],
            // 267
            [
                'sub_unsur_id' => 72,
                'nama' => 'Mengendalikan apel pengecekan personil tingkat peleton',
                'satuan_hasil' => 'Dokumen apel pengecekan personil tingkat peleton',
                'score' => 0.002
            ],
            // 268
            [
                'sub_unsur_id' => 73,
                'nama' => 'Mengendalikan proses kebersihan unit, APD dan peralatan tingkat peleton',
                'satuan_hasil' => 'Laporan kebersihan unit, APD dan peralatan tingkat peleton',
                'score' => 0.002
            ],
            // 269
            [
                'sub_unsur_id' => 73,
                'nama' => 'Mengendalikan pengaturan penempatan kembali peralatan yang telah digunakan',
                'satuan_hasil' => 'Laporan pengaturan penempatan kembali peralatan yang telah digunakan',
                'score' => 0.002
            ],
            // 270
            [
                'sub_unsur_id' => 73,
                'nama' => 'Memvalidasi laporan evakuasi dan penyelamatan',
                'satuan_hasil' => 'Dokumen evakuasi dan penyelamatan',
                'score' => 0.002
            ],
        ];
        ButirKegiatan::query()->upsert($penyelia, 'id');
        // end Bagian Butir Kegiatan Pokok dengan id 1 sampai dengan 270 adalah bagian dari tugas kegiatan pokok JABATAN FUNGSIONAL PEMADAM KEBAKARAN

        //     // 271
        //     [
        //         'sub_unsur_id' => 74,
        //         'nama' => 'Mengkaji UU yang terkait tentang kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Dokumen UU terkait tentang kebakaran',
        //         'score' => 0.001
        //     ],
        //     // 272
        //     [
        //         'sub_unsur_id' => 74,
        //         'nama' => 'Mengkaji PP yang terkait tentang kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Dokumen PP yang terkait tentang kebakaran',
        //         'score' => 0.001
        //     ],
        //     // 273
        //     [
        //         'sub_unsur_id' => 74,
        //         'nama' => 'Mengkaji PERMEN yang terkait tentang kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Dokumen Permen yang terkait tentang kebarakan',
        //         'score' => 0.001
        //     ],
        //     // 274
        //     [
        //         'sub_unsur_id' => 74,
        //         'nama' => 'Mengkaji PERDA yang terkait tentang kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Dokumen Perda yang terkait tentang kebarakan',
        //         'score' => 0.001
        //     ],
        //     // 275
        //     [
        //         'sub_unsur_id' => 74,
        //         'nama' => 'Mengkaji PERGUB/PERBUP/PERWAL yang terkait tentang kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Dokumen Pergub/Perbup/Perwali yang terkait tentang kebarakan',
        //         'score' => 0.001
        //     ],
        //     // 276
        //     [
        //         'sub_unsur_id' => 74,
        //         'nama' => 'Mengkaji standar lainnya yang terkait tentang kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Dokumen standar lainnya yang terkait tentang kebarakan',
        //         'score' => 0.001
        //     ],
        //     // 277
        //     [
        //         'sub_unsur_id' => 75,
        //         'nama' => 'Menganalisis UU yang terkait tentang kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Dokumen standar lainnya yang terkait tentang kebarakan',
        //         'score' => 0.002
        //     ],
        //     // 278
        //     [
        //         'sub_unsur_id' => 75,
        //         'nama' => 'Menganalisis PP yang terkait tentang kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Laporan analisis PP yang terkait tentang kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.002
        //     ],
        //     // 279
        //     [
        //         'sub_unsur_id' => 75,
        //         'nama' => 'Menganalisis PERMEN yang terkait tentang kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Laporan analisis PERMEN yang terkait tentang kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.002
        //     ],
        //     // 280
        //     [
        //         'sub_unsur_id' => 75,
        //         'nama' => 'Menganalisis PERDA yang terkait tentang kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Laporan analisis PERDA yang terkait tentang kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.002
        //     ],
        //     // 281
        //     [
        //         'sub_unsur_id' => 75,
        //         'nama' => 'Menganalisis PERGUB/PERBUP/PERWAL yang terkait tentang kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Laporan analisis PERGUB/PERBUP/PERWAL yang terkait tentang kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.002
        //     ],
        //     // 282
        //     [
        //         'sub_unsur_id' => 75,
        //         'nama' => 'Menganalisis standar lainnya yang terkait tentang kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Laporan analisis standar lainnya yang terkait tentang kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.002
        //     ],
        //     // 283
        //     [
        //         'sub_unsur_id' => 76,
        //         'nama' => 'Menyusun surat pemberitahuan pemeriksaan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Dokumen surat pemberitahuan pemeriksaan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'score' => 0.001
        //     ],
        //     // 284
        //     [
        //         'sub_unsur_id' => 76,
        //         'nama' => 'Menyusun surat tugas tim pemeriksa pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Dokumen surat tugas tim pemeriksa pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'score' => 0.001
        //     ],
        //     // 285
        //     [
        //         'sub_unsur_id' => 76,
        //         'nama' => 'Menyusun form check list pemeriksaan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Dokumen pemeriksaan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'score' => 0.001
        //     ],
        //     // 286
        //     [
        //         'sub_unsur_id' => 76,
        //         'nama' => 'Menyusun dan memahami dokumen pendukung lainnya pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Dokumen pendukung lainnya pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'score' => 0.001
        //     ],
        //     // 287
        //     [
        //         'sub_unsur_id' => 76,
        //         'nama' => 'Menginventarisasi kendaraan, peralatan untuk pemeriksaan dan pengujian pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Dokumen kendaraan, peralatan untuk pemeriksaan dan pengujian pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'score' => 0.001
        //     ],
        //     // 288
        //     [
        //         'sub_unsur_id' => 76,
        //         'nama' => 'Melakukan komunikasi dengan pihak pengelola bangunan gedung pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Laporan hasil komunikasi dengan pihak pengelola bangunan gedung pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'score' => 0.001
        //     ],
        //     // 289?
        //     [
        //         'sub_unsur_id' => 77,
        //         'nama' => 'Mengkaji surat pemberitahuan pemeriksaan pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Dokumen surat pemberitahuan pemeriksaan pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.001
        //     ],
        //     // 290
        //     [
        //         'sub_unsur_id' => 77,
        //         'nama' => 'Mengkaji surat tugas tim pemeriksa pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Dokumen surat tugas tim pemeriksa pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.001
        //     ],
        //     // 291
        //     [
        //         'sub_unsur_id' => 77,
        //         'nama' => 'Mengkaji form check list pemeriksaan pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Dokumen check list pemeriksaan pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.002
        //     ],
        //     // 292
        //     [
        //         'sub_unsur_id' => 77,
        //         'nama' => 'Mengkaji dan memahami dokumen pendukung lainnya pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Laporan pendukung lainnya pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.002
        //     ],
        //     // 293
        //     [
        //         'sub_unsur_id' => 77,
        //         'nama' => 'Menginventarisasi kendaraan, peralatan untuk pemeriksaan dan pengujian pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Laporan kendaraan, peralatan untuk pemeriksaan dan pengujian pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.002
        //     ],
        //     // 294
        //     [
        //         'sub_unsur_id' => 77,
        //         'nama' => 'Melakukan komunikasi dengan pihak pengelola bangunan gedung pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Laporan komunikasi dengan pihak pengelola bangunan gedung pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.002
        //     ],
        //     // 295
        //     [
        //         'sub_unsur_id' => 78,
        //         'nama' => 'Menyusun dokumen-dokumen perijinan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Laporan perijinan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'score' => 0.001
        //     ],
        //     // 295
        //     [
        //         'sub_unsur_id' => 78,
        //         'nama' => 'Menyusun gambar bangunan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Laporan hasil gambar bangunan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'score' => 0.001
        //     ],
        //     // 296
        //     [
        //         'sub_unsur_id' => 78,
        //         'nama' => 'Menginventarisasi spesifikasi proteksi kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Laporan hasil gambar bangunan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'score' => 0.001
        //     ],
        //     // 297
        //     [
        //         'sub_unsur_id' => 78,
        //         'nama' => 'Mengindentifikasi sistem proteksi aktif pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Laporan sistem proteksi aktif pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'score' => 0.001
        //     ],
        //     // 298
        //     [
        //         'sub_unsur_id' => 78,
        //         'nama' => 'Mengidentifikasi sistem proteksi pasif pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Kegiatan sistem proteksi pasif pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'score' => 0.001
        //     ],
        //     // 299
        //     [
        //         'sub_unsur_id' => 78,
        //         'nama' => 'Mengevaluasi tentang manajemen keselamatan kebakaran gedung (MKKG) pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Laporan manajemen keselamatan kebakaran gedung (MKKG) pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'score' => 0.001
        //     ],
        //     // 300
        //     [
        //         'sub_unsur_id' => 78,
        //         'nama' => 'Mengindentifikasi akses pemadam kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Laporan akses pemadam kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan',
        //         'score' => 0.001
        //     ],
        //     // 301
        //     [
        //         'sub_unsur_id' => 78,
        //         'nama' => 'Mengindetifikasi sarana penyelamatan jiwa pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Laporan indentifikasi sarana penyelamatan jiwa pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'score' => 0.001
        //     ],
        //     // 302
        //     [
        //         'sub_unsur_id' => 79,
        //         'nama' => 'Melakukan kajian terhadap dokumen-dokumen perijinan pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Laporan perijinan pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.002
        //     ],
        //     // 303
        //     [
        //         'sub_unsur_id' => 79,
        //         'nama' => 'Melakukan kajian terhadap gambar bangunan pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Laporan gambar bangunan pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.002
        //     ],
        //     // 303
        //     [
        //         'sub_unsur_id' => 79,
        //         'nama' => 'melakukan kajian spesifikasi proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Laporan spesifikasi proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.002
        //     ],
        //     // 304
        //     [
        //         'sub_unsur_id' => 79,
        //         'nama' => 'Melakukan kajian sistem proteksi aktif pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Laporan sistem proteksi aktif pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.002
        //     ],
        //     // 305
        //     [
        //         'sub_unsur_id' => 79,
        //         'nama' => 'Melakukan kajian sistem proteksi pasif pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Laporan sistem proteksi pasif pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.002
        //     ],
        //     // 306
        //     [
        //         'sub_unsur_id' => 79,
        //         'nama' => 'Melakukan kajian tentang manajemen keselamatan kebakaran gedung (MKKG) pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Laporan kajian tentang manajemen keselamatan kebakaran gedung (MKKG) pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.002
        //     ],
        //     // 307
        //     [
        //         'sub_unsur_id' => 79,
        //         'nama' => 'Melakukan kajian akses pemadam kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Laporan kajian akses pemadam kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.002
        //     ],
        //     // 308
        //     [
        //         'sub_unsur_id' => 79,
        //         'nama' => 'Melakukan kajian sarana penyelamatan jiwa pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Laporan kajian sarana penyelamatan jiwa pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.002
        //     ],
        //     // 309
        //     [
        //         'sub_unsur_id' => 80,
        //         'nama' => 'Melaksanakan rapat koordinasi dengan pengelola gedung pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Laporan rapat koordinasi dengan pengelola gedung pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'score' => 0.001
        //     ],
        //     // 310
        //     [
        //         'sub_unsur_id' => 80,
        //         'nama' => 'Mengkaji dokumen-dokumen perijinan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Laporan dokumen-dokumen perijinan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'score' => 0.001
        //     ],
        //     // 311
        //     [
        //         'sub_unsur_id' => 80,
        //         'nama' => 'Mengkaji gambar bangunan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Laporan olahan gambar bangunan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'score' => 0.001
        //     ],
        //     // 312
        //     [
        //         'sub_unsur_id' => 80,
        //         'nama' => 'Mengevaluasi tentang manajemen keselamatan kebakaran gedung (MKKG) pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Dokumen manajemen keselamatan kebakaran gedung (MKKG) pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'score' => 0.001
        //     ],
        //     // 313
        //     [
        //         'sub_unsur_id' => 81,
        //         'nama' => 'Mengkoordinir rapat koordinasi dengan pengelola gedung bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Laporan rapat koordinasi dengan pengelola gedung bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.002
        //     ],
        //     // 314
        //     [
        //         'sub_unsur_id' => 81,
        //         'nama' => 'Memverifikasi dokumen-dokumen perijinan pada bangunan tinggi, bangunan industri dan obyek vital proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Laporan perijinan pada bangunan tinggi, bangunan industri dan obyek vitalproteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.002
        //     ],
        //     // 315
        //     [
        //         'sub_unsur_id' => 81,
        //         'nama' => 'Memeriksa tentang manajemen keselamatan kebakaran gedung (MKKG) pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Dokumen tentang manajemen keselamatan kebakaran gedung (MKKG) pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.002
        //     ],
        //     // 316
        //     [
        //         'sub_unsur_id' => 82,
        //         'nama' => 'Memeriksa dan menguji spesifikasi proteksi kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Laporan spesifikasi proteksi kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'score' => 0.001
        //     ],
        //     // 317
        //     [
        //         'sub_unsur_id' => 82,
        //         'nama' => 'Memeriksa akses pemadam kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Kegiatan akses pemadam kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'score' => 0.001
        //     ],
        //     // 318
        //     [
        //         'sub_unsur_id' => 82,
        //         'nama' => 'Memeriksa sarana penyelamatan jiwa (tangga kebakaran, lampu darurat, penunjuk arah darurat ,kipas penekan asap, lift kebakaran) pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Laporan sarana penyelamatan jiwa (tangga kebakaran, lampu darurat, penunjuk arah darurat ,kipas penekan asap, lift kebakaran) pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'score' => 0.001
        //     ],
        //     // 319
        //     [
        //         'sub_unsur_id' => 82,
        //         'nama' => 'Memeriksa dan menguji sistem hidran kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Laporan sistem hidran kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'score' => 0.001
        //     ],
        //     // 320
        //     [
        //         'sub_unsur_id' => 82,
        //         'nama' => 'Memeriksa dan menguji sistem springkler otomatis pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Laporan Memeriksa dan menguji sistem springkler otomatis pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'score' => 0.001
        //     ],
        //     // 321
        //     [
        //         'sub_unsur_id' => 82,
        //         'nama' => 'Memeriksa dan menguji sistem deteksi dan alarm kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Kegiatan emeriksa dan menguji sistem deteksi dan alarm kebakaran pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'score' => 0.001
        //     ],
        //     // 322
        //     [
        //         'sub_unsur_id' => 82,
        //         'nama' => 'Memeriksa Alat Pemadam Api Ringan (APAR) pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Laporan Memeriksa Alat Pemadam Api Ringan (APAR) pada bangunan rendah dan menengah, tidak termasuk bangunan industri, tidak termasuk bangunan industri',
        //         'score' => 0.001
        //     ],
        //     // 322
        //     [
        //         'sub_unsur_id' => 82,
        //         'nama' => 'Memeriksa sistem proteksi pasif (fire stopping , saf, bukaan, kompartemenisasi dll ) pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Memeriksa sistem proteksi pasif (fire stopping , saf, bukaan, kompartemenisasi dll ) pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'score' => 0.001
        //     ],
        //     // 323
        //     [
        //         'sub_unsur_id' => 83,
        //         'nama' => 'Memeriksa dan menguji spesifikasi proteksi kebakaran proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Laporan proteksi kebakaran proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.002
        //     ],
        //     // 324
        //     [
        //         'sub_unsur_id' => 83,
        //         'nama' => 'Memeriksa akses pemadam kebakaran proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vita',
        //         'satuan_hasil' => 'Laporan proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.002
        //     ],
        //     // 325
        //     [
        //         'sub_unsur_id' => 83,
        //         'nama' => 'Memeriksa sarana penyelamatan jiwa (tangga kebakaran, lampu darurat, penunjuk arah darurat ,kipas penekan asap, lift kebakaran) proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Laporan sarana penyelamatan jiwa (tangga kebakaran, lampu darurat, penunjuk arah darurat ,kipas penekan asap, lift kebakaran) proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.002
        //     ],
        //     // 326
        //     [
        //         'sub_unsur_id' => 83,
        //         'nama' => 'Memeriksa dan menguji sistem hidran kebakaran proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Laporan pemeriksaan dan pengujian sistem hidran kebakaran proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.002
        //     ],
        //     // 327
        //     [
        //         'sub_unsur_id' => 83,
        //         'nama' => 'Memeriksa dan menguji sistem springkler otomatis proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Laporan sistem springkler otomatis proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.002
        //     ],
        //     // 328
        //     [
        //         'sub_unsur_id' => 83,
        //         'nama' => 'Memeriksa dan menguji sistem deteksi dan alarm kebakaran proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Laporan sistem deteksi dan alarm kebakaran proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.002
        //     ],
        //     // 329
        //     [
        //         'sub_unsur_id' => 83,
        //         'nama' => 'Memeriksa Alat Pemadam Api Ringan (APAR) proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Laporan Alat Pemadam Api Ringan (APAR) proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.002
        //     ],
        //     // 330
        //     [
        //         'sub_unsur_id' => 83,
        //         'nama' => 'Memeriksa sistem proteksi pasif (fire stopping , saf, bukaan, kompartemenisasi dll ) proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Laporan sistem proteksi pasif (fire stopping , saf, bukaan, kompartemenisasi dll ) proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.002
        //     ],
        //     // 331
        //     [
        //         'sub_unsur_id' => 83,
        //         'nama' => 'Memberikan rekomendasi tindak lanjut atas hasil pemeriksaan dan pengujian proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Laporan rekomendasi tindak lanjut atas hasil pemeriksaan dan pengujian proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.002
        //     ],
        //     // 332
        //     [
        //         'sub_unsur_id' => 84,
        //         'nama' => 'Mengkaji hasil pemeriksaan dan pengujian pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Dokumen pemeriksaan dan pengujian pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'score' => 0.001
        //     ],
        //     // 333
        //     [
        //         'sub_unsur_id' => 84,
        //         'nama' => 'Mengkaji hasil pemeriksaan dan pengujian pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Laporan pemeriksaan dan pengujian pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'score' => 0.001
        //     ],
        //     // 334
        //     [
        //         'sub_unsur_id' => 84,
        //         'nama' => 'Mengkaji berita acara pemeriksaan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Dokumen berita acara pemeriksaan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'score' => 0.001
        //     ],
        //     // 335
        //     [
        //         'sub_unsur_id' => 84,
        //         'nama' => 'Memberi masukan dan saran kepada pengelola gedung dari hasil pemeriksaan pada bangunan rendah dan menengah,tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Dokumen masukan dan saran kepada pengelola gedung dari hasil pemeriksaan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'score' => 0.001
        //     ],
        //     // 336
        //     [
        //         'sub_unsur_id' => 84,
        //         'nama' => 'Mengkaji hasil pemeriksaan dan pengujian pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Dokumen hasil pemeriksaan dan pengujian pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'score' => 0.001
        //     ],
        //     // 337
        //     [
        //         'sub_unsur_id' => 84,
        //         'nama' => 'Mengkaji hasil pemeriksaan dan pengujian kepada atasan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'satuan_hasil' => 'Laporan hasil pemeriksaan dan pengujian kepada atasan pada bangunan rendah dan menengah, tidak termasuk bangunan industri',
        //         'score' => 0.001
        //     ],
        //     // 338
        //     [
        //         'sub_unsur_id' => 84,
        //         'nama' => 'Menginvetarisasi jumlah nilai retribusi hasil pemeriksaan dan pengujian',
        //         'satuan_hasil' => 'Dokumen jumlah nilai retribusi hasil pemeriksaan dan pengujian ',
        //         'score' => 0.001
        //     ],
        //     // 339
        //     [
        //         'sub_unsur_id' => 85,
        //         'nama' => 'Menelaah hasil pemeriksaan dan pengujian proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Dokumen jumlah nilai retribusi hasil pemeriksaan dan pengujian',
        //         'score' => 0.001
        //     ],
        //     // 340
        //     [
        //         'sub_unsur_id' => 85,
        //         'nama' => 'Menelaah hasil pemeriksaan dan pengujian proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Laporan hasil pemeriksaan dan pengujian proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.001
        //     ],
        //     // 341
        //     [
        //         'sub_unsur_id' => 85,
        //         'nama' => 'Menyusun berita acara pemeriksaan proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Dokumen berita acara pemeriksaan proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.001
        //     ],
        //     // 342
        //     [
        //         'sub_unsur_id' => 85,
        //         'nama' => 'Memberikan masukan dan saran kepada pengelola gedung dari hasil pemeriksaan proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Dokumen masukan dan saran kepada pengelola gedung dari hasil pemeriksaan proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.001
        //     ],
        //     // 343
        //     [
        //         'sub_unsur_id' => 85,
        //         'nama' => 'Memvalidasi hasil pemeriksaan dan pengujian proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'satuan_hasil' => 'Dokumen hasil pemeriksaan dan pengujian proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital',
        //         'score' => 0.001
        //     ],
        //     // 344
        //     [
        //         'sub_unsur_id' => 85,
        //         'nama' => 'Memvalidasi hasil pemeriksaan dan pengujian proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital kepada atasan',
        //         'satuan_hasil' => 'Laporan hasil pemeriksaan dan pengujian proteksi kebakaran pada bangunan tinggi, bangunan industri dan obyek vital kepada atasan',
        //         'score' => 0.001
        //     ],
        //     // 345
        //     [
        //         'sub_unsur_id' => 85,
        //         'nama' => 'Menginvetarisasi jumlah nilai retribusi hasil pemeriksaan dan pengujian',
        //         'satuan_hasil' => 'Dokumen nilai retribusi hasil pemeriksaan dan pengujian ',
        //         'score' => 0.001
        //     ],

        // ];
        // ButirKegiatan::query()->upsert($terampil, 'id');
    }
}
