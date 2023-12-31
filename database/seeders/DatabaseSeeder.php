<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ButirKegiatan;
use App\Models\Mente;
use App\Models\SubButirKegiatan;
use App\Models\SubUnsur;
use App\Models\Unsur;
use App\Models\UnsurKegiatanProfesi;
use App\Models\SubUnsurKegiatanProfesi;
use App\Models\User;
use App\Models\UserAparatur;
use App\Models\UserPejabatStruktural;
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
        $this->call(ProvinsiSeeder::class);
        $this->call(KabKotaSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PangkatGolonganTmtSeeder::class);
        // $this->call(PeriodeSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(JenisKegiaranSeeder::class);
        $this->call(NomenKlaturPerangkatDaerahSeeder::class);
        $this->call(UnsurSeeder::class);
        $this->call(SubUnsurSeeder::class);
        $this->call(ButirKegiatanSeeder::class);
        $this->call(SubButirKegiatanSeeder::class);
        $this->call(KetentuanNilaiSeeder::class);
        $this->call(KetentuanSkpSeeder::class);
        $this->call(MekanismePengangkatanSeeder::class);
        $this->call(PenilaiPenetapKemendagri::class);
    }
}