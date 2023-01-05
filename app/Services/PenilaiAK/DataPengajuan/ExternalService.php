<?php

namespace App\Services\PenilaiAK\DataPengajuan;

use App\Facades\Modules\DestructRoleFacade;
use App\Models\KetentuanNilai;
use App\Models\PenetapanAngkaKredit;
use App\Models\Periode;
use App\Models\RekapitulasiKegiatan;
use App\Models\User;
use App\Repositories\RekapitulasiKegiatanRepository;
use App\Services\GeneratePdfService;
use App\Traits\RoleTrait;
use Illuminate\Support\Facades\DB;

class ExternalService
{
    use RoleTrait;
    protected GeneratePdfService $generatePdfService;
    protected RekapitulasiKegiatanRepository $rekapitulasiKegiatanRepository;

    public function __construct(GeneratePdfService $generatePdfService, RekapitulasiKegiatanRepository $rekapitulasiKegiatanRepository)
    {
        $this->generatePdfService = $generatePdfService;
        $this->rekapitulasiKegiatanRepository = $rekapitulasiKegiatanRepository;
    }

    public function ttdRekapitulasi(RekapitulasiKegiatan $rekapitulasiKegiatan, User $user, $periode, User $penilai, $no_surat_pengembang = null, $no_surat_capaian = null)
    {
        // $ttd = $atasan_langsung?->userPejabatStruktural?->file_ttd;
        [$link_pengembang, $name_pengembang, $jml_ak_penunjang, $jml_ak_profesi] = $this->generatePdfService->generatePengembang($user, $penilai, $no_surat_pengembang, $periode);
        [$link_penilaian_capaian, $name_penilaian_capaian, $capaian_ak] = $this->generatePdfService->generatePenilaianCapaian($periode, $user, $rekapitulasiKegiatan->total_capaian, $penilai, $no_surat_capaian);
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

    public function storePenetapan(User $user, User $penetap = null, $periode, $ak_kelebihan = null, $ak_pengalaman, $ak_lama_jabatan = null, $keterangan_1 = null, $keterangan_2 = null, $keterangan_3 = null, $keterangan_4 = null, $keterangan_5 = null)
    {
        PenetapanAngkaKredit::query()->updateOrCreate([
            'periode_id' => $periode?->id,
            'user_id' => $user->id
        ], [
            'periode_id' => $periode?->id,
            'user_id' => $user->id,
            'ak_kelebihan' => isset($ak_kelebihan) ? $ak_kelebihan : ($user->userAparatur->status_mekanisme == 2 ? $user->userAparatur->angka_mekanisme : 0),
            'ak_pengalaman' => $ak_pengalaman
        ]);
        $this->generatePdfService->storePenetapan($user, $penetap, $periode, false, null, $ak_lama_jabatan, $keterangan_1, $keterangan_2, $keterangan_3, $keterangan_4, $keterangan_5);
    }
}
