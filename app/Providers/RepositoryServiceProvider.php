<?php

namespace App\Providers;

use App\Models\RekapitulasiKegiatan;
use App\Repositories\RekapitulasiKegiatanRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('rekapitulasi_kegiatan_repository',function(){
            return new RekapitulasiKegiatanRepository(new RekapitulasiKegiatan());
        });
    }
}