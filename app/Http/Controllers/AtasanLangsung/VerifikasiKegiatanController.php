<?php

namespace App\Http\Controllers\AtasanLangsung;

use App\DataTables\AtasanLangsung\VerifikasiKegiatanDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\AtasanLangsung\VerifikasiKegiatan\RevisiAndTolakRequest;
use App\Http\Requests\AtasanLangsung\VerifikasiKegiatan\RevisiRequest;
use App\Services\AtasanLangsung\VerifikasiKegiatanService;
use Illuminate\Http\Request;

class VerifikasiKegiatanController extends Controller
{
    private VerifikasiKegiatanService $verifikasiKegiatanService;

    public function __construct(VerifikasiKegiatanService $verifikasiKegiatanService)
    {
        $this->verifikasiKegiatanService = $verifikasiKegiatanService;
    }

    public function index(VerifikasiKegiatanDataTable $dataTable)
    {
        $judul = 'Pengajuan Kegiatan';
        return $dataTable->render('atasan-langsung.verifikasi-kegiatan.index', compact('judul'));
    }

    public function kegiatanJabatan($id)
    {
        $periode = $this->verifikasiKegiatanService->periodeActive();
        $user = $this->verifikasiKegiatanService->getUserById($id);
        return view('atasan-langsung.verifikasi-kegiatan.jabatan.index', compact('user', 'periode'));
    }

    public function kegiatanProfesi($id)
    {
        $periode = $this->verifikasiKegiatanService->periodeActive();
        $user = $this->verifikasiKegiatanService->getUserById($id);
        return view('atasan-langsung.verifikasi-kegiatan.profesi.index', compact('user', 'periode'));
    }

    public function kegiatanJabatanShow($user, $butir)
    {
        $user = $this->verifikasiKegiatanService->getUserById($user);
        $butirKegiatan = $this->verifikasiKegiatanService->getButirKegiatanById($butir);
        $periode = $this->verifikasiKegiatanService->periodeActive();
        [
            $laporanKegiatanJabatanStatusValidasis,
            $laporanKegiatanJabatanStatusRevisis,
            $laporanKegiatanJabatanStatusSelesais,
            $laporanKegiatanJabatanStatusTolaks,
        ] = $this->verifikasiKegiatanService->laporanKegiatanJabatanByUser($butirKegiatan, $user);
        return view('atasan-langsung.verifikasi-kegiatan.jabatan.show', compact(
            'laporanKegiatanJabatanStatusValidasis',
            'laporanKegiatanJabatanStatusRevisis',
            'laporanKegiatanJabatanStatusSelesais',
            'laporanKegiatanJabatanStatusTolaks',
            'user',
            'butirKegiatan',
            'periode'
        ));
    }

    public function loadUnsurs(Request $request, $id)
    {
        if ($request->ajax()) {
            $periode = $this->verifikasiKegiatanService->periodeActive();
            $search = str($request->search)->lower()->trim();
            $unsurs = $this->verifikasiKegiatanService->loadUnsurs($periode, $search, $id);
            return response()->json([
                'unsurs' => $unsurs
            ]);
        }
    }

    public function verifikasi($id)
    {
        $this->verifikasiKegiatanService->verifikasi($id);
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil diverifikasi'
        ]);
    }

    public function revisi(RevisiAndTolakRequest $request, $laporan_id, $user_id)
    {
        $this->verifikasiKegiatanService->revisi($request, $laporan_id, $user_id);
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil direvisi'
        ]);
    }

    public function tolak(RevisiAndTolakRequest $request, $id)
    {
        $this->verifikasiKegiatanService->tolak($request, $id);
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil ditolak'
        ]);
    }
}
