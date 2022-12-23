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
                AND roles.id IN (1,2,3,4,5,6,7)
                AND user_aparaturs.kab_kota_id = ' . $user->userPejabatStruktural->kab_kota_id);
        // return DB::select('SELECT
        //         users.id,
        //         user_aparaturs.nama,
        //         user_aparaturs.nip,
        //         roles.display_name,
        //         (CASE WHEN user_aparaturs.jenis_kelamin = "P" THEN "Perempuan" ELSE "Laki-Laki" END) AS jenis_kelamin
        //     FROM users
        //     JOIN user_aparaturs ON user_aparaturs.user_id = users.id
        //     LEFT JOIN kab_prov_penilai_and_penetaps ON (
        //         kab_prov_penilai_and_penetaps.penetap_ak_damkar_id = ' . '"' . $user->id . '"' . '
        //         OR kab_prov_penilai_and_penetaps.penetap_ak_analis_id = ' . '"' . $user->id . '"' . '
        //     )
        //     JOIN role_user ON role_user.user_id = users.id
        //     JOIN roles ON role_user.role_id = roles.id
        //     JOIN rekapitulasi_kegiatans ON rekapitulasi_kegiatans.fungsional_id = users.id
        //     WHERE users.status_akun = 1
        //         AND rekapitulasi_kegiatans.is_send = 3
        //         AND user_aparaturs.tingkat_aparatur = kab_prov_penilai_and_penetaps.tingkat_aparatur
        //         AND (CASE WHEN kab_prov_penilai_and_penetaps.tingkat_aparatur = "kab_kota" THEN
        //             kab_prov_penilai_and_penetaps.kab_kota_id = user_aparaturs.kab_kota_id
        //             ELSE
        //             kab_prov_penilai_and_penetaps.provinsi_id = user_aparaturs.provinsi_id END)
        //         AND (CASE WHEN kab_prov_penilai_and_penetaps.penetap_ak_damkar_id IS NOT NULL THEN
        //             roles.id IN (1,2,3,4) ELSE
        //             (CASE WHEN kab_prov_penilai_and_penetaps.penetap_ak_damkar_id
        //                 AND kab_prov_penilai_and_penetaps.penetap_ak_analis_id IS NOT NULL THEN
        //                 roles.id IN (1,2,3,4,5,6,7) ELSE
        //                 roles.id IN (5,6,7) END) END)');
    }

    public function ttdRekapitulasi(RekapitulasiKegiatan $rekapitulasiKegiatan, User $user, Periode $periode, User $penetap)
    {
        // $ttd = $atasan_langsung?->userPejabatStruktural?->file_ttd;
        $data = $this->processPenetapan($user, $periode);
        [$link_penetapan, $name_penetapan] = $this->generatePdfService->generatePenetapan($user, $penetap, $data, true);
        $rekapitulasiKegiatan->update([
            'link_penetapan' => $link_penetapan,
            'name_penetapan' => $name_penetapan
        ]);
        $this->rekapitulasiKegiatanRepository->ttdPenetap($rekapitulasiKegiatan);
        $rekapitulasiKegiatan->historyRekapitulasiKegiatans()->create([
            'content' => 'Rekapitulasi ditanda tangani Tim Penetap'
        ]);
    }

    public function processPenetapan(User $user, Periode $periode)
    {
        $user = $user->load(['roles', 'userAparatur']);
        $penetapan = PenetapanAngkaKredit::query()
            ->where('user_id', $user->id)
            ->where('periode_id', $periode->id)
            ->first();
        $role = DestructRoleFacade::getRoleFungsionalFirst($user->roles);
        $rekapitulasiKegiatan = $this->rekapitulasiKegiatanRepository->getRekapByFungsionalAndPeriode($user, $periode);
        $ketentuanNilai = KetentuanNilai::query()
            ->where('pangkat_golongan_tmt_id', $user->userAparatur->pangkat_golongan_tmt_id)
            ->where('role_id', $role->id)
            ->first();
        // Check Mekanisme expired
        return $this->claculatePenetapan($ketentuanNilai, $user, $penetapan, $rekapitulasiKegiatan);
    }

    public function checkMekanisme(User $user, PenetapanAngkaKredit $penetapan)
    {
        if ($user->userAparatur->expired_mekanisme) {
            return $penetapan->ak_kelebihan;
        }
        return $user->userAparatur->angka_mekanisme;
    }

    public function claculatePenetapan(KetentuanNilai $ketentuanNilai, User $user, PenetapanAngkaKredit $penetapan, RekapitulasiKegiatan $rekapitulasiKegiatan)
    {
        $ak_kelebihan = $this->checkMekanisme($user, $penetapan);
        $ak_pengalaman = $penetapan->ak_pengalaman;
        $ak_jabatan = $rekapitulasiKegiatan->total_capaian;
        $total = $ak_kelebihan + $ak_pengalaman + $ak_jabatan;
        $kenaikanPangkat = $ketentuanNilai->ak_kp;
        $kenaikanJenjang = $ketentuanNilai->akk_kj;
        $ak_dasar = $ketentuanNilai->ak_dasar ?? 0;
        $jenjang = $this->checkKenaikanJenjang($total, $kenaikanJenjang, $ak_dasar);
        $pengembangProfesi = $this->checkPengembangProfesi($total, $rekapitulasiKegiatan->jml_ak_profesi, $ketentuanNilai->ak_bangprof ?? 0);
        $result = array_merge($this->checkKenaikanPangkat($rekapitulasiKegiatan, $total, $kenaikanPangkat, $kenaikanJenjang), [
            'ak_kelebihan' => $ak_kelebihan,
            'ak_pengalaman' => $ak_pengalaman,
            'total' => $total,
            'ak_kenaikan_pangkat' => $kenaikanPangkat,
            'ak_kenaikan_jenjang' => $kenaikanJenjang
        ], $jenjang, $pengembangProfesi);
        return $result;
    }

    public function checkKenaikanPangkat(RekapitulasiKegiatan $rekapitulasiKegiatan, $total, $kenaikanPangkat, $kenaikanJenjang)
    {
        $results = [];
        $checkKenaikanPangkat = $total - $kenaikanPangkat;
        if ($checkKenaikanPangkat >= 0) {
            # memenuhi
            $results['kelebihan_kekurangan_jabatan'] = $checkKenaikanPangkat;
            $results['jabatan'] = $rekapitulasiKegiatan->total_capaian;
            $results['status_pangkat'] = true;
        } else {
            # tidak memenuhi
            $checkKenaikanPangkat += $rekapitulasiKegiatan->jml_ak_profesi;
            if ($checkKenaikanPangkat >= 0) {
                # memenuhi
                $results['kelebihan_kekurangan_jabatan'] = $checkKenaikanPangkat;
                $results['jabatan'] = $rekapitulasiKegiatan->total_capaian;
                $results['status_pangkat'] = true;
                $results['profesi'] = $rekapitulasiKegiatan->jml_ak_profesi;
            } else {
                # tidak memenuhi
                $checkKenaikanPangkat += $rekapitulasiKegiatan->jml_ak_profesi;
                if ($checkKenaikanPangkat >= 0) {
                    # memenuhi
                    $results['kelebihan_kekurangan_jabatan'] = $checkKenaikanPangkat;
                    $results['jabatan'] = $rekapitulasiKegiatan->total_capaian;
                    $results['status_pangkat'] = true;
                    $results['penunjang'] = $rekapitulasiKegiatan->jml_ak_penunjang;
                    $results['profesi'] = $rekapitulasiKegiatan->jml_ak_profesi;
                } else {
                    # tidak memenuhi
                    $results['kelebihan_kekurangan_jabatan'] = $checkKenaikanPangkat;
                    $results['jabatan'] = $rekapitulasiKegiatan->total_capaian;
                    $results['status_pangkat'] = false;
                    $results['penunjang'] = $rekapitulasiKegiatan->jml_ak_penunjang;
                    $results['profesi'] = $rekapitulasiKegiatan->jml_ak_profesi;
                }
            }
        }
        return $results;
    }

    public function checkKenaikanJenjang($total, $kenaikanJenjang, $ak_dasar)
    {
        $checkKenaikanJenjang = $total - $kenaikanJenjang;
        if ($checkKenaikanJenjang >= 0) {
            # memenuhi
            return [
                'status_jenjang' => true,
                'kelebihan_kekurangan_jenjang' => $checkKenaikanJenjang
            ];
        }
        return [
            'status_jenjang' => false,
            'kelebihan_kekurangan_jenjang' => $checkKenaikanJenjang
        ];
    }

    public function checkPengembangProfesi($total, $ak_profesi, $ak_bangprof)
    {
        return [
            'ak_min_profesi' => $ak_bangprof,
            'kelebihan_kekurangan_profesi' => $total - $ak_profesi
        ];
    }
}
