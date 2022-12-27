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
        $tgl_ttd = now();
        HistoryPenetapan::query()->create([
            'nama_penetap' => $nama_penetap,
            'periode_id' => $periode->id,
            'fungsional_id' => $user->id,
            'tgl_ttd' => $tgl_ttd
        ]);
        $kemendagri = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('user_kemendagris', 'users.id', '=', 'user_kemendagris.user_id')
            ->where('role_user.role_id', '=', 10)
            ->select('users.id', 'user_kemendagris.email_info_penetapan')
            ->first();
        $jabatan = DestructRoleFacade::getRoleFungsionalFirst($user->roles);
        SendTTDPenetapan::dispatch($user?->userAparatur?->nama, concatPriodeY($periode), $jabatan, $nama_penetap, $tgl_ttd, $kemendagri->email_info_penetapan);
    }
}