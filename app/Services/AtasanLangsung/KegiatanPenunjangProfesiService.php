<?php

namespace App\Services\AtasanLangsung;

use App\Models\ButirKegiatan;
use App\Models\LaporanKegiatanPenunjangProfesi;
use App\Models\Periode;
use App\Models\Role;
use App\Models\SubButirKegiatan;
use App\Models\Unsur;
use App\Models\User;
use App\Repositories\Aparatur\LaporanKegiatan\KegiatanPenunjangProfesiRepository;
use App\Repositories\ButirKegiatanRepository;
use App\Repositories\HistoryPenunjangProfesiRepository;
use App\Repositories\LaporanKegiatanPenunjangProfesiRepository;
use App\Repositories\PeriodeRepository;
use App\Repositories\SubButirKegiatanRepository;
use App\Repositories\UserRepository;
use App\Traits\ScoringTrait;
use Illuminate\Http\Request;

class KegiatanPenunjangProfesiService
{
    use ScoringTrait;

    private PeriodeRepository $periodeRepository;
    private UserRepository $userRepository;
    private ButirKegiatanRepository $butirKegiatanRepository;
    private LaporanKegiatanPenunjangProfesiRepository $laporanKegiatanPenunjangProfesiRepository;
    private KegiatanPenunjangProfesiRepository $kegiatanPenunjangProfesiRepository;
    private HistoryPenunjangProfesiRepository $historyPenunjangProfesiRepository;
    private SubButirKegiatanRepository $subButirKegiatanRepository;

    public function __construct(
        PeriodeRepository $periodeRepository,
        UserRepository $userRepository,
        ButirKegiatanRepository $butirKegiatanRepository,
        KegiatanPenunjangProfesiRepository $kegiatanPenunjangProfesiRepository,
        HistoryPenunjangProfesiRepository $historyPenunjangProfesiRepository,
        SubButirKegiatanRepository $subButirKegiatanRepository,
        LaporanKegiatanPenunjangProfesiRepository $laporanKegiatanPenunjangProfesiRepository
    ) {
        $this->periodeRepository = $periodeRepository;
        $this->userRepository = $userRepository;
        $this->butirKegiatanRepository = $butirKegiatanRepository;
        $this->kegiatanPenunjangProfesiRepository = $kegiatanPenunjangProfesiRepository;
        $this->historyPenunjangProfesiRepository = $historyPenunjangProfesiRepository;
        $this->subButirKegiatanRepository = $subButirKegiatanRepository;
        $this->laporanKegiatanPenunjangProfesiRepository = $laporanKegiatanPenunjangProfesiRepository;
    }

    public function periodeActive(): Periode
    {
        return $this->periodeRepository->isActive();
    }

    public function getUserById($id): User
    {
        return $this->userRepository->getUserById($id);
    }

    public function getButirKegiatanById($id): ButirKegiatan
    {
        return $this->butirKegiatanRepository->getById($id);
    }

    public function getSubButirKegiatanById($id): SubButirKegiatan
    {
        return $this->subButirKegiatanRepository->getById($id);
    }

    public function loadUnsurs(string $search, Role $role, $jenis_kegiatan_id)
    {
        $unsurs = Unsur::query()
            ->where('jenis_kegiatan_id', $jenis_kegiatan_id)
            ->where('jenis_aparatur', $this->groupRole($role))
            ->withWhereHas('subUnsurs', function ($query) use ($role) {
                $query->withWhereHas('butirKegiatans', function ($query) use ($role) {
                    $query->whereHas('laporanKegiatanPenunjangProfesis', function ($query) {
                        $query->whereIn('status', [LaporanKegiatanPenunjangProfesi::VALIDASI, LaporanKegiatanPenunjangProfesi::REVISI]);
                    })->orDoesntHave('laporanKegiatanPenunjangProfesis')->with('role', function ($query) use ($role) {
                        $query->whereIn('id', $this->limiRole($role->id));
                    })->withWhereHas('subButirKegiatans', function ($query) use ($role) {
                        $query->whereHas('laporanKegiatanPenunjangProfesis', function ($query) {
                            $query->whereIn('status', [LaporanKegiatanPenunjangProfesi::VALIDASI, LaporanKegiatanPenunjangProfesi::REVISI]);
                        })->with('role', function ($query) use ($role) {
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

    public function laporanKegiatanPenunjangProfesiByUser(?ButirKegiatan $butirKegiatan, ?SubButirKegiatan $subButirKegiatan, User $user)
    {
        return [
            $this->kegiatanPenunjangProfesiRepository->laporanKegiatanPenunjangProfesiStatusValidasi($butirKegiatan, $subButirKegiatan, $user),
            $this->kegiatanPenunjangProfesiRepository->laporanKegiatanPenunjangProfesiStatusRevisi($butirKegiatan, $subButirKegiatan, $user),
            $this->kegiatanPenunjangProfesiRepository->laporanKegiatanPenunjangProfesiStatusSelesai($butirKegiatan, $subButirKegiatan, $user),
            $this->kegiatanPenunjangProfesiRepository->laporanKegiatanPenunjangProfesiStatusTolak($butirKegiatan, $subButirKegiatan, $user),
        ];
    }

    public function laporanKegiatanPenunjangProfesiCount(?ButirKegiatan $butirKegiatan, ?SubButirKegiatan $subButirKegiatan, User $user): int
    {
        return $this->kegiatanPenunjangProfesiRepository->laporanKegiatanPenunjangProfesiCount($butirKegiatan, $subButirKegiatan, $user);
    }

    public function verifikasi($id)
    {
        $laporanKegiatanPenunjangProfesi = $this->laporanKegiatanPenunjangProfesiRepository->getById($id);
        $this->laporanKegiatanPenunjangProfesiRepository->updateStatusAndCatatan($laporanKegiatanPenunjangProfesi, LaporanKegiatanPenunjangProfesi::SELESAI);
        $this->historyPenunjangProfesiRepository->storeStatusSelesai($laporanKegiatanPenunjangProfesi);
        return $laporanKegiatanPenunjangProfesi;
    }

    public function revisi(Request $request, $laporan_id, $user_id)
    {
        $user = $this->userRepository->getUserById($user_id);
        $laporanKegiatanPenunjangProfesi = $this->laporanKegiatanPenunjangProfesiRepository->getById($laporan_id);
        $this->laporanKegiatanPenunjangProfesiRepository->updateStatusAndCatatan($laporanKegiatanPenunjangProfesi, LaporanKegiatanPenunjangProfesi::REVISI, $request->catatan);
        $this->historyPenunjangProfesiRepository->storeStatusRevisi($laporanKegiatanPenunjangProfesi, $user, $request->catatan);
        return $laporanKegiatanPenunjangProfesi;
    }

    public function tolak(Request $request, $id)
    {
        $laporanKegiatanPenunjangProfesi = $this->laporanKegiatanPenunjangProfesiRepository->getById($id);
        $this->laporanKegiatanPenunjangProfesiRepository->updateStatusAndCatatan($laporanKegiatanPenunjangProfesi, LaporanKegiatanPenunjangProfesi::TOLAK, $request->catatan);
        $this->historyPenunjangProfesiRepository->storeStatusTolak($laporanKegiatanPenunjangProfesi, $request->catatan);
        return $laporanKegiatanPenunjangProfesi;
    }
}
