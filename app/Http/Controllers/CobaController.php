<?php

namespace App\Http\Controllers;

use App\Facades\Repositories\RekapitulasiKegiatanFacade;
use App\Models\CrossPenilaiAndPenetap;
use App\Models\KabProvPenilaiAndPenetap;
use App\Models\LaporanKegiatanJabatan;
use App\Models\Provinsi;
use App\Models\RekapitulasiKegiatan;
use App\Models\Rencana;
use App\Models\Unsur;
use App\Models\User;
use App\Repositories\PeriodeRepository;
use App\Traits\AuthTrait;
use App\Traits\ScoringTrait;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class CobaController extends Controller
{
    use ScoringTrait, AuthTrait;

    private PeriodeRepository $periodeRepository;

    public function __construct(PeriodeRepository $periodeRepository)
    {
        $this->periodeRepository = $periodeRepository;
    }

    public function index()
    {
        return KabProvPenilaiAndPenetap::query()
            ->with('penilaiAngkaKreditDamkar')
            ->where('tingkat_aparatur', 'kab_kota')
            ->where('kab_kota_id', 1101)
            ->first();
    }
}
