<?php

namespace App\Services\Aparatur\LaporanKegiatan;

use App\Models\ButirKegiatan;
use App\Models\DokumenKegiatanJabatan;
use App\Models\HistoryKegiatanJabatan;
use App\Models\LaporanKegiatanJabatan;
use App\Models\Periode;
use App\Models\RekapitulasiCapaian;
use App\Models\Role;
use App\Models\SuratPernyataanKegiatan;
use App\Models\TemporaryFile;
use App\Models\Unsur;
use App\Models\User;
use App\Repositories\Aparatur\LaporanKegiatan\KegiatanJabatanRepository;
use App\Repositories\KetentuanNilaiRepository;
use App\Repositories\LaporanKegiatanPenunjangProfesiRepository;
use App\Repositories\PengembanganPenunjangProfesiRepository;
use App\Repositories\PenilaianCapaianRepository;
use App\Repositories\PeriodeRepository;
use App\Repositories\RekapitulasiCapaianRepository;
use App\Repositories\RekapitulasiKegiatanRepository;
use App\Repositories\RencanaRepository;
use App\Repositories\SuratPernyataanKegiatanRepository;
use App\Repositories\TemporaryFileRepository;
use App\Services\GeneratePdfService;
use App\Services\KegiatanJabatanService as ServicesKegiatanJabatanService;
use App\Traits\ScoringTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class KegiatanJabatanService
{
    use ScoringTrait;

    protected KegiatanJabatanRepository $kegiatanJabatanRepository;
    protected RencanaRepository $rencanaRepository;
    protected TemporaryFileRepository $temporaryFileRepository;
    protected ServicesKegiatanJabatanService $kegiatanJabatanService;
    protected PeriodeRepository $periodeRepository;
    protected RekapitulasiKegiatanRepository $rekapitulasiKegiatanRepository;
    protected GeneratePdfService $generatePdfService;
    protected LaporanKegiatanPenunjangProfesiRepository $laporanKegiatanPenunjangProfesiRepository;
    protected KetentuanNilaiRepository $ketentuanNilaiRepository;
    protected SuratPernyataanKegiatanRepository $suratPernyataanKegiatanRepository;
    protected RekapitulasiCapaianRepository $rekapitulasiCapaianRepository;
    protected PengembanganPenunjangProfesiRepository $pengembanganPenunjangProfesiRepository;
    protected PenilaianCapaianRepository $penilaianCapaianRepository;

    public function __construct(
        KegiatanJabatanRepository $kegiatanJabatanRepository,
        RencanaRepository $rencanaRepository,
        TemporaryFileRepository $temporaryFileRepository,
        ServicesKegiatanJabatanService $kegiatanJabatanService,
        PeriodeRepository $periodeRepository,
        RekapitulasiKegiatanRepository $rekapitulasiKegiatanRepository,
        GeneratePdfService $generatePdfService,
        LaporanKegiatanPenunjangProfesiRepository $laporanKegiatanPenunjangProfesiRepository,
        KetentuanNilaiRepository $ketentuanNilaiRepository,
        SuratPernyataanKegiatanRepository $suratPernyataanKegiatanRepository,
        RekapitulasiCapaianRepository $rekapitulasiCapaianRepository,
        PengembanganPenunjangProfesiRepository $pengembanganPenunjangProfesiRepository,
        PenilaianCapaianRepository $penilaianCapaianRepository
    ) {
        $this->kegiatanJabatanRepository = $kegiatanJabatanRepository;
        $this->rencanaRepository = $rencanaRepository;
        $this->temporaryFileRepository = $temporaryFileRepository;
        $this->kegiatanJabatanService = $kegiatanJabatanService;
        $this->periodeRepository = $periodeRepository;
        $this->rekapitulasiKegiatanRepository = $rekapitulasiKegiatanRepository;
        $this->generatePdfService = $generatePdfService;
        $this->laporanKegiatanPenunjangProfesiRepository = $laporanKegiatanPenunjangProfesiRepository;
        $this->ketentuanNilaiRepository = $ketentuanNilaiRepository;
        $this->suratPernyataanKegiatanRepository = $suratPernyataanKegiatanRepository;
        $this->rekapitulasiCapaianRepository = $rekapitulasiCapaianRepository;
        $this->pengembanganPenunjangProfesiRepository = $pengembanganPenunjangProfesiRepository;
        $this->penilaianCapaianRepository = $penilaianCapaianRepository;
    }

    public function loadUnsurs(string $search, Role $role)
    {
        $unsurs = Unsur::query()
            ->where('jenis_kegiatan_id', 1)
            ->withWhereHas('subUnsurs', function ($query) use ($role) {
                $query->withWhereHas('butirKegiatans', function ($query) use ($role) {
                    $query->withWhereHas('role', function ($query) use ($role) {
                        $query->whereIn('id', $this->limiRole($role->id));
                    });
                });
            })
            ->when($search, function ($query) use ($search, $role) {
                $query->where('nama', 'like', "%$search%")
                    ->orWhereHas('subUnsurs', function ($query) use ($search, $role) {
                        $query->where('nama', 'like', "%$search%")
                            ->orWhereHas('butirKegiatans', function ($query) use ($search, $role) {
                                $query->where('nama', 'like', "%$search%")
                                    ->whereHas('role', function ($query) use ($search, $role) {
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


    public function rencanas(User $user, $periode)
    {
        return $this->rencanaRepository->getAllByUser($user, $periode);
    }

    public function storeLaporan(Request $request, User $user, ButirKegiatan $butirKegiatan): LaporanKegiatanJabatan
    {
        $role = $butirKegiatan->load('role')->role;
        $periode = $this->periodeRepository->isActive();
        $laporanKegiatanJabatan = $this->kegiatanJabatanRepository->store($request, $role, $user, $butirKegiatan, $request->current_date, $periode?->id);
        $historyKegiatanJabatan = $this->kegiatanJabatanRepository->storeHistoryKegiatanJabatan($laporanKegiatanJabatan, HistoryKegiatanJabatan::STATUS_LAPORKAN, HistoryKegiatanJabatan::ICON_KEYBOARD, $request->detail_kegiatan, 'Berhasil dilaporkan', $request->current_date);
        if (isset($request->doc_kegiatan_tmp[0]) && $request->doc_kegiatan_tmp[0] !== null) {
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
        }
        $this->kegiatanJabatanRepository->storeHistoryKegiatanJabatan(
            laporanKegiatanJabatan: $laporanKegiatanJabatan,
            status: HistoryKegiatanJabatan::STATUS_VALIDASI,
            icon: HistoryKegiatanJabatan::ICON_SPINNER,
            keterangan: 'Sedang divalidasi oleh Atasan Langsung',
            detail_kegiatan: null,
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
            detail_kegiatan: null,
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

    public function laporanKegiatanJabatanByUser($butirKegiatan, $user, $periode)
    {
        return $this->kegiatanJabatanService->laporanKegiatanJabatanByUser($butirKegiatan, $user, $periode);
    }

    public function laporanKegiatanJabatanCount(ButirKegiatan $butirKegiatan, User $user, $periode): int
    {
        return $this->kegiatanJabatanService->laporanKegiatanJabatanCount($butirKegiatan, $user, $periode);
    }

    public function laporanLast(ButirKegiatan $butirKegiatan, User $user, $periode)
    {
        return $this->kegiatanJabatanService->laporanLast($butirKegiatan, $user, $periode);
    }

    public function generateDocuments(User $userAuth)
    {
        $periode = $this->periodeRepository->isActive();
        [$user, $atasan_langsung] = $this->validateDocument($userAuth);
        if (!isset($user->mente->atasanLangsung->userPejabatStruktural->jabatan_tmt) || !isset($user->mente->atasanLangsung->userPejabatStruktural->nomenklaturPerangkatDaerah)) {
            throw ValidationException::withMessages(['Maaf, Atasan Langsung Anda Belum Melengkapi Profil']);
        }
        [$link_pernyataan, $name_pernyataan] = $this->generatePdfService->generatePernyataan($user, $atasan_langsung, false, $periode);
        [$link_rekap_capaian, $name_rekap_capaian, $total_capaian] = $this->generatePdfService->generateRekapCapaian($user, $atasan_langsung, $periode, true);
        [$link_pengembang, $name_pengembang, $jml_ak_penunjang, $jml_ak_profesi] = $this->generatePdfService->generatePengembang($user, null, null, $periode);
        [$link_penilaian_capaian, $name_penilaian_capaian, $capaian_ak] = $this->generatePdfService->generatePenilaianCapaian($periode, $user, $total_capaian);
        [$link_penetapan, $name_penetapan] = $this->generatePdfService->generatePenetapan($user);
        return $this->updateOrCreateRekapitulasi(
            $user,
            $periode,
            'Rekapitulasi Diterima Oleh Atasan Langsung',
            $link_pernyataan,
            $name_pernyataan,
            $link_rekap_capaian,
            $name_rekap_capaian,
            $total_capaian,
            $link_pengembang,
            $name_pengembang,
            $jml_ak_profesi,
            $jml_ak_penunjang,
            $link_penilaian_capaian,
            $name_penilaian_capaian,
            $capaian_ak,
            $link_penetapan,
            $name_penetapan
        );
    }

    public function updateOrCreateRekapitulasi(
        User $user,
        $periode,
        $content,
        $link_pernyataan,
        $name_pernyataan,
        $link_rekap_capaian,
        $name_rekap_capaian,
        $total_capaian,
        $link_pengembang,
        $name_pengembang,
        $jml_ak_profesi,
        $jml_ak_penunjang,
        $link_penilaian_capaian,
        $name_penilaian_capaian,
        $capaian_ak,
        $link_penetapan,
        $name_penetapan
    ) {
        // $rekapitulasiKegiatan = $this->suratPernyataanKegiatanRepository->updateOrCreate($user->id, $periode?->id, $link_pernyataan, $name_pernyataan);
        // $this->rekapitulasiCapaianRepository->updateOrCreate($user->id, $periode?->id, '', $link_rekap_capaian, $name_rekap_capaian);
        // $this->pengembanganPenunjangProfesiRepository->updateOrCreate($user->id, $periode?->id, $link_pengembang, $name_pengembang, '', '');
        // $this->penilaianCapaianRepository->updateOrCreate($user->id, $periode?->id, '', $link_penilaian_capaian, $name_penilaian_capaian);
        // if (!$rekapitulasiKegiatan instanceof SuratPernyataanKegiatan) {
        //     $rekapitulasiKegiatan->historyRekapitulasiKegiatans()->create([
        //         'content' => $content
        //     ]);
        // }
        // $this->rekapitulasiKegiatanRepository->getRekapByFungsionalAndPeriode();
        // return $rekapitulasiKegiatan;
        $rekapitulasiKegiatan = $this->rekapitulasiKegiatanRepository->getRekapByFungsionalAndPeriode($user, $periode);
        if ($rekapitulasiKegiatan) {
            $this->rekapitulasiKegiatanRepository->update(
                $rekapitulasiKegiatan,
                $link_pernyataan,
                $name_pernyataan,
                $link_rekap_capaian,
                $name_rekap_capaian,
                $total_capaian,
                $link_pengembang,
                $name_pengembang,
                $jml_ak_profesi,
                $jml_ak_penunjang,
                $link_penilaian_capaian,
                $name_penilaian_capaian,
                $capaian_ak,
                $link_penetapan,
                $name_penetapan
            );
        } else {
            $rekapitulasiKegiatan = $this->rekapitulasiKegiatanRepository->store(
                $user->id,
                $periode?->id,
                $link_pernyataan,
                $name_pernyataan,
                $link_rekap_capaian,
                $name_rekap_capaian,
                $total_capaian,
                $link_pengembang,
                $name_pengembang,
                $jml_ak_profesi,
                $jml_ak_penunjang,
                $link_penilaian_capaian,
                $name_penilaian_capaian,
                $capaian_ak,
                $link_penetapan,
                $name_penetapan
            );
            $rekapitulasiKegiatan->historyRekapitulasiKegiatans()->create([
                'content' => $content
            ]);
        }
        return $rekapitulasiKegiatan;
    }

    public function generateRekapitulasiCapaian(User $userAuth)
    {
        $periode = $this->periodeRepository->isActive();
        [$user, $atasan_langsung] = $this->validateDocument($userAuth);
        return $this->generatePdfService->generateRekapCapaian($user, $atasan_langsung, $periode);
    }

    public function generatePernyataan(User $userAuth, $periode)
    {
        [$user, $atasan_langsung] = $this->validateDocument($userAuth);
        return $this->generatePdfService->generatePernyataan($user, $atasan_langsung, false, $periode);
    }

    private function validateDocument(User $user)
    {
        $user = $user->load([
            'ketentuanSkpFungsional',
            'mente.atasanLangsung.roles',
            'mente.atasanLangsung.userPejabatStruktural.pangkatGolonganTmt',
            'mente.atasanLangsung.userPejabatStruktural.nomenklaturPerangkatDaerah',
            'roles',
            'userAparatur.pangkatGolonganTmt',
            'userAparatur.nomenklaturPerangkatDaerah',
        ]);
        if (!isset($user?->ketentuanSkpFungsional)) {
            throw ValidationException::withMessages(['Maaf Anda Belum Menginput SKP']);
        }
        if (!isset($user->userAparatur->pangkatGolonganTmt)) {
            throw ValidationException::withMessages(["Maaf anda belum melengkapi data diri anda"]);
        }
        if (!isset($user->mente->atasanLangsung)) {
            throw ValidationException::withMessages(["Maaf anda belum mempunyai atasan langsung"]);
        }
        if (!isset($user->mente->atasanLangsung->userPejabatStruktural->pangkatGolonganTmt)) {
            throw ValidationException::withMessages(["Maaf atasan langsung anda belum melengkapi data dirinya"]);
        }
        return [
            $user,
            $user->mente->atasanLangsung
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
}