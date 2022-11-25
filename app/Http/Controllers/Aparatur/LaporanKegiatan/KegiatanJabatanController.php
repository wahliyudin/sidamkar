<?php

namespace App\Http\Controllers\Aparatur\LaporanKegiatan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Aparatur\LaporanKegiatan\StoreLaporanRequest;
use App\Http\Requests\Aparatur\LaporanKegiatan\UpdateLaporanRequest;
use App\Models\ButirKegiatan;
use App\Models\LaporanKegiatanJabatan;
use App\Models\RekapitulasiKegiatan;
use App\Models\Unsur;
use App\Models\User;
use App\Repositories\PeriodeRepository;
use App\Services\Aparatur\LaporanKegiatan\KegiatanJabatanService;
use App\Services\TemporaryFileService;
use App\Traits\AuthTrait;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class KegiatanJabatanController extends Controller
{
    use AuthTrait;

    private PeriodeRepository $periodeRepository;
    private KegiatanJabatanService $kegiatanJabatanService;
    private TemporaryFileService $temporaryFileService;

    /**
     * __construct
     * Inject Service dan Repository
     *
     * @param PeriodeRepository $periodeRepository
     * @param KegiatanJabatanService $kegiatanJabatanService
     * @param TemporaryFileService $temporaryFileService
     * @return void
     */
    public function __construct(PeriodeRepository $periodeRepository, KegiatanJabatanService $kegiatanJabatanService, TemporaryFileService $temporaryFileService)
    {
        $this->periodeRepository = $periodeRepository;
        $this->kegiatanJabatanService = $kegiatanJabatanService;
        $this->temporaryFileService = $temporaryFileService;
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
        $user = $this->authUser()->load(['rencanas', 'rekapitulasiKegiatan']);
        $judul = 'Laporan Kegiatan Jabatan';
        return view('aparatur.laporan-kegiatan.jabatan.index', compact('periode', 'user', 'judul'));
    }

    /**
     * show
     *
     * @param ButirKegiatan $butirKegiatan
     * @return View
     */
    public function show(ButirKegiatan $butirKegiatan): View|Factory
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
            $unsurs = $this->kegiatanJabatanService->loadUnsurs($periode, $search, $role);
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
        $periode = $this->periodeRepository->isActive();
        $user = User::query()->with([
            'mente.atasanLangsung.roles',
            'mente.atasanLangsung.userPejabatStruktural.pangkatGolonganTmt', 'roles',
            'userAparatur.pangkatGolonganTmt'
        ])->find(auth()->user()->id);
        if (!isset($user->userAparatur->pangkatGolonganTmt)) {
            throw ValidationException::withMessages(["Maaf anda belum melengkapi data diri anda"]);
        }
        if (!isset($user->mente->atasanLangsung)) {
            throw ValidationException::withMessages(["Maaf anda belum mempunyai atasan langsung"]);
        }
        if (!isset($user->mente->atasanLangsung->userPejabatStruktural->pangkatGolonganTmt)) {
            throw ValidationException::withMessages(["Maaf atasan langsung anda belum melengkapi data dirinya"]);
        }
        $unsurs = Unsur::query()
            ->kegiatanJabatan()
            ->withWhereHas('subUnsurs', function($query){
                $query->withWhereHas('butirKegiatans', function($query){
                    $query->withSum('laporanKegiatanJabatans', 'score')
                        ->withCount('laporanKegiatanJabatans')
                        ->withWhereHas('laporanKegiatanJabatans', function($query){
                        $query->where('user_id', $this->authUser()->id);
                    });
                });
            })
            ->get();
        $pdf = PDF::loadView('generate-pdf.old', compact('unsurs', 'user'))->setPaper('A4');
        $file_name = uniqid();
        Storage::put("rekapitulasi/$file_name.pdf", $pdf->output());
        $url = asset("storage/rekapitulasi/$file_name.pdf");
        $rekapitulasiKegiatan = RekapitulasiKegiatan::query()
            ->where('fungsional_id', $this->authUser()->id)
            ->where('periode_id', $periode->id)->first();
        if ($rekapitulasiKegiatan) {
            deleteImage($rekapitulasiKegiatan->file);
            $rekapitulasiKegiatan->update([
                'file' => $url,
                'file_name' => $file_name
            ]);
        } else {
            $rekapitulasiKegiatan = RekapitulasiKegiatan::query()->create([
                'fungsional_id' => $this->authUser()->id,
                'file' => $url,
                'file_name' => $file_name,
                'periode_id' => $periode->id
            ]);
            $rekapitulasiKegiatan->historyRekapitulasiKegiatans()->create([
                'struktural_id' => $user->mente->atasanLangsung->id,
                'content' => 'Rekapitulasi diterima Atasan Langsung'
            ]);
        }
        return response()->json([
            'message' => 'Berhasil',
            'data' => $url
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
            throw ValidationException::withMessages(['Data rekapitulasi tidak ditemukan']);
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
}