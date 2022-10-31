<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
            'verified' => now()
        ])->attachRole('kemendagri');
        User::query()->create([
            'username' => 'Damkar Pemula',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'verified' => now()
        ])->attachRole('damkar_pemula');
        User::query()->create([
            'username' => 'Analis Kebakaran Ahli Pertama',
            'email' => 'admin3@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'verified' => now()
        ])->attachRole('analis_kebakaran_ahli_pertama');
        User::query()->create([
            'username' => 'Kab Kota',
            'email' => 'admin4@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'verified' => now()
        ])->attachRole('kab_kota');
        User::query()->create([
            'username' => 'Atasan Langsung',
            'email' => 'admin5@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'verified' => now()
        ])->attachRole('atasan_langsung');
        User::query()->create([
            'username' => 'Penilai AK',
            'email' => 'admin6@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'verified' => now()
        ])->attachRole('penilai_ak');
    }
}
