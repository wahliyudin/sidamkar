<?php

namespace Database\Seeders;

use App\Models\SubButirKegiatanProfesi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubButirKegiatanProfesiSeeder extends Seeder
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
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 2,
                'nama' => 'dalam buku/majalah ilmiah internasional yang terindek',
                'satuan_hasil' => 'Jurnal/Buku',
                'score' => 20
            ],
            //2
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 2,
                'nama' => 'dalam buku/majalah ilmiah nasional terakreditasi',
                'satuan_hasil' => 'Jurnal/Buku',
                'score' => 12.5
            ],
            //3
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 2,
                'nama' => 'dalam buku/majalah ilmiah yang diakui organisasi profesi dan Instansi Pembina',
                'satuan_hasil' => 'Jurnal/Buku/ Naskah',
                'score' => 6
            ],
            //4
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 3,
                'nama' => 'dalam bentuk buku',
                'satuan_hasil' => 'Buku',
                'score' => 8
            ],
            //5
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 3,
                'nama' => 'dalam bentuk majalah ilmiah',
                'satuan_hasil' => 'Naskah',
                'score' => 4
            ],
            //6
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 4,
                'nama' => 'dalam bentuk buku yang diterbitkan dan diedarkan secara nasional',
                'satuan_hasil' => 'Buku',
                'score' => 8
            ],
            //7
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 4,
                'nama' => 'dalam majalah ilmiah yang diakui organisasi profesi dan Instansi',
                'satuan_hasil' => 'Naskah',
                'score' => 4
            ],
            //8
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 5,
                'nama' => 'dalam bentuk buku',
                'satuan_hasil' => 'Buku',
                'score' => 7
            ],
            //9
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 5,
                'nama' => 'dalam bentuk bentuk naskah',
                'satuan_hasil' => 'Naskah',
                'score' => 3.5
            ],
            //10
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 8,
                'nama' => 'dalam bentuk buku yang diterbitkan dan diedarkan secara nasional',
                'satuan_hasil' => 'Buku',
                'score' => 7
            ],
            //11
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 8,
                'nama' => 'dalam majalah ilmiah yang diakui organisasi profesi dan Instansi Pembina',
                'satuan_hasil' => 'Naskah',
                'score' => 3.5
            ],
            //11
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 9,
                'nama' => 'dalam bentuk buku',
                'satuan_hasil' => 'Buku',
                'score' => 3.5
            ],
            //12
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 9,
                'nama' => 'dalam bentuk naskah',
                'satuan_hasil' => 'Naskah',
                'score' => 3.5
            ],
            //13
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 11,
                'nama' => 'pelatihan fungsional',
                'satuan_hasil' => 'Sertifikat/laporan',
                'score' => 0.5
            ],
            //14
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 13,
                'nama' => 'amanya lebih dari 960 jam',
                'satuan_hasil' => 'Sertifikat/laporan',
                'score' => 15
            ],
            //15
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 13,
                'nama' => 'lamanya antara 641 - 960 jam',
                'satuan_hasil' => 'Sertifikat/laporan',
                'score' => 9
            ],
            //16
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 13,
                'nama' => 'lamanya antara 481 - 640 jam',
                'satuan_hasil' => 'Sertifikat/laporan',
                'score' => 6
            ],
            //17
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 13,
                'nama' => 'lamanya antara 161 - 480 jam',
                'satuan_hasil' => 'Sertifikat/laporan',
                'score' => 3
            ],
            //18
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 13,
                'nama' => 'lamanya antara 81 - 160 jam',
                'satuan_hasil' => 'Sertifikat/laporan',
                'score' => 2
            ],
            //19
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 13,
                'nama' => 'lamanya antara 30 - 80 jam',
                'satuan_hasil' => 'Sertifikat/laporan',
                'score' => 1
            ],
            //20
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 13,
                'nama' => 'lamanya kurang dari 30 jam',
                'satuan_hasil' => 'Sertifikat/laporan',
                'score' => 0.5
            ],
            //21
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 14,
                'nama' => 'lamanya lebih dari 960 jam',
                'satuan_hasil' => 'Sertifikat/laporan',
                'score' => 7.5
            ],
            //22
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 14,
                'nama' => 'lamanya antara 641 - 960 jam',
                'satuan_hasil' => 'Sertifikat/laporan',
                'score' => 4.5
            ],
            //23
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 14,
                'nama' => 'lamanya antara 481 - 640 jam',
                'satuan_hasil' => 'Sertifikat/laporan',
                'score' => 3
            ],
            //24
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 14,
                'nama' => 'lamanya antara 161 - 480 jam',
                'satuan_hasil' => 'Sertifikat/laporan',
                'score' => 1.5
            ],
            //25
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 14,
                'nama' => 'lamanya antara 81 - 160 jam',
                'satuan_hasil' => 'Sertifikat/laporan',
                'score' => 1
            ],
            //26
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 14,
                'nama' => 'lamanya antara 30 - 80 jam',
                'satuan_hasil' => 'Sertifikat/laporan',
                'score' => 0.5
            ],
            //27
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 14,
                'nama' => 'lamanya kurang dari 30 jam',
                'satuan_hasil' => 'Sertifikat/laporan',
                'score' => 0.25
            ],
            //28
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 18,
                'nama' => '30 (tiga puluh) tahun lebih',
                'satuan_hasil' => 'Piagam',
                'score' => 3
            ],
            //29
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 18,
                'nama' => '20 (dua puluh) tahun',
                'satuan_hasil' => 'Piagam',
                'score' => 2
            ],
            //30
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 18,
                'nama' => '10 (sepuluh) tahun',
                'satuan_hasil' => 'Piagam',
                'score' => 1
            ],
            //31
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 18,
                'nama' => 'Tingkat Internasional',
                'satuan_hasil' => 'Sertifikat/Piagam',
                'score' => 35
            ],
            //32
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 18,
                'nama' => 'Tingkat Nasional',
                'satuan_hasil' => 'Sertifikat/Piagam',
                'score' => 25
            ],
            //33
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 18,
                'nama' => 'Tingkat lokal',
                'satuan_hasil' => 'Sertifikat/Piagam',
                'score' => 25
            ],
            //34
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 19,
                'nama' => 'Diploma Tiga',
                'satuan_hasil' => 'Ijazah/Gelar',
                'score' => 4
            ],
            //35
            [
                'role_id' => null,
                'butir_kegiatan_profesi_id' => 19,
                'nama' => 'Diploma Dua',
                'satuan_hasil' => 'Ijazah/Gelar',
                'score' => 3
            ],
        ];
        SubButirKegiatanProfesi::query()->upsert($kegiatanProfesiFungsionalDamkar, 'id');
            
    }
}
