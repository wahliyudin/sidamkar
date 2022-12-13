<?php

namespace Database\Seeders;

use App\Models\SubUnsurProfesi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubUnsurProfesiSeeder extends Seeder
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
                'unsur_profesi_id' => 1,
                'nama' => 'Perolehan ijazah/gelar pendidikan formal sesuai dengan bidang tugas Jabatan Fungsional Pemadam Kebakakaran'
            ],
            //2
            [
                'unsur_profesi_id' => 1,
                'nama' => 'Pembuatan Karya Tulis / Karya Ilmiah di bidang Jabatan Fungsional Pemadam Kebakaran'
            ],
            //3
            [
                'unsur_profesi_id' => 1,
                'nama' => 'Penerjemahan/ Penyaduran Buku dan Bahan-Bahan Lain di bidang Jabatan Fungsional Pemadam Kebakaran'
            ],
            //4
            [
                'unsur_profesi_id' => 1,
                'nama' => 'Penyusunan Standar/Pedoman/ Petunjuk Pelaksanaan/ Petunjuk Teknis di bidang Jabatan Fungsional Pemadam Kebakaran'
            ],
            //5
            [
                'unsur_profesi_id' => 1,
                'nama' => 'Pengembangan Kompetensi di bidang Jabatan Fungsional Pemadam Kebakaran'
            ],
            //6
            [
                'unsur_profesi_id' => 1,
                'nama' => 'Kegiatan lain yang mendukung pengembangan profesi yang ditetapkan oleh Instansi Pembina di bidang Jabatan Fungsional Pemadam Kebakaran'
            ],
            //7
            [
                'unsur_profesi_id' => 2,
                'nama' => 'Pengajar/Pelatih/Pembimbing di bidang Jabatan Fungsional Pemadam Kebakaran'
            ],
            //8
            [
                'unsur_profesi_id' => 2,
                'nama' => 'Keanggotaan dalam Tim Penilai/Tim Uji Kompetensi'
            ],
            //9
            [
                'unsur_profesi_id' => 2,
                'nama' => 'Perolehan Penghargaan'
            ],
            //10
            [
                'unsur_profesi_id' => 2,
                'nama' => 'Perolehan ijazah/gelar kesarjanaan lainnya'
            ],
            //11
            [
                'unsur_profesi_id' => 2,
                'nama' => 'Pelaksanaan tugas lain yang mendukung pelaksanaan tugas Jabatan Fungsional Pemadam Kebakaran'
            ],
        ];
        SubUnsurProfesi::query()->upsert($kegiatanProfesiFungsionalDamkar, 'id');

        $kegiatanProfesiAnalisDamkar = [
            //12
            [
                'unsur_profesi_id' => 3,
                'nama' => 'Perolehan ijazah/gelar pendidikan formal sesuai dengan bidang tugas Jabatan Fungsional Analis Kebakakaran'
            ],
            //13
            [
                'unsur_profesi_id' => 3,
                'nama' => 'Pembuatan Karya Tulis / Karya Ilmiah di bidang Jabatan Fungsional Analis Kebakaran'
            ],
            //14
            [
                'unsur_profesi_id' => 3,
                'nama' => 'Penerjemahan/ Penyaduran Buku dan Bahan-Bahan Lain di bidang Jabatan Fungsional Analis Kebakaran'
            ],
            //15
            [
                'unsur_profesi_id' => 3,
                'nama' => 'Penyusunan Standar/Pedoman/Petunjuk Pelaksanaan/ PetunjukTeknis di bidang Jabatan FungsionalAnalis Kebakaran'
            ],
            //16
            [
                'unsur_profesi_id' => 3,
                'nama' => 'Pengembangan Kompetensi di bidang Jabatan Fungsional Analis Kebakaran'
            ],
            //17
            [
                'unsur_profesi_id' => 3,
                'nama' => 'Kegiatan lain yang mendukung pengembangan profesi yang ditetapkan oleh Instansi Pembina di bidang Jabatan Fungsional Analis Kebakaran'
            ],
            //18
            [
                'unsur_profesi_id' => 4,
                'nama' => 'Pengajar/Pelatih/Pembimbing di bidang Jabatan Fungsional Analis Kebakaran'
            ],
            //19
            [
                'unsur_profesi_id' => 4,
                'nama' => 'Keanggotaan dalam Tim Penilai/Tim Uji Kompetensi'
            ],
            //20
            [
                'unsur_profesi_id' => 4,
                'nama' => 'Perolehan Penghargaan'
            ],
            //21
            [
                'unsur_profesi_id' => 4,
                'nama' => 'Perolehan ijazah/gelar kesarjanaan lainnya'
            ],
            //22
            [
                'unsur_profesi_id' => 4,
                'nama' => 'Pelaksanaan tugas lain yang mendukung pelaksanaan tugas Jabatan Fungsional Analis Kebakaran'
            ],
        ];
        SubUnsurProfesi::query()->upsert($kegiatanProfesiAnalisDamkar,'id');
    }
}
