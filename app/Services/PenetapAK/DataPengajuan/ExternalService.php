<?php

namespace App\Services\PenetapAK\DataPengajuan;

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

class ExternalService
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
            JOIN kab_prov_penilai_and_penetaps AS internal ON internal.kab_kota_id = ' . $user->userPejabatStruktural->kab_kota_id . '
            JOIN rekapitulasi_kegiatans ON (rekapitulasi_kegiatans.fungsional_id = users.id AND rekapitulasi_kegiatans.is_send IN (2, 3))
            WHERE users.status_akun = 1
                AND roles.id IN (1,2,3,5,6)
                AND user_aparaturs.kab_kota_id = ' . $user->userPejabatStruktural->kab_kota_id);
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
            $email = User::query()->withWhereHas('userProvKabKota', function ($query) use ($penetap) {
                $query->where('provinsi_id', $penetap->userPejabatStruktural->provinsi_id);
            })->first()?->userProvKabKota->email_info_penetapan;
        } else {
            $email = User::query()->withWhereHas('userProvKabKota', function ($query) use ($penetap) {
                $query->where('kab_kota_id', $penetap->userPejabatStruktural->kab_kota_id);
            })->first()?->userProvKabKota->email_info_penetapan;
        }
        $tgl_ttd = now();
        HistoryPenetapan::query()->create([
            'nama_penetap' => $nama_penetap,
            'periode_id' => $periode->id,
            'fungsional_id' => $user->id,
            'tgl_ttd' => $tgl_ttd
        ]);
        $jabatan = DestructRoleFacade::getRoleFungsionalFirst($user->roles);
        SendTTDPenetapan::dispatch($user?->userAparatur?->nama, concatPriodeY($periode), $jabatan, $nama_penetap, $tgl_ttd, $email);
    }
}