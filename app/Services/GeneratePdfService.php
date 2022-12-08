<?php

namespace App\Services;

use App\Models\LaporanKegiatanJabatan;
use App\Models\RekapitulasiKegiatan;
use App\Models\Rencana;
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

    public function generateRekapitulasi(User $userAuth, $content, $ttd = null)
    {
        $periode = $this->periodeRepository->isActive();
        $user = User::query()->with([
            'mente.atasanLangsung.roles',
            'mente.atasanLangsung.userPejabatStruktural.pangkatGolonganTmt', 'roles',
            'userAparatur.pangkatGolonganTmt'
        ])->find($userAuth->id);
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
        $pdf_rekap = PDF::loadView('generate-pdf.old', compact('unsurs', 'user', 'ttd'))->setPaper('A4');
        $file_name = uniqid();
        Storage::put("rekapitulasi/$file_name.pdf", $pdf_rekap->output());
        $url = asset("storage/rekapitulasi/$file_name.pdf");

        [$file_capaian, $file_name_capaian] = $this->generateCapaian($userAuth, $ttd);
        $rekapitulasiKegiatan = $this->updateOrCreateRekapitulasi($user, $periode, $url, $file_name, $content, $file_capaian, $file_name_capaian);
        return $rekapitulasiKegiatan;
    }

    public function generateCapaian(User $user, $ttd = null)
    {
        $periode = $this->periodeRepository->isActive();
        $user = $user->load(['roles', 'userAparatur.pangkatGolonganTmt']);
        $atasan_langsung = User::query()->whereRoleIs('atasan_langsung')->with(['userPejabatStruktural' => function ($query) use ($user) {
            $query->with('pangkatGolonganTmt')->where('kab_kota_id', $user->userAparatur->kab_kota_id);
        }])->first();
        $rencanas = Rencana::query()
            ->where('user_id', $user->id)
            ->withWhereHas('laporanKegiatanJabatans', function ($query) {
                $query->where('status', LaporanKegiatanJabatan::SELESAI)->with('butirKegiatan.subUnsur.unsur');
            })
            ->get()->map(function (Rencana $rencana) use ($user) {
                $sesuai_jenjang = [];
                $jenjang_bawah = [];
                $jenjang_atas = [];
                foreach ($rencana->laporanKegiatanJabatans as $laporan) {
                    if ($laporan->butirKegiatan->role_id == $user->roles()->whereIn('name', getAllRoleFungsional())->first()->id) {
                        array_push($sesuai_jenjang, $laporan);
                    } elseif ($laporan->butirKegiatan->role_id == $user->roles()->whereIn('name', getAllRoleFungsional())->first()->id + 1) {
                        array_push($jenjang_atas, $laporan);
                    } elseif ($laporan->butirKegiatan->role_id == $user->roles()->whereIn('name', getAllRoleFungsional())->first()->id - 1) {
                        array_push($jenjang_bawah, $laporan);
                    }
                }
                $rencana->jenjang_bawah = $this->current($jenjang_bawah);
                $rencana->sesuai_jenjang = $this->current($sesuai_jenjang);
                $rencana->jenjang_atas = $this->current($jenjang_atas);
                unset($rencana->laporanKegiatanJabatans);
                return $rencana;
            });
        $pdf_rekap = PDF::loadView('generate-pdf.rekapitulasi-capaian', compact('rencanas', 'ttd', 'user', 'atasan_langsung', 'periode'))->setPaper('A4');
        $file_name = uniqid();
        Storage::put("rekapitulasi/$file_name.pdf", $pdf_rekap->output());
        return [
            asset("storage/rekapitulasi/$file_name.pdf"),
            $file_name
        ];
    }

    private function current($data)
    {
        $sum = 0;
        $count = 0;
        $tmp = isset($data[0]) ? $data[0] : null;
        $current = [];
        for ($i = 0; $i < count($data); $i++) {
            $sum += $data[$i]->score;
            $count++;
            if ($tmp?->butir_kegiatan_id == $data[$i]->butir_kegiatan_id && count($data) - 1 == $i) {
                unset($data[$i]->butirKegiatan->subUnsur);
                array_push($current, [
                    'jumlah_ak' => $sum,
                    'volume' => $count,
                    'butir_kegiatan' => $data[$i]->butirKegiatan
                ]);
                $sum = 0;
                $count = 0;
            }
            $tmp = $data[$i];
        }
        return $current;
    }

    public function updateOrCreateRekapitulasi($user, $periode, $url, $file_name, $content, $file_capaian, $file_name_capaian)
    {
        $rekapitulasiKegiatan = RekapitulasiKegiatan::query()
            ->where('fungsional_id', $user->id)
            ->where('periode_id', $periode->id)->first();
        if ($rekapitulasiKegiatan) {
            deleteImage($rekapitulasiKegiatan->file);
            $rekapitulasiKegiatan->update([
                'file' => $url,
                'file_name' => $file_name,
                'file_capaian' => $file_capaian,
                'file_name_capaian' => $file_name_capaian
            ]);
        } else {
            $rekapitulasiKegiatan = RekapitulasiKegiatan::query()->create([
                'fungsional_id' => $user->id,
                'file' => $url,
                'file_name' => $file_name,
                'periode_id' => $periode->id,
                'file_capaian' => $file_capaian,
                'file_name_capaian' => $file_name_capaian
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
            $rekapitulasiKegiatan->historyRekapitulasiKegiatans()->create([
                'content' => 'Rekapitulasi ditanda tangani Atasan Langsung'
            ]);
        }
    }
}