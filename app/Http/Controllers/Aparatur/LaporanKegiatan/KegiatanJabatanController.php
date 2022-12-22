<?php

namespace App\Http\Controllers\Aparatur\LaporanKegiatan;

use App\Facades\Modules\DestructRoleFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\Aparatur\LaporanKegiatan\StoreLaporanRequest;
use App\Http\Requests\Aparatur\LaporanKegiatan\UpdateLaporanRequest;
use App\Models\ButirKegiatan;
use App\Models\LaporanKegiatanJabatan;
use App\Repositories\PeriodeRepository;
use App\Services\Aparatur\LaporanKegiatan\KegiatanJabatanService;
use App\Services\GeneratePdfService;
use App\Services\TemporaryFileService;
use App\Traits\AuthTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\KetentuanSkpFungsional;
use App\Repositories\RekapitulasiKegiatanRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Periode;

class KegiatanJabatanController extends Controller
{
    use AuthTrait;

    private PeriodeRepository $periodeRepository;
    private KegiatanJabatanService $kegiatanJabatanService;
    private TemporaryFileService $temporaryFileService;
    private GeneratePdfService $generatePdfService;
    private RekapitulasiKegiatanRepository $rekapitulasiKegiatanRepository;

    public function __construct(PeriodeRepository $periodeRepository, KegiatanJabatanService $kegiatanJabatanService, TemporaryFileService $temporaryFileService, GeneratePdfService $generatePdfService, RekapitulasiKegiatanRepository $rekapitulasiKegiatanRepository)
    {
        $this->periodeRepository = $periodeRepository;
        $this->kegiatanJabatanService = $kegiatanJabatanService;
        $this->temporaryFileService = $temporaryFileService;
        $this->generatePdfService = $generatePdfService;
        $this->rekapitulasiKegiatanRepository = $rekapitulasiKegiatanRepository;
    }

    public function index()
    {
        $periode = $this->periodeRepository->isActive();
        $user = $this->authUser()->load(['userAparatur.provinsi.kabkotas', 'ketentuanSkpFungsional', 'dokKepegawaians', 'dokKompetensis', 'rencanas', 'rekapitulasiKegiatan.historyRekapitulasiKegiatans' => function ($query) {
            $query->orderBy('id', 'desc');
        }]);
        $judul = 'Laporan Kegiatan Jabatan';
        $skp = $user?->ketentuanSkpFungsional;
        $ketentuan_ak = $this->kegiatanJabatanService->ketentuanNilai(DestructRoleFacade::getRoleFungsionalFirst($user->roles)?->id, $user?->userAparatur?->pangkat_golongan_tmt_id);
        $ak_diterima = $this->kegiatanJabatanService->sumScoreByUser($user->id);
        $ak_jabatan = DB::table('laporan_kegiatan_jabatans')->where('user_id', Auth::user()->id)->sum('score');
        $historyRekapitulasiKegiatans = $user?->rekapitulasiKegiatan?->historyRekapitulasiKegiatans ?? [];
        return view('aparatur.laporan-kegiatan.jabatan.index', compact('periode', 'user', 'judul', 'historyRekapitulasiKegiatans', 'skp', 'ketentuan_ak', 'ak_diterima', 'ak_jabatan'));
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
        ] = $this->kegiatanJabatanService->laporanKegiatanJabatanByUser($butirKegiatan, $user);
        $laporanKegiatanJabatanLast = $this->kegiatanJabatanService->laporanLast($butirKegiatan, $user);
        $laporanKegiatanJabatanCount = $this->kegiatanJabatanService->laporanKegiatanJabatanCount($butirKegiatan, $user);
        $rencanas = $this->kegiatanJabatanService->rencanas($user);
        $historyRekapitulasiKegiatans = $user?->rekapitulasiKegiatan?->historyRekapitulasiKegiatans ?? [];
        return view('aparatur.laporan-kegiatan.jabatan.show', compact(
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
            $role = $this->getFirstRole();
            $search = str($request->search)->lower()->trim();
            $unsurs = $this->kegiatanJabatanService->loadUnsurs($search, $role);
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
        $this->kegiatanJabatanService->storeLaporan($request, $this->authUser(), $butirKegiatan);
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
            'data' => $this->kegiatanJabatanService->edit($laporanKegiatanJabatan)
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
        $this->kegiatanJabatanService->update($request, $laporanKegiatanJabatan);
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
        $user = $this->authUser()->load(['userAparatur']);
        if (!isset($user?->userAparatur?->file_ttd)) {
            throw ValidationException::withMessages(['Maaf, Anda Belum Melengkapi Profil']);
        }
        $rekapitulasiKegiatan = $this->kegiatanJabatanService->generateDocuments($user);
        return response()->json([
            'message' => 'Berhasil',
            'data' => $rekapitulasiKegiatan?->link_pernyataan
        ]);
    }

    public function sendRekap()
    {
        $periode = $this->periodeRepository->isActive();
        $rekap = $this->rekapitulasiKegiatanRepository->getRekapByFungsionalAndPeriode(auth()->user(), $periode);
        if (!$rekap) {
            throw ValidationException::withMessages(['Data Rekapitulasi Belum Dibuat']);
        }
        if (in_array($rekap->is_send, [1, 2, 3])) {
            throw ValidationException::withMessages(['Data rekapitulasi sudah dikirim']);
        }
        $this->rekapitulasiKegiatanRepository->sendToAtasanLangsung($rekap);
        return response()->json([
            'success' => 200,
            'message' => 'Berhasil dikirim'
        ]);
    }

    public function sendSKP(Request $request)
    {
        $periode = Periode::query()->where('is_active', true)->first();
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
                    'periode_id' => $periode->id,
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
