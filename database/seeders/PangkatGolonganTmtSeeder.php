<?php

namespace Database\Seeders;

use App\Models\PangkatGolonganTmt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PangkatGolonganTmtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pangkats = [
            ['nama' => 'Juru Muda (I/a)'],
            ['nama' => 'Juru Muda Tingkat I (I/b)'],
            ['nama' => 'Juru (I/c)'],
            ['nama' => 'Juru Tingkat I (I/d)'],
            ['nama' => 'Pengatur Muda (II/a)'],
            ['nama' => 'Pengatur Muda Tingkat I (II/b)'],
            ['nama' => 'Pengatur (II/c)'],
            ['nama' => 'Pengatur Tingkat I (II/d)'],
            ['nama' => 'Penata Muda (III/a)'],
            ['nama' => 'Penata Muda Tingkat I (III/b)'],
            ['nama' => 'Penata (III/c)'],
            ['nama' => 'Penata Tingkat I (III/d)'],
            ['nama' => 'Pembina (IV/a)'],
            ['nama' => 'Pembina Tingkat I (IV/b)'],
            ['nama' => 'Pembina Muda (IV/c)'],
            ['nama' => 'Pembina Madya (IV/d)'],
            ['nama' => 'Pembina Utama (IV/e)'],
        ];

        PangkatGolonganTmt::query()->upsert($pangkats, 'id');
    }
}
