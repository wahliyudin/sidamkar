<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KetentuanSkp;

class KetentuanSkpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ketentuanSkp = [
            [
                'nama' => 'Sangat Baik',
                'nilai' => 100
            ],
            [
                'nama' => 'Baik',
                'nilai' => 100
            ],
            [
                'nama' => 'Kurang',
                'nilai' => 85
            ],
            [
                'nama' => 'Butuh Perbaikan',
                'nilai' => 85
            ],
            [
                'nama' => 'Sangat Kurang',
                'nilai' => 70
            ],
        ];
        KetentuanSkp::query()->upsert($ketentuanSkp, 'id');
    }
}
