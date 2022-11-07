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
    }
}
