<?php

namespace App\Services\Aparatur\LaporanKegiatan;

use App\Models\ButirKegiatan;
use App\Models\DokumenKegiatanJabatan;
use App\Models\HistoryKegiatanJabatan;
use App\Models\LaporanKegiatanJabatan;
use App\Models\Periode;
use App\Models\Role;
use App\Models\TemporaryFile;
use App\Models\Unsur;
use App\Models\User;
use App\Repositories\Aparatur\LaporanKegiatan\KegiatanJabatanRepository;
use App\Repositories\PeriodeRepository;
use App\Repositories\RencanaRepository;
use App\Repositories\TemporaryFileRepository;
use App\Services\KegiatanJabatanService as ServicesKegiatanJabatanService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KegiatanJabatanService
{
    private KegiatanJabatanRepository $kegiatanJabatanRepository;
    private RencanaRepository $rencanaRepository;
    private TemporaryFileRepository $temporaryFileRepository;
    private ServicesKegiatanJabatanService $kegiatanJabatanService;
    private PeriodeRepository $periodeRepository;

    public function __construct(KegiatanJabatanRepository $kegiatanJabatanRepository, RencanaRepository $rencanaRepository, TemporaryFileRepository $temporaryFileRepository, ServicesKegiatanJabatanService $kegiatanJabatanService, PeriodeRepository $periodeRepository)
    {
        $this->kegiatanJabatanRepository = $kegiatanJabatanRepository;
        $this->rencanaRepository = $rencanaRepository;
        $this->temporaryFileRepository = $temporaryFileRepository;
        $this->kegiatanJabatanService = $kegiatanJabatanService;
        $this->periodeRepository = $periodeRepository;
    }

    public function loadUnsurs(Periode $periode, string $search, Role $role)
    {
        $unsurs = Unsur::query()
            ->where('jenis_kegiatan_id', 1)
            ->where('periode_id', $periode->id)
            ->with(['role' => function ($query) use ($role) {
                $query->whereIn('id', [$role->id + 1, $role->id - 1, $role->id]);
            }, 'subUnsurs.butirKegiatans'])
            ->whereHas('role', function ($query) use ($search, $role) {
                $query->where(
                    'nama',
                    'like',
                    "%$search%"
                );
            })
            ->when($search, function ($query) use ($search) {
                $query->where('nama', 'like', "%$search%")
                    ->orWhereHas('subUnsurs', function ($query) use ($search) {
                        $query->where('nama', 'like', "%$search%")
                            ->orWhereHas('butirKegiatans', function ($query) use ($search) {
                                $query->where('nama', 'like', "%$search%");
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

    public function storeLaporan(Request $request, User $user, ButirKegiatan $butirKegiatan): LaporanKegiatanJabatan
    {
        $role = $butirKegiatan->load('subUnsur.unsur.role')->subUnsur->unsur->role;
        $periode = $this->periodeRepository->isActive();
        $laporanKegiatanJabatan = $this->kegiatanJabatanRepository->store($request, $role, $user, $butirKegiatan, $request->current_date, $periode->id);
        $historyKegiatanJabatan = $this->kegiatanJabatanRepository->storeHistoryKegiatanJabatan($laporanKegiatanJabatan, HistoryKegiatanJabatan::STATUS_LAPORKAN, HistoryKegiatanJabatan::ICON_KEYBOARD, $request->detail_kegiatan, 'Berhasil dilaporkan', $request->current_date);
        foreach ($request->doc_kegiatan_tmp as $doc_kegiatan_tmp) {
            $tmpFile = $this->temporaryFileRepository->getByFolder($doc_kegiatan_tmp);
            if ($tmpFile) {
                Storage::copy("tmp/$tmpFile->folder/$tmpFile->name", "kegiatan/$tmpFile->name");
                $this->kegiatanJabatanRepository->storeDokumenKegiatanJabatan($laporanKegiatanJabatan, $tmpFile);
                $this->kegiatanJabatanRepository->storeHistoryDokumenKegiatanJabatan($historyKegiatanJabatan, $tmpFile);
                $this->temporaryFileRepository->destroy($tmpFile);
                Storage::deleteDirectory("tmp/$tmpFile->folder");
            }
        }
        $this->kegiatanJabatanRepository->storeHistoryKegiatanJabatan(
            laporanKegiatanJabatan: $laporanKegiatanJabatan,
            status: HistoryKegiatanJabatan::STATUS_VALIDASI,
            icon: HistoryKegiatanJabatan::ICON_SPINNER,
            keterangan: 'Sedang divalidasi oleh Atasan Langsung',
            current_date: $laporanKegiatanJabatan->current_date
        );
        return $laporanKegiatanJabatan;
    }

    public function edit(LaporanKegiatanJabatan $laporanKegiatanJabatan)
    {
        $files = [];
        foreach ($laporanKegiatanJabatan->dokumenKegiatanJabatans as $dokumenKegiatanJabatan) {
            array_push($files, $this->struktur($dokumenKegiatanJabatan));
        }
        return $files;
    }

    public function update(Request $request, LaporanKegiatanJabatan $laporanKegiatanJabatan)
    {
        $laporanKegiatanJabatan->load('dokumenKegiatanJabatans');
        $laporanKegiatanJabatan->update([
            'detail_kegiatan' => $request->detail_kegiatan,
            'status' => LaporanKegiatanJabatan::VALIDASI
        ]);
        $historyKegiatanJabatan = $this->kegiatanJabatanRepository->storeHistoryKegiatanJabatan(
            $laporanKegiatanJabatan,
            HistoryKegiatanJabatan::STATUS_LAPORKAN,
            HistoryKegiatanJabatan::ICON_PAPER_PLANE,
            $request->detail_kegiatan,
            'Kirim revisi Laporan kegiatan',
            $laporanKegiatanJabatan->current_date
        );
        $this->kegiatanJabatanRepository->storeHistoryKegiatanJabatan(
            laporanKegiatanJabatan: $laporanKegiatanJabatan,
            status: HistoryKegiatanJabatan::STATUS_VALIDASI,
            icon: HistoryKegiatanJabatan::ICON_SPINNER,
            keterangan: 'Sedang divalidasi oleh Atasan Langsung',
            current_date: $laporanKegiatanJabatan->current_date
        );
        $laporanKegiatanJabatan->dokumenKegiatanJabatans()->whereNotIn('id', $request->doc_kegiatan_tmp)->delete();
        foreach ($request->doc_kegiatan_tmp as $doc_kegiatan_tmp) {
            $tmpFile = $this->temporaryFileRepository->getByFolder($doc_kegiatan_tmp);
            if ($tmpFile instanceof TemporaryFile) {
                Storage::copy("tmp/$tmpFile->folder/$tmpFile->name", "kegiatan/$tmpFile->name");
                $this->kegiatanJabatanRepository->storeDokumenKegiatanJabatan($laporanKegiatanJabatan, $tmpFile);
                $this->kegiatanJabatanRepository->storeHistoryDokumenKegiatanJabatan($historyKegiatanJabatan, $tmpFile);
                $this->temporaryFileRepository->destroy($tmpFile);
                Storage::deleteDirectory("tmp/$tmpFile->folder");
            }
        }
        foreach ($laporanKegiatanJabatan->dokumenKegiatanJabatans()->whereIn('id', $request->doc_kegiatan_tmp)->get() as $dokumenKegiatanJabatan) {
            $tmpFile = new TemporaryFile([
                'name' => $dokumenKegiatanJabatan->name,
                'size' => $dokumenKegiatanJabatan->size,
                'type' => $dokumenKegiatanJabatan->type
            ]);
            $this->kegiatanJabatanRepository->storeHistoryDokumenKegiatanJabatan($historyKegiatanJabatan, $tmpFile);
        }
    }

    public function struktur(DokumenKegiatanJabatan $dokumenKegiatanJabatan)
    {
        return [
            'source' => $dokumenKegiatanJabatan->id,
            'options' => [
                'type' => 'local',
                'file' => [
                    'name' => $dokumenKegiatanJabatan->name,
                    'size' => $dokumenKegiatanJabatan->size,
                    'type' => $dokumenKegiatanJabatan->type
                ],
                'metadata' => [
                    'poster' => $dokumenKegiatanJabatan->link
                ]
            ]
        ];
    }

    public function laporanKegiatanJabatanByUser($butirKegiatan, $user)
    {
        return $this->kegiatanJabatanService->laporanKegiatanJabatanByUser($butirKegiatan, $user);
    }

    public function laporanKegiatanJabatanCount(ButirKegiatan $butirKegiatan, User $user): int
    {
        return $this->kegiatanJabatanService->laporanKegiatanJabatanCount($butirKegiatan, $user);
    }
}