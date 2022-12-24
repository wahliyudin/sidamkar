<?php

namespace App\Services\PenilaiAK\DataPengajuan;

use App\Facades\Modules\DestructRoleFacade;
use App\Models\KetentuanNilai;
use App\Models\PenetapanAngkaKredit;
use App\Models\Periode;
use App\Models\RekapitulasiKegiatan;
use App\Models\User;
use App\Modules\Dokumen\Penetapan;
use App\Repositories\RekapitulasiKegiatanRepository;
use App\Services\GeneratePdfService;
use App\Traits\RoleTrait;

class InternalService
{
    use RoleTrait;
    protected GeneratePdfService $generatePdfService;
    protected RekapitulasiKegiatanRepository $rekapitulasiKegiatanRepository;

    public function __construct(GeneratePdfService $generatePdfService, RekapitulasiKegiatanRepository $rekapitulasiKegiatanRepository)
    {
        $this->generatePdfService = $generatePdfService;
        $this->rekapitulasiKegiatanRepository = $rekapitulasiKegiatanRepository;
    }

    public function ttdRekapitulasi(RekapitulasiKegiatan $rekapitulasiKegiatan, User $user, Periode $periode, User $atasan_langsung, User $penilai)
    {
        // $ttd = $atasan_langsung?->userPejabatStruktural?->file_ttd;
        [$link_pengembang, $name_pengembang, $jml_ak_penunjang, $jml_ak_profesi] = $this->generatePdfService->generatePengembang($user, $penilai);
        [$link_penilaian_capaian, $name_penilaian_capaian, $capaian_ak] = $this->generatePdfService->generatePenilaianCapaian($periode, $user, $rekapitulasiKegiatan->total_capaian, $penilai);
        $rekapitulasiKegiatan->update([
            'link_pengembang' => $link_pengembang,
            'name_pengembang' => $name_pengembang,
            'link_penilaian_capaian' => $link_penilaian_capaian,
            'name_penilaian_capaian' => $name_penilaian_capaian
        ]);
        $this->rekapitulasiKegiatanRepository->ttdPenilai($rekapitulasiKegiatan);
        $rekapitulasiKegiatan->historyRekapitulasiKegiatans()->create([
            'content' => 'Rekapitulasi ditanda tangani Tim Penilai'
        ]);
    }

    public function storePenetapan(User $user, User $penetap = null, Periode $periode, $ak_kelebihan = null, $ak_pengalaman)
    {
        PenetapanAngkaKredit::query()->updateOrCreate([
            'periode_id' => $periode->id,
            'user_id' => $user->id
        ], [
            'periode_id' => $periode->id,
            'user_id' => $user->id,
            'ak_kelebihan' => isset($ak_kelebihan) ? $ak_kelebihan : $user->userAparatur->angka_mekanisme,
            'ak_pengalaman' => $ak_pengalaman
        ]);
        $this->generatePdfService->storePenetapan($user, $penetap, $periode);
    }
}