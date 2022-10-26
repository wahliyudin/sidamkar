<?php

namespace Database\Seeders;

use App\Models\JenisKegiatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisKegiaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenis_kegiatan = [
            ['nama' => 'Kegiatan Pokok'],
            ['nama' => 'Kegiatan Penunjang']
        ];
        JenisKegiatan::query()->upsert($jenis_kegiatan, 'id');
    }
}
