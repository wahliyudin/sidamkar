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
        $this->generatePdfService->generatePengembang($user, $penilai);
        $this->generatePdfService->generatePenilaianCapaian($periode, $user, $rekapitulasiKegiatan->total_capaian, $penilai);
        $this->rekapitulasiKegiatanRepository->ttdPenilai($rekapitulasiKegiatan);
        $rekapitulasiKegiatan->historyRekapitulasiKegiatans()->create([
            'content' => 'Rekapitulasi ditanda tangani Atasan Langsung'
        ]);
    }
}