<?php

namespace App\Services\Aparatur\LaporanKegiatan;

use App\Models\ButirKegiatan;
use App\Models\HistoryKegiatanJabatan;
use App\Models\LaporanKegiatanJabatan;
use App\Models\Periode;
use App\Models\Role;
use App\Models\Unsur;
use App\Models\User;
use App\Repositories\Aparatur\LaporanKegiatan\KegiatanJabatanRepository;
use App\Repositories\RencanaRepository;
use App\Repositories\TemporaryFileRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KegiatanJabatanService
{
    private KegiatanJabatanRepository $kegiatanJabatanRepository;
    private RencanaRepository $rencanaRepository;
    private TemporaryFileRepository $temporaryFileRepository;

    public function __construct(KegiatanJabatanRepository $kegiatanJabatanRepository, RencanaRepository $rencanaRepository, TemporaryFileRepository $temporaryFileRepository)
    {
        $this->kegiatanJabatanRepository = $kegiatanJabatanRepository;
        $this->rencanaRepository = $rencanaRepository;
        $this->temporaryFileRepository = $temporaryFileRepository;
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

    public function laporanKegiatanJabatanByUser(ButirKegiatan $butirKegiatan, User $user)
    {
        return [
            $this->kegiatanJabatanRepository->laporanKegiatanJabatanStatusValidasi($butirKegiatan, $user),
            $this->kegiatanJabatanRepository->laporanKegiatanJabatanStatusRevisi($butirKegiatan, $user),
            $this->kegiatanJabatanRepository->laporanKegiatanJabatanStatusSelesai($butirKegiatan, $user),
            $this->kegiatanJabatanRepository->laporanKegiatanJabatanStatusTolak($butirKegiatan, $user),
        ];
    }

    public function laporanKegiatanJabatanCount(ButirKegiatan $butirKegiatan, User $user)
    {
        return $this->kegiatanJabatanRepository->laporanKegiatanJabatanCount($butirKegiatan, $user);
    }

    public function rencanas(User $user)
    {
        return $this->rencanaRepository->getAllByUser($user);
    }

    public function storeLaporan(Request $request, ButirKegiatan $butirKegiatan): LaporanKegiatanJabatan
    {
        $role = $butirKegiatan->load('subUnsur.unsur.role')->subUnsur->unsur->role;
        $laporanKegiatanJabatan = $this->kegiatanJabatanRepository->store($request, $role, $butirKegiatan, $request->current_date);
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
        return $laporanKegiatanJabatan;
    }
}
