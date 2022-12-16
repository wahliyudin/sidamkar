<?php

namespace App\Repositories\Aparatur\LaporanKegiatan;

use App\Models\ButirKegiatan;
use App\Models\HistoryPenunjangProfesi;
use App\Models\LaporanKegiatanPenunjangProfesi;
use App\Models\Role;
use App\Models\SubButirKegiatan;
use App\Models\TemporaryFile;
use App\Models\User;
use App\Repositories\KetentuanNilaiRepository;
use App\Traits\AuthTrait;
use App\Traits\KodeLaporanKegiatanTrait;
use App\Traits\ScoringTrait;
use Illuminate\Http\Request;

class KegiatanPenunjangProfesiRepository
{
    use KodeLaporanKegiatanTrait, ScoringTrait, AuthTrait;

    protected LaporanKegiatanPenunjangProfesi $laporanKegiatanPenunjangProfesi;
    protected KetentuanNilaiRepository $ketentuanNilaiRepository;

    public function __construct(LaporanKegiatanPenunjangProfesi $laporanKegiatanPenunjangProfesi, KetentuanNilaiRepository $ketentuanNilaiRepository)
    {
        $this->laporanKegiatanPenunjangProfesi = $laporanKegiatanPenunjangProfesi;
        $this->ketentuanNilaiRepository = $ketentuanNilaiRepository;
    }

    public function store(Request $request, ?Role $role, User $user, ?ButirKegiatan $butirKegiatan, ?SubButirKegiatan $subButirKegiatan, $current_date, $periode_id)
    {
        $data = [
            'periode_id' => $periode_id,
            'user_id' => $user->id,
            'detail_kegiatan' => $request->detail_kegiatan,
            'status' => $this->laporanKegiatanPenunjangProfesi::VALIDASI,
            'current_date' => $current_date
        ];
        if (!is_null($butirKegiatan)) {
            $data['kode'] = $this->generateKodeButir($butirKegiatan, $this->laporanKegiatanPenunjangProfesi);
            $data['butir_kegiatan_id'] = $butirKegiatan->id;
            if (!is_null($butirKegiatan->percent)) {
                $data['score'] = $this->getScorePercent($butirKegiatan->percent, $this->getFirstRole()->id, $user->userAparatur->pangkat_golongan_tmt_id);
            } else {
                if (!is_null($role)) {
                    $data['score'] = $this->getScore($this->getFirstRole()->id, $role->id, $butirKegiatan->score);
                } else {
                    $data['score'] = $butirKegiatan->score;
                }
            }
        } else {
            $data['kode'] = $this->generateKodeSubButir($subButirKegiatan, $this->laporanKegiatanPenunjangProfesi);
            $data['sub_butir_kegiatan_id'] = $subButirKegiatan->id;
            if (!is_null($subButirKegiatan->percent)) {
                $data['score'] = $this->getScorePercent($subButirKegiatan->percent, $this->getFirstRole()->id, $user->userAparatur->pangkat_golongan_tmt_id);
            } else {
                if (!is_null($role)) {
                    $data['score'] = $this->getScore($this->getFirstRole()->id, $role->id, $subButirKegiatan->score);
                } else {
                    $data['score'] = $subButirKegiatan->score;
                }
            }
        }
        return $this->laporanKegiatanPenunjangProfesi->query()->create($data);
    }

    public function getScorePercent($percent, $role_id, $pangkat_id)
    {
        $ketentuanNilai = $this->ketentuanNilaiRepository->getByRolePangkat($role_id, $pangkat_id);
        return ($percent / 100) * $ketentuanNilai?->ak_kp;
    }

    public function storeHistoryPenunjangProfesi(LaporanKegiatanPenunjangProfesi $laporanKegiatanPenunjangProfesi, int $status, int $icon, ?string $detail_kegiatan = null, string $keterangan, $current_date)
    {
        return $laporanKegiatanPenunjangProfesi->historyPenunjangProfesis()->create([
            'status' => $status,
            'current_date' => $current_date,
            'icon' => $icon,
            'detail_kegiatan' => $detail_kegiatan,
            'keterangan' => $keterangan,
        ]);
    }

