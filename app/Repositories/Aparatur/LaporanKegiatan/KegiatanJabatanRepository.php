<?php

namespace App\Repositories\Aparatur\LaporanKegiatan;

use App\Models\ButirKegiatan;
use App\Models\DokumenKegiatanJabatan;
use App\Models\HistoryDokumenKegiatanJabatan;
use App\Models\HistoryKegiatanJabatan;
use App\Models\LaporanKegiatanJabatan;
use App\Models\Role;
use App\Models\TemporaryFile;
use App\Models\User;
use App\Traits\AuthTrait;
use App\Traits\KodeLaporanKegiatanTrait;
use App\Traits\ScoringTrait;
use Illuminate\Http\Request;

class KegiatanJabatanRepository
{
    use KodeLaporanKegiatanTrait, ScoringTrait, AuthTrait;

    private LaporanKegiatanJabatan $laporanKegiatanJabatan;

    public function __construct(LaporanKegiatanJabatan $laporanKegiatanJabatan)
    {
        $this->laporanKegiatanJabatan = $laporanKegiatanJabatan;
    }

    private function laporanKegiatanJabatanByUser(ButirKegiatan $butirKegiatan, User $user)
    {
        return $this->laporanKegiatanJabatan->query()
            ->with(['rencana', 'dokumenKegiatanJabatans', 'butirKegiatan.subUnsur.unsur'])
            ->whereHas('rencana', function ($query) use ($user) {
                $query->where('user_id', $user->id)->with(['user.roles', 'user.userAparatur']);
            })
            ->where('butir_kegiatan_id', $butirKegiatan->id)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function laporanKegiatanJabatanCount(ButirKegiatan $butirKegiatan, User $user): int
    {
        return $this->laporanKegiatanJabatanByUser($butirKegiatan, $user)->count();
    }

    public function laporanKegiatanJabatanStatusValidasi(ButirKegiatan $butirKegiatan, User $user)
    {
        return $this->laporanKegiatanJabatanByUser($butirKegiatan, $user)->where('status', LaporanKegiatanJabatan::VALIDASI);
    }

    public function laporanKegiatanJabatanStatusRevisi(ButirKegiatan $butirKegiatan, User $user)
    {
        return $this->laporanKegiatanJabatanByUser($butirKegiatan, $user)->where('status', LaporanKegiatanJabatan::REVISI);
    }

    public function laporanKegiatanJabatanStatusSelesai(ButirKegiatan $butirKegiatan, User $user)
    {
        return $this->laporanKegiatanJabatanByUser($butirKegiatan, $user)->where('status', LaporanKegiatanJabatan::SELESAI);
    }

    public function laporanKegiatanJabatanStatusTolak(ButirKegiatan $butirKegiatan, User $user)
    {
        return $this->laporanKegiatanJabatanByUser($butirKegiatan, $user)->where('status', LaporanKegiatanJabatan::TOLAK);
    }

    /**
     * store
     *
     * @param Request $request
     * @param Role $role
     * @param ButirKegiatan $butirKegiatan
     * @return LaporanKegiatanJabatan
     */
    public function store(Request $request, Role $role, ButirKegiatan $butirKegiatan, $current_date): LaporanKegiatanJabatan
    {
        $data = [
            'kode' => $this->generateKodeButir($butirKegiatan, $this->laporanKegiatanJabatan),
            'rencana_id' => $request->rencana_id,
            'butir_kegiatan_id' => $butirKegiatan->id,
            'detail_kegiatan' => $request->detail_kegiatan,
            'score' => $this->getScore($this->getFirstRole()->id, $role->id, $butirKegiatan->score),
            'status' => $this->laporanKegiatanJabatan::VALIDASI,
            'current_date' => $current_date
        ];
        return $this->laporanKegiatanJabatan->query()->create($data);
    }

    public function storeHistoryKegiatanJabatan(LaporanKegiatanJabatan $laporanKegiatanJabatan, int $status, int $icon, string $detail_kegiatan = null, string $keterangan, $current_date): HistoryKegiatanJabatan
    {
        return $laporanKegiatanJabatan->historyKegiatanJabatans()->create([
            'status' => $status,
            'current_date' => $current_date,
            'icon' => $icon,
            'detail_kegiatan' => $detail_kegiatan,
            'keterangan' => $keterangan,
        ]);
    }

    public function storeDokumenKegiatanJabatan(LaporanKegiatanJabatan $laporanKegiatanJabatan, TemporaryFile $temporaryFile): DokumenKegiatanJabatan
    {
        return $laporanKegiatanJabatan->dokumenKegiatanJabatans()->create([
            'link' => url("storage/kegiatan/$temporaryFile->name"),
            'name' => $temporaryFile->name,
            'size' => $temporaryFile->size,
            'type' => $temporaryFile->type
        ]);
    }

    public function storeHistoryDokumenKegiatanJabatan(HistoryKegiatanJabatan $historyKegiatanJabatan, TemporaryFile $temporaryFile): HistoryDokumenKegiatanJabatan
    {
        return $historyKegiatanJabatan->historyDokumenKegiatanJabatans()->create([
            'link' => url("storage/kegiatan/$temporaryFile->name"),
            'name' => $temporaryFile->name,
            'size' => $temporaryFile->size,
            'type' => $temporaryFile->type
        ]);
    }
}
