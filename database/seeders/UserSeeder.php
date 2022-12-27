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
        $kemendagri = User::query()->create([
            'username' => 'Kemendagri',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('kemendagri');
        $kemendagri->userKemendagri()->create([
            'email_info_penetapan' => 'kemendagri@gmail.com'
        ]);

        $penilaiDamkarKemendagri = User::query()->create([
            'username' => 'Penilai Damkar Kemendagri',
            'email' => 'penilaidamkarkemendagri@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('penilai_ak_damkar_kemendagri');
        $penilaiDamkarKemendagri->userPejabatStruktural()->create([
            'nama' => 'Penilai Damkar Kemendagri'
        ]);

        $penetapDamkarKemendagri = User::query()->create([
            'username' => 'Penetap Damkar Kemendagri',
            'email' => 'penetapdamkarkemendagri@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('penetap_ak_damkar_kemendagri');
        $penetapDamkarKemendagri->userPejabatStruktural()->create([
            'nama' => 'Penetap Damkar Kemendagri'
        ]);

        $penilaiAnalisKemendagri = User::query()->create([
            'username' => 'Penilai Analis Kemendagri',
            'email' => 'penilaianaliskemendagri@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('penilai_ak_analis_kemendagri');
        $penilaiAnalisKemendagri->userPejabatStruktural()->create([
            'nama' => 'Penilai Analis Kemendagri'
        ]);

        $penetapAnalisKemendagri = User::query()->create([
            'username' => 'Penetap Analis Kemendagri',
            'email' => 'penetapanaliskemendagri@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('penetap_ak_analis_kemendagri');
        $penetapAnalisKemendagri->userPejabatStruktural()->create([
            'nama' => 'Penetap Analis Kemendagri'
        ]);

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


        for ($i = 0; $i < 10; $i++) {
            $damkarPemula1Name = fake()->name();
            $damkarPemula1 = User::query()->create([
                'username' => $damkarPemula1Name,
                'email' => fake()->email(),
                'password' => Hash::make('123456789'),
                'email_verified_at' => now(),
                'status_akun' => 1
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
            'status_akun' => 0
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

        for ($i = 0; $i < 10; $i++) {
            $damkarTerampil1Name = fake()->name();
            $damkarTerampil1 = User::query()->create([
                'username' => $damkarTerampil1Name,
                'email' => fake()->email(),
                'password' => Hash::make('123456789'),
                'email_verified_at' => now(),
                'status_akun' => 1
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
            'status_akun' => 0
        ]);
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
        ]);
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
        ]);
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

        for ($i = 0; $i < 5; $i++) {
            $kabKota1 = User::query()->create([
                'username' => fake()->name(),
                'email' => fake()->email(),
                'password' => Hash::make('123456789'),
                'email_verified_at' => now(),
                'status_akun' => 1
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

        for ($i = 0; $i < 5; $i++) {
            $provinsi1 = User::query()->create([
                'username' => fake()->name(),
                'email' => fake()->email(),
                'password' => Hash::make('123456789'),
                'email_verified_at' => now(),
                'status_akun' => 1
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

        // for ($i = 0; $i < 5; $i++) {
        //     $atasanLangsung1Name = fake()->name();
        //     $atasanLangsung1 = User::query()->create([
        //         'username' => $atasanLangsung1Name,
        //         'email' => fake()->email(),
        //         'password' => Hash::make('123456789'),
        //         'email_verified_at' => now(),
        //         'status_akun' => 1
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
        ]);
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
        ]);
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
        ]);
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
        ]);
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
        ]);
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
        ]);
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
        ]);
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
        ]);
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
        ]);
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
        ]);
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
        ]);
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
        ]);
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
        ]);
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
        ]);
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
            'status_akun' => 0
        ]);
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
            'status_akun' => 0
        ]);
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
            'status_akun' => 0
        ]);
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
            'status_akun' => 0
        ]);
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
        ]);
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
        ]);
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
        ]);
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
        ]);
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
        ]);
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
        ]);
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
        ]);
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
        ]);
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
        ]);
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
        ]);
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
        ]);
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
        ]);
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
        ]);
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
        ]);
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
        ]);
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


        // seeder request client
        $adminprovbali = User::query()->create([
            'username' => 'Admin Provinsi Bali',
            'email' => 'adminprovBali@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('provinsi');
        $adminprovbali->userProvKabKota()->create([
            'nomenklatur_perangkat_daerah_id' => 1,
            'provinsi_id' => 51,
        ]);

        $adminkotadenpasar = User::query()->create([
            'username' => 'Admin Denpasar',
            'email' => 'admindenpasar@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('kab_kota');
        $adminkotadenpasar->userProvKabKota()->create([
            'nomenklatur_perangkat_daerah_id' => 1,
            'provinsi_id' => 51,
            'kab_kota_id' => 5171,
        ]);

        $adminkotabadung = User::query()->create([
            'username' => 'Admin Badung',
            'email' => 'adminbadung@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('kab_kota');
        $adminkotabadung->userProvKabKota()->create([
            'nomenklatur_perangkat_daerah_id' => 1,
            'provinsi_id' => 51,
            'kab_kota_id' => 5103,
        ]);

        $petugasdamkarpemula1 = User::query()->create([
            'username' => 'Damkar.Pemula1',
            'email' => 'Damkar.Pemula1.bali@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('damkar_pemula');
        $petugasdamkarpemula1->userAparatur()->create([
            'nama' => '1 Petugas Damkar Pemula',
            'tingkat_aparatur' => 'provinsi',
            'no_hp' => '081223456781',
            'provinsi_id' => 51,
        ]);

        $damkarterampil1 = User::query()->create([
            'username' => 'Damkar.Terampil1',
            'email' => 'Damkar.Terampil1.bali@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('damkar_terampil');
        $damkarterampil1->userAparatur()->create([
            'nama' => '1 Petugas Damkar Terampil',
            'tingkat_aparatur' => 'provinsi',
            'no_hp' => '081223456782',
            'provinsi_id' => 51,
        ]);

        $damkarmahir1 = User::query()->create([
            'username' => 'Damkar.Mahir1',
            'email' => 'Damkar.Mahir1.bali@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('damkar_mahir');
        $damkarmahir1->userAparatur()->create([
            'nama' => '1 Petugas Damkar Mahir',
            'tingkat_aparatur' => 'provinsi',
            'no_hp' => '081223456783',
            'provinsi_id' => 51,
        ]);

        $damkarpenyelia1 = User::query()->create([
            'username' => 'Damkar.Penyelia1',
            'email' => 'Damkar.Penyelia1.bali@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('damkar_penyelia');
        $damkarpenyelia1->userAparatur()->create([
            'nama' => '1 Petugas Damkar Penyelia',
            'tingkat_aparatur' => 'provinsi',
            'no_hp' => '081223456784',
            'provinsi_id' => 51,
        ]);

        $analisahlipertama1 = User::query()->create([
            'username' => 'Analis.Kebakaran.Ahli.Pertama1',
            'email' => 'Analis.Kebakaran.Ahli.Pertama1.bali@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('analis_kebakaran_ahli_pertama');
        $analisahlipertama1->userAparatur()->create([
            'nama' => '1 Petugas Analis Kebakaran Ahli Pertama',
            'tingkat_aparatur' => 'provinsi',
            'no_hp' => '081223456785',
            'provinsi_id' => 51,
        ]);

        $analiskebakaranahlimuda1 = User::query()->create([
            'username' => 'Analis.Kebakaran.Ahli.Muda1',
            'email' => 'Analis.Kebakaran.Ahli.Muda1.bali@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('analis_kebakaran_ahli_muda');
        $analiskebakaranahlimuda1->userAparatur()->create([
            'nama' => '1 Petugas Analis Kebakaran Ahli Muda',
            'tingkat_aparatur' => 'provinsi',
            'no_hp' => '081223456786',
            'provinsi_id' => 51,
        ]);

        $analiskebakaranahlimadya1 = User::query()->create([
            'username' => 'Analis.Kebakaran.Ahli.Madya1',
            'email' => 'Analis.Kebakaran.Ahli.Madya1.bali@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('analis_kebakaran_ahli_madya');
        $analiskebakaranahlimadya1->userAparatur()->create([
            'nama' => '1 Petugas Analis Kebakaran Ahli Madya',
            'tingkat_aparatur' => 'provinsi',
            'no_hp' => '081223456787',
            'provinsi_id' => 51,
        ]);

        $petugasdamkarpemula2 = User::query()->create([
            'username' => 'Damkar.Pemula2',
            'email' => 'Damkar.Pemula2.bali@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('damkar_pemula');
        $petugasdamkarpemula2->userAparatur()->create([
            'nama' => '2 Petugas Damkar Pemula',
            'tingkat_aparatur' => 'provinsi',
            'no_hp' => '081223456788',
            'provinsi_id' => 51,
        ]);

        $damkarterampil2 = User::query()->create([
            'username' => 'Damkar.Terampil2',
            'email' => 'Damkar.Terampil2.bali@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('damkar_terampil');
        $damkarterampil2->userAparatur()->create([
            'nama' => '2 Petugas Damkar Terampil',
            'tingkat_aparatur' => 'provinsi',
            'no_hp' => '081223456789',
            'provinsi_id' => 51,
        ]);

        $damkarmahir2 = User::query()->create([
            'username' => 'Damkar.Mahir2',
            'email' => 'Damkar.Mahir2.bali@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('damkar_mahir');
        $damkarmahir2->userAparatur()->create([
            'nama' => '2 Petugas Damkar Mahir',
            'tingkat_aparatur' => 'provinsi',
            'no_hp' => '081223456710',
            'provinsi_id' => 51,
        ]);

        $damkarpenyelia2 = User::query()->create([
            'username' => 'Damkar.Penyelia2',
            'email' => 'Damkar.Penyelia2.bali@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('damkar_penyelia');
        $damkarpenyelia2->userAparatur()->create([
            'nama' => '2 Petugas Damkar Penyelia',
            'tingkat_aparatur' => 'provinsi',
            'no_hp' => '081223456711',
            'provinsi_id' => 51,
        ]);

        $analisahlipertama2 = User::query()->create([
            'username' => 'Analis.Kebakaran.Ahli.Pertama2',
            'email' => 'Analis.Kebakaran.Ahli.Pertama2.bali@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('analis_kebakaran_ahli_pertama');
        $analisahlipertama2->userAparatur()->create([
            'nama' => '2 Petugas Analis Kebakaran Ahli Pertama',
            'tingkat_aparatur' => 'provinsi',
            'no_hp' => '081223456712',
            'provinsi_id' => 51,
        ]);

        $analiskebakaranahlimuda2 = User::query()->create([
            'username' => 'Analis.Kebakaran.Ahli.Muda2',
            'email' => 'Analis.Kebakaran.Ahli.Muda2.bali@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('analis_kebakaran_ahli_muda');
        $analiskebakaranahlimuda2->userAparatur()->create([
            'nama' => '2 Petugas Analis Kebakaran Ahli Muda',
            'tingkat_aparatur' => 'provinsi',
            'no_hp' => '081223456713',
            'provinsi_id' => 51,
        ]);

        $analiskebakaranahlimadya2 = User::query()->create([
            'username' => 'Analis.Kebakaran.Ahli.Madya2',
            'email' => 'Analis.Kebakaran.Ahli.Madya2.bali@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('analis_kebakaran_ahli_madya');
        $analiskebakaranahlimadya2->userAparatur()->create([
            'nama' => '2 Petugas Analis Kebakaran Ahli Madya',
            'tingkat_aparatur' => 'provinsi',
            'no_hp' => '081223456714',
            'provinsi_id' => 51,
        ]);

        $damkarpemuladenpasar = User::query()->create([
            'username' => 'Damkar.Pemula.Denpasar',
            'email' => 'Damkar.Pemula1.bali.Denpasar@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('damkar_pemula');
        $damkarpemuladenpasar->userAparatur()->create([
            'nama' => 'Denpasar Petugas Damkar Pemula',
            'tingkat_aparatur' => 'kab_kota',
            'no_hp' => '081223456715',
            'provinsi_id' => 51,
            'kab_kota_id' => 5171,
        ]);

        $damkarterampildenpasar = User::query()->create([
            'username' => 'Damkar.Terampil.Denpasar',
            'email' => 'Damkar.Terampil1.bali.Denpasar@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('damkar_terampil');
        $damkarterampildenpasar->userAparatur()->create([
            'nama' => 'Denpasar Petugas Damkar Terampil',
            'tingkat_aparatur' => 'kab_kota',
            'no_hp' => '081223456716',
            'provinsi_id' => 51,
            'kab_kota_id' => 5171,
        ]);

        $damkarmahirdenpasar = User::query()->create([
            'username' => 'Damkar.Mahir.Denpasar',
            'email' => 'Damkar.Mahir1.bali.Denpasar@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('damkar_mahir');
        $damkarmahirdenpasar->userAparatur()->create([
            'nama' => 'Denpasar Petugas Damkar Mahir',
            'tingkat_aparatur' => 'kab_kota',
            'no_hp' => '081223456717',
            'provinsi_id' => 51,
            'kab_kota_id' => 5171,
        ]);

        $damkarpenyeliadenpasar = User::query()->create([
            'username' => 'Damkar.Penyelia.Denpasar',
            'email' => 'Damkar.Penyelia1.bali.Denpasar@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('damkar_penyelia');
        $damkarpenyeliadenpasar->userAparatur()->create([
            'nama' => 'Denpasar Petugas Damkar Penyelia',
            'tingkat_aparatur' => 'kab_kota',
            'no_hp' => '081223456718',
            'provinsi_id' => 51,
            'kab_kota_id' => 5171,
        ]);

        $analisahlipertamadenpasar = User::query()->create([
            'username' => 'Analis.Kebakaran.Ahli.Pertama.Denpasar',
            'email' => 'Analis.Kebakaran.Ahli.Pertama1.bali.Denpasar@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('analis_kebakaran_ahli_pertama');
        $analisahlipertamadenpasar->userAparatur()->create([
            'nama' => 'Denpasar Petugas Analis Kebakaran Ahli Pertama',
            'tingkat_aparatur' => 'kab_kota',
            'no_hp' => '081223456719',
            'provinsi_id' => 51,
            'kab_kota_id' => 5171,
        ]);

        $analiskebakaranahlimuda1denpasar = User::query()->create([
            'username' => 'Analis.Kebakaran.Ahli.Muda.Denpasar',
            'email' => 'Analis.Kebakaran.Ahli.Muda1.bali.Denpasar@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('analis_kebakaran_ahli_muda');
        $analiskebakaranahlimuda1denpasar->userAparatur()->create([
            'nama' => 'Denpasar Petugas Analis Kebakaran Ahli Muda',
            'tingkat_aparatur' => 'kab_kota',
            'no_hp' => '081223456720',
            'provinsi_id' => 51,
            'kab_kota_id' => 5171,
        ]);

        $analiskebakaranahlimadyadenpasar = User::query()->create([
            'username' => 'Analis.Kebakaran.Ahli.Madya.Denpasar',
            'email' => 'Analis.Kebakaran.Ahli.Madya1.bali.Denpasar@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('analis_kebakaran_ahli_madya');
        $analiskebakaranahlimadyadenpasar->userAparatur()->create([
            'nama' => 'Denpasar Petugas Analis Kebakaran Ahli Madya',
            'tingkat_aparatur' => 'kab_kota',
            'no_hp' => '081223456721',
            'provinsi_id' => 51,
            'kab_kota_id' => 5171,
        ]);

        $damkarpemulabadung = User::query()->create([
            'username' => 'Damkar.Pemula.Kab Badung',
            'email' => 'Damkar.Pemula1.bali.Kab.Badung@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('damkar_pemula');
        $damkarpemulabadung->userAparatur()->create([
            'nama' => 'Kab Badung Petugas Damkar Pemula',
            'tingkat_aparatur' => 'kab_kota',
            'no_hp' => '081223456722',
            'provinsi_id' => 51,
            'kab_kota_id' => 5103,
        ]);

        $damkarterampilbadung = User::query()->create([
            'username' => 'Damkar.Terampil.Kab Badung',
            'email' => 'Damkar.Terampil1.bali.Kab.Badung@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('damkar_terampil');
        $damkarterampilbadung->userAparatur()->create([
            'nama' => 'Kab Badung Petugas Damkar Terampil',
            'tingkat_aparatur' => 'kab_kota',
            'no_hp' => '081223456723',
            'provinsi_id' => 51,
            'kab_kota_id' => 5103,
        ]);

        $damkarmahirbadung = User::query()->create([
            'username' => 'Damkar.Mahir.Kab Badung',
            'email' => 'Damkar.Mahir1.bali.Kab.Badung@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('damkar_mahir');
        $damkarmahirbadung->userAparatur()->create([
            'nama' => 'Kab Badung Petugas Damkar Mahir',
            'tingkat_aparatur' => 'kab_kota',
            'no_hp' => '081223456724',
            'provinsi_id' => 51,
            'kab_kota_id' => 5103,
        ]);

        $damkarpenyeliabadung = User::query()->create([
            'username' => 'Damkar.Penyelia.Kab Badung',
            'email' => 'Damkar.Penyelia1.bali.Kab.Badung@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('damkar_penyelia');
        $damkarpenyeliabadung->userAparatur()->create([
            'nama' => 'Kab Badung Petugas Damkar Penyelia',
            'tingkat_aparatur' => 'kab_kota',
            'no_hp' => '081223456725',
            'provinsi_id' => 51,
            'kab_kota_id' => 5103,
        ]);

        $analisahlipertamabadung = User::query()->create([
            'username' => 'Analis.Kebakaran.Ahli.Pertama.Kab Badung',
            'email' => 'Analis.Kebakaran.Ahli.Pertama1.bali.Kab.Badung@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('analis_kebakaran_ahli_pertama');
        $analisahlipertamabadung->userAparatur()->create([
            'nama' => 'Kab Badung Petugas Analis Kebakaran Ahli Pertama',
            'tingkat_aparatur' => 'kab_kota',
            'no_hp' => '081223456726',
            'provinsi_id' => 51,
            'kab_kota_id' => 5103,
        ]);

        $analiskebakaranahlimuda1badung = User::query()->create([
            'username' => 'Analis.Kebakaran.Ahli.Muda.Kab Badung',
            'email' => 'Analis.Kebakaran.Ahli.Muda1.bali.Kab.Badung@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('analis_kebakaran_ahli_muda');
        $analiskebakaranahlimuda1badung->userAparatur()->create([
            'nama' => 'Kab Badung Petugas Analis Kebakaran Ahli Muda',
            'tingkat_aparatur' => 'kab_kota',
            'no_hp' => '081223456727',
            'provinsi_id' => 51,
            'kab_kota_id' => 5103,
        ]);

        $analiskebakaranahlimadyabadung = User::query()->create([
            'username' => 'Analis.Kebakaran.Ahli.Madya.Kab Badung',
            'email' => 'Analis.Kebakaran.Ahli.Madya1.bali.Kab.Badung@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ])->attachRole('analis_kebakaran_ahli_madya');
        $analiskebakaranahlimadyabadung->userAparatur()->create([
            'nama' => 'Kab Badung Petugas Analis Kebakaran Ahli Madya',
            'tingkat_aparatur' => 'kab_kota',
            'no_hp' => '081223456728',
            'provinsi_id' => 51,
            'kab_kota_id' => 5103,
        ]);

     
//struktural
        $atasanlangsungbali = User::query()->create([
            'username' => 'Atasan.Langsung',
            'email' => 'Atasan.Langsung1.bali@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $atasanlangsungbali->userPejabatStruktural()->create([
            'nama' => '1  Atasan Langsung',
            'eselon' => 1,
            'no_hp' => '081223456729',
            'tingkat_aparatur' => 'provinsi',
            'provinsi_id' => 51,
        ]);

        $penilaiakbali = User::query()->create([
            'username' => 'Penilai.AK.Damkar',
            'email' => 'Penilai.AK.Damkar1.bali@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $penilaiakbali->userPejabatStruktural()->create([
            'nama' => '1  Penilai AK Damkar',
            'eselon' => 1,
            'no_hp' => '081223456730',
            'tingkat_aparatur' => 'provinsi',
            'provinsi_id' => 51,
        ]);

        $penetapbali = User::query()->create([
            'username' => 'Penetap.AK.Damkar',
            'email' => 'Penetap.AK.Damkar1.bali@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $penetapbali->userPejabatStruktural()->create([
            'nama' => '1  Penetap AK Damkar',
            'eselon' => 1,
            'no_hp' => '081223456731',
            'tingkat_aparatur' => 'provinsi',
            'provinsi_id' => 51,
        ]);


        $penilaianalisbali = User::query()->create([
            'username' => 'Penilai.AK.Analis',
            'email' => 'Penilai.AK.Analis1.bali@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $penilaianalisbali->userPejabatStruktural()->create([
            'nama' => '1  Penilai AK Analis',
            'eselon' => 2,
            'no_hp' => '081223456732',
            'tingkat_aparatur' => 'provinsi',
            'provinsi_id' => 51,
        ]);

        $penetapanalisbali = User::query()->create([
            'username' => 'Penetap.AK.Analis',
            'email' => 'Penetap.AK.Analis1.bali@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $penetapanalisbali->userPejabatStruktural()->create([
            'nama' => '1  Penetap AK Analis',
            'eselon' => 2,
            'no_hp' => '081223456733',
            'tingkat_aparatur' => 'provinsi',
            'provinsi_id' => 51,
        ]);

        $atasanlangsungbali2 = User::query()->create([
            'username' => 'Atasan.Langsung2',
            'email' => 'Atasan.Langsung2.bali@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $atasanlangsungbali2->userPejabatStruktural()->create([
            'nama' => '2  Atasan Langsung',
            'eselon' => 2,
            'no_hp' => '081223456734',
            'tingkat_aparatur' => 'provinsi',
            'provinsi_id' => 51,
        ]);

        $penilaiakbali2 = User::query()->create([
            'username' => 'Penilai.AK.Damkar2',
            'email' => 'Penilai.AK.Damkar2.bali@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $penilaiakbali2->userPejabatStruktural()->create([
            'nama' => '2  Penilai AK Damkar',
            'eselon' => 3,
            'no_hp' => '081223456735',
            'tingkat_aparatur' => 'provinsi',
            'provinsi_id' => 51,
        ]);

        $penetapbali2 = User::query()->create([
            'username' => 'Penetap.AK.Damkar2',
            'email' => 'Penetap.AK.Damkar2.bali@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $penetapbali2->userPejabatStruktural()->create([
            'nama' => '2  Penetap AK Damkar',
            'eselon' => 3,
            'no_hp' => '081223456736',
            'tingkat_aparatur' => 'provinsi',
            'provinsi_id' => 51,
        ]);


        $penilaianalisbali2 = User::query()->create([
            'username' => 'Penilai.AK.Analis2',
            'email' => 'Penilai.AK.Analis2.bali@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $penilaianalisbali2->userPejabatStruktural()->create([
            'nama' => '2  Penilai AK Analis',
            'eselon' => 3,
            'no_hp' => '081223456737',
            'tingkat_aparatur' => 'provinsi',
            'provinsi_id' => 51,
        ]);

        $penetapanalisbali2 = User::query()->create([
            'username' => 'Penetap.AK.Analis2',
            'email' => 'Penetap.AK.Analis2.bali@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $penetapanalisbali2->userPejabatStruktural()->create([
            'nama' => '2  Penetap AK Analis',
            'eselon' => 4,
            'no_hp' => '081223456738',
            'tingkat_aparatur' => 'provinsi',
            'provinsi_id' => 51,
        ]);

        $atasanlangsungbali3 = User::query()->create([
            'username' => 'Atasan.Langsung3',
            'email' => 'Atasan.Langsung3.bali@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $atasanlangsungbali3->userPejabatStruktural()->create([
            'nama' => '3  Atasan Langsung',
            'eselon' => 4,
            'no_hp' => '081223456739',
            'tingkat_aparatur' => 'provinsi',
            'provinsi_id' => 51,
        ]);

        $penilaiakbali3 = User::query()->create([
            'username' => 'Penilai.AK.Damkar3',
            'email' => 'Penilai.AK.Damkar3.bali@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $penilaiakbali3->userPejabatStruktural()->create([
            'nama' => '3  Penilai AK Damkar',
            'eselon' => 4,
            'no_hp' => '081223456740',
            'tingkat_aparatur' => 'provinsi',
            'provinsi_id' => 51,
        ]);

        $penetapbali3 = User::query()->create([
            'username' => 'Penetap.AK.Damkar3',
            'email' => 'Penetap.AK.Damkar3.bali@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $penetapbali3->userPejabatStruktural()->create([
            'nama' => '3  Penetap AK Damkar',
            'eselon' => 1,
            'no_hp' => '081223456741',
            'tingkat_aparatur' => 'provinsi',
            'provinsi_id' => 51,
        ]);


        $penilaianalisbali3 = User::query()->create([
            'username' => 'Penilai.AK.Analis3',
            'email' => 'Penilai.AK.Analis3.bali@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $penilaianalisbali3->userPejabatStruktural()->create([
            'nama' => '3  Penilai AK Analis',
            'eselon' => 2,
            'no_hp' => '081223456742',
            'tingkat_aparatur' => 'provinsi',
            'provinsi_id' => 51,
        ]);

        $penetapanalisbali3 = User::query()->create([
            'username' => 'Penetap.AK.Analis3',
            'email' => 'Penetap.AK.Analis3.bali@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $penetapanalisbali3->userPejabatStruktural()->create([
            'nama' => '3  Penetap AK Analis',
            'eselon' => 3,
            'no_hp' => '081223456743',
            'tingkat_aparatur' => 'provinsi',
            'provinsi_id' => 51,
        ]);



        $atasanlangsungdenpasar = User::query()->create([
            'username' => 'Atasan.Langsung.Denpasar',
            'email' => 'Atasan.Langsung.bali.Denpasar@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $atasanlangsungdenpasar->userPejabatStruktural()->create([
            'nama' => 'Denpasar Atasan Langsung',
            'eselon' => 1,
            'no_hp' => '081223456744',
            'tingkat_aparatur' => 'kab_kota',
            'provinsi_id' => 51,
            'kab_kota_id' => 5171,
        ]);

        $penilaiakdenpasar = User::query()->create([
            'username' => 'Penilai.AK.Damkar.Denpasar',
            'email' => 'Penilai.AK.Damkar.bali.Denpasar@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $penilaiakdenpasar->userPejabatStruktural()->create([
            'nama' => 'Denpasar  Penilai AK Damkar',
            'eselon' => 1,
            'no_hp' => '081223456745',
            'tingkat_aparatur' => 'kab_kota',
            'provinsi_id' => 51,
            'kab_kota_id' => 5171,
        ]);

        $penetapdenpasar = User::query()->create([
            'username' => 'Penetap.AK.Damkar.Denpasar',
            'email' => 'Penetap.AK.Damkar.bali.Denpasar@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $penetapdenpasar->userPejabatStruktural()->create([
            'nama' => 'Denpasar  Penetap AK Damkar',
            'eselon' => 1,
            'no_hp' => '081223456746',
            'tingkat_aparatur' => 'kab_kota',
            'provinsi_id' => 51,
            'kab_kota_id' => 5171,
        ]);


        $penilaianalisdenpasar = User::query()->create([
            'username' => 'Penilai.AK.Analis.Denpasar',
            'email' => 'Penilai.AK.Analis.bali.Denpasar@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $penilaianalisdenpasar->userPejabatStruktural()->create([
            'nama' => 'Denpasar  Penilai AK Analis',
            'eselon' => 2,
            'no_hp' => '081223456747',
            'tingkat_aparatur' => 'kab_kota',
            'provinsi_id' => 51,
            'kab_kota_id' => 5171,
        ]);

        $penetapanalisdenpasar = User::query()->create([
            'username' => 'Penetap.AK.Analis.Denpasar',
            'email' => 'Penetap.AK.Analis.bali.Denpasar@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $penetapanalisdenpasar->userPejabatStruktural()->create([
            'nama' => 'Denpasar  Penetap AK Analis',
            'eselon' => 2,
            'no_hp' => '081223456748',
            'tingkat_aparatur' => 'kab_kota',
            'provinsi_id' => 51,
            'kab_kota_id' => 5171
        ]);

        $penilaiakdenpasar2 = User::query()->create([
            'username' => 'Penilai.AK.Damkar2.Denpasar',
            'email' => 'Penilai.AK.Damkar2.bali.Denpasar@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $penilaiakdenpasar2->userPejabatStruktural()->create([
            'nama' => 'Denpasar  Penilai AK Damkar 2',
            'eselon' => 2,
            'no_hp' => '081223456749',
            'tingkat_aparatur' => 'kab_kota',
            'provinsi_id' => 51,
            'kab_kota_id' => 5171,
        ]);

        $penetapdenpasar2 = User::query()->create([
            'username' => 'Penetap.AK.Damkar2.Denpasar',
            'email' => 'Penetap.AK.Damkar2.bali.Denpasar@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $penetapdenpasar2->userPejabatStruktural()->create([
            'nama' => 'Denpasar  Penetap AK Damkar 2',
            'eselon' => 3,
            'no_hp' => '081223456750',
            'tingkat_aparatur' => 'kab_kota',
            'provinsi_id' => 51,
            'kab_kota_id' => 5171,
        ]);


        $atasanlangsungbadung = User::query()->create([
            'username' => 'Atasan.Langsung.Kab Badung',
            'email' => 'Atasan.Langsung.bali.Kab.Badung@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $atasanlangsungbadung->userPejabatStruktural()->create([
            'nama' => 'Kab Badung  Atasan Langsung',
            'eselon' => 1,
            'no_hp' => '081223456751',
            'tingkat_aparatur' => 'kab_kota',
            'provinsi_id' => 51,
            'kab_kota_id' => 5103,
        ]);

        $penilaiakbadung = User::query()->create([
            'username' => 'Penilai.AK.Damkar.Kab Badung',
            'email' => 'Penilai.AK.Damkar.bali.Kab.Badung@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $penilaiakbadung->userPejabatStruktural()->create([
            'nama' => 'Kab Badung  Penilai AK Damkar',
            'eselon' => 1,
            'no_hp' => '081223456752',
            'tingkat_aparatur' => 'kab_kota',
            'provinsi_id' => 51,
            'kab_kota_id' => 5103,
        ]);

        $penetapbadung = User::query()->create([
            'username' => 'Penetap.AK.Damkar.Kab Badung',
            'email' => 'Penetap.AK.Damkar.bali.Kab.Badung@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $penetapbadung->userPejabatStruktural()->create([
            'nama' => 'Kab Badung  Penetap AK Damkar',
            'eselon' => 1,
            'no_hp' => '081223456753',
            'tingkat_aparatur' => 'kab_kota',
            'provinsi_id' => 51,
            'kab_kota_id' => 5103,
        ]);


        $penilaianalisbadung = User::query()->create([
            'username' => 'Penilai.AK.Analis.Kab Badung',
            'email' => 'Penilai.AK.Analis.bali.Kab.Badung@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $penilaianalisbadung->userPejabatStruktural()->create([
            'nama' => 'Kab Badung  Penilai AK Analis',
            'eselon' => 2,
            'no_hp' => '081223456754',
            'tingkat_aparatur' => 'kab_kota',
            'provinsi_id' => 51,
            'kab_kota_id' => 5103,
        ]);

        $penetapanalisbadung = User::query()->create([
            'username' => 'Penetap.AK.Analis.Kab Badung',
            'email' => 'Penetap.AK.Analis.bali.Kab.Badung@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $penetapanalisbadung->userPejabatStruktural()->create([
            'nama' => 'Kab Badung  Penetap AK Analis',
            'eselon' => 2,
            'no_hp' => '081223456755',
            'tingkat_aparatur' => 'kab_kota',
            'provinsi_id' => 51,
            'kab_kota_id' => 5103
        ]);

        $penilaiakbadung2 = User::query()->create([
            'username' => 'Penilai.AK.Damkar2.Kab Badung',
            'email' => 'Penilai.AK.Damkar2.bali.Kab.Badung@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $penilaiakbadung2->userPejabatStruktural()->create([
            'nama' => 'Badung  Penilai AK Damkar 2',
            'eselon' => 3,
            'no_hp' => '081223456756',
            'tingkat_aparatur' => 'kab_kota',
            'provinsi_id' => 51,
            'kab_kota_id' => 5103,
        ]);

        $penetapbadung2 = User::query()->create([
            'username' => 'Penetap.AK.Damkar2.Kab Badung',
            'email' => 'Penetap.AK.Damkar2.bali.Kab.Badung@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 0
        ]);
        $penetapbadung2->userPejabatStruktural()->create([
            'nama' => 'Badung  Penetap AK Damkar 2',
            'eselon' => 3,
            'no_hp' => '081223456757',
            'tingkat_aparatur' => 'kab_kota',
            'provinsi_id' => 51,
            'kab_kota_id' => 5103,
        ]);


        $fungsionalumumprov1 = User::query()->create([
            'username' => 'Tenaga.Ahli1',
            'email' => 'Tenaga. Ahli1.bali.@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ]);
        $fungsionalumumprov1->userFungsionalUmum()->create([
            'nama' => 'Tenaga Ahli 1',
            'no_hp' => '081223456758',
            'jabatan' => 'Tenaga Ahli',
            'tingkat_aparatur' => 'provinsi',
            'provinsi_id' => 51,
        ]);

        $fungsionalumumprov2 = User::query()->create([
            'username' => 'Tenaga.Ahli2',
            'email' => 'Tenaga.Ahli2.bali.@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ]);
        $fungsionalumumprov2->userFungsionalUmum()->create([
            'nama' => 'Tenaga Ahli 2',
            'no_hp' => '081223456759',
            'jabatan' => 'Tenaga Ahli',
            'tingkat_aparatur' => 'provinsi',
            'provinsi_id' => 51,
        ]);

        $fungsionalumumprov3 = User::query()->create([
            'username' => 'Tenaga.Ahli3',
            'email' => 'Tenaga.Ahli3.bali.@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ]);
        $fungsionalumumprov3->userFungsionalUmum()->create([
            'nama' => 'Tenaga Ahli 3',
            'no_hp' => '081223456760',
            'jabatan' => 'Tenaga Ahli',
            'tingkat_aparatur' => 'provinsi',
            'provinsi_id' => 51,
        ]);

        $fungsionalumumkab1 = User::query()->create([
            'username' => 'Denpasar.Tenaga.Ahli1',
            'email' => 'Tenaga. Ahli1.bali.Denpasar@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ]);
        $fungsionalumumkab1->userFungsionalUmum()->create([
            'nama' => 'Denpasar Tenaga Ahli 1',
            'no_hp' => '081223456761',
            'jabatan' => 'Tenaga Ahli',
            'tingkat_aparatur' => 'kab_kota',
            'provinsi_id' => 51,
            'kab_kota_id' => 5171,
        ]);

        $fungsionalumumkab2 = User::query()->create([
            'username' => 'Denpasar.Tenaga.Ahli2',
            'email' => 'Tenaga.Ahli2.bali.Denpasar@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ]);
        $fungsionalumumkab2->userFungsionalUmum()->create([
            'nama' => 'Denpasar Tenaga Ahli 2',
            'no_hp' => '081223456762',
            'jabatan' => 'Tenaga Ahli',
            'tingkat_aparatur' => 'kab_kota',
            'provinsi_id' => 51,
            'kab_kota_id' => 5171,
        ]);

        $fungsionalumumkab3 = User::query()->create([
            'username' => 'Denpasar.Tenaga.Ahli3',
            'email' => 'Tenaga.Ahli3.bali.Denpasar@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ]);
        $fungsionalumumkab3->userFungsionalUmum()->create([
            'nama' => 'Denpasar Tenaga Ahli 3',
            'no_hp' => '081223456763',
            'jabatan' => 'Tenaga Ahli',
            'tingkat_aparatur' => 'kab_kota',
            'provinsi_id' => 51,
            'kab_kota_id' => 5171,
        ]);

        $fungsionalumumkab4 = User::query()->create([
            'username' => 'Kab Badung.Tenaga.Ahli1',
            'email' => 'Tenaga. Ahli1.bali.Kab.Badung@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ]);
        $fungsionalumumkab4->userFungsionalUmum()->create([
            'nama' => 'Kab Badung Tenaga Ahli 1',
            'no_hp' => '081223456764',
            'jabatan' => 'Tenaga Ahli',
            'tingkat_aparatur' => 'kab_kota',
            'provinsi_id' => 51,
            'kab_kota_id' => 5103,
        ]);
        
        $fungsionalumumkab5 = User::query()->create([
            'username' => 'Kab Badung.Tenaga.Ahli2',
            'email' => 'Tenaga.Ahli2.bali.Kab.Badung@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ]);
        $fungsionalumumkab5->userFungsionalUmum()->create([
            'nama' => 'Kab Badung Tenaga Ahli 2',
            'no_hp' => '081223456765',
            'jabatan' => 'Tenaga Ahli',
            'tingkat_aparatur' => 'kab_kota',
            'provinsi_id' => 51,
            'kab_kota_id' => 5103,
        ]);

        $fungsionalumumkab6 = User::query()->create([
            'username' => 'Kab Badung.Tenaga.Ahli3',
            'email' => 'Tenaga.Ahli3.bali.Kab.Badung@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'status_akun' => 1
        ]);
        $fungsionalumumkab6->userFungsionalUmum()->create([
            'nama' => 'Kab Badung Tenaga Ahli 3',
            'no_hp' => '081223456766',
            'jabatan' => 'Tenaga Ahli',
            'tingkat_aparatur' => 'kab_kota',
            'provinsi_id' => 51,
            'kab_kota_id' => 5103,
        ]);
        
        // end seeder request client

    }
}