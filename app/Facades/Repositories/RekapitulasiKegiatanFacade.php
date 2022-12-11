<?php

namespace App\Facades\Repositories;

use Illuminate\Support\Facades\Facade;

class RekapitulasiKegiatanFacade extends Facade
{
    /**
     * @method static \App\Repositories\RekapitulasiKegiatanRepository getRekapByFungsionalAndPeriode(User $user, Periode $periode)
     * @method static \App\Repositories\RekapitulasiKegiatanRepository store($user_id, $periode_id, $url_rekap, $name_rekap, $url_capaian, $name_capaian)
     * @method static \App\Repositories\RekapitulasiKegiatanRepository update(RekapitulasiKegiatan $rekapitulasiKegiatan, $user_id, $periode_id, $url_rekap, $name_rekap, $url_capaian, $name_capaian)
     *
     */

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'rekapitulasi_kegiatan_repository';
    }
}