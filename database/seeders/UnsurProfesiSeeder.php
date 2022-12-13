<?php

namespace Database\Seeders;

use App\Models\UnsurProfesi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnsurProfesiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kegiatanProfesiFungsionalDamkar = [
            //1
            [
                'jenis_kegiatan_id' => 3,
                'periode_id' => 1,
                'nama' => 'Pengembangan Profesi Pemadam Kebakaran'
            ],
            //2
            [
                'jenis_kegiatan_id' => 3,
                'periode_id' => 1,
                'nama' => 'Penunjang Tugas Pemadam Kebakaran'
            ],
        ];
        UnsurProfesi::query()->upsert($kegiatanProfesiFungsionalDamkar, 'id');
    }
}
