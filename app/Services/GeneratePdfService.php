<?php

namespace App\Services;

use App\Facades\Modules\DestructRoleFacade;
use App\Models\KetentuanNilai;
use App\Models\PenetapanAngkaKredit;
use App\Models\PenetapanKenaikanPangkatJenjang;
use App\Models\Periode;
use App\Models\RekapitulasiKegiatan;
use App\Models\User;
use App\Modules\Dokumen\Penetapan;
use App\Repositories\KetentuanNilaiRepository;
use App\Repositories\PenetapanKenaikanPangkatJenjangRepository;
use App\Repositories\PenilaianCapaianRepository;
use App\Repositories\PeriodeRepository;
use App\Repositories\RekapitulasiKegiatanRepository;
use App\Repositories\RencanaRepository;
use App\Repositories\UnsurRepository;
use App\Traits\RoleTrait;
use App\Traits\ScoringTrait;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GeneratePdfService
{
    use ScoringTrait, RoleTrait;

    protected PeriodeRepository $periodeRepository;
    protected UnsurRepository $unsurRepository;
    protected RencanaRepository $rencanaRepository;
    protected PenilaianCapaianRepository $penilaianCapaianRepository;
    protected RekapitulasiKegiatanRepository $rekapitulasiKegiatanRepository;
    protected KetentuanNilaiRepository $ketentuanNilaiRepository;
    protected PenetapanKenaikanPangkatJenjangRepository $penetapanKenaikanPangkatJenjangRepository;

    public function __construct(
        PeriodeRepository $periodeRepository,
        UnsurRepository $unsurRepository,
        RencanaRepository $rencanaRepository,
        PenilaianCapaianRepository $penilaianCapaianRepository,
        RekapitulasiKegiatanRepository $rekapitulasiKegiatanRepository,
        KetentuanNilaiRepository $ketentuanNilaiRepository,
        PenetapanKenaikanPangkatJenjangRepository $penetapanKenaikanPangkatJenjangRepository
    ) {
        $this->periodeRepository = $periodeRepository;
        $this->unsurRepository = $unsurRepository;
        $this->rencanaRepository = $rencanaRepository;
        $this->penilaianCapaianRepository = $penilaianCapaianRepository;
        $this->rekapitulasiKegiatanRepository = $rekapitulasiKegiatanRepository;
        $this->ketentuanNilaiRepository = $ketentuanNilaiRepository;
        $this->penetapanKenaikanPangkatJenjangRepository = $penetapanKenaikanPangkatJenjangRepository;
    }

    public function generatePernyataan(User $user, User $atasan_langsung, $is_ttd = false, Periode $periode)
    {
        $pdf_rekap = PDF::loadView('generate-pdf.old', [
            'unsurs' => $this->unsurRepository->getRekapUnsurs($user, $periode),
            'user' => $user,
            'is_ttd' => $is_ttd,
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

    public function generateRekapCapaian(User $user, User $atasan_langsung, Periode $periode, $is_ttd_aparatur = false, $is_ttd_atasan = false)
    {
        [$rencanas, $total_capaian] = $this->rencanaRepository->getDataRekapCapaian($user, $periode);
        $role_atasan_langsung = DestructRoleFacade::getRoleAtasanLangsung($atasan_langsung?->roles);
        $pdf_rekap = PDF::loadView('generate-pdf.rekapitulasi-capaian', compact(
            'rencanas',
            'is_ttd_aparatur',
            'is_ttd_atasan',
            'total_capaian',
            'user',
            'atasan_langsung',
            'role_atasan_langsung',
            'periode'
        ))->setPaper('A4');
        $file_name = uniqid();
        Storage::put("rekapitulasi/$file_name.pdf", $pdf_rekap->output());
        return [
            asset("storage/rekapitulasi/$file_name.pdf"),
            $file_name,
            $total_capaian
        ];
    }

    public function generatePengembang(User $user, User $penilai = null, $no_surat = null, Periode $periode)
    {
        $role = DestructRoleFacade::getRoleFungsionalFirst($user->roles);
        $jenis = $this->groupRole($role);
        $penunjangs = DB::select('SELECT
                sub_unsurs.id AS sub_unsur_id,
                sub_unsurs.nama AS sub_unsur_nama,
                (CASE WHEN butir_kegiatans.score OR butir_kegiatans.percent IS NOT NULL
                        THEN butir_kegiatans.nama
                        ELSE CONCAT(butir_kegiatans.nama, " ", UPPER(LEFT(sub_butir_kegiatans.nama,1)),
                                LOWER(SUBSTRING(sub_butir_kegiatans.nama,2,LENGTH(sub_butir_kegiatans.nama)))) END) AS nama,
                (CASE WHEN butir_kegiatans.score OR butir_kegiatans.percent IS NOT NULL
                    THEN butir_kegiatans.satuan_hasil
                    ELSE sub_butir_kegiatans.satuan_hasil
                    END) AS satuan_hasil,
                (CASE WHEN butir_kegiatans.score OR butir_kegiatans.percent IS NOT NULL
                    THEN butir_kegiatans.score
                    ELSE sub_butir_kegiatans.score
                    END) AS angka_kredit,
                (CASE WHEN butir_kegiatans.score OR butir_kegiatans.percent IS NOT NULL
                    THEN (CASE WHEN butir_kegiatans.percent IS NOT NULL
                        THEN butir_kegiatans.percent END)
                    ELSE (CASE WHEN sub_butir_kegiatans.percent IS NOT NULL
                        THEN sub_butir_kegiatans.percent END)
                    END) AS angka_kredit_percent,
                (CASE WHEN laporan_kegiatan_penunjang_profesis.butir_kegiatan_id IS NOT NULL
                    THEN COUNT(laporan_kegiatan_penunjang_profesis.butir_kegiatan_id)
                    ELSE COUNT(laporan_kegiatan_penunjang_profesis.sub_butir_kegiatan_id)
                    END) AS volume,
                SUM(laporan_kegiatan_penunjang_profesis.score) AS jumlah_ak
            FROM butir_kegiatans
            JOIN sub_unsurs ON butir_kegiatans.sub_unsur_id = sub_unsurs.id
            JOIN unsurs ON unsurs.id = sub_unsurs.unsur_id
            LEFT JOIN sub_butir_kegiatans ON butir_kegiatans.id = sub_butir_kegiatans.butir_kegiatan_id
            JOIN laporan_kegiatan_penunjang_profesis ON (laporan_kegiatan_penunjang_profesis.butir_kegiatan_id = butir_kegiatans.id OR laporan_kegiatan_penunjang_profesis.sub_butir_kegiatan_id = sub_butir_kegiatans.id)
            JOIN users ON users.id = ' . '"' . $user->id . '"' . '
            JOIN user_aparaturs ON users.id = user_aparaturs.user_id
            LEFT JOIN ketentuan_nilais
                ON (ketentuan_nilais.role_id = ' . $role->id . ' AND ketentuan_nilais.pangkat_golongan_tmt_id = user_aparaturs.pangkat_golongan_tmt_id)
            WHERE unsurs.jenis_aparatur = ' . '"' . $jenis . '"' . '
                AND unsurs.jenis_kegiatan_id = 2
                AND laporan_kegiatan_penunjang_profesis.status = 3
                AND laporan_kegiatan_penunjang_profesis.periode_id = ' . $periode->id . '
                AND laporan_kegiatan_penunjang_profesis.user_id = ' . '"' . $user->id . '"' . '
                GROUP BY laporan_kegiatan_penunjang_profesis.butir_kegiatan_id, laporan_kegiatan_penunjang_profesis.sub_butir_kegiatan_id');
        $profesis = DB::select('SELECT
                sub_unsurs.id AS sub_unsur_id,
                sub_unsurs.nama AS sub_unsur_nama,
                (CASE WHEN butir_kegiatans.score OR butir_kegiatans.percent IS NOT NULL
                        THEN butir_kegiatans.nama
                        ELSE CONCAT(butir_kegiatans.nama, " ", UPPER(LEFT(sub_butir_kegiatans.nama,1)),
                                LOWER(SUBSTRING(sub_butir_kegiatans.nama,2,LENGTH(sub_butir_kegiatans.nama)))) END) AS nama,
                (CASE WHEN butir_kegiatans.score OR butir_kegiatans.percent IS NOT NULL
                    THEN butir_kegiatans.satuan_hasil
                    ELSE sub_butir_kegiatans.satuan_hasil
                    END) AS satuan_hasil,
                (CASE WHEN butir_kegiatans.score OR butir_kegiatans.percent IS NOT NULL
                    THEN butir_kegiatans.score
                    ELSE sub_butir_kegiatans.score
                    END) AS angka_kredit,
                (CASE WHEN butir_kegiatans.score OR butir_kegiatans.percent IS NOT NULL
                    THEN (CASE WHEN butir_kegiatans.percent IS NOT NULL
                        THEN butir_kegiatans.percent END)
                    ELSE (CASE WHEN sub_butir_kegiatans.percent IS NOT NULL
                        THEN sub_butir_kegiatans.percent END)
                    END) AS angka_kredit_percent,
                (CASE WHEN laporan_kegiatan_penunjang_profesis.butir_kegiatan_id IS NOT NULL
                    THEN COUNT(laporan_kegiatan_penunjang_profesis.butir_kegiatan_id)
                    ELSE COUNT(laporan_kegiatan_penunjang_profesis.sub_butir_kegiatan_id)
                    END) AS volume,
                SUM(laporan_kegiatan_penunjang_profesis.score) AS jumlah_ak
            FROM butir_kegiatans
            JOIN sub_unsurs ON butir_kegiatans.sub_unsur_id = sub_unsurs.id
            JOIN unsurs ON unsurs.id = sub_unsurs.unsur_id
            LEFT JOIN sub_butir_kegiatans ON butir_kegiatans.id = sub_butir_kegiatans.butir_kegiatan_id
            JOIN laporan_kegiatan_penunjang_profesis ON (laporan_kegiatan_penunjang_profesis.butir_kegiatan_id = butir_kegiatans.id OR laporan_kegiatan_penunjang_profesis.sub_butir_kegiatan_id = sub_butir_kegiatans.id)
            JOIN users ON users.id = ' . '"' . $user->id . '"' . '
            JOIN user_aparaturs ON users.id = user_aparaturs.user_id
            LEFT JOIN ketentuan_nilais
                ON (ketentuan_nilais.role_id = ' . $role->id . ' AND ketentuan_nilais.pangkat_golongan_tmt_id = user_aparaturs.pangkat_golongan_tmt_id)
            WHERE unsurs.jenis_aparatur = ' . '"' . $jenis . '"' . '
                AND unsurs.jenis_kegiatan_id = 3
                AND laporan_kegiatan_penunjang_profesis.status = 3
                AND laporan_kegiatan_penunjang_profesis.user_id = ' . '"' . $user->id . '"' . '
                GROUP BY laporan_kegiatan_penunjang_profesis.butir_kegiatan_id, laporan_kegiatan_penunjang_profesis.sub_butir_kegiatan_id');
        $jml_ak_penunjang = 0;
        $jml_ak_profesi = 0;
        foreach ($penunjangs as $penunjang) {
            $jml_ak_penunjang += $penunjang->jumlah_ak;
        }
        foreach ($profesis as $profesi) {
            $jml_ak_profesi += $profesi->jumlah_ak;
        }
        $ketentuanNilai = $this->ketentuanNilaiRepository->getByRolePangkat($role->id, $user->userAparatur->pangkat_golongan_tmt_id);
        $result = $this->calculateAKPenunjangProfesi($ketentuanNilai?->ak_kp, $jml_ak_penunjang);
        $pdf_rekap = PDF::loadView('generate-pdf.pengembang', compact(
            'penunjangs',
            'profesis',
            'user',
            'role',
            'penilai',
            'result',
            'no_surat'
        ))->setPaper('A4');
        $file_name = uniqid();
        Storage::put("rekapitulasi/$file_name.pdf", $pdf_rekap->output());

        return [
            asset("storage/rekapitulasi/$file_name.pdf"),
            $file_name,
            $result,
            $jml_ak_profesi
        ];
    }

    public function calculateAKPenunjangProfesi($ak_kp, $total)
    {
        $percent = $ak_kp * (20 / 100);
        if ($total <= $percent) {
            return $total;
        }
        return $percent;
    }

    public function generatePenilaianCapaian(Periode $periode, User $user, $target_ak_skp, User $penilai = null, $no_surat = null)
    {
        $data = $this->penilaianCapaianRepository->generatePenilaianCapaian($periode, $user, $target_ak_skp);
        $group_role = $this->groupRole(DestructRoleFacade::getRoleFungsionalFirst($user->roles));
        $pdf_rekap = PDF::loadView('generate-pdf.penilaian-capaian', compact('data', 'penilai', 'group_role', 'no_surat'))
            ->setPaper('A4');
        $file_name = uniqid();
        Storage::put("rekapitulasi/$file_name.pdf", $pdf_rekap->output());
        return [
            asset("storage/rekapitulasi/$file_name.pdf"),
            $file_name,
            $data['result']
        ];
    }

    public function generatePenetapan(User $user, User $penetap = null, $data = null, $is_ttd_penetap = false, $no_surat = null)
    {
        $role = DestructRoleFacade::getRoleFungsionalFirst($user->roles);
        $pdf_rekap = PDF::loadView('generate-pdf.penetapan', compact('user', 'role', 'penetap', 'data', 'is_ttd_penetap', 'no_surat'))
            ->setPaper('A4');
        $file_name = uniqid();
        Storage::put("rekapitulasi/$file_name.pdf", $pdf_rekap->output());
        return [
            asset("storage/rekapitulasi/$file_name.pdf"),
            $file_name
        ];
    }

    public function ttdRekapitulasi(RekapitulasiKegiatan $rekapitulasiKegiatan, User $user, Periode $periode, User $atasan_langsung)
    {
        [$link_pernyataan, $name_pernyataan] = $this->generatePernyataan($user, $atasan_langsung, true, $periode);
        [$link_rekap_capaian, $name_rekap_capaian, $total_capaian] = $this->generateRekapCapaian($user, $atasan_langsung, $periode, true, true);
        $rekapitulasiKegiatan->update([
            'link_pernyataan' => $link_pernyataan,
            'name_pernyataan' => $name_pernyataan,
            'link_rekap_capaian' => $link_rekap_capaian,
            'name_rekap_capaian' => $name_rekap_capaian
        ]);
        $this->rekapitulasiKegiatanRepository->ttdAtasanLangsung($rekapitulasiKegiatan);
        $rekapitulasiKegiatan->historyRekapitulasiKegiatans()->create([
            'content' => 'Rekapitulasi ditanda tangani Atasan Langsung'
        ]);
    }

    public function storePenetapan(User $user, User $penetap = null, Periode $periode, $is_ttd_penetap = false, $no_surat_penetapan = null, $keterangan_1 = null, $keterangan_2 = null, $keterangan_3 = null, $keterangan_4 = null, $keterangan_5 = null)
    {
        $data = $this->processPenetapan($user, $periode);
        $role = DestructRoleFacade::getRoleFungsionalFirst($user->roles);
        if (isset($data['angkaKenaikanJenjang']) && $data['angkaKenaikanJenjang'] > 0 && isset($data['angkaKenaikanPangkat']) && $data['angkaKenaikanPangkat'] > 0) {
            if (isset($data['kelebihanKekuranganPangkat']) && $data['kelebihanKekuranganPangkat'] < 0 && isset($data['kelebihanKekuranganJenjang']) && $data['kelebihanKekuranganJenjang'] < 0) {
                $data['role_selanjutnya'] = $this->getJenjangSelanjutnya($role?->name);
                $data['pangkat_selanjutnya'] = $this->getPangkatSelanjutnya($user?->userAparatur->pangkatGolonganTmt->nama);
                $this->penetapanKenaikanPangkatJenjangRepository->storeNaikPangkatJenjang($user, $periode);
            }
        } elseif (isset($data['angkaKenaikanJenjang']) && $data['angkaKenaikanJenjang'] > 0 && isset($data['angkaKenaikanPangkat']) && $data['angkaKenaikanPangkat'] == 0) {
            if (isset($data['kelebihanKekuranganPangkat']) && $data['kelebihanKekuranganPangkat'] < 0) {
                $data['role_selanjutnya'] = $this->getJenjangSelanjutnya($role?->name);
                $data['ropangkatelanjutnya'] = $this->getPangkatSelanjutnya($user?->userAparatur->pangkatGolonganTmt->nama);
                $this->penetapanKenaikanPangkatJenjangRepository->storeNaikPangkatJenjang($user, $periode);
            }
        } else {
            PenetapanKenaikanPangkatJenjang::query()->updateOrCreate([
                'fungsional_id' => $user->id,
                'periode_id' => $periode->id
            ], [
                'fungsional_id' => $user->id,
                'periode_id' => $periode->id,
                'naik_jenjang' => false,
                'naik_pangkat' => false
            ]);
        }
        PenetapanAngkaKredit::query()->updateOrCreate([
            'periode_id' => $periode->id,
            'user_id' => $user->id
        ], [
            'periode_id' => $periode->id,
            'user_id' => $user->id,
            'total_ak_kumulatif' => isset($data['total']) ? $data['total'] : 0
        ]);
        $data['role'] = $role->display_name;
        [$link_penetapan, $name_penetapan] = $this->generatePenetapan($user, $penetap, $data, $is_ttd_penetap, $no_surat_penetapan);
        $rekapResult = [
            'link_penetapan' => $link_penetapan,
            'name_penetapan' => $name_penetapan
        ];
        if (!is_null($keterangan_1)) {
            $rekapResult['keterangan_1'] = $keterangan_1;
        }
        if (!is_null($keterangan_2)) {
            $rekapResult['keterangan_2'] = $keterangan_2;
        }
        if (!is_null($keterangan_3)) {
            $rekapResult['keterangan_3'] = $keterangan_3;
        }
        if (!is_null($keterangan_4)) {
            $rekapResult['keterangan_4'] = $keterangan_4;
        }
        if (!is_null($keterangan_5)) {
            $rekapResult['keterangan_5'] = $keterangan_5;
        }
        RekapitulasiKegiatan::query()->where('periode_id', $periode->id)
            ->where('fungsional_id', $user->id)
            ->first()
            ?->update($rekapResult);
    }

    public function processPenetapan(User $user, Periode $periode)
    {
        $user = $user->load(['roles', 'userAparatur']);
        $penetapan = PenetapanAngkaKredit::query()
            ->where('user_id', $user->id)
            ->where('periode_id', $periode->id)
            ->first();
        $penetapanOld = PenetapanAngkaKredit::query()
            ->where('user_id', $user->id)
            ->where('periode_id', $periode->id - 1)
            ->first();
        $role = DestructRoleFacade::getRoleFungsionalFirst($user->roles);
        $rekapitulasiKegiatan = $this->rekapitulasiKegiatanRepository->getRekapByFungsionalAndPeriode($user, $periode->id);
        $ketentuanNilai = KetentuanNilai::query()
            ->where('pangkat_golongan_tmt_id', $user->userAparatur->pangkat_golongan_tmt_id)
            ->where('role_id', $role->id)
            ->first();
        $rekapitulasiKegiatanOld = $this->rekapitulasiKegiatanRepository->getRekapByFungsionalAndPeriode($user, $periode->id - 1);
        return (new Penetapan($user, $rekapitulasiKegiatan, $ketentuanNilai, $penetapan, $rekapitulasiKegiatanOld))->process()->getResult();
    }
}