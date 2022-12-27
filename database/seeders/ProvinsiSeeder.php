<?php

namespace Database\Seeders;

use App\Models\Provinsi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinsi = [
            ['id' => '11', 'nama' => 'ACEH', 'email_info_penetapan' => null],
            ['id' => '12', 'nama' => 'SUMATERA UTARA', 'email_info_penetapan' => null],
            ['id' => '13', 'nama' => 'SUMATERA BARAT', 'email_info_penetapan' => null],
            ['id' => '14', 'nama' => 'RIAU', 'email_info_penetapan' => null],
            ['id' => '15', 'nama' => 'JAMBI', 'email_info_penetapan' => null],
            ['id' => '16', 'nama' => 'SUMATERA SELATAN', 'email_info_penetapan' => null],
            ['id' => '17', 'nama' => 'BENGKULU', 'email_info_penetapan' => null],
            ['id' => '18', 'nama' => 'LAMPUNG', 'email_info_penetapan' => null],
            ['id' => '19', 'nama' => 'KEPULAUAN BANGKA BELITUNG', 'email_info_penetapan' => null],
            ['id' => '21', 'nama' => 'KEPULAUAN RIAU', 'email_info_penetapan' => null],
            ['id' => '31', 'nama' => 'DKI JAKARTA', 'email_info_penetapan' => null],
            ['id' => '32', 'nama' => 'JAWA BARAT', 'email_info_penetapan' => null],
            ['id' => '33', 'nama' => 'JAWA TENGAH', 'email_info_penetapan' => null],
            ['id' => '34', 'nama' => 'DAERAH ISTIMEWA YOGYAKARTA', 'email_info_penetapan' => null],
            ['id' => '35', 'nama' => 'JAWA TIMUR', 'email_info_penetapan' => null],
            ['id' => '36', 'nama' => 'BANTEN', 'email_info_penetapan' => null],
            ['id' => '51', 'nama' => 'BALI', 'email_info_penetapan' => null],
            ['id' => '52', 'nama' => 'NUSA TENGGARA BARAT', 'email_info_penetapan' => null],
            ['id' => '53', 'nama' => 'NUSA TENGGARA TIMUR', 'email_info_penetapan' => null],
            ['id' => '61', 'nama' => 'KALIMANTAN BARAT', 'email_info_penetapan' => null],
            ['id' => '62', 'nama' => 'KALIMANTAN TENGAH', 'email_info_penetapan' => null],
            ['id' => '63', 'nama' => 'KALIMANTAN SELATAN', 'email_info_penetapan' => null],
            ['id' => '64', 'nama' => 'KALIMANTAN TIMUR', 'email_info_penetapan' => null],
            ['id' => '65', 'nama' => 'KALIMANTAN UTARA', 'email_info_penetapan' => null],
            ['id' => '71', 'nama' => 'SULAWESI UTARA', 'email_info_penetapan' => null],
            ['id' => '72', 'nama' => 'SULAWESI TENGAH', 'email_info_penetapan' => null],
            ['id' => '73', 'nama' => 'SULAWESI SELATAN', 'email_info_penetapan' => null],
            ['id' => '74', 'nama' => 'SULAWESI TENGGARA', 'email_info_penetapan' => null],
            ['id' => '75', 'nama' => 'GORONTALO', 'email_info_penetapan' => null],
            ['id' => '76', 'nama' => 'SULAWESI BARAT', 'email_info_penetapan' => null],
            ['id' => '81', 'nama' => 'MALUKU', 'email_info_penetapan' => null],
            ['id' => '82', 'nama' => 'MALUKU UTARA', 'email_info_penetapan' => null],
            ['id' => '91', 'nama' => 'PAPUA', 'email_info_penetapan' => null],
            ['id' => '92', 'nama' => 'PAPUA BARAT', 'email_info_penetapan' => null]
        ];
        Provinsi::query()->upsert($provinsi, 'id');
    }
}