    public function storeDokumenPenunjangProfesi(LaporanKegiatanPenunjangProfesi $laporanKegiatanPenunjangProfesi, TemporaryFile $temporaryFile)
    {
        return $laporanKegiatanPenunjangProfesi->dokumenPenunjangProfesis()->create([
            'link' => url("storage/kegiatan/$temporaryFile->name"),
            'name' => $temporaryFile->name,
            'size' => $temporaryFile->size,
            'type' => $temporaryFile->type
        ]);
    }

    public function storeHistoryDokumenPenunjangProfesi(HistoryPenunjangProfesi $historyPenunjangProfesi, TemporaryFile $temporaryFile)
    {
        return $historyPenunjangProfesi->historyDokumenPenunjangProfesis()->create([
            'link' => url("storage/kegiatan/$temporaryFile->name"),
            'name' => $temporaryFile->name,
            'size' => $temporaryFile->size,
            'type' => $temporaryFile->type
        ]);
    }

    private function laporanKegiatanPenunjangProfesiByUser(?ButirKegiatan $butirKegiatan, ?SubButirKegiatan $subButirKegiatan, User $user)
    {
        return $this->laporanKegiatanPenunjangProfesi->query()
            ->with([
                'user.userAparatur',
                'dokumenPenunjangProfesis',
                'butirKegiatan.subUnsur.unsur',
                'subButirKegiatan.butirKegiatan.subUnsur.unsur',
                'historyPenunjangProfesis.historyDokumenPenunjangProfesis'
            ])
            ->where('user_id', $user->id)
            ->when($butirKegiatan, function ($query, $butirKegiatan) {
                $query->where('butir_kegiatan_id', $butirKegiatan->id);
            })
            ->when($subButirKegiatan, function ($query, $subButirKegiatan) {
                $query->where('sub_butir_kegiatan_id', $subButirKegiatan->id);
            })
            ->orderBy('id', 'desc')
            ->get();
    }

    public function laporanKegiatanPenunjangProfesiCount(?ButirKegiatan $butirKegiatan, ?SubButirKegiatan $subButirKegiatan, User $user): int
    {
        return $this->laporanKegiatanPenunjangProfesiByUser($butirKegiatan, $subButirKegiatan, $user)->count();
    }

    public function laporanKegiatanPenunjangProfesiStatusValidasi(?ButirKegiatan $butirKegiatan, ?SubButirKegiatan $subButirKegiatan, User $user)
    {
        return $this->laporanKegiatanPenunjangProfesiByUser($butirKegiatan, $subButirKegiatan, $user)->where('status', LaporanKegiatanPenunjangProfesi::VALIDASI);
    }

    public function laporanKegiatanPenunjangProfesiStatusRevisi(?ButirKegiatan $butirKegiatan, ?SubButirKegiatan $subButirKegiatan, User $user)
    {
        return $this->laporanKegiatanPenunjangProfesiByUser($butirKegiatan, $subButirKegiatan, $user)->where('status', LaporanKegiatanPenunjangProfesi::REVISI);
    }

    public function laporanKegiatanPenunjangProfesiStatusSelesai(?ButirKegiatan $butirKegiatan, ?SubButirKegiatan $subButirKegiatan, User $user)
    {
        return $this->laporanKegiatanPenunjangProfesiByUser($butirKegiatan, $subButirKegiatan, $user)->where('status', LaporanKegiatanPenunjangProfesi::SELESAI);
    }

    public function laporanKegiatanPenunjangProfesiStatusTolak(?ButirKegiatan $butirKegiatan, ?SubButirKegiatan $subButirKegiatan, User $user)
    {
        return $this->laporanKegiatanPenunjangProfesiByUser($butirKegiatan, $subButirKegiatan, $user)->where('status', LaporanKegiatanPenunjangProfesi::TOLAK);
    }

    public function laporanLast(?ButirKegiatan $butirKegiatan, ?SubButirKegiatan $subButirKegiatan, User $user)
    {
        return $this->laporanKegiatanPenunjangProfesiByUser($butirKegiatan, $subButirKegiatan, $user)->first();
    }
}