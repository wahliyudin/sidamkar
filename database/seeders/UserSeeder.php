<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Storage::allDirectories() as $directory) {
            Storage::deleteDirectory($directory);
        }
        User::query()->create([
            'username' => 'Kemendagri',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('kemendagri');

        $damkarPemula = User::query()->create([
            'username' => 'Damkar Pemula',
            'email' => 'adminsafsa2@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('damkar_pemula');
        $damkarPemula->userAparatur()->create([
            'nama' => 'Damkar Pemula',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'tingkat_aparatur' => 'kab_kota',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 11,
            'kab_kota_id' => 1101,
        ]);


        for ($i=0; $i < 10; $i++) {
            $damkarPemula1Name = fake()->name();
            $damkarPemula1 = User::query()->create([
                'username' => $damkarPemula1Name,
                'email' => fake()->email(),
                'password' => Hash::make('123456789'),
                'email_verified_at' => now(),
                'status_akun' => fake()->boolean()
            ])->attachRole('damkar_pemula');
            $damkarPemula1->userAparatur()->create([
                'nama' => $damkarPemula1Name,
                'nip' => '2020020088',
                'nomor_karpeg' => '2020020088',
                'pangkat_golongan_tmt_id' => 5,
                'tempat_lahir' => fake()->city(),
                'tingkat_aparatur' => 'kab_kota',
                'tanggal_lahir' => Carbon::now(),
                'jenis_kelamin' => fake()->randomElement(['L', 'P']),
                'pendidikan_terakhir' => fake()->randomElement(['1', '2', '3', '4']),
                'provinsi_id' => 11,
                'kab_kota_id' => 1101,
            ]);
        }

        $damkarTerampil = User::query()->create([
            'username' => 'Damkar Terampil',
            'email' => 'admia232sn2434@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('damkar_terampil');
        $damkarTerampil->userAparatur()->create([
            'nama' => 'Damkar Terampil',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 11,
            'kab_kota_id' => 1101,
        ]);

        for ($i=0; $i < 10; $i++) {
            $damkarTerampil1Name = fake()->name();
            $damkarTerampil1 = User::query()->create([
                'username' => $damkarTerampil1Name,
                'email' => fake()->email(),
                'password' => Hash::make('123456789'),
                'email_verified_at' => now(),
                'status_akun' => fake()->boolean()
            ])->attachRole('damkar_terampil');
            $damkarTerampil1->userAparatur()->create([
                'nama' => $damkarTerampil1Name,
                'nip' => '2020020088',
                'nomor_karpeg' => '2020020088',
                'pangkat_golongan_tmt_id' => 5,
                'tempat_lahir' => fake()->city(),
                'tanggal_lahir' => Carbon::now(),
                'jenis_kelamin' => fake()->randomElement(['L', 'P']),
                'pendidikan_terakhir' => fake()->randomElement(['1', '2', '3', '4']),
                'provinsi_id' => 11,
                'kab_kota_id' => 1101,
            ]);
        }


        $analisKebakaranAhliPertama = User::query()->create([
            'username' => 'Analis Kebakaran Ahli Pertama',
            'email' => 'admin3wqasas@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('analis_kebakaran_ahli_pertama');
        $analisKebakaranAhliPertama->userAparatur()->create([
            'nama' => 'Analis Kebakaran Ahli Pertama',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 11,
            'kab_kota_id' => 1114,
        ]);

        $analisKebakaranAhliMuda = User::query()->create([
            'username' => 'Analis Kebakaran Ahli Muda',
            'email' => 'admin3sasasas@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('analis_kebakaran_ahli_muda');
        $analisKebakaranAhliMuda->userAparatur()->create([
            'nama' => 'Analis Kebakaran Ahli Muda',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 11,
            'kab_kota_id' => 1115,
        ]);

        $analisKebakaranAhliMadya = User::query()->create([
            'username' => 'Analis Kebakaran Ahli Madya',
            'email' => 'adminsds3sasasas@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('analis_kebakaran_ahli_muda');
        $analisKebakaranAhliMadya->userAparatur()->create([
            'nama' => 'Analis Kebakaran Ahli Madya',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 11,
            'kab_kota_id' => 1116,
        ]);

        $kabKota = User::query()->create([
            'username' => 'Kab Kota',
            'email' => 'admin4@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('kab_kota');
        $kabKota->userProvKabKota()->create([
            'nomenklatur_perangkat_daerah_id' => 1,
            'provinsi_id' => 11,
            'kab_kota_id' => 1101,
        ]);

        $kabKota1 = User::query()->create([
            'username' => 'Kab Kota1',
            'email' => 'admiasasn4@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('kab_kota');
        $kabKota1->userProvKabKota()->create([
            'nomenklatur_perangkat_daerah_id' => 1,
            'provinsi_id' => 11,
            'kab_kota_id' => 1106,
        ]);

        $kabKota2 = User::query()->create([
            'username' => 'Kab Kota2',
            'email' => 'adminasasa4@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('kab_kota');
        $kabKota2->userProvKabKota()->create([
            'nomenklatur_perangkat_daerah_id' => 1,
            'provinsi_id' => 32,
            'kab_kota_id' => 3204,
        ]);

        $kabKota3 = User::query()->create([
            'username' => 'Kab Kota3',
            'email' => 'admfwretin4@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('kab_kota');
        $kabKota3->userProvKabKota()->create([
            'nomenklatur_perangkat_daerah_id' => 1,
            'provinsi_id' => 32,
            'kab_kota_id' => 3276,
        ]);

        $provinsi = User::query()->create([
            'username' => 'Provinsi',
            'email' => 'prosdsdsvinsi@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('provinsi');
        $provinsi->userProvKabKota()->create([
            'nomenklatur_perangkat_daerah_id' => 1,
            'provinsi_id' => 11,
        ]);

        $provinsi1 = User::query()->create([
            'username' => 'Provinsi1',
            'email' => 'provinsi1@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('provinsi');
        $provinsi1->userProvKabKota()->create([
            'nomenklatur_perangkat_daerah_id' => 1,
            'provinsi_id' => 32,
        ]);

        $atasanLangsung = User::query()->create([
            'username' => 'Atasan Langsung',
            'email' => 'admin51@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('atasan_langsung');
        $atasanLangsung->userPejabatStruktural()->create([
            'nama' => 'Atasan Langsung',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'tingkat_aparatur' => 'kab_kota',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 11,
            'kab_kota_id' => 1101,
        ]);

        $atasanLangsung1 = User::query()->create([
            'username' => 'Atasan Langsung1',
            'email' => 'admi343cfgdsg4dn51@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('atasan_langsung');
        $atasanLangsung1->userPejabatStruktural()->create([
            'nama' =>  fake()->name,
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 11,
            'kab_kota_id' => 1101,
        ]);

        $atasanLangsung2 = User::query()->create([
            'username' => 'Atasan Langsung2',
            'email' => 'admsasdwsfdsgin51@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('atasan_langsung');
        $atasanLangsung2->userPejabatStruktural()->create([
            'nama' =>  fake()->name,
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 11,
            'kab_kota_id' => 1101,
        ]);

        $atasanLangsung3 = User::query()->create([
            'username' => 'Atasan Langsung3',
            'email' => 'admingfgfdgf5asas1@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('atasan_langsung');
        $atasanLangsung3->userPejabatStruktural()->create([
            'nama' =>  fake()->name,
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 11,
            'kab_kota_id' => 1101,
        ]);

        $atasanLangsung4 = User::query()->create([
            'username' => 'Atasan Langsung4',
            'email' => 'admdsdsdfdsfddin51@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('atasan_langsung');
        $atasanLangsung4->userPejabatStruktural()->create([
            'nama' =>  fake()->name,
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 11,
            'kab_kota_id' => 1106,
        ]);

        $atasanLangsung5 = User::query()->create([
            'username' => 'Atasan Langsung5',
            'email' => 'admdsdsdfdefdin51@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('atasan_langsung');
        $atasanLangsung5->userPejabatStruktural()->create([
            'nama' =>  fake()->name,
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 11,
            'kab_kota_id' => 1106,
        ]);

        $atasanLangsung6 = User::query()->create([
            'username' => 'Atasan Langsung6',
            'email' => 'admdsdsdinasasasdfafs51@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('atasan_langsung');
        $atasanLangsung6->userPejabatStruktural()->create([
            'nama' =>  fake()->name,
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 32,
            'kab_kota_id' => 3204,
        ]);

        $atasanLangsung7 = User::query()->create([
            'username' => 'Atasan Langsung7',
            'email' => 'admdsdsasadadadain51@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('atasan_langsung');
        $atasanLangsung7->userPejabatStruktural()->create([
            'nama' =>  fake()->name,
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 32,
            'kab_kota_id' => 3204,
        ]);

        $atasanLangsung8 = User::query()->create([
            'username' => 'Atasan Langsung8',
            'email' => 'admdsdsdhggadadain51@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('atasan_langsung');
        $atasanLangsung8->userPejabatStruktural()->create([
            'nama' =>  fake()->name,
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 32,
            'kab_kota_id' => 3276,
        ]);

        $atasanLangsung9 = User::query()->create([
            'username' => 'Atasan Langsung9',
            'email' => 'admdsdadsasaadasdin51@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('atasan_langsung');
        $atasanLangsung9->userPejabatStruktural()->create([
            'nama' =>  fake()->name,
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 32,
            'kab_kota_id' => 3276,
        ]);

        $penilaiAK = User::query()->create([
            'username' => 'Penilai AK',
            'email' => 'admin6@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('penilai_ak');
        $penilaiAK->userPejabatStruktural()->create([
            'nama' =>  fake()->name,
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 11,
            'kab_kota_id' => 1101,
        ]);

        $penilaiAK1 = User::query()->create([
            'username' => 'Penilai AK1',
            'email' => 'adasasamin6@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('penilai_ak');
        $penilaiAK1->userPejabatStruktural()->create([
            'nama' =>  fake()->name,
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 11,
            'kab_kota_id' => 1101,
        ]);
        $penilaiAK2 = User::query()->create([
            'username' => 'Penilai AK2',
            'email' => 'admin6@asasgmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('penilai_ak');
        $penilaiAK2->userPejabatStruktural()->create([
            'nama' =>  fake()->name,
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 11,
            'kab_kota_id' => 1101,
        ]);
        $penilaiAK3 = User::query()->create([
            'username' => 'Penilai AK3',
            'email' => 'adminrwr6@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('penilai_ak');
        $penilaiAK3->userPejabatStruktural()->create([
            'nama' =>  fake()->name,
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 11,
            'kab_kota_id' => 1106,
        ]);

        $penilaiAK4 = User::query()->create([
            'username' => 'Penilai AK4',
            'email' => 'admasasin6@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('penilai_ak');
        $penilaiAK4->userPejabatStruktural()->create([
            'nama' => fake()->name(),
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 11,
            'kab_kota_id' => 1106,
        ]);

        $penilaiAK5 = User::query()->create([
            'username' =>  'Penilai AK5',
            'email' => 'admas4546asin6@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('penilai_ak');
        $penilaiAK5->userPejabatStruktural()->create([
            'nama' => fake()->name,
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 32,
            'kab_kota_id' => 3204,
        ]);

        $penilaiAK6 = User::query()->create([
            'username' =>  'Penilai AK6',
            'email' => 'admas4ewewin6@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('penilai_ak');
        $penilaiAK6->userPejabatStruktural()->create([
            'nama' => fake()->name,
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 32,
            'kab_kota_id' => 3204,
        ]);

        $penilaiAK7 = User::query()->create([
            'username' =>  'Penilai AK7',
            'email' => 'admas4edsdswewin6@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('penilai_ak');
        $penilaiAK7->userPejabatStruktural()->create([
            'nama' => fake()->name,
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 32,
            'kab_kota_id' => 3276,
        ]);

        $penilaiAK8 = User::query()->create([
            'username' =>  'Penilai AK8',
            'email' => 'admas4sdsdsewewfdin6@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('penilai_ak');
        $penilaiAK8->userPejabatStruktural()->create([
            'nama' => fake()->name,
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 32,
            'kab_kota_id' => 3276,
        ]);

        $penetapAK3232 = User::query()->create([
            'username' => 'Penetap AK3232',
            'email' => 'admin0099@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('penetap_ak');
        $penetapAK3232->userPejabatStruktural()->create([
            'nama' =>  fake()->name,
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 11,
            'kab_kota_id' => 1101,
        ]);
    }
}
