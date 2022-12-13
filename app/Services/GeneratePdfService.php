<?php

namespace App\Services;

use App\Facades\Modules\DestructRoleFacade;
use App\Models\LaporanKegiatanJabatan;
use App\Models\Periode;
use App\Models\RekapitulasiKegiatan;
use App\Models\Rencana;
use App\Models\Unsur;
use App\Models\User;
use App\Repositories\PeriodeRepository;
use App\Repositories\RencanaRepository;
use App\Repositories\UnsurRepository;
use Illuminate\Validation\ValidationException;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Support\Facades\Storage;

class GeneratePdfService
{
    protected PeriodeRepository $periodeRepository;
    protected UnsurRepository $unsurRepository;
    protected RencanaRepository $rencanaRepository;

    public function __construct(PeriodeRepository $periodeRepository, UnsurRepository $unsurRepository, RencanaRepository $rencanaRepository)
    {
        $this->periodeRepository = $periodeRepository;
        $this->unsurRepository = $unsurRepository;
        $this->rencanaRepository = $rencanaRepository;
    }

    public function generatePernyataan(User $user, User $atasan_langsung, $ttd = null)
    {
        $pdf_rekap = PDF::loadView('generate-pdf.old', [
            'unsurs' => $this->unsurRepository->getRekapUnsurs($user),
            'user' => $user,
            'ttd' => $ttd,
            'atasan_langsung' => $atasan_langsung,
            'role_atasan_langsung' => DestructRoleFacade::getRoleAtasanLangsung($atasan_langsung?->roles)
        ])->setPaper('A4');
        $file_name = uniqid();
        Storage::put("rekapitulasi/$file_name.pdf", $pdf_rekap->output());
        return [
            asset("storage/rekapitulasi/$file_name.pdf"),
            $file_name
        ];
    }

    public function generateCapaian(User $user, User $atasan_langsung, Periode $periode, $ttd = null)
    {
        $rencanas = $this->rencanaRepository->getDataRekapCapaian($user);
        $role_atasan_langsung = DestructRoleFacade::getRoleAtasanLangsung($atasan_langsung?->roles);
        $pdf_rekap = PDF::loadView('generate-pdf.rekapitulasi-capaian', compact('rencanas', 'ttd', 'user', 'atasan_langsung', 'role_atasan_langsung', 'periode'))->setPaper('A4');
        $file_name = uniqid();
        Storage::put("rekapitulasi/$file_name.pdf", $pdf_rekap->output());
        return [
            asset("storage/rekapitulasi/$file_name.pdf"),
            $file_name
        ];
    }

    public function ttdRekapitulasi(User $user, $content, $ttd)
    {
        $rekapitulasiKegiatan = $this->generatePernyataan($user, $content, $ttd);
        if ($rekapitulasiKegiatan instanceof RekapitulasiKegiatan) {
            $rekapitulasiKegiatan->update([
                'is_ttd' => true
            ]);
            $rekapitulasiKegiatan->historyRekapitulasiKegiatans()->create([
                'content' => 'Rekapitulasi ditanda tangani Atasan Langsung'
            ]);
        }
    }
}
