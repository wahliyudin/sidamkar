<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ButirKegiatan;
use App\Models\Mente;
use App\Models\SubButirKegiatan;
use App\Models\SubUnsur;
use App\Models\Unsur;
use App\Models\User;
use App\Models\UserAparatur;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(ProvinsiSeeder::class);
        $this->call(KabKotaSeeder::class);
        $this->call(RoleSeeder::class);
        User::factory(50)->create();
        UserAparatur::factory(50)->create();
        // UserPejabatStruktural::factory(5)->create();
        // UserProvKabKota::factory(5)->create();
        $this->call(UserSeeder::class);
        $this->call(JenisKegiaranSeeder::class);
        $this->call(NomenKlaturPerangkatDaerahSeeder::class);
        // Rencana::factory(5)->create();
        Unsur::factory(5)->create();
        SubUnsur::factory(5)->create();
        ButirKegiatan::factory(5)->create();
        SubButirKegiatan::factory(5)->create();
        Mente::factory(10)->create();
        // RencanaSubUnsur::factory(5)->create();
        // RencanaSubUnsurButirKegiatan::factory(5)->create();
    }
}
