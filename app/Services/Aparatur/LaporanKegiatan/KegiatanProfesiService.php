<?php

namespace App\Services\Aparatur\LaporanKegiatan;

use App\Models\ButirKegiatan;
use App\Models\DokumenKegiatanJabatan;
use App\Models\DokumenPenunjangProfesi;
use App\Models\HistoryKegiatanJabatan;
use App\Models\HistoryPenunjangProfesi;
use App\Models\JenisKegiatan;
use App\Models\LaporanKegiatanJabatan;
use App\Models\LaporanKegiatanPenunjangProfesi;
use App\Models\Periode;
use App\Models\Role;
use App\Models\SubButirKegiatan;
use App\Models\TemporaryFile;
use App\Models\Unsur;
use App\Models\User;
use App\Repositories\Aparatur\LaporanKegiatan\KegiatanJabatanRepository;
use App\Repositories\Aparatur\LaporanKegiatan\KegiatanPenunjangProfesiRepository;
use App\Repositories\KetentuanNilaiRepository;
use App\Repositories\LaporanKegiatanPenunjangProfesiRepository;
use App\Repositories\PeriodeRepository;
use App\Repositories\RekapitulasiKegiatanRepository;
use App\Repositories\RencanaRepository;
use App\Repositories\TemporaryFileRepository;
use App\Services\GeneratePdfService;
use App\Services\KegiatanJabatanService as ServicesKegiatanJabatanService;
use App\Traits\ScoringTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class KegiatanProfesiService
{
    use ScoringTrait;

    protected KegiatanPenunjangProfesiRepository $kegiatanPenunjangProfesiRepository;
    protected RencanaRepository $rencanaRepository;
    protected TemporaryFileRepository $temporaryFileRepository;
    protected ServicesKegiatanJabatanService $kegiatanJabatanService;
    protected PeriodeRepository $periodeRepository;
    protected RekapitulasiKegiatanRepository $rekapitulasiKegiatanRepository;
    protected GeneratePdfService $generatePdfService;
    protected LaporanKegiatanPenunjangProfesiRepository $laporanKegiatanPenunjangProfesiRepository;
    protected KetentuanNilaiRepository $ketentuanNilaiRepository;

    public function __construct(
        KegiatanPenunjangProfesiRepository $kegiatanPenunjangProfesiRepository,
        RencanaRepository $rencanaRepository,
        TemporaryFileRepository $temporaryFileRepository,
        ServicesKegiatanJabatanService $kegiatanJabatanService,
        PeriodeRepository $periodeRepository,
        RekapitulasiKegiatanRepository $rekapitulasiKegiatanRepository,
        GeneratePdfService $generatePdfService,
        LaporanKegiatanPenunjangProfesiRepository $laporanKegiatanPenunjangProfesiRepository,
        KetentuanNilaiRepository $ketentuanNilaiRepository
    ) {
        $this->kegiatanPenunjangProfesiRepository = $kegiatanPenunjangProfesiRepository;
        $this->rencanaRepository = $rencanaRepository;
        $this->temporaryFileRepository = $temporaryFileRepository;
        $this->kegiatanJabatanService = $kegiatanJabatanService;
        $this->periodeRepository = $periodeRepository;
        $this->rekapitulasiKegiatanRepository = $rekapitulasiKegiatanRepository;
        $this->generatePdfService = $generatePdfService;
        $this->laporanKegiatanPenunjangProfesiRepository = $laporanKegiatanPenunjangProfesiRepository;
        $this->ketentuanNilaiRepository = $ketentuanNilaiRepository;
    }

    public function loadUnsurs(string $search, Role $role)
    {
        $unsurs = Unsur::query()
            ->where('jenis_kegiatan_id', JenisKegiatan::JENIS_KEGIATAN_PROFESI)
            ->where('jenis_aparatur', $this->groupRole($role))
            ->withWhereHas('subUnsurs', function ($query) use ($role) {
                $query->withWhereHas('butirKegiatans', function ($query) use ($role) {
                    $query->with('role', function ($query) use ($role) {
                        $query->whereIn('id', $this->limiRole($role->id));
                    })->with('subButirKegiatans', function ($query) use ($role) {
                        $query->with('role', function ($query) use ($role) {
                            $query->whereIn('id', $this->limiRole($role->id));
                        });
                    });
                });
            })
            ->when($search, function ($query) use ($search) {
                $query->where('nama', 'like', "%$search%")
                    ->orWhereHas('subUnsurs', function ($query) use ($search) {
                        $query->where('nama', 'like', "%$search%")
                            ->orWhereHas('butirKegiatans', function ($query) use ($search) {
                                $query->where('nama', 'like', "%$search%")
                                    ->whereHas('role', function ($query) use ($search) {
                                        $query->where(
                                            'nama',
                                            'like',
                                            "%$search%"
                                        );
                                    });
                            });
                    });
            })
            ->get();
        return $unsurs;
    }

    public function rencanas(User $user)
    {
        return $this->rencanaRepository->getAllByUser($user);
    }

    public function storeLaporan(Request $request, User $user, ?ButirKegiatan $butirKegiatan, ?SubButirKegiatan $subButirKegiatan)
    {
        if (!is_null($butirKegiatan)) {
            $role = $butirKegiatan->load('role')?->role;
        } else {
            $role = $subButirKegiatan->load('role')?->role;
        }
        $periode = $this->periodeRepository->isActive();
        $laporanKegiatanPenunjangProfesi = $this->kegiatanPenunjangProfesiRepository->store($request, $role, $user, $butirKegiatan, $subButirKegiatan, $request->current_date, $periode->id);
        $historyKegiatanJabatan = $this->kegiatanPenunjangProfesiRepository->storeHistoryPenunjangProfesi($laporanKegiatanPenunjangProfesi, HistoryPenunjangProfesi::STATUS_LAPORKAN, HistoryPenunjangProfesi::ICON_KEYBOARD, $request->detail_kegiatan, 'Berhasil dilaporkan', $request->current_date);
        if (isset($request->doc_kegiatan_tmp[0]) && $request->doc_kegiatan_tmp[0] !== null) {
            foreach ($request->doc_kegiatan_tmp as $doc_kegiatan_tmp) {
                $tmpFile = $this->temporaryFileRepository->getByFolder($doc_kegiatan_tmp);
                if ($tmpFile) {
                    Storage::copy("tmp/$tmpFile->folder/$tmpFile->name", "kegiatan/$tmpFile->name");
                    $this->kegiatanPenunjangProfesiRepository->storeDokumenPenunjangProfesi($laporanKegiatanPenunjangProfesi, $tmpFile);
                    $this->kegiatanPenunjangProfesiRepository->storeHistoryDokumenPenunjangProfesi($historyKegiatanJabatan, $tmpFile);
                    $this->temporaryFileRepository->destroy($tmpFile);
                    Storage::deleteDirectory("tmp/$tmpFile->folder");
                }
            }
        }
        $this->kegiatanPenunjangProfesiRepository->storeHistoryPenunjangProfesi(
            laporanKegiatanPenunjangProfesi: $laporanKegiatanPenunjangProfesi,
            status: HistoryPenunjangProfesi::STATUS_VALIDASI,
            icon: HistoryPenunjangProfesi::ICON_SPINNER,
            keterangan: 'Sedang divalidasi oleh Atasan Langsung',
            detail_kegiatan: null,
            current_date: $laporanKegiatanPenunjangProfesi->current_date
        );
        return $laporanKegiatanPenunjangProfesi;
    }

    public function edit(LaporanKegiatanPenunjangProfesi $laporanKegiatanPenunjangProfesi)
    {
        $files = [];
        foreach ($laporanKegiatanPenunjangProfesi->dokumenPenunjangProfesis as $dokuemnPenunjangProfesi) {
            array_push($files, $this->struktur($dokuemnPenunjangProfesi));
        }
        return $files;
    }

    public function update(Request $request, LaporanKegiatanPenunjangProfesi $laporanKegiatanPenunjangProfesi)
    {
        $laporanKegiatanPenunjangProfesi->load('dokumenPenunjangProfesis');
        $laporanKegiatanPenunjangProfesi->update([
            'detail_kegiatan' => $request->detail_kegiatan,
            'status' => LaporanKegiatanPenunjangProfesi::VALIDASI
        ]);
        $historyKegiatanJabatan = $this->kegiatanPenunjangProfesiRepository->storeHistoryPenunjangProfesi(
            $laporanKegiatanPenunjangProfesi,
            HistoryPenunjangProfesi::STATUS_LAPORKAN,
            HistoryPenunjangProfesi::ICON_PAPER_PLANE,
            $request->detail_kegiatan,
            'Kirim revisi Laporan kegiatan',
            $laporanKegiatanPenunjangProfesi->current_date
        );
        $this->kegiatanPenunjangProfesiRepository->storeHistoryPenunjangProfesi(
            laporanKegiatanPenunjangProfesi: $laporanKegiatanPenunjangProfesi,
            status: HistoryPenunjangProfesi::STATUS_VALIDASI,
            icon: HistoryPenunjangProfesi::ICON_SPINNER,
            detail_kegiatan: null,
            keterangan: 'Sedang divalidasi oleh Atasan Langsung',
            current_date: $laporanKegiatanPenunjangProfesi->current_date
        );
        $laporanKegiatanPenunjangProfesi->dokumenKegiatanJabatans()->whereNotIn('id', $request->doc_kegiatan_tmp)->delete();
        foreach ($request->doc_kegiatan_tmp as $doc_kegiatan_tmp) {
            $tmpFile = $this->temporaryFileRepository->getByFolder($doc_kegiatan_tmp);
            if ($tmpFile instanceof TemporaryFile) {
                Storage::copy("tmp/$tmpFile->folder/$tmpFile->name", "kegiatan/$tmpFile->name");
                $this->kegiatanPenunjangProfesiRepository->storeDokumenPenunjangProfesi($laporanKegiatanPenunjangProfesi, $tmpFile);
                $this->kegiatanPenunjangProfesiRepository->storeHistoryDokumenPenunjangProfesi($historyKegiatanJabatan, $tmpFile);
                $this->temporaryFileRepository->destroy($tmpFile);
                Storage::deleteDirectory("tmp/$tmpFile->folder");
            }
        }
        foreach ($laporanKegiatanPenunjangProfesi->dokumenKegiatanJabatans()->whereIn('id', $request->doc_kegiatan_tmp)->get() as $dokumenKegiatanJabatan) {
            $tmpFile = new TemporaryFile([
                'name' => $dokumenKegiatanJabatan->name,
                'size' => $dokumenKegiatanJabatan->size,
                'type' => $dokumenKegiatanJabatan->type
            ]);
            $this->kegiatanPenunjangProfesiRepository->storeHistoryDokumenPenunjangProfesi($historyKegiatanJabatan, $tmpFile);
        }
    }

    public function struktur(DokumenPenunjangProfesi $dokumenPenunjangProfesi)
    {
        return [
            'source' => $dokumenPenunjangProfesi->id,
            'options' => [
                'type' => 'local',
                'file' => [
                    'name' => $dokumenPenunjangProfesi->name,
                    'size' => $dokumenPenunjangProfesi->size,
                    'type' => $dokumenPenunjangProfesi->type
                ],
                'metadata' => [
                    'poster' => $dokumenPenunjangProfesi->link
                ]
            ]
        ];
    }

    public function sumScoreByUser($user_id, $periode)
    {
        return $this->laporanKegiatanPenunjangProfesiRepository->sumScoreByUser($user_id, $periode);
    }

    public function ketentuanNilai($role_id, $pangkat_id)
    {
        return $this->ketentuanNilaiRepository->getByRolePangkat($role_id, $pangkat_id);
    }

    public function laporanKegiatanPenunjangProfesiByUser(?ButirKegiatan $butirKegiatan, ?SubButirKegiatan $subButirKegiatan, User $user, Periode $periode)
    {
        return [
            $this->kegiatanPenunjangProfesiRepository->laporanKegiatanPenunjangProfesiStatusValidasi($butirKegiatan, $subButirKegiatan, $user, $periode),
            $this->kegiatanPenunjangProfesiRepository->laporanKegiatanPenunjangProfesiStatusRevisi($butirKegiatan, $subButirKegiatan, $user, $periode),
            $this->kegiatanPenunjangProfesiRepository->laporanKegiatanPenunjangProfesiStatusSelesai($butirKegiatan, $subButirKegiatan, $user, $periode),
            $this->kegiatanPenunjangProfesiRepository->laporanKegiatanPenunjangProfesiStatusTolak($butirKegiatan, $subButirKegiatan, $user, $periode),
        ];
    }

    public function laporanKegiatanPenunjangProfesiCount(?ButirKegiatan $butirKegiatan, ?SubButirKegiatan $subButirKegiatan, User $user, Periode $periode): int
    {
        return $this->kegiatanPenunjangProfesiRepository->laporanKegiatanPenunjangProfesiCount($butirKegiatan, $subButirKegiatan, $user, $periode);
    }

    public function laporanLast(?ButirKegiatan $butirKegiatan, ?SubButirKegiatan $subButirKegiatan, User $user, Periode $periode)
    {
        return $this->kegiatanPenunjangProfesiRepository->laporanLast($butirKegiatan, $subButirKegiatan, $user, $periode);
    }
}