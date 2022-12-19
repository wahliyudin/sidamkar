<?php

namespace App\Services\PenilaiAK\DataPengajuan;

use App\Models\Periode;
use App\Models\RekapitulasiKegiatan;
use App\Models\User;
use App\Repositories\RekapitulasiKegiatanRepository;
use App\Services\GeneratePdfService;

class InternalService
{
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
}