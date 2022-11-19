<?php

namespace App\Http\Controllers\Aparatur\LaporanKegiatan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Aparatur\LaporanKegiatan\StoreLaporanRequest;
use App\Models\ButirKegiatan;
use App\Models\User;
use App\Repositories\PeriodeRepository;
use App\Services\Aparatur\LaporanKegiatan\KegiatanJabatanService;
use App\Services\TemporaryFileService;
use App\Traits\AuthTrait;
use Illuminate\Http\Request;

class KegiatanJabatanController extends Controller
{
    use AuthTrait;

    private PeriodeRepository $periodeRepository;
    private KegiatanJabatanService $kegiatanJabatanService;
    private TemporaryFileService $temporaryFileService;

    public function __construct(PeriodeRepository $periodeRepository, KegiatanJabatanService $kegiatanJabatanService, TemporaryFileService $temporaryFileService)
    {
        $this->periodeRepository = $periodeRepository;
        $this->kegiatanJabatanService = $kegiatanJabatanService;
        $this->temporaryFileService = $temporaryFileService;
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
        $periode = $this->periodeRepository->isActive();
        $user = $this->authUser();
        [
            $laporanKegiatanJabatanStatusValidasis,
            $laporanKegiatanJabatanStatusRevisis,
            $laporanKegiatanJabatanStatusSelesais,
            $laporanKegiatanJabatanStatusTolaks,
        ] = $this->kegiatanJabatanService->laporanKegiatanJabatanByUser($butirKegiatan, $user);
        $laporanKegiatanJabatanCount = $this->kegiatanJabatanService->laporanKegiatanJabatanCount($butirKegiatan, $user);
        $rencanas = $this->kegiatanJabatanService->rencanas($user);
        return view('aparatur.laporan-kegiatan.jabatan.show', compact(
            'laporanKegiatanJabatanStatusValidasis',
            'laporanKegiatanJabatanStatusRevisis',
            'laporanKegiatanJabatanStatusSelesais',
            'laporanKegiatanJabatanStatusTolaks',
            'laporanKegiatanJabatanCount',
            'user',
            'rencanas',
            'butirKegiatan',
            'periode'
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

    public function storeLaporan(StoreLaporanRequest $request, ButirKegiatan $butirKegiatan)
    {
        $this->kegiatanJabatanService->storeLaporan($request, $butirKegiatan);
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil dilaporkan'
        ]);
    }

    public function storeTmpFile(Request $request)
    {
        foreach ($request->doc_kegiatan_tmp as $file) {
            return $this->temporaryFileService->store($file, 'kegiatan');
        }
        return;
    }

    public function revertTmpFile(Request $request)
    {
        $this->temporaryFileService->revert($request->getContent());
    }
}
