<?php

namespace Database\Seeders;

use App\Models\ButirKegiatanProfesi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ButirKegiatanProfesiSeeder extends Seeder
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
                'sub_unsur_profesi_id' => 1,
                'nama' => 'Memperoleh ijasah sesuai dengan bidang tugas Jabatan Fungsional Pemadam Kebakaran',
                'satuan_hasil' => 'Ijazah/Gelar',
                'score' => 25
            ],
            //2
            [
                'role_id' => null,
                'sub_unsur_profesi_id' => 2,
                'nama' => 'Membuat karya tulis/karya ilmiah hasil penelitian/pengkajian/ survei/evaluasi di bidang pemadaman kebakaran dan penyelamatan yang dipublikasikan:',
                'satuan_hasil' => null,
                'score' => null
            ],
            //3
            [
                'role_id' => null,
                'sub_unsur_profesi_id' => 2,
                'nama' => 'Membuat karya tulis/karya ilmiah hasil penelitian/pengkajian/ survei/evaluasi di bidang pemadaman kebakaran dan penyelamatan yang tidak dipublikasikan:',
                'satuan_hasil' => null,
                'score' => null
            ],
            //4
            [
                'role_id' => null,
                'sub_unsur_profesi_id' => 2,
                'nama' => 'Membuat karya tulis/karya ilmiah berupa tinjauan atau ulasan ilmiah hasil gagasan sendiri di bidang pemadaman kebakaran dan penyelamatan yangdipublikasikan:',
                'satuan_hasil' => null,
                'score' => null
            ],
            //5
            [
                'role_id' => null,
                'sub_unsur_profesi_id' => 2,
                'nama' => 'Membuat karya tulis/karya ilmiah berupa tinjauan atau ulasan ilmiah hasil gagasan sendiri di bidang pemadaman kebakaran dan penyelamatan yangdipublikasikan:',
                'satuan_hasil' => null,
                'score' => null
            ],
            //6
            [
                'role_id' => null,
                'sub_unsur_profesi_id' => 2,
                'nama' => 'Menyampaikan prasaran berupa tinjauan, gagasan dan atau ulasan ilmiah dalam pertemuan ilmiah',
                'satuan_hasil' => 'Naskah',
                'score' => 2.5
            ],
            //7
            [
                'role_id' => null,
                'sub_unsur_profesi_id' => 2,
                'nama' => 'Membuat artikel di bidang pemadaman kebakaran dan penyelamatan yang dipublikasikan',
                'satuan_hasil' => 'Artikel',
                'score' => 2
            ],
            //8
            [
                'role_id' => null,
                'sub_unsur_profesi_id' => 3,
                'nama' => 'Menerjemahkan/menyadur buku atau karya ilmiah di bidang pemadaman kebakaran dan penyelamatan yang dipublikasikan:',
                'satuan_hasil' => 'Artikel',
                'score' => 2
            ],
            //9
            [
                'role_id' => null,
                'sub_unsur_profesi_id' => 3,
                'nama' => 'Menerjemahkan / menyadur buku atau karya ilmiah di bidang pemadaman kebakaran dan penyelamatan yang tidak dipublikasikan:',
                'satuan_hasil' => 'Artikel',
                'score' => 2
            ],
            //10
            [
                'role_id' => null,
                'sub_unsur_profesi_id' => 4,
                'nama' => 'Membuat buku standar/pedoman/ petunjuk pelaksanaan/ petunjuk teknis di bidang Jabatan Fungsional Pemadam Kebakaran',
                'satuan_hasil' => 'Buku',
                'score' => 3
            ],
            //11
            [
                'role_id' => null,
                'sub_unsur_profesi_id' => 5,
                'nama' => 'pelatihan fungsional',
                'satuan_hasil' => 'Sertifikat/laporan',
                'score' => 0.5
            ],
            //12
            [
                'role_id' => null,
                'sub_unsur_profesi_id' => 5,
                'nama' => 'seminar/lokakarya/konferensi/simposium/studi banding-lapangan',
                'satuan_hasil' => 'Sertifikat/laporan',
                'score' => 0.5
            ],
            //13
            [
                'role_id' => null,
                'sub_unsur_profesi_id' => 5,
                'nama' => 'pelatihan teknis/magang di bidang tugas pemadaman kebakaran dan penyelamatan dan memperoleh Sertifikat',
                'satuan_hasil' => null,
                'score' => null
            ],
            //14
            [
                'role_id' => null,
                'sub_unsur_profesi_id' => 5,
                'nama' => 'Pelatihan manajerial/sosial kultural di bidang tugas pemadaman kebakaran dan penyelamatan dan memperoleh Sertifikat',
                'satuan_hasil' => null,
                'score' => null
            ],
            //15
            [
                'role_id' => null,
                'sub_unsur_profesi_id' => 5,
                'nama' => 'maintain performance (pemeliharaan kinerja dan target kinerja)',
                'satuan_hasil' => 'Sertifikat/laporan',
                'score' => 0.5
            ],
            //16
            [
                'role_id' => null,
                'sub_unsur_profesi_id' => 6,
                'nama' => 'Melaksanakan kegiatan lain yang mendukung pengembangan profesi yang ditetapkan oleh Instansi Pembina di bidang Jabatan Fungsional Pemadam Kebakaran',
                'satuan_hasil' => 'Laporan',
                'score' => 0.5
            ],
            //16
            [
                'role_id' => null,
                'sub_unsur_profesi_id' => 7,
                'nama' => 'Mengajar/melatih/membimbing yang berkaitan dengan bidang Jabatan Fungsional Pemadam Kebakaran',
                'satuan_hasil' => 'Sertifikat/ Laporan',
                'score' => 0.4
            ],
            //17
            [
                'role_id' => null,
                'sub_unsur_profesi_id' => 8,
                'nama' => 'Menjadi anggota Tim Penilai/ Tim Uji Kompetensi',
                'satuan_hasil' => 'Laporan',
                'score' => 0.04
            ],
            //18
            [
                'role_id' => null,
                'sub_unsur_profesi_id' => 9,
                'nama' => 'Memperoleh penghargaan / tanda jasa Satya Lancana Karya Satya:',
                'satuan_hasil' => null,
                'score' => null
            ],
            //19
            [
                'role_id' => null,
                'sub_unsur_profesi_id' => 9,
                'nama' => 'Penghargaan atas prestasi kerjanya',
                'satuan_hasil' => null,
                'score' => null
            ],
            //19
            [
                'role_id' => null,
                'sub_unsur_profesi_id' => 10,
                'nama' => 'Memperoleh ijazah/gelar yang tidak sesuai bidang tugasnya:',
                'satuan_hasil' => null,
                'score' => null
            ],
            //20
            [
                'role_id' => null,
                'sub_unsur_profesi_id' => 11,
                'nama' => 'Melakukan kegiatan yang mendukung pelaksanaan tugas Jabatan Fungsional Pemadam Kebakaran',
                'satuan_hasil' => 'Laporan',
                'score' => 0.04
            ],
        ];
        ButirKegiatanProfesi::query()->upsert($kegiatanProfesiFungsionalDamkar, 'id');
    }
}
