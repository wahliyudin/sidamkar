<?php

namespace App\Http\Controllers\AtasanLangsung\VerifikasiKegiatan;

use App\DataTables\AtasanLangsung\VerifikasiKegiatanDataTable;
use App\Facades\Modules\DestructRoleFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\AtasanLangsung\VerifikasiKegiatan\RevisiAndTolakRequest;
use App\Models\JenisKegiatan;
use App\Models\Role;
use App\Models\User;
use App\Services\AtasanLangsung\KegiatanPenunjangProfesiService;
use Illuminate\Http\Request;

class KegiatanProfesiController extends Controller
{
    private KegiatanPenunjangProfesiService $kegiatanPenunjangProfesiService;

    public function __construct(KegiatanPenunjangProfesiService $kegiatanPenunjangProfesiService)
    {
        $this->kegiatanPenunjangProfesiService = $kegiatanPenunjangProfesiService;
    }

    public function index(VerifikasiKegiatanDataTable $dataTable)
    {
        $judul = 'Verifikasi Kegiatan';
        return $dataTable->render('atasan-langsung.verifikasi-kegiatan.index', compact('judul'));
    }

    public function kegiatanProfesi($id)
    {
        $judul = 'Verifikasi Kegiatan';
        $periode = $this->kegiatanPenunjangProfesiService->periodeActive();
        $user = $this->kegiatanPenunjangProfesiService->getUserById($id);
        return view('atasan-langsung.verifikasi-kegiatan.profesi.index', compact('user', 'periode', 'judul'));
    }

    public function kegiatanProfesiShowButir($user, $butir)
    {
        $judul = 'Verifikasi Kegiatan';
        $user = $this->kegiatanPenunjangProfesiService->getUserById($user);
        $butirKegiatan = $this->kegiatanPenunjangProfesiService->getButirKegiatanById($butir);
        $periode = $this->kegiatanPenunjangProfesiService->periodeActive();
        [
            $laporanKegiatanPenunjangProfesiStatusValidasis,
            $laporanKegiatanPenunjangProfesiStatusRevisis,
            $laporanKegiatanPenunjangProfesiStatusSelesais,
            $laporanKegiatanPenunjangProfesiStatusTolaks,
        ] = $this->kegiatanPenunjangProfesiService->laporanKegiatanPenunjangProfesiByUser($butirKegiatan, null, $user);
        return view('atasan-langsung.verifikasi-kegiatan.profesi.butir-kegiatan.show', compact(
            'laporanKegiatanPenunjangProfesiStatusValidasis',
            'laporanKegiatanPenunjangProfesiStatusRevisis',
            'laporanKegiatanPenunjangProfesiStatusSelesais',
            'laporanKegiatanPenunjangProfesiStatusTolaks',
            'user',
            'butirKegiatan',
            'periode',
            'judul'
        ));
    }

    public function kegiatanProfesiShowSubButir($user, $subButir)
    {
        $judul = 'Verifikasi Kegiatan';
        $user = $this->kegiatanPenunjangProfesiService->getUserById($user);
        $subButirKegiatan = $this->kegiatanPenunjangProfesiService->getSubButirKegiatanById($subButir);
        $periode = $this->kegiatanPenunjangProfesiService->periodeActive();
        [
            $laporanKegiatanPenunjangProfesiStatusValidasis,
            $laporanKegiatanPenunjangProfesiStatusRevisis,
            $laporanKegiatanPenunjangProfesiStatusSelesais,
            $laporanKegiatanPenunjangProfesiStatusTolaks,
        ] = $this->kegiatanPenunjangProfesiService->laporanKegiatanPenunjangProfesiByUser(null, $subButirKegiatan, $user);
        return view('atasan-langsung.verifikasi-kegiatan.profesi.sub-butir-kegiatan.show', compact(
            'laporanKegiatanPenunjangProfesiStatusValidasis',
            'laporanKegiatanPenunjangProfesiStatusRevisis',
            'laporanKegiatanPenunjangProfesiStatusSelesais',
            'laporanKegiatanPenunjangProfesiStatusTolaks',
            'user',
            'subButirKegiatan',
            'periode',
            'judul'
        ));
    }

    public function loadUnsurs(Request $request, $id)
    {
        if ($request->ajax()) {
            $periode = $this->kegiatanPenunjangProfesiService->periodeActive();
            $search = str($request->search)->lower()->trim();
            $role = Role::query()->find($id);
            $unsurs = $this->kegiatanPenunjangProfesiService->loadUnsurs($periode, $search, $role, JenisKegiatan::JENIS_KEGIATAN_PROFESI);
            return response()->json([
                'unsurs' => $unsurs
            ]);
        }
    }

    public function verifikasi($id)
    {
        $this->kegiatanPenunjangProfesiService->verifikasi($id);
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil diverifikasi'
        ]);
    }

    public function revisi(RevisiAndTolakRequest $request, $laporan_id, $user_id)
    {
        $this->kegiatanPenunjangProfesiService->revisi($request, $laporan_id, $user_id);
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil direvisi'
        ]);
    }

    public function tolak(RevisiAndTolakRequest $request, $id)
    {
        $this->kegiatanPenunjangProfesiService->tolak($request, $id);
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil ditolak'
        ]);
    }
}