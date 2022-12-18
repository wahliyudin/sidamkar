<?php

namespace App\Services\PenilaiAK\DataPengajuan;

use App\Models\Periode;
use App\Models\RekapitulasiKegiatan;
use App\Models\User;
use App\Services\GeneratePdfService;

class InternalService
{
    protected GeneratePdfService $generatePdfService;

    public function __construct(GeneratePdfService $generatePdfService)
    {
        $this->generatePdfService = $generatePdfService;
    }

    public function ttdRekapitulasi(RekapitulasiKegiatan $rekapitulasiKegiatan, User $user, Periode $periode, User $atasan_langsung)
    {
        $ttd = $atasan_langsung?->userPejabatStruktural?->file_ttd;
        $this->generatePdfService->generatePernyataan($user, $atasan_langsung, $ttd);
        $this->generatePdfService->generateRekapCapaian($user, $atasan_langsung, $periode, $ttd);
        $this->rekapitulasiKegiatanRepository->ttdAtasanLangsung($rekapitulasiKegiatan);
        $rekapitulasiKegiatan->historyRekapitulasiKegiatans()->create([
            'content' => 'Rekapitulasi ditanda tangani Atasan Langsung'
        ]);
    }
}