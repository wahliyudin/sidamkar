<?php

namespace App\Http\Controllers;

use App\Exports\KegiatanJabatanExport;
use App\Exports\KegiatanPenunjangExport;
use App\Exports\UnsurExport;
use App\Facades\Repositories\RekapitulasiKegiatanFacade;
use App\Jobs\SendTTDPenetapan;
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
use App\Traits\ImageTrait;
use App\Traits\ScoringTrait;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class CobaController extends Controller
{
    use ImageTrait;
    public function __construct()
    {
    }

    public function index()
    {
        return Excel::download(new KegiatanPenunjangExport(), 'penunjangs.xlsx');
    }

    public function store(Request $request)
    {
        return $this->fromBase64($request->image)->storeAs('/', 'coba.jpg');
    }
}