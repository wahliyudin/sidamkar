<?php

namespace Database\Seeders;

use App\Models\KabKota;
use App\Models\Provinsi;
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

        // $damkarPemula = User::query()->create([
        //     'username' => 'Damkar Pemula',
        //     'email' => 'adminsafsa2@gmail.com',
        //     'password' => Hash::make('123456789'),
        //     'email_verified_at' => now(),
        //     'status_akun' => 1
        // ])->attachRole('damkar_pemula');
        // $damkarPemula->userAparatur()->create([
        //     'nama' => 'Damkar Pemula',
        //     'nip' => '2020020088',
        //     'nomor_karpeg' => '2020020088',
        //     'pangkat_golongan_tmt_id' => 5,
        //     'tempat_lahir' => 'Jakarta',
        //     'tanggal_lahir' => Carbon::now(),
        //     'tingkat_aparatur' => 'kab_kota',
        //     'jenis_kelamin' => 'L',
        //     'pendidikan_terakhir' => 2,
        //     'provinsi_id' => 11,
        //     'kab_kota_id' => 1101,
        // ]);


        // for ($i = 0; $i < 10; $i++) {
        //     $damkarPemula1Name = fake()->name();
        //     $damkarPemula1 = User::query()->create([
        //         'username' => $damkarPemula1Name,
        //         'email' => fake()->email(),
        //         'password' => Hash::make('123456789'),
        //         'email_verified_at' => now(),
        //         'status_akun' => fake()->boolean()
        //     ])->attachRole('damkar_pemula');
        //     $damkarPemula1->userAparatur()->create([
        //         'nama' => $damkarPemula1Name,
        //         'nip' => '2020020088',
        //         'nomor_karpeg' => '2020020088',
        //         'pangkat_golongan_tmt_id' => 5,
        //         'tempat_lahir' => fake()->city(),
        //         'tingkat_aparatur' => 'kab_kota',
        //         'tanggal_lahir' => Carbon::now(),
        //         'jenis_kelamin' => fake()->randomElement(['L', 'P']),
        //         'pendidikan_terakhir' => fake()->randomElement(['1', '2', '3', '4']),
        //         'provinsi_id' => 11,
        //         'kab_kota_id' => 1101,
        //     ]);
        // }

        // $damkarTerampil = User::query()->create([
        //     'username' => 'Damkar Terampil',
        //     'email' => 'admia232sn2434@gmail.com',
        //     'password' => Hash::make('123456789'),
        //     'email_verified_at' => now(),
        //     'status_akun' => 0
        // ])->attachRole('damkar_terampil');
        // $damkarTerampil->userAparatur()->create([
        //     'nama' => 'Damkar Terampil',
        //     'nip' => '2020020088',
        //     'nomor_karpeg' => '2020020088',
        //     'pangkat_golongan_tmt_id' => 5,
        //     'tempat_lahir' => 'Jakarta',
        //     'tanggal_lahir' => Carbon::now(),
        //     'jenis_kelamin' => 'L',
        //     'pendidikan_terakhir' => 2,
        //     'provinsi_id' => 11,
        //     'kab_kota_id' => 1101,
        // ]);

        // for ($i = 0; $i < 10; $i++) {
        //     $damkarTerampil1Name = fake()->name();
        //     $damkarTerampil1 = User::query()->create([
        //         'username' => $damkarTerampil1Name,
        //         'email' => fake()->email(),
        //         'password' => Hash::make('123456789'),
        //         'email_verified_at' => now(),
        //         'status_akun' => fake()->boolean()
        //     ])->attachRole('damkar_terampil');
        //     $damkarTerampil1->userAparatur()->create([
        //         'nama' => $damkarTerampil1Name,
        //         'nip' => '2020020088',
        //         'nomor_karpeg' => '2020020088',
        //         'pangkat_golongan_tmt_id' => 5,
        //         'tempat_lahir' => fake()->city(),
        //         'tanggal_lahir' => Carbon::now(),
        //         'jenis_kelamin' => fake()->randomElement(['L', 'P']),
        //         'pendidikan_terakhir' => fake()->randomElement(['1', '2', '3', '4']),
        //         'provinsi_id' => 11,
        //         'kab_kota_id' => 1101,
        //     ]);
        // }

        // $damkarPenyelia = User::query()->create([
        //     'username' => 'Damkar Penyelia',
        //     'email' => 'penyeliasjd@gmail.com',
        //     'password' => Hash::make('123456789'),
        //     'email_verified_at' => now(),
        //     'status_akun' => 0
        // ])->attachRole('damkar_penyelia');
        // $damkarPenyelia->userAparatur()->create([
        //     'nama' => 'Damkar Penyelia',
        //     'nip' => '2020020088',
        //     'nomor_karpeg' => '2020020088',
        //     'pangkat_golongan_tmt_id' => 5,
        //     'tempat_lahir' => 'Jakarta',
        //     'tanggal_lahir' => Carbon::now(),
        //     'jenis_kelamin' => 'L',
        //     'tingkat_aparatur' => 'kab_kota',
        //     'pendidikan_terakhir' => 2,
        //     'provinsi_id' => 11,
        //     'kab_kota_id' => 1101,
        // ]);


        $analisKebakaranAhliPertama = User::query()->create([
            'username' => 'Analis Kebakaran Ahli Pertama',
            'email' => 'admin3wqasas@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
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
            'status_akun' => 0
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

        // $kabKota = User::query()->create([
        //     'username' => 'Kab Kota',
        //     'email' => 'admin4@gmail.com',
        //     'password' => Hash::make('123456789'),
        //     'email_verified_at' => now(),
        //     'status_akun' => 1
        // ])->attachRole('kab_kota');
        // $kabKota->userProvKabKota()->create([
        //     'nomenklatur_perangkat_daerah_id' => 1,
        //     'provinsi_id' => 11,
        //     'kab_kota_id' => 1101,
        // ]);

        for ($i = 0; $i < 5; $i++) {
            $kabKota1 = User::query()->create([
                'username' => fake()->name(),
                'email' => fake()->email(),
                'password' => Hash::make('123456789'),
                'email_verified_at' => now(),
                'status_akun' => fake()->boolean()
            ])->attachRole('kab_kota');
            $kabKota1->userProvKabKota()->create([
                'nomenklatur_perangkat_daerah_id' => 1,
                'provinsi_id' => fake()->randomElement(array_merge([11], Provinsi::query()->pluck('id')->toArray())),
                'kab_kota_id' => fake()->randomElement(array_merge([1106], KabKota::query()->pluck('id')->toArray())),
            ]);
        }

        // $provinsi = User::query()->create([
        //     'username' => 'Provinsi',
        //     'email' => 'prosdsdsvinsi@gmail.com',
        //     'password' => Hash::make('123456789'),
        //     'email_verified_at' => now(),
        //     'status_akun' => 1
        // ])->attachRole('provinsi');
        // $provinsi->userProvKabKota()->create([
        //     'nomenklatur_perangkat_daerah_id' => 1,
        //     'provinsi_id' => 11,
        // ]);

        for ($i = 0; $i < 5; $i++) {
            $provinsi1 = User::query()->create([
                'username' => fake()->name(),
                'email' => fake()->email(),
                'password' => Hash::make('123456789'),
                'email_verified_at' => now(),
                'status_akun' => fake()->boolean()
            ])->attachRole('provinsi');
            $provinsi1->userProvKabKota()->create([
                'nomenklatur_perangkat_daerah_id' => 1,
                'provinsi_id' => fake()->randomElement(array_merge([11], Provinsi::query()->pluck('id')->toArray())),
            ]);
        }

        // $atasanLangsung = User::query()->create([
        //     'username' => 'Atasan Langsung',
        //     'email' => 'admin51@gmail.com',
        //     'password' => Hash::make('123456789'),
        //     'email_verified_at' => now(),
        //     'status_akun' => 1
        // ])->attachRole('atasan_langsung');
        // $atasanLangsung->userPejabatStruktural()->create([
        //     'nama' => 'Atasan Langsung',
        //     'nip' => '2020020088',
        //     'nomor_karpeg' => '2020020088',
        //     'pangkat_golongan_tmt_id' => 5,
        //     'tempat_lahir' => 'Jakarta',
        //     'tanggal_lahir' => Carbon::now(),
        //     'tingkat_aparatur' => 'kab_kota',
        //     'jenis_kelamin' => 'L',
        //     'pendidikan_terakhir' => 2,
        //     'provinsi_id' => 11,
        //     'kab_kota_id' => 1101,
        // ]);

        // for ($i = 0; $i < 5; $i++) {
        //     $atasanLangsung1Name = fake()->name();
        //     $atasanLangsung1 = User::query()->create([
        //         'username' => $atasanLangsung1Name,
        //         'email' => fake()->email(),
        //         'password' => Hash::make('123456789'),
        //         'email_verified_at' => now(),
        //         'status_akun' => fake()->boolean()
        //     ])->attachRole('atasan_langsung');
        //     $atasanLangsung1->userPejabatStruktural()->create([
        //         'nama' => $atasanLangsung1Name,
        //         'nip' => '2020020088',
        //         'nomor_karpeg' => '2020020088',
        //         'pangkat_golongan_tmt_id' => 5,
        //         'tempat_lahir' => fake()->city(),
        //         'tanggal_lahir' => Carbon::now(),
        //         'jenis_kelamin' => fake()->randomElement(['L', 'P']),
        //         'pendidikan_terakhir' => 2,
        //         'provinsi_id' => 11,
        //         'kab_kota_id' => 1101,
        //     ]);
        // }

        // $penilaiAK = User::query()->create([
        //     'username' => 'Penilai AK',
        //     'email' => 'admin6@gmail.com',
        //     'password' => Hash::make('123456789'),
        //     'email_verified_at' => now(),
        //     'status_akun' => 0
        // ]);
        // $penilaiAK->userPejabatStruktural()->create([
        //     'nama' => 'Penilai AK',
        //     'nip' => '2020020088',
        //     'nomor_karpeg' => '2020020088',
        //     'pangkat_golongan_tmt_id' => 5,
        //     'tempat_lahir' => 'Jakarta',
        //     'tanggal_lahir' => Carbon::now(),
        //     'tingkat_aparatur' => 'kab_kota',
        //     'jenis_kelamin' => 'L',
        //     'pendidikan_terakhir' => 2,
        //     'provinsi_id' => 11,
        //     'kab_kota_id' => 1101,
        // ]);
        // for ($i = 0; $i < 6; $i++) {
        //     $penilaiAK1Name = fake()->name();
        //     $penilaiAK1 = User::query()->create([
        //         'username' => $penilaiAK1Name,
        //         'email' => fake()->email(),
        //         'password' => Hash::make('123456789'),
        //         'email_verified_at' => now(),
        //         'status_akun' => 0
        //     ]);
        //     $penilaiAK1->userPejabatStruktural()->create([
        //         'nama' => $penilaiAK1Name,
        //         'nip' => '2020020088',
        //         'nomor_karpeg' => '2020020088',
        //         'pangkat_golongan_tmt_id' => 5,
        //         'tempat_lahir' => fake()->city(),
        //         'tanggal_lahir' => Carbon::now(),
        //         'tingkat_aparatur' => fake()->randomElement(['provinsi', 'kab_kota']),
        //         'jenis_kelamin' => fake()->randomElement(['L', 'P']),
        //         'pendidikan_terakhir' => 2,
        //         'provinsi_id' => 11,
        //         'kab_kota_id' => 1101,
        //     ]);
        // }

        // $penetapAK = User::query()->create([
        //     'username' => 'Penetap AK',
        //     'email' => 'admin0099@gmail.com',
        //     'password' => Hash::make('123456789'),
        //     'email_verified_at' => now(),
        //     'status_akun' => 0
        // ]);
        // $penetapAK->userPejabatStruktural()->create([
        //     'nama' => 'Penetap AK',
        //     'nip' => '2020020088',
        //     'nomor_karpeg' => '2020020088',
        //     'pangkat_golongan_tmt_id' => 5,
        //     'tempat_lahir' => 'Jakarta',
        //     'tanggal_lahir' => Carbon::now(),
        //     'jenis_kelamin' => 'L',
        //     'pendidikan_terakhir' => 2,
        //     'provinsi_id' => 11,
        //     'kab_kota_id' => 1101,
        // ]);

        // for ($i = 0; $i < 5; $i++) {
        //     $penetapAKName = fake()->name();
        //     $penetapAK = User::query()->create([
        //         'username' => $penetapAKName,
        //         'email' => fake()->email(),
        //         'password' => Hash::make('123456789'),
        //         'email_verified_at' => now(),
        //         'status_akun' => 0
        //     ]);
        //     $penetapAK->userPejabatStruktural()->create([
        //         'nama' => $penetapAKName,
        //         'nip' => '2020020088',
        //         'nomor_karpeg' => '2020020088',
        //         'pangkat_golongan_tmt_id' => 5,
        //         'tempat_lahir' => fake()->city(),
        //         'tanggal_lahir' => Carbon::now(),
        //         'tingkat_aparatur' => fake()->randomElement(['provinsi', 'kab_kota']),
        //         'jenis_kelamin' => fake()->randomElement(['L', 'P']),
        //         'pendidikan_terakhir' => 2,
        //         'provinsi_id' => 11,
        //         'kab_kota_id' => 1101,
        //     ]);
        // }


        //ini adalah seeder user yang dari request client
       

        $adminProvinsiBanten = User::query()->create([
            'username' => 'Admin Provinsi Banten',
            'email' => 'adminprovbanten@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('provinsi');
        $adminProvinsiBanten->userProvKabKota()->create([
            'nomenklatur_perangkat_daerah_id' => 1,
            'provinsi_id' => 36,
        ]);

        $adminProvinsiJawaBarat = User::query()->create([
            'username' => 'Admin Provinsi Jawa Barat',
            'email' => 'adminprovjawabarat@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('provinsi');
        $adminProvinsiJawaBarat->userProvKabKota()->create([
            'nomenklatur_perangkat_daerah_id' => 1,
            'provinsi_id' => 32,
        ]);

        $KabKotTanggerangSelatan = User::query()->create([
            'username' => 'Admin Kota Tanggerang Selatan',
            'email' => 'adminkotatanggerangselatan@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('kab_kota');
        $KabKotTanggerangSelatan->userProvKabKota()->create([
            'nomenklatur_perangkat_daerah_id' => 1,
            'provinsi_id' => 36,
            'kab_kota_id' => 3674,
        ]);


        $KabKotBekasi = User::query()->create([
            'username' => 'Admin Kota Bekasi',
            'email' => 'adminkotaBekasi2@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('kab_kota');
        $KabKotBekasi->userProvKabKota()->create([
            'nomenklatur_perangkat_daerah_id' => 1,
            'provinsi_id' => 32,
            'kab_kota_id' => 3275,
        ]);

        $KabKotBogor = User::query()->create([
            'username' => 'Admin Kabupaten Bogor',
            'email' => 'adminkotaBogor@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('kab_kota');
        $KabKotBogor->userProvKabKota()->create([
            'nomenklatur_perangkat_daerah_id' => 1,
            'provinsi_id' => 32,
            'kab_kota_id' => 3201,
        ]);

        $KabKotSukabumi = User::query()->create([
            'username' => 'Admin Kabupaten Sukabumi',
            'email' => 'adminkotaSukabumi@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('kab_kota');
        $KabKotSukabumi->userProvKabKota()->create([
            'nomenklatur_perangkat_daerah_id' => 1,
            'provinsi_id' => 32,
            'kab_kota_id' => 3202,
        ]);

        $atasanLangsungKotaTanggerangSelatan = User::query()->create([
            'username' => 'Atasan Langsung Kota Tanggerang Selatan',
            'email' => 'atasanKotaTangsel@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('atasan_langsung');
        $atasanLangsungKotaTanggerangSelatan->userPejabatStruktural()->create([
            'nama' => 'Atasan Langsung Kota Tanggerang Selatan',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Tanggerang Selatan',
            'tanggal_lahir' => Carbon::now(),
            'tingkat_aparatur' => 'kab_kota',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 36,
            'kab_kota_id' => 3674,
        ]);

        $atasanLangsungKotaBekasi = User::query()->create([
            'username' => 'Atasan Langsung Kota Bekasi',
            'email' => 'atasanKotaBekasi1@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('atasan_langsung');
        $atasanLangsungKotaBekasi->userPejabatStruktural()->create([
            'nama' => 'Atasan Langsung Kota Bekasi',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Bekasi',
            'tanggal_lahir' => Carbon::now(),
            'tingkat_aparatur' => 'kab_kota',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 32,
            'kab_kota_id' => 3275,
        ]);

        $atasanLangsungKabBogor = User::query()->create([
            'username' => 'Atasan Langsung Kabupaten Bogor',
            'email' => 'atasanKotaBogor@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $atasanLangsungKabBogor->userPejabatStruktural()->create([
            'nama' => 'Atasan Langsung Kota Bogor',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Bogor',
            'tanggal_lahir' => Carbon::now(),
            'tingkat_aparatur' => 'kab_kota',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 32,
            'kab_kota_id' => 3201,
        ]);

        $atasanLangsungKotaSukabumi = User::query()->create([
            'username' => 'Atasan Langsung Kabupaten Sukabumi',
            'email' => 'atasanKotasukabumi@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('atasan_langsung');
        $atasanLangsungKotaSukabumi->userPejabatStruktural()->create([
            'nama' => 'Atasan Langsung Kabupaten Sukabumi',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Sukabumi',
            'tanggal_lahir' => Carbon::now(),
            'tingkat_aparatur' => 'kab_kota',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 32,
            'kab_kota_id' => 3202,
        ]);

        $atasanLangsungProvDKI = User::query()->create([
            'username' => 'Atasan Langsung DKI Jakarta',
            'email' => 'atasanprovdki.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('atasan_langsung');
        $atasanLangsungProvDKI->userPejabatStruktural()->create([
            'nama' => 'Atasan Langsung DKI Jakarta',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'tingkat_aparatur' => 'provinsi',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 31,
        ]);

        // $atasanLangsungProvDKI1 = User::query()->create([
        //     'username' => 'Atasan Langsung DKI Jakarta1',
        //     'email' => 'asasatgfdjhgasanprovdki.com',
        //     'password' => Hash::make('123456789'),
        //     'email_verified_at' => now(),
        //     'status_akun' => 1
        // ])->attachRole('atasan_langsung');
        // $atasanLangsungProvDKI1->userPejabatStruktural()->create([
        //     'nama' => 'Atasan Langsung DKI Jakarta1',
        //     'nip' => '2020020088',
        //     'nomor_karpeg' => '2020020088',
        //     'pangkat_golongan_tmt_id' => 5,
        //     'tempat_lahir' => 'Jakarta',
        //     'tanggal_lahir' => Carbon::now(),
        //     'tingkat_aparatur' => 'provinsi',
        //     'jenis_kelamin' => 'L',
        //     'pendidikan_terakhir' => 2,
        //     'provinsi_id' => 31,
        // ]);

        $penilaiAKDamkarDKI = User::query()->create([
            'username' => 'Penilai AK Damkar DKI Jakarta',
            'email' => 'asasatasahghjthasasanprovdki.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('penilai_ak_damkar');
        $penilaiAKDamkarDKI->userPejabatStruktural()->create([
            'nama' => 'Penilai AK Damkar DKI Jakarta',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'tingkat_aparatur' => 'provinsi',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 31,
        ]);

        $penilaiAKAnalisDKI = User::query()->create([
            'username' => 'Penilai AK Analis DKI Jakarta',
            'email' => 'asahjthasasasaasasaasanprovdki.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('penilai_ak_analis');
        $penilaiAKAnalisDKI->userPejabatStruktural()->create([
            'nama' => 'Penilai AK Analis DKI Jakarta',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'tingkat_aparatur' => 'provinsi',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 31,
        ]);

        // $penilaiAKDamkarDKI1 = User::query()->create([
        //     'username' => 'Penilai AK Damkar DKI Jakarta1',
        //     'email' => 'asasataasadfdgsaasasanprovdki.com',
        //     'password' => Hash::make('123456789'),
        //     'email_verified_at' => now(),
        //     'status_akun' => 1
        // ])->attachRole('penilai_ak_damkar');
        // $penilaiAKDamkarDKI1->userPejabatStruktural()->create([
        //     'nama' => 'Penilai AK Damkar DKI Jakarta1',
        //     'nip' => '2020020088',
        //     'nomor_karpeg' => '2020020088',
        //     'pangkat_golongan_tmt_id' => 5,
        //     'tempat_lahir' => 'Jakarta',
        //     'tanggal_lahir' => Carbon::now(),
        //     'tingkat_aparatur' => 'provinsi',
        //     'jenis_kelamin' => 'L',
        //     'pendidikan_terakhir' => 2,
        //     'provinsi_id' => 31,
        // ]);

        // $penilaiAKAnalisDKI1 = User::query()->create([
        //     'username' => 'Penilai AK Analis DKI Jakarta1',
        //     'email' => 'asahjthasasawewewnprovdki.com',
        //     'password' => Hash::make('123456789'),
        //     'email_verified_at' => now(),
        //     'status_akun' => 1
        // ])->attachRole('penilai_ak_analis');
        // $penilaiAKAnalisDKI1->userPejabatStruktural()->create([
        //     'nama' => 'Penilai AK Analis DKI Jakarta1',
        //     'nip' => '2020020088',
        //     'nomor_karpeg' => '2020020088',
        //     'pangkat_golongan_tmt_id' => 5,
        //     'tempat_lahir' => 'Jakarta',
        //     'tanggal_lahir' => Carbon::now(),
        //     'tingkat_aparatur' => 'provinsi',
        //     'jenis_kelamin' => 'L',
        //     'pendidikan_terakhir' => 2,
        //     'provinsi_id' => 31,
        // ]);

        $penetapAKDamkarDKI = User::query()->create([
            'username' => 'Penetap AK Damkar DKI Jakarta',
            'email' => 'asasataasadfasasadgasasaasasanprovdki.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('penetap_ak_damkar');
        $penetapAKDamkarDKI->userPejabatStruktural()->create([
            'nama' => 'Penetap AK Damkar DKI Jakarta',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'tingkat_aparatur' => 'provinsi',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 31,
        ]);

        $penetapAKAnalisDKI = User::query()->create([
            'username' => 'Penetap AK Analis DKI Jakarta1',
            'email' => 'asafdgasasasasasasad3saasasanprovdki.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('penetap_ak_damkar');
        $penetapAKAnalisDKI->userPejabatStruktural()->create([
            'nama' => 'Penetap AK Analis DKI Jakarta1',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'tingkat_aparatur' => 'provinsi',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 31,
        ]);

        //Dki Jakarta

        $adminProvinsiDkiJakarta = User::query()->create([
            'username' => 'Admin Provinsi DKI Jakarta',
            'email' => 'adminprovdkijakarta1@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('provinsi');
        $adminProvinsiDkiJakarta->userProvKabKota()->create([
            'nomenklatur_perangkat_daerah_id' => 1,
            'provinsi_id' => 31,
        ]);

        $KabKotJakartaPusat = User::query()->create([
            'username' => 'Admin Kota Jakarta Pusat',
            'email' => 'adminkotaJakartaPusat@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('kab_kota');
        $KabKotJakartaPusat->userProvKabKota()->create([
            'nomenklatur_perangkat_daerah_id' => 1,
            'provinsi_id' => 31,
            'kab_kota_id' => 3171,
        ]);

        $atasanLangsungKotaJakpus = User::query()->create([
            'username' => 'Atasan Langsung Jakarta Pusat',
            'email' => 'atasanasasaKotaJakpus@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $atasanLangsungKotaJakpus->userPejabatStruktural()->create([
            'nama' => 'Atasan Langsung Jakarta Pusat',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'tingkat_aparatur' => 'kab_kota',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 31,
            'kab_kota_id' => 3171,
        ]);

        $penilai_ak_damkarKotaJakpus = User::query()->create([
            'username' => 'Penilai AK Damkar Jakarta Pusat',
            'email' => 'atasanKsdasasasasdsotaJakpus@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $penilai_ak_damkarKotaJakpus->userPejabatStruktural()->create([
            'nama' => 'Penilai AK Damkar Jakarta Pusat',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'tingkat_aparatur' => 'kab_kota',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 31,
            'kab_kota_id' => 3171,
        ]);
        $penilai_ak_analisKotaJakpus = User::query()->create([
            'username' => 'Penilai AK Analis Jakarta Pusat',
            'email' => 'atasanKsdsdasADSDsqwqasasotaJakpus@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $penilai_ak_analisKotaJakpus->userPejabatStruktural()->create([
            'nama' => 'Penilai AK Analis Jakarta Pusat',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'tingkat_aparatur' => 'kab_kota',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 31,
            'kab_kota_id' => 3171,
        ]);
        $penetap_ak_damkarKotaJakpus = User::query()->create([
            'username' => 'Penetap AK Damkar Jakarta Pusat',
            'email' => 'atasaasasanKsdsASASASAdsqwqasasotaJakpus@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);

        $penetap_ak_damkarKotaJakpus->userPejabatStruktural()->create([
            'nama' => 'Penetap AK Damkar Jakarta Pusat',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'tingkat_aparatur' => 'kab_kota',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 31,
            'kab_kota_id' => 3171,
        ]);

        $penetap_ak_analisKotaJakpus = User::query()->create([
            'username' => 'Penetap AK Analis Jakarta Pusat',
            'email' => 'atasaasasanKsdsdasasadadasqwqasasotaJakpus@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $penetap_ak_analisKotaJakpus->userPejabatStruktural()->create([
            'nama' => 'Penetap AK Analis Jakarta Pusat',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'tingkat_aparatur' => 'kab_kota',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 31,
            'kab_kota_id' => 3171,
        ]);

        $atasanLangsungKotaJakpus1 = User::query()->create([
            'username' => 'Atasan Langsung Jakarta Pusat1',
            'email' => 'atasanasasaKotaJsasasakpus@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('atasan_langsung');
        $atasanLangsungKotaJakpus1->userPejabatStruktural()->create([
            'nama' => 'Atasan Langsung Jakarta Pusat1',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'tingkat_aparatur' => 'kab_kota',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 31,
            'kab_kota_id' => 3171,
        ]);

        $penilai_ak_damkarKotaJakpus1 = User::query()->create([
            'username' => 'Penilai AK Damkar Jakarta Pusat1',
            'email' => 'atasanwewqefrtradadadwqeKotaJakpus@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('penilai_ak_damkar');
        $penilai_ak_damkarKotaJakpus1->userPejabatStruktural()->create([
            'nama' => 'Penilai AK Damkar Jakarta Pusat1',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'tingkat_aparatur' => 'kab_kota',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 31,
            'kab_kota_id' => 3171,
        ]);

        $penilai_ak_analisKotaJakpus1 = User::query()->create([
            'username' => 'Penilai AK Analis Jakarta Pusat1',
            'email' => 'atasanKsqwasasqasadsfswdsdsasasotaJakpus@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('penilai_ak_analis');
        $penilai_ak_analisKotaJakpus1->userPejabatStruktural()->create([
            'nama' => 'Penilai AK Analis Jakarta Pusat1',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'tingkat_aparatur' => 'kab_kota',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 31,
            'kab_kota_id' => 3171,
        ]);

        $penetap_ak_damkarKotaJakpus1 = User::query()->create([
            'username' => 'Penetap AK Damkar Jakarta Pusat1',
            'email' => 'atasaasadfdgfsaadadanKsdsdsqwqasasotaJakpus@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('penetap_ak_damkar');
        $penetap_ak_damkarKotaJakpus1->userPejabatStruktural()->create([
            'nama' => 'Penetap AK Damkar Jakarta Pusat1',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'tingkat_aparatur' => 'kab_kota',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 31,
            'kab_kota_id' => 3171,
        ]);

        $penetap_ak_analisKotaJakpus1 = User::query()->create([
            'username' => 'Penetap AK Analis Jakarta Pusat1',
            'email' => 'atasaaasasassasaqsfganKsdsdsqwqasasotaJakpus@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('penetap_ak_analis');
        $penetap_ak_analisKotaJakpus1->userPejabatStruktural()->create([
            'nama' => 'Penetap AK Analis Jakarta Pusat1',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'tingkat_aparatur' => 'kab_kota',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 31,
            'kab_kota_id' => 3171,
        ]);

        $damkarpemulaJakpus = User::query()->create([
            'username' => 'Damkar Pemula Jakpus',
            'email' => 'pemulaJakpus@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('damkar_pemula');
        $damkarpemulaJakpus->userAparatur()->create([
            'nama' => 'Damkar Pemula Jakpus',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'tingkat_aparatur' => 'kab_kota',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 31,
            'kab_kota_id' => 3171,
        ]);

        $damkarterampilJakpus = User::query()->create([
            'username' => 'Damkar Terampil Jakpus',
            'email' => 'TerampilJakpus@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('damkar_terampil');
        $damkarterampilJakpus->userAparatur()->create([
            'nama' => 'Damkar Terampil Jakpus',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'tingkat_aparatur' => 'kab_kota',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 31,
            'kab_kota_id' => 3171,
        ]);

        $damkarmahirJakpus = User::query()->create([
            'username' => 'Damkar Mahir Jakpus',
            'email' => 'MahirJakpus@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('damkar_mahir');
        $damkarmahirJakpus->userAparatur()->create([
            'nama' => 'Damkar Mahir Jakpus',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'tingkat_aparatur' => 'kab_kota',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 31,
            'kab_kota_id' => 3171,
        ]);

        $damkarpenyeliaJakpus = User::query()->create([
            'username' => 'Damkar Penyelia Jakpus',
            'email' => 'PenyeliaJakpus@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('damkar_penyelia');
        $damkarpenyeliaJakpus->userAparatur()->create([
            'nama' => 'Damkar Penyelia Jakpus',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'tingkat_aparatur' => 'kab_kota',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 31,
            'kab_kota_id' => 3171,
        ]);

        $analis_kebakaran_ahli_pertamaJakpus = User::query()->create([
            'username' => 'Analis Kebakaran Ahli Pertama Jakpus',
            'email' => 'analis_kebakaran_ahli_pertama@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('analis_kebakaran_ahli_pertama');
        $analis_kebakaran_ahli_pertamaJakpus->userAparatur()->create([
            'nama' => 'Analis Kebakaran Ahli Pertama Jakpus',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'tingkat_aparatur' => 'kab_kota',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 31,
            'kab_kota_id' => 3171,
        ]);
        
        $analis_kebakaran_ahli_mudaJakpus = User::query()->create([
            'username' => 'Analis Kebakaran Ahli Muda Jakpus',
            'email' => 'analis_kebakaran_ahli_muda@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('analis_kebakaran_ahli_muda');
        $analis_kebakaran_ahli_mudaJakpus->userAparatur()->create([
            'nama' => 'Analis Kebakaran Ahli Muda Jakpus',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'tingkat_aparatur' => 'kab_kota',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 31,
            'kab_kota_id' => 3171,
        ]);

        $analis_kebakaran_ahli_madyaJakpus = User::query()->create([
            'username' => 'Analis Kebakaran Ahli Madya Jakpus',
            'email' => 'analis_kebakaran_ahli_madya@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('analis_kebakaran_ahli_madya');
        $analis_kebakaran_ahli_madyaJakpus->userAparatur()->create([
            'nama' => 'Analis Kebakaran Ahli Madya Jakpus',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'tingkat_aparatur' => 'kab_kota',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 31,
            'kab_kota_id' => 3171,
        ]);

        //End Dki Jakarta

        //Nangro Aceh Darusallam
        $adminNangroAcehDarusallam = User::query()->create([
            'username' => 'Admin Provinsi Aceh',
            'email' => 'adminprovAceh@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('provinsi');
        $adminNangroAcehDarusallam->userProvKabKota()->create([
            'nomenklatur_perangkat_daerah_id' => 1,
            'provinsi_id' => 11,
        ]);

        $KabKotAcehSelatan = User::query()->create([
            'username' => 'Admin Kabupaten Aceh Selatan',
            'email' => 'adminacehselatan@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('kab_kota');
        $KabKotAcehSelatan->userProvKabKota()->create([
            'nomenklatur_perangkat_daerah_id' => 1,
            'provinsi_id' => 11,
            'kab_kota_id' => 1101,
        ]);
        $atasanLangsungAcehSelatan = User::query()->create([
            'username' => 'Atasan Langsung Aceh Selatan',
            'email' => 'asasasaq323243435@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $atasanLangsungAcehSelatan->userPejabatStruktural()->create([
            'nama' => 'Atasan Langsung Aceh Selatan',
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

        $penilai_ak_damkarAcehSelatan = User::query()->create([
            'username' => 'Penilai AK Damkar Aceh Selatan',
            'email' => 'atasanKsdasasasaasasaawrwesdsotaJakpus@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $penilai_ak_damkarAcehSelatan->userPejabatStruktural()->create([
            'nama' => 'Penilai AK Damkar Aceh Selatan',
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
        $penilai_ak_analisAcehSelatan = User::query()->create([
            'username' => 'Penilai AK Analis Aceh Selatan',
            'email' => 'atasanKsdsdasADSDsqwawqew1232kpus@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $penilai_ak_analisAcehSelatan->userPejabatStruktural()->create([
            'nama' => 'Penilai AK Analis Aceh Selatan',
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
        $penetap_ak_damkarAcehSelatan = User::query()->create([
            'username' => 'Penetap AK Damkar Aceh Selatan',
            'email' => 'atasaa31321sasotaJakpus@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $penetap_ak_damkarAcehSelatan->userPejabatStruktural()->create([
            'nama' => 'Penetap AK Damkar Aceh Selatan',
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
        $penetap_ak_analisacehselatan = User::query()->create([
            'username' => 'Penetap AK Analis Aceh Selatan',
            'email' => 'atasaasasa32132otaJakpus@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $penetap_ak_analisacehselatan->userPejabatStruktural()->create([
            'nama' => 'Penetap AK Analis Aceh Selatan',
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

        $atasanLangsungAcehSelatan1 = User::query()->create([
            'username' => 'Atasan Langsung Aceh Selatan1',
            'email' => 'atasanasasaKotaJsasasaasasakpus@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('atasan_langsung');
        $atasanLangsungAcehSelatan1->userPejabatStruktural()->create([
            'nama' => 'Atasan Langsung Aceh Selatan1',
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

        $penilai_ak_damkarAcehSelatan1 = User::query()->create([
            'username' => 'Penilai AK Damkar Aceh Selatan1',
            'email' => 'atasanwewqefrtradasasadadwqeKotaJakpus@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('penilai_ak_damkar');
        $penilai_ak_damkarAcehSelatan1->userPejabatStruktural()->create([
            'nama' => 'Penilai AK Damkar Aceh Selatan1',
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

        $penilai_ak_analisAcehSelatan1 = User::query()->create([
            'username' => 'Penilai AK Analis AcehSelatan1',
            'email' => 'atasanKsqwaasasaJakpusass@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('penilai_ak_analis');
        $penilai_ak_analisAcehSelatan1->userPejabatStruktural()->create([
            'nama' => 'Penilai AK Analis AcehSelatan1',
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

        $penetap_ak_damkaracehselatan1 = User::query()->create([
            'username' => 'Penetap AK Damkar Aceh Selatan1',
            'email' => 'atasaasadfdgfsaadadanKsdsdsqwqasasotasasaaJakpus@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('penetap_ak_damkar');
        $penetap_ak_damkaracehselatan1->userPejabatStruktural()->create([
            'nama' => 'Penetap AK Damkar Aceh Selatan1',
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

        $penetap_ak_analisAcehSelatan1 = User::query()->create([
            'username' => 'Penetap AK Analis Aceh Selatan1',
            'email' => 'atasaaasasassaasasasaqsfganKsdsdsqwqasasotaJakpus@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('penetap_ak_analis');
        $penetap_ak_analisAcehSelatan1->userPejabatStruktural()->create([
            'nama' => 'Penetap AK Analis Aceh Selatan1',
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

        $damkarpemulaAcehSelatan = User::query()->create([
            'username' => 'Damkar Pemula Aceh Selatan',
            'email' => 'pemulaJaakpasasaus@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('damkar_pemula');
        $damkarpemulaAcehSelatan->userAparatur()->create([
            'nama' => 'Damkar Pemula Aceh Selatan',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'tingkat_aparatur' => 'kab_kota',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 11,
            'kab_kota_id' => 1101,
        ]);

        $damkarterampilAcehSelatan = User::query()->create([
            'username' => 'Damkar Terampil Aceh Selatan',
            'email' => 'asasa@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('damkar_terampil');
        $damkarterampilAcehSelatan->userAparatur()->create([
            'nama' => 'Damkar Terampil Aceh Selatan',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'tingkat_aparatur' => 'kab_kota',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 11,
            'kab_kota_id' => 1101,
        ]);

        $damkarmahirAcehSelatan = User::query()->create([
            'username' => 'Damkar Mahir Aceh Selatan',
            'email' => 'asasasa@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('damkar_mahir');
        $damkarmahirAcehSelatan->userAparatur()->create([
            'nama' => 'Damkar Mahir Aceh Selatan',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'tingkat_aparatur' => 'kab_kota',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 11,
            'kab_kota_id' => 1101,
        ]);

        $damkarpenyeliaAcehSelatan = User::query()->create([
            'username' => 'Damkar Penyelia Aceh Selatan',
            'email' => 'dsafdsgfs@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('damkar_penyelia');
        $damkarpenyeliaAcehSelatan->userAparatur()->create([
            'nama' => 'Damkar Penyelia Aceh Selatan',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'tingkat_aparatur' => 'kab_kota',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 11,
            'kab_kota_id' => 1101,
        ]);

        $analis_kebakaran_ahli_pertamaAcehSelatan = User::query()->create([
            'username' => 'Analis Kebakaran Ahli Pertama Aceh Selatan',
            'email' => 'sdsgfdsgfdg@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('analis_kebakaran_ahli_pertama');
        $analis_kebakaran_ahli_pertamaAcehSelatan->userAparatur()->create([
            'nama' => 'Analis Kebakaran Ahli Pertama Aceh Selatan',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'tingkat_aparatur' => 'kab_kota',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 11,
            'kab_kota_id' => 1101,
        ]);

        $analis_kebakaran_ahli_mudaAcehselatan = User::query()->create([
            'username' => 'Analis Kebakaran Ahli Muda Aceh Selatan',
            'email' => 'safdsgsgfdhdfh@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('analis_kebakaran_ahli_muda');
        $analis_kebakaran_ahli_mudaAcehselatan->userAparatur()->create([
            'nama' => 'Analis Kebakaran Ahli Muda Aceh Selatan',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'tingkat_aparatur' => 'kab_kota',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 11,
            'kab_kota_id' => 1101,
        ]);

        $analis_kebakaran_ahli_madyaAcehSelatan = User::query()->create([
            'username' => 'Analis Kebakaran Ahli Madya Aceh Selatan',
            'email' => 'safdshggjuyr@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('analis_kebakaran_ahli_madya');
        $analis_kebakaran_ahli_madyaAcehSelatan->userAparatur()->create([
            'nama' => 'Analis Kebakaran Ahli Madya Aceh Selatan',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'jenis_kelamin' => 'L',
            'tingkat_aparatur' => 'kab_kota',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 11,
            'kab_kota_id' => 1101,
        ]);
        //End Nangro Aceh Darusallam


        $atasanLangsungProvBanten = User::query()->create([
            'username' => 'Atasan Langsung Banten',
            'email' => 'atasanprovbanten.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('atasan_langsung');
        $atasanLangsungProvBanten->userPejabatStruktural()->create([
            'nama' => 'Atasan Langsung Banten',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Banten',
            'tanggal_lahir' => Carbon::now(),
            'tingkat_aparatur' => 'provinsi',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 36,
        ]);

        $atasanLangsungProvJawaBarat = User::query()->create([
            'username' => 'Atasan Langsung Jawa Barat',
            'email' => 'atasanprovjawabarat.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('atasan_langsung');
        $atasanLangsungProvJawaBarat->userPejabatStruktural()->create([
            'nama' => 'Atasan Langsung Jawa Barat',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Banten',
            'tanggal_lahir' => Carbon::now(),
            'tingkat_aparatur' => 'provinsi',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 32,
        ]);

        $Struktural1 = User::query()->create([
            'username' => 'Struktural1',
            'email' => 'admin6sdetret455sdsd@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $Struktural1->userPejabatStruktural()->create([
            'nama' => 'Struktural1',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'tingkat_aparatur' => 'kab_kota',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 32,
            'kab_kota_id' => 3201,
        ]);

        $Struktural2 = User::query()->create([
            'username' => 'Struktural2',
            'email' => 'admiasaasasadrn6sdsdsd@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $Struktural2->userPejabatStruktural()->create([
            'nama' => 'Struktural2',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'tingkat_aparatur' => 'kab_kota',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 32,
            'kab_kota_id' => 3201,
        ]);

        $Struktural3 = User::query()->create([
            'username' => 'Struktural3',
            'email' => 'admasaidtrtytyasan6sdsdsd@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $Struktural3->userPejabatStruktural()->create([
            'nama' => 'Struktural3',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'tingkat_aparatur' => 'kab_kota',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 32,
            'kab_kota_id' => 3201,
        ]);

        $Struktural4 = User::query()->create([
            'username' => 'Struktural4',
            'email' => 'admasaiaasasasan6sdsdsd@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $Struktural4->userPejabatStruktural()->create([
            'nama' => 'Struktural4',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'tingkat_aparatur' => 'kab_kota',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 32,
            'kab_kota_id' => 3201,
        ]);

        $damkarPemulaBogor = User::query()->create([
            'username' => 'Damkar Pemula Bogor',
            'email' => 'adaaaaaaamiasasansafsa2@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('damkar_pemula');
        $damkarPemulaBogor->userAparatur()->create([
            'nama' => 'Damkar Pemula Bogor',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'tingkat_aparatur' => 'kab_kota',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 32,
            'kab_kota_id' => 3201,
        ]);

        $damkarTerampilBogor = User::query()->create([
            'username' => 'Damkar Terampil Bogor',
            'email' => 'admaadsfeasawtrwia232sn2434@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('damkar_terampil');
        $damkarTerampilBogor->userAparatur()->create([
            'nama' => 'Damkar Terampil Bogor',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'tingkat_aparatur' => 'kab_kota',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 32,
            'kab_kota_id' => 3201,
        ]);

        $damkarPenyeliaBogor = User::query()->create([
            'username' => 'Damkar Penyelia Bogor',
            'email' => 'penyelasasasasasaiasjd@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('damkar_penyelia');
        $damkarPenyeliaBogor->userAparatur()->create([
            'nama' => 'Damkar Penyelia Bogor',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'tingkat_aparatur' => 'kab_kota',
            'jenis_kelamin' => 'L',
            'tingkat_aparatur' => 'kab_kota',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 32,
            'kab_kota_id' => 3201,
        ]);

        $analisKebakaranAhliPertamaBogor = User::query()->create([
            'username' => 'Analis Kebakaran Ahli Pertama Bogor',
            'email' => 'admin3wqaasasaasasasasas@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('analis_kebakaran_ahli_pertama');
        $analisKebakaranAhliPertamaBogor->userAparatur()->create([
            'nama' => 'Analis Kebakaran Ahli Pertama Bogor',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'tingkat_aparatur' => 'kab_kota',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 32,
            'kab_kota_id' => 3201,
        ]);

        $analisKebakaranAhliMuda = User::query()->create([
            'username' => 'Analis Kebakaran Ahli Muda Bogor',
            'email' => 'admin3saasasasasassadsdsas@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('analis_kebakaran_ahli_muda');
        $analisKebakaranAhliMuda->userAparatur()->create([
            'nama' => 'Analis Kebakaran Ahli Muda Bogor',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'tingkat_aparatur' => 'kab_kota',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 32,
            'kab_kota_id' => 3201,
        ]);

        $analisKebakaranAhliMadyaBogor = User::query()->create([
            'username' => 'Analis Kebakaran Ahli Madya Bogor',
            'email' => 'adminsds3saasasassasas@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ])->attachRole('analis_kebakaran_ahli_muda');
        $analisKebakaranAhliMadyaBogor->userAparatur()->create([
            'nama' => 'Analis Kebakaran Ahli Madya Bogor',
            'nip' => '2020020088',
            'nomor_karpeg' => '2020020088',
            'pangkat_golongan_tmt_id' => 5,
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => Carbon::now(),
            'tingkat_aparatur' => 'kab_kota',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 2,
            'provinsi_id' => 32,
            'kab_kota_id' => 3201,
        ]);
        //end ini adalah seeder user yang dari request client

    }
}
