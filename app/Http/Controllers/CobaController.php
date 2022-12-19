<?php

namespace App\Http\Controllers;

use App\Facades\Repositories\RekapitulasiKegiatanFacade;
use App\Models\CrossPenilaiAndPenetap;
use App\Models\JenisKegiatan;
use App\Models\KabProvPenilaiAndPenetap;
use App\Models\LaporanKegiatanJabatan;
use App\Models\LaporanKegiatanPenunjangProfesi;
use App\Models\Provinsi;
use App\Models\RekapitulasiKegiatan;
use App\Models\Rencana;
use App\Models\Role;
use App\Models\SubUnsur;
use App\Models\Unsur;
use App\Models\User;
use App\Repositories\PeriodeRepository;
use App\Services\Aparatur\LaporanKegiatan\KegiatanProfesiService;
use App\Traits\AuthTrait;
use App\Traits\DataTableTrait;
use App\Traits\ScoringTrait;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class CobaController extends Controller
{
    use ScoringTrait, AuthTrait, DataTableTrait;

    private PeriodeRepository $periodeRepository;
    private KegiatanProfesiService $kegiatanProfesiService;

    public function __construct(PeriodeRepository $periodeRepository, KegiatanProfesiService $kegiatanProfesiService)
    {
        $this->periodeRepository = $periodeRepository;
    }

    public function index()
    {
        $pdf_rekap = PDF::loadView('generate-pdf.penetapan')
            ->setPaper('A4');
        Storage::put("coba.pdf", $pdf_rekap->output());
        return response()->file(public_path('storage/coba.pdf'));
    }
}