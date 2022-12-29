<?php

namespace Database\Seeders;

use App\Models\NomenKlaturPerangkatDaerah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NomenKlaturPerangkatDaerahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nomeklaturs = [
            ['nama' => 'Dinas Pemadam Kebakaran dan Penyelamatan'],
            ['nama' => 'Satuan Polisi Pamong Praja'],
            ['nama' => 'Badan Penanggulangan Bencana Daerah'],
            ['nama' => 'Dinas Pekerjaan Umum dan Perumahan Rakyat'],
            ['nama' => 'Pejabat Fungsional Umum/Honorer'],
            ['nama' => 'Lainnya']
        ];
        NomenKlaturPerangkatDaerah::query()->upsert($nomeklaturs, 'id');
    }
}
