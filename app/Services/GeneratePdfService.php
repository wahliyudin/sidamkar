<?php

namespace App\Services;

use App\Models\RekapitulasiKegiatan;
use App\Models\Unsur;
use App\Models\User;
use App\Repositories\PeriodeRepository;
use App\Repositories\UnsurRepository;
use Illuminate\Validation\ValidationException;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Support\Facades\Storage;

class GeneratePdfService
{
    private PeriodeRepository $periodeRepository;
    private UnsurRepository $unsurRepository;

    public function __construct(PeriodeRepository $periodeRepository, UnsurRepository $unsurRepository)
    {
        $this->periodeRepository = $periodeRepository;
        $this->unsurRepository = $unsurRepository;
    }

    public function generateRekapitulasi(User $user, $content, $ttd = null)
    {
        $periode = $this->periodeRepository->isActive();
        $user = User::query()->with([
            'mente.atasanLangsung.roles',
            'mente.atasanLangsung.userPejabatStruktural.pangkatGolonganTmt', 'roles',
            'userAparatur.pangkatGolonganTmt'
        ])->find($user->id);
        if (!isset($user->userAparatur->pangkatGolonganTmt)) {
            throw ValidationException::withMessages(["Maaf anda belum melengkapi data diri anda"]);
        }
        if (!isset($user->mente->atasanLangsung)) {
            throw ValidationException::withMessages(["Maaf anda belum mempunyai atasan langsung"]);
        }
        if (!isset($user->mente->atasanLangsung->userPejabatStruktural->pangkatGolonganTmt)) {
            throw ValidationException::withMessages(["Maaf atasan langsung anda belum melengkapi data dirinya"]);
        }
        $unsurs = $this->unsurRepository->getRekapUnsurs($user);
        $pdf = PDF::loadView('generate-pdf.old', compact('unsurs', 'user', 'ttd'))->setPaper('A4');
        $file_name = uniqid();
        Storage::put("rekapitulasi/$file_name.pdf", $pdf->output());
        $url = asset("storage/rekapitulasi/$file_name.pdf");
        $rekapitulasiKegiatan = $this->updateOrCreateRekapitulasi($user, $periode, $url, $file_name, $content);
        return $rekapitulasiKegiatan;
    }

    public function updateOrCreateRekapitulasi($user, $periode, $url, $file_name, $content)
    {
        $rekapitulasiKegiatan = RekapitulasiKegiatan::query()
            ->where('fungsional_id', $user->id)
            ->where('periode_id', $periode->id)->first();
        if ($rekapitulasiKegiatan) {
            deleteImage($rekapitulasiKegiatan->file);
            $rekapitulasiKegiatan->update([
                'file' => $url,
                'file_name' => $file_name
            ]);
        } else {
            $rekapitulasiKegiatan = RekapitulasiKegiatan::query()->create([
                'fungsional_id' => $user->id,
                'file' => $url,
                'file_name' => $file_name,
                'periode_id' => $periode->id
            ]);
            $rekapitulasiKegiatan->historyRekapitulasiKegiatans()->create([
                'content' => $content
            ]);
        }
        return $rekapitulasiKegiatan;
    }

    public function ttdRekapitulasi(User $user, $content, $ttd)
    {
        $rekapitulasiKegiatan = $this->generateRekapitulasi($user, $content, $ttd);
        if ($rekapitulasiKegiatan instanceof RekapitulasiKegiatan) {
            $rekapitulasiKegiatan->update([
                'is_ttd' => true
            ]);
        }
    }
}