<?php

namespace Database\Seeders;

use App\Models\MekanismePengangkatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MekanismePengangkatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mekanismes = [
            'Pengangkatan Pertama (CPNS)',
            'Pengangkatan Pertama (PPPK)',
            'Perpindahan Dari Jabatan Lain',
            'Penyesuaian/Inpassing',
            'Penyetaraan Jabatan',
            'Promosi'
        ];
        foreach ($mekanismes as $mekanisme) {
            MekanismePengangkatan::query()->create([
                'nama' => $mekanisme
            ]);
        }
    }
}