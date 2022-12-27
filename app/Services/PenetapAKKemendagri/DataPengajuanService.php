<?php

namespace App\Services\PenetapAKKemendagri;

use App\Facades\Modules\DestructRoleFacade;
use App\Jobs\SendTTDPenetapan;
use App\Models\HistoryPenetapan;
use App\Models\KetentuanNilai;
use App\Models\PenetapanAngkaKredit;
use App\Models\Periode;
use App\Models\RekapitulasiKegiatan;
use App\Models\User;
use App\Repositories\RekapitulasiKegiatanRepository;
use App\Services\GeneratePdfService;
use Illuminate\Support\Facades\DB;

class DataPengajuanService
{
    protected RekapitulasiKegiatanRepository $rekapitulasiKegiatanRepository;
    protected GeneratePdfService $generatePdfService;

    public function __construct(RekapitulasiKegiatanRepository $rekapitulasiKegiatanRepository, GeneratePdfService $generatePdfService)
    {
        $this->rekapitulasiKegiatanRepository = $rekapitulasiKegiatanRepository;
        $this->generatePdfService = $generatePdfService;
    }

    public function ttdRekapitulasi(RekapitulasiKegiatan $rekapitulasiKegiatan, User $user, Periode $periode, User $penetap, $no_surat_penetapan = null, $nama_penetap)
    {
        $penetapan = PenetapanAngkaKredit::query()->where('user_id', $user->id)->where('periode_id', $periode->id)->first();
        $this->generatePdfService->storePenetapan($user, $penetap, $periode, true, $no_surat_penetapan, $penetapan->ak_lama_jabatan, $rekapitulasiKegiatan->keterangan_1, $rekapitulasiKegiatan->keterangan_2, $rekapitulasiKegiatan->keterangan_3, $rekapitulasiKegiatan->keterangan_4, $rekapitulasiKegiatan->keterangan_5);
        $this->rekapitulasiKegiatanRepository->ttdPenetap($rekapitulasiKegiatan);
        $rekapitulasiKegiatan->historyRekapitulasiKegiatans()->create([
            'content' => 'Rekapitulasi ditanda tangani Tim Penetap'
        ]);
        if ($penetap->userPejabatStruktural->tingkat_aparatur == 'provinsi') {
            $admin = User::query()->withWhereHas('userProvKabKota', function ($query) use ($penetap) {
                $query->where('provinsi_id', $penetap->userPejabatStruktural->provinsi_id);
            })->first();
        } else {
            $admin = User::query()->withWhereHas('userProvKabKota', function ($query) use ($penetap) {
                $query->where('kab_kota_id', $penetap->userPejabatStruktural->kab_kota_id);
            })->first();
        }
        HistoryPenetapan::query()->create([
            'nama_penetap' => $nama_penetap,
            'periode_id' => $periode->id,
            'fungsional_id' => $user->id,
            'tgl_ttd' => now()
        ]);
        SendTTDPenetapan::dispatch($admin);
    }
}