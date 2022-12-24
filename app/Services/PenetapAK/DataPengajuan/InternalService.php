<?php

namespace App\Services\PenetapAK\DataPengajuan;

use App\Facades\Modules\DestructRoleFacade;
use App\Models\KetentuanNilai;
use App\Models\PenetapanAngkaKredit;
use App\Models\Periode;
use App\Models\RekapitulasiKegiatan;
use App\Models\User;
use App\Repositories\RekapitulasiKegiatanRepository;
use App\Services\GeneratePdfService;
use Illuminate\Support\Facades\DB;

class InternalService
{
    protected RekapitulasiKegiatanRepository $rekapitulasiKegiatanRepository;
    protected GeneratePdfService $generatePdfService;

    public function __construct(RekapitulasiKegiatanRepository $rekapitulasiKegiatanRepository, GeneratePdfService $generatePdfService)
    {
        $this->rekapitulasiKegiatanRepository = $rekapitulasiKegiatanRepository;
        $this->generatePdfService = $generatePdfService;
    }

    public function getUsers(User $user)
    {
        if ($user->userPejabatStruktural->tingkat_aparatur == 'kab_kota') {
            $internal = 'internal.kab_kota_id = ' . $user->userPejabatStruktural->kab_kota_id;
            $aparatur = 'user_aparaturs.kab_kota_id = ' . $user->userPejabatStruktural->kab_kota_id;
        } else {
            $internal = 'internal.provinsi_id = ' . $user->userPejabatStruktural->provinsi_id;
            $aparatur = 'user_aparaturs.provinsi_id = ' . $user->userPejabatStruktural->provinsi_id;
        }
        return DB::select('SELECT
                users.id,
                user_aparaturs.nama,
                user_aparaturs.nip,
                roles.display_name,
                (CASE WHEN user_aparaturs.jenis_kelamin = "P" THEN "Perempuan" ELSE "Laki-Laki" END) AS jenis_kelamin
            FROM users
            LEFT JOIN user_aparaturs ON user_aparaturs.user_id = users.id
            LEFT JOIN pangkat_golongan_tmts ON pangkat_golongan_tmts.id = user_aparaturs.pangkat_golongan_tmt_id
            JOIN role_user ON role_user.user_id = users.id
            JOIN roles ON roles.id = role_user.role_id
            LEFT JOIN mekanisme_pengangkatans ON user_aparaturs.mekanisme_pengangkatan_id = mekanisme_pengangkatans.id
            JOIN kab_prov_penilai_and_penetaps AS internal ON ' . $internal . '
            JOIN rekapitulasi_kegiatans ON (rekapitulasi_kegiatans.fungsional_id = users.id AND rekapitulasi_kegiatans.is_send IN (2, 3))
            WHERE users.status_akun = 1
                AND user_aparaturs.tingkat_aparatur = "' . $user->userPejabatStruktural->tingkat_aparatur . '"
                AND roles.id IN (1,2,3,5,6)
                AND ' . $aparatur);
    }

    public function ttdRekapitulasi(RekapitulasiKegiatan $rekapitulasiKegiatan, User $user, Periode $periode, User $penetap, $no_surat_penetapan = null)
    {
        // $ttd = $atasan_langsung?->userPejabatStruktural?->file_ttd;
        $this->generatePdfService->storePenetapan($user, $penetap, $periode, true, $no_surat_penetapan);
        $this->rekapitulasiKegiatanRepository->ttdPenetap($rekapitulasiKegiatan);
        $rekapitulasiKegiatan->historyRekapitulasiKegiatans()->create([
            'content' => 'Rekapitulasi ditanda tangani Tim Penetap'
        ]);
    }
}