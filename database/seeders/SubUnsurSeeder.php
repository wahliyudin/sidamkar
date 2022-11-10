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

        $damkarPemula = [
            [
                'unsur_id' => 1,
                'nama' => 'Apel pagi sebagai peserta dan serah terima tugas jaga'
            ],
            [
                'unsur_id' => 1,
                'nama' => 'Tugas piket jaga'
            ],
            [
                'unsur_id' => 1,
                'nama' => 'Apel Malam sebagai peserta'
            ],
            [
                'unsur_id' => 1,
                'nama' => 'Kegiatan rutin latihan ketrampilan'
            ],
            [
                'unsur_id' => 1,
                'nama' => 'Pembinaan fisik '
            ],
            [
                'unsur_id' => 1,
                'nama' => 'Menjaga kebersihan lingkungan kerja (korve)'
            ],
            [
                'unsur_id' => 2,
                'nama' => 'Informasi kejadian kebakaran'
            ],
            [
                'unsur_id' => 2,
                'nama' => 'Koordinasi dengan Kepala Regu terkait informasi kejadian kebakaran'
            ],
            [
                'unsur_id' => 3,
                'nama' => 'Keberangkatan menuju tempat kejadian kebakaran'
            ],
            [
                'unsur_id' => 3,
                'nama' => 'Pemadaman kebakaran'
            ],
            [
                'unsur_id' => 3,
                'nama' => 'Proses pendinginan'
            ],
            [
                'unsur_id' => 3,
                'nama' => 'Persiapan kembali ke pos pemadam kebakaran'
            ],
            [
                'unsur_id' => 3,
                'nama' => 'Pengembalian peralatan di pos pemadam kebakaran'
            ],
            [
                'unsur_id' => 4,
                'nama' => 'Informasi kejadian evakuasi dan penyelamatan'
            ],
            [
                'unsur_id' => 4,
                'nama' => 'Koordinasi dengan kepala regu terkait informasi kejadian evakuasi dan penyelamatan'
            ],
            [
                'unsur_id' => 4,
                'nama' => 'Evakuasi dan penyelamatan '
            ],
            [
                'unsur_id' => 4,
                'nama' => 'Melaporkan kejadian evakuasi dan penyelamatan'
            ]
        ];
        SubUnsur::query()->upsert($damkarPemula, 'id');

        $terampil = [
            [
                'unsur_id' => 5,
                'nama' => 'Apel sebagai pengatur Regu dan serah terima tugas jaga'
            ],
            [
                'unsur_id' => 5,
                'nama' => 'Tugas piket jaga'
            ],
            [
                'unsur_id' => 5,
                'nama' => 'Apel Pengecekan unit dan personil'
            ],
            [
                'unsur_id' => 5,
                'nama' => 'Latihan rutin ketrampilan'
            ],
            [
                'unsur_id' => 5,
                'nama' => 'Pembinaan fisik'
            ],
            [
                'unsur_id' => 5,
                'nama' => 'Kebersihan lingkungan kerja (korve)'
            ],
            [
                'unsur_id' => 6,
                'nama' => 'Pengecekan alat komunikasi penanggulangan kebakaran'
            ],
            [
                'unsur_id' => 6,
                'nama' => 'Sarana, prasarana komunikasi dan dokumentasi poskotis penanggulangan kebakaran'
            ],
            [
                'unsur_id' => 6,
                'nama' => 'Pemeliharaan Sarana prasarana komunikasi penanggulangan kebakaran'
            ],
            [
                'unsur_id' => 7,
                'nama' => 'Keberangkatan menuju tempat kejadian kebakaran'
            ],
            [
                'unsur_id' => 7,
                'nama' => 'Pemadaman kebakaran'
            ],
            [
                'unsur_id' => 7,
                'nama' => 'Persiapan kembali ke pos pemadam kebakaran'
            ],
            [
                'unsur_id' => 7,
                'nama' => 'Pengembalian peralatan di pos pemadam kebakaran'
            ],
            [
                'unsur_id' => 8,
                'nama' => 'Prosedur pelaporan informasi kejadian evakuasi dan penyelamatan'
            ],
            [
                'unsur_id' => 8,
                'nama' => 'Penyiapan sarana, prasarana prosedur informasi kejadian evakuasi dan penyelamatan'
            ],
            [
                'unsur_id' => 8,
                'nama' => 'Pemeliharaan Sarana prasarana komunikasi evakuasi dan penyelamatan'
            ],
            [
                'unsur_id' => 9,
                'nama' => 'Pemberangkatkan menuju lokasi evakuasi dan penyelamatan'
            ],
            [
                'unsur_id' => 9,
                'nama' => 'Evakuasi dan penyelamatan'
            ],
            [
                'unsur_id' => 9,
                'nama' => 'Persiapan kembali ke Pos pemadam kebakaran dan penyelamatan'
            ],
            [
                'unsur_id' => 9,
                'nama' => 'Pengembalian peralatan di pos pemadam kebakaran dan penyelamatan'
            ],
            [
                'unsur_id' => 10,
                'nama' => 'Apel Pagi sebagai penanggung jawab Regu'
            ],
            [
                'unsur_id' => 10,
                'nama' => 'Tugas piket jaga'
            ],
            [
                'unsur_id' => 10,
                'nama' => 'Apel Malam sebagai penanggungjawab Regu'
            ],
            [
                'unsur_id' => 10,
                'nama' => 'Latihan rutin ketrampilan'
            ],
            [
                'unsur_id' => 10,
                'nama' => 'Pembinaan fisik'
            ],
            [
                'unsur_id' => 10,
                'nama' => 'Kebersihan lingkungan kerja (korve)'
            ],
            [
                'unsur_id' => 11,
                'nama' => 'Validasi informasi kejadian kebakaran'
            ],
            [
                'unsur_id' => 11,
                'nama' => 'Koordinasi informasi dengan call center , regu lainnya dan instansi terkait tentang informasi kejadian kebakaran'
            ],
            [
                'unsur_id' => 12,
                'nama' => 'Mobilisasi regu menuju tempat kejadian kebakaran'
            ],
            [
                'unsur_id' => 12,
                'nama' => 'Pelaksanaan pemadaman kebakaran'
            ],
        ];
        SubUnsur::query()->upsert($terampil, 'id');
    }
}
