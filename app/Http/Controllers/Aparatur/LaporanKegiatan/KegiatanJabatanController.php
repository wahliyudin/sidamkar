<?php

namespace App\Http\Controllers\Aparatur\LaporanKegiatan;

use App\Http\Controllers\Controller;
use App\Models\ButirKegiatan;
use App\Models\User;
use App\Repositories\PeriodeRepository;
use App\Services\Aparatur\LaporanKegiatan\KegiatanJabatanService;
use App\Traits\AuthTrait;
use Illuminate\Http\Request;

class KegiatanJabatanController extends Controller
{
    use AuthTrait;

    private PeriodeRepository $periodeRepository;
    private KegiatanJabatanService $kegiatanJabatanService;

    public function __construct(PeriodeRepository $periodeRepository, KegiatanJabatanService $kegiatanJabatanService)
    {
        $this->periodeRepository = $periodeRepository;
        $this->kegiatanJabatanService = $kegiatanJabatanService;
    }

    public function index()
    {
        $periode = $this->periodeRepository->isActive();
        $user = $this->authUser()->load(['rencanas', 'rekapitulasiKegiatan']);
        $judul = 'Laporan Kegiatan Jabatan';
        return view('aparatur.laporan-kegiatan.jabatan.index', compact('periode', 'user', 'judul'));
    }

    public function show(ButirKegiatan $butirKegiatan)
    {
        $user = $this->authUser();
        [
            $laporanKegiatanJabatanStatusValidasis,
            $laporanKegiatanJabatanStatusRevisis,
            $laporanKegiatanJabatanStatusSelesais,
            $laporanKegiatanJabatanStatusTolaks,
        ] = $this->kegiatanJabatanService->laporanKegiatanJabatanByUser($butirKegiatan, $user);
        return view('aparatur.laporan-kegiatan.jabatan.show', compact(
            'laporanKegiatanJabatanStatusValidasis',
            'laporanKegiatanJabatanStatusRevisis',
            'laporanKegiatanJabatanStatusSelesais',
            'laporanKegiatanJabatanStatusTolaks',
            'user'
        ));
    }

    public function loadData(Request $request)
    {
        if ($request->ajax()) {
            $periode = $this->periodeRepository->isActive();
            $role = $this->getFirstRole();
            $search = str($request->search)->lower()->trim();
            $unsurs = $this->kegiatanJabatanService->loadUnsurs($periode, $search, $role);
            return response()->json([
                'unsurs' => $unsurs
            ]);
        }
    }
}
