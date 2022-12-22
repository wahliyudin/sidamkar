<?php

namespace App\Services\AtasanLangsung;

use App\Models\ButirKegiatan;
use App\Models\JenisKegiatan;
use App\Models\LaporanKegiatanJabatan;
use App\Models\Periode;
use App\Models\Unsur;
use App\Models\User;
use App\Repositories\Aparatur\LaporanKegiatan\KegiatanPenunjangProfesiRepository;
use App\Repositories\ButirKegiatanRepository;
use App\Repositories\HistoryKegiatanJabatanRepository;
use App\Repositories\HistoryPenunjangProfesiRepository;
use App\Repositories\LaporanKegiatanPenunjangProfesiRepository;
use App\Repositories\PeriodeRepository;
use App\Repositories\SubButirKegiatanRepository;
use App\Repositories\UserRepository;
use App\Services\KegiatanJabatanService as ServicesKegiatanJabatanService;
use Illuminate\Http\Request;

class KegiatanProfesiService
{
    private PeriodeRepository $periodeRepository;
    private UserRepository $userRepository;
    private ButirKegiatanRepository $butirKegiatanRepository;
    private LaporanKegiatanPenunjangProfesiRepository $laporanKegiatanPenunjangProfesiRepository;
    private HistoryPenunjangProfesiRepository $historyPenunjangProfesiRepository;

    public function __construct(
        PeriodeRepository $periodeRepository,
        UserRepository $userRepository,
        ButirKegiatanRepository $butirKegiatanRepository,
        HistoryPenunjangProfesiRepository $historyPenunjangProfesiRepository,
        LaporanKegiatanPenunjangProfesiRepository $laporanKegiatanPenunjangProfesiRepository
    ) {
        $this->periodeRepository = $periodeRepository;
        $this->userRepository = $userRepository;
        $this->butirKegiatanRepository = $butirKegiatanRepository;
        $this->historyPenunjangProfesiRepository = $historyPenunjangProfesiRepository;
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

    public function loadUnsurs(string $search, $role_id)
    {
        $unsurs = Unsur::query()
            ->where('jenis_kegiatan_id', JenisKegiatan::JENIS_KEGIATAN_PROFESI)
            ->withWhereHas('subUnsurs', function ($query)  use ($role_id, $search) {
                $query->withWhereHas('butirKegiatans', function ($query) use ($role_id, $search) {
                    $query->withWhereHas('laporanKegiatanJabatans', function ($query) {
                        $query->whereIn('status', [LaporanKegiatanJabatan::VALIDASI, LaporanKegiatanJabatan::REVISI]);
                    })->withWhereHas('role', function ($query) use ($search, $role_id) {
                        $query->whereIn('id', [$role_id + 1, $role_id - 1, $role_id])->where(
                            'name',
                            'like',
                            "%$search%"
                        );
                    });
                });
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

    public function verifikasi($id)
    {
        $laporanKegiatanPenunjangProfesi = $this->laporanKegiatanPenunjangProfesiRepository->getById($id);
        $this->laporanKegiatanPenunjangProfesiRepository->updateStatusAndCatatan($laporanKegiatanPenunjangProfesi, $laporanKegiatanPenunjangProfesi::SELESAI);
        $this->historyPenunjangProfesiRepository->storeStatusSelesai($laporanKegiatanPenunjangProfesi);
        return $laporanKegiatanPenunjangProfesi;
    }

    public function revisi(Request $request, $laporan_id, $user_id)
    {
        $user = $this->userRepository->getUserById($user_id);
        $laporanKegiatanPenunjangProfesi = $this->laporanKegiatanPenunjangProfesiRepository->getById($laporan_id);
        $this->laporanKegiatanPenunjangProfesiRepository->updateStatusAndCatatan($laporanKegiatanPenunjangProfesi, $laporanKegiatanPenunjangProfesi::REVISI, $request->catatan);
        $this->historyPenunjangProfesiRepository->storeStatusRevisi($laporanKegiatanPenunjangProfesi, $user, $request->catatan);
        return $laporanKegiatanPenunjangProfesi;
    }

    public function tolak(Request $request, $id)
    {
        $laporanKegiatanPenunjangProfesi = $this->laporanKegiatanPenunjangProfesiRepository->getById($id);
        $this->laporanKegiatanPenunjangProfesiRepository->updateStatusAndCatatan($laporanKegiatanPenunjangProfesi, $laporanKegiatanPenunjangProfesi::TOLAK, $request->catatan);
        $this->historyPenunjangProfesiRepository->storeStatusTolak($laporanKegiatanPenunjangProfesi, $request->catatan);
        return $laporanKegiatanPenunjangProfesi;
    }
}
