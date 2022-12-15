<?php

namespace App\Http\Controllers\Aparatur\LaporanKegiatan;

use App\Facades\Modules\DestructRoleFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\Aparatur\LaporanKegiatan\StoreLaporanRequest;
use App\Http\Requests\Aparatur\LaporanKegiatan\UpdateLaporanRequest;
use App\Models\ButirKegiatan;
use App\Models\KetentuanSkpFungsional;
use App\Models\LaporanKegiatanJabatan;
use App\Models\RekapitulasiKegiatan;
use App\Models\Unsur;
use App\Models\User;
use App\Repositories\PeriodeRepository;
use App\Services\Aparatur\LaporanKegiatan\KegiatanPenunjangService;
use App\Services\GeneratePdfService;
use App\Services\TemporaryFileService;
use App\Traits\AuthTrait;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KegiatanPenunjangController extends Controller
{
    use AuthTrait;

    private PeriodeRepository $periodeRepository;
    private KegiatanPenunjangService $kegiatanPenunjangService;
    private TemporaryFileService $temporaryFileService;
    private GeneratePdfService $generatePdfService;

    /**
     * __construct
     * Inject Service dan Repository
     *
     * @param PeriodeRepository $periodeRepository
     * @param KegiatanPenunjangService $kegiatanPenunjangService
     * @param TemporaryFileService $temporaryFileService
     * @return void
     */
    public function __construct(PeriodeRepository $periodeRepository, KegiatanPenunjangService $kegiatanPenunjangService, TemporaryFileService $temporaryFileService, GeneratePdfService $generatePdfService)
    {
        $this->periodeRepository = $periodeRepository;
        $this->kegiatanPenunjangService = $kegiatanPenunjangService;
        $this->temporaryFileService = $temporaryFileService;
        $this->generatePdfService = $generatePdfService;
    }

    /**
     * index
     * Menampilkan Unsur, SubUnsur, dan ButirKegiatan
     * Berdasarkan Jabatan Satu Tingkat diatasnya
     * Dan Satu Tingkat dibawahnya
     *
     * @return View
     */
    public function index(): View|Factory
    {
        $periode = $this->periodeRepository->isActive();
        $user = $this->authUser()->load(['userAparatur.provinsi.kabkotas', 'ketentuanSkpFungsional', 'dokKepegawaians', 'dokKompetensis', 'rencanas', 'rekapitulasiKegiatan.historyRekapitulasiKegiatans' => function ($query) {
            $query->orderBy('id', 'desc');
        }]);
        $judul = 'Laporan Kegiatan Jabatan';
        $skp = $user?->ketentuanSkpFungsional;
        $ketentuan_ak = $this->kegiatanPenunjangService->ketentuanNilai(DestructRoleFacade::getRoleFungsionalFirst($user->roles)?->id, $user?->userAparatur?->pangkat_golongan_tmt_id);
        $ak_diterima = $this->kegiatanPenunjangService->sumScoreByUser($user->id);
        $historyRekapitulasiKegiatans = $user?->rekapitulasiKegiatan?->historyRekapitulasiKegiatans ?? [];
        return view('aparatur.laporan-kegiatan.penunjang.index', compact('periode', 'user', 'judul', 'historyRekapitulasiKegiatans', 'skp', 'ketentuan_ak', 'ak_diterima'));
    }

    /**
     * show
     *
     * @param ButirKegiatan $butirKegiatan
     */
    public function show(ButirKegiatan $butirKegiatan)
    {
        $periode = $this->periodeRepository->isActive();
        $user = $this->authUser()->load(['rekapitulasiKegiatan.historyRekapitulasiKegiatans' => function ($query) {
            $query->orderBy('id', 'desc');
        }]);
        $judul = 'Laporan Kegiatan Jabatan';
        [
            $laporanKegiatanJabatanStatusValidasis,
            $laporanKegiatanJabatanStatusRevisis,
            $laporanKegiatanJabatanStatusSelesais,
            $laporanKegiatanJabatanStatusTolaks,
        ] = $this->kegiatanPenunjangService->laporanKegiatanJabatanByUser($butirKegiatan, $user);
        $laporanKegiatanJabatanLast = $this->kegiatanPenunjangService->laporanLast($butirKegiatan, $user);
        $laporanKegiatanJabatanCount = $this->kegiatanPenunjangService->laporanKegiatanJabatanCount($butirKegiatan, $user);
        $rencanas = $this->kegiatanPenunjangService->rencanas($user);
        $historyRekapitulasiKegiatans = $user?->rekapitulasiKegiatan?->historyRekapitulasiKegiatans ?? [];
        return view('aparatur.laporan-kegiatan.penunjang.show', compact(
            'laporanKegiatanJabatanStatusValidasis',
            'laporanKegiatanJabatanStatusRevisis',
            'laporanKegiatanJabatanStatusSelesais',
            'laporanKegiatanJabatanStatusTolaks',
            'laporanKegiatanJabatanCount',
            'laporanKegiatanJabatanLast',
            'user',
            'rencanas',
            'butirKegiatan',
            'periode',
            'judul',
            'historyRekapitulasiKegiatans'
        ));
    }

    /**
     * loadData
     * Mengirim Data Unsur, SubUnsur, dan ButirKegiatan
     * Berdasarkan Jabatan Satu Tingkat diatasnya
     * Dan Satu Tingkat dibawahnya
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function loadData(Request $request): JsonResponse|null
    {
        if ($request->ajax()) {
            $periode = $this->periodeRepository->isActive();
            $role = $this->getFirstRole();
            $search = str($request->search)->lower()->trim();
            $unsurs = $this->kegiatanPenunjangService->loadUnsurs($periode, $search, $role);
            return response()->json([
                'unsurs' => $unsurs
            ]);
        }
    }

    /**
     * storeLaporan
     *
     * @param StoreLaporanRequest $request
     * @param ButirKegiatan $butirKegiatan
     * @return JsonResponse
     */
    public function storeLaporan(StoreLaporanRequest $request, ButirKegiatan $butirKegiatan): JsonResponse
    {
        $this->kegiatanPenunjangService->storeLaporan($request, $this->authUser(), $butirKegiatan);
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil dilaporkan'
        ]);
    }

    /**
     * edit
     *
     * @param LaporanKegiatanJabatan $laporanKegiatanJabatan
     * @return JsonResponse
     */
    public function edit(LaporanKegiatanJabatan $laporanKegiatanJabatan): JsonResponse
    {
        return response()->json([
            'data' => $this->kegiatanPenunjangService->edit($laporanKegiatanJabatan)
        ]);
    }

    /**
     * update
     *
     * @param UpdateLaporanRequest $request
     * @param LaporanKegiatanJabatan $laporanKegiatanJabatan
     * @return JsonResponse
     */
    public function update(UpdateLaporanRequest $request, LaporanKegiatanJabatan $laporanKegiatanJabatan): JsonResponse
    {
        $this->kegiatanPenunjangService->update($request, $laporanKegiatanJabatan);
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil diperbaiki'
        ]);
    }

    /**
     * storeTmpFile
     *
     * @param Request $request
     * @return string
     */
    public function storeTmpFile(Request $request): string
    {
        foreach ($request->doc_kegiatan_tmp as $file) {
            return $this->temporaryFileService->store($file, 'kegiatan');
        }
    }

    /**
     * revertTmpFile
     *
     * @param Request $request
     * @return void
     */
    public function revertTmpFile(Request $request): void
    {
        $this->temporaryFileService->revert($request->getContent());
    }

    public function rekapitulasi()
    {
        $rekapitulasiKegiatan = $this->kegiatanPenunjangService->generateDocuments($this->authUser());
        return response()->json([
            'message' => 'Berhasil',
            'data' => $rekapitulasiKegiatan?->url_rekap
        ]);
    }

    public function sendRekap()
    {
        $periode = $this->periodeRepository->isActive();
        $rekap = RekapitulasiKegiatan::query()
            ->where('fungsional_id', auth()->user()->id)
            ->where('periode_id', $periode->id)
            ->first();
        if (!$rekap) {
            throw ValidationException::withMessages(['Data Rekapitulasi Belum Dibuat']);
        }
        if ($rekap->is_send == true) {
            throw ValidationException::withMessages(['Data rekapitulasi sudah dikirim']);
        }
        $rekap->update([
            'is_send' => true
        ]);
        return response()->json([
            'message' => 'Berhasil dikirim'
        ]);
    }

    public function sendSKP(Request $request)
    {
        try {
            $data = [
                'jenis_skp' => $request->jenis_skp,
                'nilai_skp' => $request->nilai_skp
            ];

            if ($request->jenis_skp == 'huruf') {
                KetentuanSkpFungsional::create([
                    'ketentuan_skp_id' => $data['nilai_skp'],
                    'user_id' => auth()->user()->id,
                    'nilai_skp' => null,
                    'status' => 0,
                    'file' => null
                ]);
            } else {
                KetentuanSkpFungsional::create([
                    'ketentuan_skp_id' => null,
                    'user_id' => auth()->user()->id,
                    'nilai_skp' => $request->nilai_skp,
                    'status' => 0,
                    'file' => null
                ]);
            }
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil Ditambahkan',
                $data
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => $e->getCode(),
                'message' => $e->getMessage()
            ]);
        }
    }
}