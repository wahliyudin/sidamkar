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

        $damkarPenyelia = User::query()->create([
            'username' => 'Damkar Penyelia',
            'email' => 'penyeliasjd@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('damkar_penyelia');
        $damkarPenyelia->userAparatur()->create([
            'nama' => 'Damkar Penyelia',
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

        for ($i=0; $i < 5; $i++) {
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

        for ($i=0; $i < 5; $i++) {
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

        for ($i=0; $i < 5; $i++) {
            $atasanLangsung1Name = fake()->name();
            $atasanLangsung1 = User::query()->create([
                'username' => $atasanLangsung1Name,
                'email' => fake()->email(),
                'password' => Hash::make('123456789'),
                'email_verified_at' => now(),
                'status_akun' => fake()->boolean()
            ])->attachRole('atasan_langsung');
            $atasanLangsung1->userPejabatStruktural()->create([
                'nama' => $atasanLangsung1Name,
                'nip' => '2020020088',
                'nomor_karpeg' => '2020020088',
                'pangkat_golongan_tmt_id' => 5,
                'tempat_lahir' => fake()->city(),
                'tanggal_lahir' => Carbon::now(),
                'jenis_kelamin' => fake()->randomElement(['L', 'P']),
                'pendidikan_terakhir' => 2,
                'provinsi_id' => 11,
                'kab_kota_id' => 1101,
            ]);
        }

        $penilaiAK = User::query()->create([
            'username' => 'Penilai AK',
            'email' => 'admin6@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ]);
        $penilaiAK->userPejabatStruktural()->create([
            'nama' => 'Penilai AK',
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
        for ($i=0; $i < 6; $i++) {
            $penilaiAK1Name = fake()->name();
            $penilaiAK1 = User::query()->create([
                'username' => $penilaiAK1Name,
                'email' => fake()->email(),
                'password' => Hash::make('123456789'),
                'email_verified_at' => now(),
                'status_akun' => 1
            ]);
            $penilaiAK1->userPejabatStruktural()->create([
                'nama' => $penilaiAK1Name,
                'nip' => '2020020088',
                'nomor_karpeg' => '2020020088',
                'pangkat_golongan_tmt_id' => 5,
                'tempat_lahir' => fake()->city(),
                'tanggal_lahir' => Carbon::now(),
                'tingkat_aparatur' => fake()->randomElement(['provinsi', 'kab_kota']),
                'jenis_kelamin' => fake()->randomElement(['L', 'P']),
                'pendidikan_terakhir' => 2,
                'provinsi_id' => 11,
                'kab_kota_id' => 1101,
            ]);
        }

        $penetapAK = User::query()->create([
            'username' => 'Penetap AK',
            'email' => 'admin0099@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ]);
        $penetapAK->userPejabatStruktural()->create([
            'nama' => 'Penetap AK',
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

        for ($i=0; $i < 5; $i++) {
            $penetapAKName = fake()->name();
            $penetapAK = User::query()->create([
                'username' => $penetapAKName,
                'email' => fake()->email(),
                'password' => Hash::make('123456789'),
                'email_verified_at' => now(),
                'status_akun' => 1
            ]);
            $penetapAK->userPejabatStruktural()->create([
                'nama' => $penetapAKName,
                'nip' => '2020020088',
                'nomor_karpeg' => '2020020088',
                'pangkat_golongan_tmt_id' => 5,
                'tempat_lahir' => fake()->city(),
                'tanggal_lahir' => Carbon::now(),
                'tingkat_aparatur' => fake()->randomElement(['provinsi', 'kab_kota']),
                'jenis_kelamin' => fake()->randomElement(['L', 'P']),
                'pendidikan_terakhir' => 2,
                'provinsi_id' => 11,
                'kab_kota_id' => 1101,
            ]);
        }


        //ini adalah seeder user yang dari request client
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
            'status_akun' => 1
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
            'status_akun' => 1
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
            'status_akun' => 1
        ])->attachRole('atasan_langsung');
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
            'status_akun' => 1
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
            'status_akun' => 1
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

        $atasanLangsungProvBanten = User::query()->create([
            'username' => 'Atasan Langsung Banten',
            'email' => 'atasanprovbanten.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
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
            'status_akun' => 1
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


         //end ini adalah seeder user yang dari request client

    }
}