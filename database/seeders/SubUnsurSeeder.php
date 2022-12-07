<?php

namespace Database\Seeders;

use App\Models\SubUnsur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubUnsurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sub Unsur dengan id 1 sampai dengan 73 adalah milik dari kegiatan pokok JABATAN FUNGSIONAL PEMADAM KEBAKARAN 

        $damkarPemula = [
            [
                // 1
                'unsur_id' => 1,
                'nama' => 'Apel pagi sebagai peserta dan serah terima tugas jaga'
            ],
            [
                // 2
                'unsur_id' => 1,
                'nama' => 'Tugas piket jaga'
            ],
            [
                // 3
                'unsur_id' => 1,
                'nama' => 'Apel Malam sebagai peserta'
            ],
            [
                // 4
                'unsur_id' => 1,
                'nama' => 'Kegiatan rutin latihan ketrampilan'
            ],
            [
                // 5
                'unsur_id' => 1,
                'nama' => 'Pembinaan fisik '
            ],
            [
                // 6
                'unsur_id' => 1,
                'nama' => 'Menjaga kebersihan lingkungan kerja (korve)'
            ],
            [
                // 7
                'unsur_id' => 2,
                'nama' => 'Informasi kejadian kebakaran'
            ],
            [
                // 8
                'unsur_id' => 2,
                'nama' => 'Koordinasi dengan Kepala Regu terkait informasi kejadian kebakaran'
            ],
            [
                // 9
                'unsur_id' => 3,
                'nama' => 'Keberangkatan menuju tempat kejadian kebakaran'
            ],
            [
                // 10
                'unsur_id' => 3,
                'nama' => 'Pemadaman kebakaran'
            ],
            [
                // 11
                'unsur_id' => 3,
                'nama' => 'Proses pendinginan'
            ],
            [
                // 12
                'unsur_id' => 3,
                'nama' => 'Persiapan kembali ke pos pemadam kebakaran'
            ],
            [
                // 13
                'unsur_id' => 3,
                'nama' => 'Pengembalian peralatan di pos pemadam kebakaran'
            ],
            [
                // 14
                'unsur_id' => 4,
                'nama' => 'Informasi kejadian evakuasi dan penyelamatan'
            ],
            [
                // 15
                'unsur_id' => 4,
                'nama' => 'Koordinasi dengan kepala regu terkait informasi kejadian evakuasi dan penyelamatan'
            ],
            [
                // 16
                'unsur_id' => 4,
                'nama' => 'Evakuasi dan penyelamatan '
            ],
            [
                // 17
                'unsur_id' => 4,
                'nama' => 'Melaporkan kejadian evakuasi dan penyelamatan'
            ]
        ];
        SubUnsur::query()->upsert($damkarPemula, 'id');

        $terampil = [
            [
                // 18
                'unsur_id' => 5,
                'nama' => 'Apel sebagai pengatur Regu dan serah terima tugas jaga'
            ],
            [
                // 19
                'unsur_id' => 5,
                'nama' => 'Tugas piket jaga'
            ],
            [
                // 20
                'unsur_id' => 5,
                'nama' => 'Apel Pengecekan unit dan personil'
            ],
            [
                // 21
                'unsur_id' => 5,
                'nama' => 'Latihan rutin ketrampilan'
            ],
            [
                // 22
                'unsur_id' => 5,
                'nama' => 'Pembinaan fisik'
            ],
            [
                // 23
                'unsur_id' => 5,
                'nama' => 'Kebersihan lingkungan kerja (korve)'
            ],
            [
                // 24
                'unsur_id' => 6,
                'nama' => 'Pengecekan alat komunikasi penanggulangan kebakaran'
            ],
            [
                // 25
                'unsur_id' => 6,
                'nama' => 'Sarana, prasarana komunikasi dan dokumentasi poskotis penanggulangan kebakaran'
            ],
            [
                // 26
                'unsur_id' => 6,
                'nama' => 'Pemeliharaan Sarana prasarana komunikasi penanggulangan kebakaran'
            ],
            [
                // 27
                'unsur_id' => 7,
                'nama' => 'Keberangkatan menuju tempat kejadian kebakaran'
            ],
            [
                // 28
                'unsur_id' => 7,
                'nama' => 'Pemadaman kebakaran'
            ],
            [
                // 29
                'unsur_id' => 7,
                'nama' => 'Persiapan kembali ke pos pemadam kebakaran'
            ],
            [
                // 30
                'unsur_id' => 7,
                'nama' => 'Pengembalian peralatan di pos pemadam kebakaran'
            ],
            [
                // 31
                'unsur_id' => 8,
                'nama' => 'Prosedur pelaporan informasi kejadian evakuasi dan penyelamatan'
            ],
            [
                // 32
                'unsur_id' => 8,
                'nama' => 'Penyiapan sarana, prasarana prosedur informasi kejadian evakuasi dan penyelamatan'
            ],
            [
                // 33
                'unsur_id' => 8,
                'nama' => 'Pemeliharaan Sarana prasarana komunikasi evakuasi dan penyelamatan'
            ],
            [
                // 34
                'unsur_id' => 9,
                'nama' => 'Pemberangkatkan menuju lokasi evakuasi dan penyelamatan'
            ],
            [
                // 35
                'unsur_id' => 9,
                'nama' => 'Evakuasi dan penyelamatan'
            ],
            [
                // 36
                'unsur_id' => 9,
                'nama' => 'Persiapan kembali ke Pos pemadam kebakaran dan penyelamatan'
            ],
            [
                // 37
                'unsur_id' => 9,
                'nama' => 'Pengembalian peralatan di pos pemadam kebakaran dan penyelamatan'
            ],
        ];
        SubUnsur::query()->upsert($terampil, 'id');

        $mahir = [
            [
                // 38
                'unsur_id' => 10,
                'nama' => 'Apel Pagi sebagai penanggung jawab Regu'
            ],
            [
                // 39
                'unsur_id' => 10,
                'nama' => 'Tugas piket jaga'
            ],
            [
                // 40
                'unsur_id' => 10,
                'nama' => 'Apel Malam sebagai penanggungjawab Regu'
            ],
            [
                // 41
                'unsur_id' => 10,
                'nama' => 'Latihan rutin ketrampilan'
            ],
            [
                // 42
                'unsur_id' => 10,
                'nama' => 'Pembinaan fisik'
            ],
            [
                // 43
                'unsur_id' => 10,
                'nama' => 'Kebersihan lingkungan kerja (korve)'
            ],
            [
                // 44
                'unsur_id' => 11,
                'nama' => 'Validasi informasi kejadian kebakaran'
            ],
            [
                // 45
                'unsur_id' => 11,
                'nama' => 'Koordinasi informasi dengan call center , regu lainnya dan instansi terkait tentang informasi kejadian kebakaran'
            ],
            [
                // 46
                'unsur_id' => 12,
                'nama' => 'Mobilisasi regu menuju tempat kejadian kebakaran'
            ],
            [
                // 47
                'unsur_id' => 12,
                'nama' => 'Pelaksanaan pemadaman kebakaran'
            ],
            [
                // 48
                'unsur_id' => 12,
                'nama' => 'Pelaksanaan proses pendinginan'
            ],
            [
                // 49
                'unsur_id' => 12,
                'nama' => 'Persiapan kembali ke pos pemadam kebakaran'
            ],
            [
                // 50
                'unsur_id' => 12,
                'nama' => 'Pengembalian peralatan di pos pemadam kebakaran'
            ],
            [
                // 51
                'unsur_id' => 13,
                'nama' => 'Mobilisasi regu menuju tempat evakuasi dan penyelamatan'
            ],
            [
                // 52
                'unsur_id' => 13,
                'nama' => 'Mobilisasi pelaksanaan evakuasi dan penyelamatan'
            ],
            [
                // 53
                'unsur_id' => 13,
                'nama' => 'Persiapan kembali ke pos pemadam kebakaran'
            ],
            [
                // 54
                'unsur_id' => 13,
                'nama' => 'Pengembalian peralatan di pos pemadam kebakaran'
            ],
        ];
        SubUnsur::query()->upsert($mahir, 'id');

        $penyelia = [
            [
                // 55
                'unsur_id' => 14,
                'nama' => 'Apel pagi sebagai Kepala Peleton dan serah terima tugas jaga'
            ],
            [
                // 56
                'unsur_id' => 14,
                'nama' => 'Tugas piket jaga'
            ],
            [
                // 57
                'unsur_id' => 14,
                'nama' => 'Apel Malam sebagai Kepala Pleton'
            ],
            [
                // 58
                'unsur_id' => 14,
                'nama' => 'Latihan rutin ketrampilan'
            ],
            [
                // 59
                'unsur_id' => 14,
                'nama' => 'Pembinaan fisik'
            ],
            [
                // 60
                'unsur_id' => 14,
                'nama' => 'Kebersihan lingkungan kerja (korve)'
            ],
            [
                // 61
                'unsur_id' => 15,
                'nama' => 'Informasi kejadian kebakaran'
            ],
            [
                // 62
                'unsur_id' => 15,
                'nama' => 'Koordinasi informasi dengan call center , peleton lainnya dan instansi terkait tentang informasi kejadian kebakaran'
            ],
            [
                // 63
                'unsur_id' => 16,
                'nama' => 'Mobilisasi peleton menuju tempat kejadian kebakaran'
            ],
            [
                // 64
                'unsur_id' => 16,
                'nama' => 'Pemadaman kebakaran tingkat peleton'
            ],
            [
                // 65
                'unsur_id' => 16,
                'nama' => 'Proses pendinginan'
            ],
            [
                // 66
                'unsur_id' => 16,
                'nama' => 'Persiapan kembali ke Pos pemadam kebakaran dan penyelamatan'
            ],
            [
                // 67
                'unsur_id' => 16,
                'nama' => 'Pengembalian peralatan di pos pemadam kebakaran dan penyelamatan'
            ],
            [
                // 68
                'unsur_id' => 17,
                'nama' => 'Tindaklanjut informasi kejadian evakuasi dan penyelamatan'
            ],
            [
                // 69
                'unsur_id' => 17,
                'nama' => 'Koordinasi informasi dengan call center, pleton lainnya dan instansi terkait tentang informasi kejadian evakuasi dan penyelamatan'
            ],
            [
                // 70
                'unsur_id' => 18,
                'nama' => 'Mobilisasi peleton menuju tempat evakuasi dan penyelamatan'
            ],
            [
                // 71
                'unsur_id' => 18,
                'nama' => 'Evakuasi dan penyelamatan tingkat peleton'
            ],
            [
                // 72
                'unsur_id' => 18,
                'nama' => 'Kembali ke pos pemadam kebakaran dan penyelamatan'
            ],
            [
                // 73
                'unsur_id' => 18,
                'nama' => 'Pengembalian peralatan di pos pemadam kebakaran dan penyelamatan'
            ],
        ];
        SubUnsur::query()->upsert($penyelia, 'id');

        // End Sub Unsur dengan id 1 sampai dengan 73 adalah milik dari kegiatan pokok JABATAN FUNGSIONAL PEMADAM KEBAKARAN 

        $analis_kebakaran_ahli_pertama = [
            [
                //74
                'unsur_id' => 19,
                'nama' => 'Pengetahuan regulasi dalam bidang proteksi kebakaran'
            ],
            [
                //75
                'unsur_id' => 19,
                'nama' => 'Persiapan dan pemyusunan kebutuhan dokumen dan peralatan pemeriksaan gedung'
            ],
            [
                //76
                'unsur_id' => 19,
                'nama' => 'Pengetahuan teknis prosedur pemeriksaan dan pengujian'
            ],
            [
                //77
                'unsur_id' => 20,
                'nama' => 'Verifikasi dokumen pemeriksaan'
            ],
            [
                //78
                'unsur_id' => 20,
                'nama' => 'Pemeriksaan dan pengujian sistem proteksi kebakaran, sarana penyelamatan jiwa dan akses pemadam kebakaran'
            ],
            [
                //79
                'unsur_id' => 21,
                'nama' => 'Pengetahuan teknik pelaporan hasil pemeriksaan dan pengujian'
            ],
            [
                //80
                'unsur_id' => 21,
                'nama' => 'Penguasaan teknik pelaporan hasil pemeriksaan dan pengujian'
            ],
            [
                //81
                'unsur_id' => 22,
                'nama' => 'Pengetahuan materi tentang penyuluhan dan pemberdayaan masyarakat'
            ],
            [
                //82
                'unsur_id' => 22,
                'nama' => 'Koordinasi pelaksanaan penyuluhan'
            ],
            [
                //83
                'unsur_id' => 22,
                'nama' => 'Pengetahuan teknik penyuluhan'
            ],
            [
                //84
                'unsur_id' => 22,
                'nama' => 'Pelaksanaan penyuluhan dan sosialisas'
            ],
            [
                //85
                'unsur_id' => 22,
                'nama' => 'Penyusunan dan penyampaian materi penyuluhan dan sosialisasi pencegahan kebakaran'
            ],
            [
                //86
                'unsur_id' => 22,
                'nama' => 'Penyusunan dan penyampaian materi penyuluhan dan sosialisasi penanggulangan kebakaran'
            ],
            [
                //87
                'unsur_id' => 23,
                'nama' => 'Pelaksanaan evaluasi kegiatan penyuluhan dan pemberdayaan masyarakat'
            ],
            [
                //88
                'unsur_id' => 24,
                'nama' => 'Persiapan kegiatan pendidikan dan pelatihan'
            ],
            [
                //89
                'unsur_id' => 24,
                'nama' => 'Pemahaman metode pembelajaran'
            ],
            [
                //90
                'unsur_id' => 24,
                'nama' => 'Pembuatan model bahan ajar sesuai dengan perkembangan IPTEK'
            ],
            [
                //91
                'unsur_id' => 24,
                'nama' => 'Pelaksanaan pendidikan dan pelatihan'
            ],
            [
                //92
                'unsur_id' => 24,
                'nama' => 'Melaksanakan evaluasi kegiatan pendidikan dan pelatihan'
            ],
            [
                //93
                'unsur_id' => 25,
                'nama' => 'Penyusunan RISPK'
            ],
            [
                //94
                'unsur_id' => 26,
                'nama' => 'Pengawasan pengelolaan B3'
            ],
            [
                //95
                'unsur_id' => 27,
                'nama' => 'Tindak lanjut hasil pemeriksaan keselamatan kebakaran'
            ],
            [
                //96
                'unsur_id' => 28,
                'nama' => 'Penerapan prosedur dan metode investigasi'
            ],
        ];
        SubUnsur::query()->upsert($analis_kebakaran_ahli_pertama, 'id');
    }
}
