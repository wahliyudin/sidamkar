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
            [
                'sub_unsur_id' => 19,
                'nama' => 'Melaksanakan piket sesuai dengan consignus jaga (tata kelola)',
                'satuan_hasil' => 'Laporan piket sesuai dengan consignus jaga (tata kelola)',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 19,
                'nama' => 'Melakukan Monitoring kejadian kebakaran dan penyelamatan',
                'satuan_hasil' => 'Laporan kejadian kebakaran dan penyelamatan',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 20,
                'nama' => 'Mempersiapkan kelengkapan unit mobil',
                'satuan_hasil' => 'Laporan kelengkapan unit mobil',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 20,
                'nama' => 'Melaksanakan apel malam',
                'satuan_hasil' => 'Laporan apel malam',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 20,
                'nama' => 'Melaksanakan pengecekan fungsi peralatan unit mobil',
                'satuan_hasil' => 'Laporan pengecekan fungsi peralatan unit mobil',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 20,
                'nama' => 'Memanaskan mesin unit mobil',
                'satuan_hasil' => 'Laporan mesin unit mobil',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 20,
                'nama' => 'Memeriksa fungsi lampu rotary, sirine, dan lampu kendaraan',
                'satuan_hasil' => 'Laporan fungsi lampu rotary, sirine, dan lampu kendaraan',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 20,
                'nama' => 'Memeriksa fungsi alat komunikasi Rig dan HT',
                'satuan_hasil' => 'Laporan fungsi alat komunikasi Rig dan HT',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 20,
                'nama' => 'Memeriksa kondisi volume air tangki unit mobil',
                'satuan_hasil' => 'Laporan kondisi volume air tangki unit mobil',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 20,
                'nama' => 'Membuat laporan sesuai dengan form check list.',
                'satuan_hasil' => 'Dokumen sesuai dengan form check list.',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 21,
                'nama' => 'Mempersiapkan peralatan latihan',
                'satuan_hasil' => 'Laporan peralatan latihan',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 21,
                'nama' => 'Melakukan latihan penggunaan peralatan khusus',
                'satuan_hasil' => 'Laporan latihan penggunaan peralatan khusus',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 21,
                'nama' => 'Merapikan kembali peralatan yang',
                'satuan_hasil' => 'Laporan peralatan yang digunakan',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 22,
                'nama' => 'Melaksanakan kegiatan pembinaan fisik',
                'satuan_hasil' => 'Laporan kegiatan pembinaan fisik',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 23,
                'nama' => 'Melaksanakan korve di lingkungan kerja',
                'satuan_hasil' => 'Laporan korve di lingkungan kerja',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 23,
                'nama' => 'Melaksanakan kebersihan unit',
                'satuan_hasil' => 'Laporan kebersihan unit',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 24,
                'nama' => 'Mencatat kondisi sistem pengendalian komunikasi penanggulangan kebakaran',
                'satuan_hasil' => 'Dokumen kondisi sistem pengendalian komunikasi penanggulangan kebakaran',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 25,
                'nama' => 'Menyiapkan kelengkapan Poskotis (Pos Komando Taktis) penanggulangan kebakaran',
                'satuan_hasil' => 'Laporan kelengkapan Poskotis (Pos Komando Taktis) penanggulangan kebakaran',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 25,
                'nama' => 'Mengumpulkan data untuk kebutuhan poskotis penanggulangan kebakaran',
                'satuan_hasil' => 'Dokumen data untuk kebutuhan poskotis penanggulangan kebakaran',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 25,
                'nama' => 'Melaporkan data dan informasi penanggulangan kebakaran',
                'satuan_hasil' => 'Dokumen data dan informasi penanggulangan kebakaran',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 26,
                'nama' => 'Memakai alat pelindung diri pengemudi',
                'satuan_hasil' => 'Laporan alat pelindung diri pengemudi',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 26,
                'nama' => 'Menyiapkan peralatan komunikasi pengemudi',
                'satuan_hasil' => 'Laporan peralatan komunikasi pengemudi',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 26,
                'nama' => 'Mengemudikan Mobil Pemadam Kebakaran menuju TKP',
                'satuan_hasil' => 'Laporan Mobil Pemadam Kebakaran menuju TKP',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 26,
                'nama' => 'Mengatur posisi Unit Mobil Pemadam Kebakaran di TKP',
                'satuan_hasil' => 'Laporan posisi Unit Mobil Pemadam Kebakaran di TKP',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 26,
                'nama' => 'Melakukan koordinasi internal unit',
                'satuan_hasil' => 'Laporan koordinasi internal unit',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 27,
                'nama' => 'Mempersiapkan sistem pompa/PTO unit',
                'satuan_hasil' => 'Laporan sistem pompa/PTO unit ',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 27,
                'nama' => 'Mengoperasikan pompa / PTO unit',
                'satuan_hasil' => 'Laporan pompa / PTO unit',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 27,
                'nama' => 'Menyambung kopling selang ke kopling unit',
                'satuan_hasil' => 'Laporan kopling selang ke kopling unit ',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 27,
                'nama' => 'Melayani kebutuhan air dan tekanan pompa yang diperlukan',
                'satuan_hasil' => 'Laporan kebutuhan air dan tekanan pompa yang diperlukan',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 27,
                'nama' => 'Melaksanakan pengisian tangki air',
                'satuan_hasil' => 'Laporan pengisian tangki air',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 27,
                'nama' => 'Melaksanakan suplai air',
                'satuan_hasil' => 'Laporan suplai air',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 28,
                'nama' => 'Mengemas peralatan yang digunakan',
                'satuan_hasil' => 'Laporan peralatan yang digunakan',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 28,
                'nama' => 'Mengecek kelengkapan peralatan',
                'satuan_hasil' => 'Laporan kelengkapan peralatan',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 28,
                'nama' => 'Mengikuti apel pengecekan personil',
                'satuan_hasil' => 'Laporan apel pengecekan personil',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 28,
                'nama' => 'Melakukan pengisian tangki air unit',
                'satuan_hasil' => 'Laporan pengisian tangki air unit',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 28,
                'nama' => 'Mengemudikan unit menuju pos pemadam kebakaran',
                'satuan_hasil' => 'Laporan unit menuju pos pemadam kebakaran',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 29,
                'nama' => 'Membersihkan unit, APD dan peralatan',
                'satuan_hasil' => 'Laporan unit, APD dan peralatan',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 29,
                'nama' => 'Menguras dan mengisi tangki air mobil pemadam kebakaran',
                'satuan_hasil' => 'Laporan tangki air mobil pemadam kebakaran',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 29,
                'nama' => 'Memeriksa kondisi mobil pemadam kebakaran',
                'satuan_hasil' => 'Laporan kondisi mobil pemadam kebakaran',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 29,
                'nama' => 'Menempatkan kembali mobil pemada kebakaran pada posisi yang telah ditentukan',
                'satuan_hasil' => 'Laporan mobil pemadam kebakaran pada posisi yang telah ditentukan',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 30,
                'nama' => 'mencatat data informasi kejadian evakuasi dan penyelamatan',
                'satuan_hasil' => 'Dokumen data informasi kejadian evakuasi dan penyelamatan',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 31,
                'nama' => 'mencatat data informasi kejadian evakuasi dan penyelamatanMembuat poskotis evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan poskotis evakuasi dan penyelamatan',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 31,
                'nama' => 'Mengumpulkan dan mengolah data untuk kebutuhan poskotis evakuasi dan penyelamatan',
                'satuan_hasil' => 'Dokumen data untuk kebutuhan poskotis evakuasi dan penyelamatan',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 31,
                'nama' => 'Melaporkan data dan informasi evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan data dan informasi evakuasi dan penyelamatan',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 32,
                'nama' => 'Melaksanakan inventarisasi sarana prasarana komunikasi evakuasi dan penyelamatan',
                'satuan_hasil' => 'Dokumen inventarisasi sarana prasarana komunikasi evakuasi dan penyelamatan',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 32,
                'nama' => 'Melaksanakan pengecekan sarana prasarana komunikasi evakuasi dan penyelamatan',
                'satuan_hasil' => 'Dokumen pengecekan sarana prasarana komunikasi evakuasi dan penyelamatan',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 32,
                'nama' => 'Melakukan pemeliharaan peralatan komunikasi evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan pemeliharaan peralatan komunikasi evakuasi dan penyelamatan',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 33,
                'nama' => 'Memakai alat pelindung diri pengemudi',
                'satuan_hasil' => 'Laporan alat pelindung diri pengemudi',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 33,
                'nama' => 'Menyiapkan peralatan komunikasi pengemudi',
                'satuan_hasil' => 'Laporan peralatan komunikasi pengemudi',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 33,
                'nama' => 'Mengemudikan Unit Evakuasi dan Penyelamatan menuju TKP',
                'satuan_hasil' => 'Laporan Unit Evakuasi dan Penyelamatan menuju TKP',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 33,
                'nama' => 'Mengatur posisi Unit Evakuasi dan Penyelamatan di TKP',
                'satuan_hasil' => 'Laporan posisi Unit Evakuasi dan Penyelamatan di TKP',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 33,
                'nama' => 'Melakukan koordinasi internal unit Evakuasi dan Penyelamatan',
                'satuan_hasil' => 'Laporan koordinasi internal unit Evakuasi dan Penyelamatan',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 34,
                'nama' => 'Mempersiapkan peralatan Evakuasi dan Penyelamatan',
                'satuan_hasil' => 'Laporan peralatan Evakuasi dan Penyelamatan',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 34,
                'nama' => 'Menentukan peralatan Evakuasi dan Penyelamatan yang akan digunakan',
                'satuan_hasil' => 'Laporan peralatan Evakuasi dan Penyelamatan yang akan digunakan',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 34,
                'nama' => 'Mengoperasikan peralatan Evakuasi dan Penyelamatan',
                'satuan_hasil' => 'Laporan peralatan Evakuasi dan Penyelamatan',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 34,
                'nama' => 'Mengevakuasi dan Penyelamatan korban',
                'satuan_hasil' => 'Laporan evakuasi dan Penyelamatan korban',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 35,
                'nama' => 'Mengemas peralatan Evakuasi dan Penyelamatan yang digunakan',
                'satuan_hasil' => 'Laporan peralatan Evakuasi dan Penyelamatan yang digunakan',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 35,
                'nama' => 'Mengecek kelengkapan peralatan Evakuasi dan Penyelamatan',
                'satuan_hasil' => 'Laporan kelengkapan peralatan Evakuasi dan Penyelamatan',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 35,
                'nama' => 'Mengembalikan Peralatan Evakuasi dan Penyelamatan pada unit yang telah ditentukan',
                'satuan_hasil' => 'Laporan Peralatan Evakuasi dan Penyelamatan pada unit yang telah ditentukan',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 35,
                'nama' => 'Mengikuti apel pengecekan personil dalam operasi Evakuasi dan Penyelamatan',
                'satuan_hasil' => 'Laporan apel pengecekan personil dalam operasi Evakuasi dan Penyelamatan',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 36,
                'nama' => 'Mengemudikan unit menuju pos pemadam kebakaran dan penyelamatan',
                'satuan_hasil' => 'Laporan unit menuju pos pemadam kebakaran dan penyelamatan',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 36,
                'nama' => 'Membersihkan unit, APD dan peralatan evakuasi dan penyelamatan',
                'satuan_hasil' => 'Laporan unit, APD dan peralatan evakuasi dan penyelamatan',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 36,
                'nama' => 'Mengembalikan unit mobil evakuasi dan penyelamatan pada posisi yang telah ditentukan',
                'satuan_hasil' => 'Laporan unit mobil evakuasi dan penyelamatan pada posisi yang telah ditentukan',
                'score' => 0.004
            ],
            [
                'sub_unsur_id' => 37,
                'nama' => 'Melakukan verifikasi kelengkapan',
                'satuan_hasil' => 'Laporan verifikasi kelengkapan',
                'score' => 0.001
            ],
            [
                'sub_unsur_id' => 37,
                'nama' => 'Memimpin Apel Pagi',
                'satuan_hasil' => 'Laporan Apel Pagi',
                'score' => 0.001
            ],
            [
                'sub_unsur_id' => 37,
                'nama' => 'Memimpin serah terima tugas jaga',
                'satuan_hasil' => 'Laporan serah terima tugas jaga',
                'score' => 0.001
            ],
            [
                'sub_unsur_id' => 37,
                'nama' => 'Memimpin pemeriksaan jumlah peralatan operasional',
                'satuan_hasil' => 'Laporan pemeriksaan jumlah peralatan operasional',
                'score' => 0.001
            ],
            [
                'sub_unsur_id' => 37,
                'nama' => 'Memimpin pengecekan fungsi peralatan operasional',
                'satuan_hasil' => 'Laporan pengecekan fungsi peralatan operasional',
                'score' => 0.001
            ],
            [
                'sub_unsur_id' => 37,
                'nama' => 'Memeriksa laporan sesuai dengan form check list',
                'satuan_hasil' => 'Dokumen sesuai dengan form check list',
                'score' => 0.001
            ],
            [
                'sub_unsur_id' => 37,
                'nama' => 'Melakukan verifikasi fungsi alat komunikasi Rig dan HT',
                'satuan_hasil' => 'Dokumen verifikasi fungsi alat komunikasi Rig dan HT',
                'score' => 0.001
            ],
            [
                'sub_unsur_id' => 38,
                'nama' => 'Melakukan verifikasi kondisi volume air tangki unit mobil',
                'satuan_hasil' => 'Dokumen verifikasi kondisi volume air tangki unit mobil',
                'score' => 0.001
            ],
            [
                'sub_unsur_id' => 38,
                'nama' => 'Memvalidasi laporan sesuai dengan form check list',
                'satuan_hasil' => 'Dokumen validasi sesuai dengan form check list',
                'score' => 0.001
            ],
            [
                'sub_unsur_id' => 39,
                'nama' => 'Melakukan verifikasi kelengkapan personil dalam regu',
                'satuan_hasil' => 'Laporan verifikasi kelengkapan personil dalam regu',
                'score' => 0.001
            ],
            [
                'sub_unsur_id' => 39,
                'nama' => 'Mengatur anggota regu pada pelaksanaan apel malam',
                'satuan_hasil' => 'Laporan pelaksanaan apel malam',
                'score' => 0.001
            ],
            [
                'sub_unsur_id' => 39,
                'nama' => 'Mengatur anggota regu pada pemeriksaan peralatan unit mobil',
                'satuan_hasil' => 'Laporan pelaksanaan apel malam',
                'score' => 0.001
            ],
            [
                'sub_unsur_id' => 39,
                'nama' => 'Mengatur anggota regu pada pengecekan peralatan unit mobil',
                'satuan_hasil' => 'Laporan pengecekan peralatan unit mobil',
                'score' => 0.001
            ],
            [
                'sub_unsur_id' => 39,
                'nama' => 'Mengatur anggota regu pada pemeriksaan kondisi unit',
                'satuan_hasil' => 'Laporan pemeriksaan kondisi unit',
                'score' => 0.001
            ],
            [
                'sub_unsur_id' => 40,
                'nama' => 'Mengatur anggota regu pada Memimpin persiapan peralatan latihan',
                'satuan_hasil' => 'Laporan persiapan peralatan latihan',
                'score' => 0.001
            ],
            [
                'sub_unsur_id' => 40,
                'nama' => 'Mengatur anggota regu pada latihan penggunaan peralatan',
                'satuan_hasil' => 'Laporan latihan penggunaan peralatan',
                'score' => 0.001
            ],
            [
                'sub_unsur_id' => 40,
                'nama' => 'Mengatur anggota regu pada proses pengemasan peralatan yang telah digunakan',
                'satuan_hasil' => 'Laporan proses pengemasan peralatan yang telah digunakan',
                'score' => 0.001
            ],
            [
                'sub_unsur_id' => 41,
                'nama' => 'Mengatur anggota regu pada kegiatan',
                'satuan_hasil' => 'Laporan kegiatan pembinaan fisik',
                'score' => 0.001
            ],
            [
                'sub_unsur_id' => 42,
                'nama' => 'Mengatur anggota regu pada korve di lingkungan kerja',
                'satuan_hasil' => 'Laporan korve di lingkungan kerja',
                'score' => 0.001
            ],
            [
                'sub_unsur_id' => 42,
                'nama' => 'Mengatur anggota regu pada kebersihan unit',
                'satuan_hasil' => 'Laporan kebersihan unit',
                'score' => 0.001
            ],
            [
                'sub_unsur_id' => 43,
                'nama' => 'Melakukan validasi informasi kejadian kebakaran',
                'satuan_hasil' => 'Laporan validasi informasi kejadian kebakaran',
                'score' => 0.001
            ],
            [
                'sub_unsur_id' => 43,
                'nama' => 'Menginformasikan kejadian kebakaran',
                'satuan_hasil' => 'Laporan informasi kejadian kebakaran',
                'score' => 0.001
            ],
            [
                'sub_unsur_id' => 44,
                'nama' => 'Melaporkan tindak lanjut informasi kejadian kebakaran',
                'satuan_hasil' => 'Laporan tindak lanjut informasi kejadian kebakaran',
                'score' => 0.001
            ],
            [
                'sub_unsur_id' => 44,
                'nama' => 'Melakukan koordinasi dengan regu lainnya',
                'satuan_hasil' => 'Laporan koordinasi dengan regu lainnya',
                'score' => 0.001
            ],
            [
                'sub_unsur_id' => 44,
                'nama' => 'Melakukan Koordinasi dengan instansi lainnya',
                'satuan_hasil' => 'Laporan Koordinasi dengan instansi lainnya',
                'score' => 0.001
            ],
            [
                'sub_unsur_id' => 45,
                'nama' => 'Memakai alat pelindung diri dan mengawasi pemakaian APD',
                'satuan_hasil' => 'Laporan alat pelindung diri dan mengawasi pemakaian APD',
                'score' => 0.001
            ],
            [
                'sub_unsur_id' => 45,
                'nama' => 'Mengatur anggota regu pada penempatanposisi duduk anggota regu sesuai dengan formasi unit',
                'satuan_hasil' => 'Laporan penempatan posisi duduk anggota regu sesuai dengan formasi unit ',
                'score' => 0.001
            ],
            [
                'sub_unsur_id' => 45,
                'nama' => 'Memerintahkan regu menuju ke tempat kejadian kebakaran',
                'satuan_hasil' => 'Laporan regu menuju ke tempat kejadian kebakaran',
                'score' => 0.001
            ],
            [
                'sub_unsur_id' => 45,
                'nama' => 'Mengatur anggota regu pada Memimpin koordinasi internal unit',
                'satuan_hasil' => 'Laporan koordinasi internal unit',
                'score' => 0.001
            ],
            [
                'sub_unsur_id' => 45,
                'nama' => 'Mengatur anggota regu pada size up (penilaian awal) pada saat di perjalanan',
                'satuan_hasil' => 'Laporan size up (penilaian awal) pada saat di perjalanan',
                'score' => 0.001
            ],
            [
                'sub_unsur_id' => 46,
                'nama' => 'Mengatur anggota regu pada size up (penilaian awal) situasi kondisi kejadian kebakaran',
                'satuan_hasil' => 'Laporan size up (penilaian awal) situasi kondisi kejadian kebakaran',
                'score' => 0.001
            ],
            [
                'sub_unsur_id' => 46,
                'nama' => 'Mengatur anggota regu pada teknik taktik strategi operasional pemadaman',
                'satuan_hasil' => 'Laporan teknik taktik strategi operasional pemadaman',
                'score' => 0.001
            ],
            [
                'sub_unsur_id' => 46,
                'nama' => 'Mengatur prosedur pemadaman dari sumber air ke titik api',
                'satuan_hasil' => 'Laporan prosedur pemadaman dari sumber air ke titik api',
                'score' => 0.001
            ],
        ];
        ButirKegiatan::query()->upsert($terampil, 'id');
    }
}