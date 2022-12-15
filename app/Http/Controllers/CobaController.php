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
        $butirKegiatan = null;
        $subButirKegiatan = 29;
        return LaporanKegiatanPenunjangProfesi::query()
            ->with([
                'user.userAparatur',
                'dokumenPenunjangProfesis',
                'butirKegiatan.subUnsur.unsur',
                'subButirKegiatan.butirKegiatan.subUnsur.unsur',
                'historyPenunjangProfesis.historyDokumenPenunjangProfesis'
            ])
            ->where('user_id', $this->authUser()->id)
            ->when($butirKegiatan, function ($query, $butirKegiatan) {
                $query->where('butir_kegiatan_id', $butirKegiatan);
            })
            ->when($subButirKegiatan, function ($query, $subButirKegiatan) {
                $query->where('sub_butir_kegiatan_id', $subButirKegiatan);
            })
            ->orderBy('id', 'desc')
            ->get();
    }
}