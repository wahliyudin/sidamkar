<?php

namespace App\Services;

use App\Facades\Modules\DestructRoleFacade;
use App\Models\LaporanKegiatanJabatan;
use App\Models\Periode;
use App\Models\RekapitulasiKegiatan;
use App\Models\Rencana;
use App\Models\Unsur;
use App\Models\User;
use App\Repositories\PenilaianCapaianRepository;
use App\Repositories\PeriodeRepository;
use App\Repositories\RencanaRepository;
use App\Repositories\UnsurRepository;
use App\Traits\ScoringTrait;
use Illuminate\Validation\ValidationException;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GeneratePdfService
{
    use ScoringTrait;

    protected PeriodeRepository $periodeRepository;
    protected UnsurRepository $unsurRepository;
    protected RencanaRepository $rencanaRepository;
    protected PenilaianCapaianRepository $penilaianCapaianRepository;

    public function __construct(PeriodeRepository $periodeRepository, UnsurRepository $unsurRepository, RencanaRepository $rencanaRepository, PenilaianCapaianRepository $penilaianCapaianRepository)
    {
        $this->periodeRepository = $periodeRepository;
        $this->unsurRepository = $unsurRepository;
        $this->rencanaRepository = $rencanaRepository;
        $this->penilaianCapaianRepository = $penilaianCapaianRepository;
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

    public function generateRekapCapaian(User $user, User $atasan_langsung, Periode $periode, $ttd = null)
    {
        [$rencanas, $total_capaian] = $this->rencanaRepository->getDataRekapCapaian($user);
        $role_atasan_langsung = DestructRoleFacade::getRoleAtasanLangsung($atasan_langsung?->roles);
        $pdf_rekap = PDF::loadView('generate-pdf.rekapitulasi-capaian', compact('rencanas', 'ttd', 'user', 'atasan_langsung', 'role_atasan_langsung', 'periode'))->setPaper('A4');
        $file_name = uniqid();
        Storage::put("rekapitulasi/$file_name.pdf", $pdf_rekap->output());
        return [
            asset("storage/rekapitulasi/$file_name.pdf"),
            $file_name,
            $total_capaian
        ];
    }

    public function generatePengembang($user)
    {
        $role = DestructRoleFacade::getRoleFungsionalFirst($user->roles);
        $jenis = $this->groupRole($role);
        $penunjangs = DB::select('SELECT
                sub_unsurs.id AS sub_unsur_id,
                sub_unsurs.nama AS sub_unsur_nama,
                (CASE WHEN butir_kegiatans.score IS NOT NULL
                    THEN butir_kegiatans.nama
                    ELSE CONCAT(butir_kegiatans.nama, " ", UPPER(LEFT(sub_butir_kegiatans.nama,1)),
                        LOWER(SUBSTRING(sub_butir_kegiatans.nama,2,LENGTH(sub_butir_kegiatans.nama)))) END) AS nama,
                (CASE WHEN butir_kegiatans.score IS NOT NULL THEN butir_kegiatans.satuan_hasil ELSE sub_butir_kegiatans.satuan_hasil END) AS satuan_hasil,
                (CASE WHEN butir_kegiatans.score IS NOT NULL THEN butir_kegiatans.score ELSE sub_butir_kegiatans.score END) AS angka_kredit,
                (CASE WHEN laporan_kegiatan_penunjang_profesis.butir_kegiatan_id IS NOT NULL THEN COUNT(laporan_kegiatan_penunjang_profesis.butir_kegiatan_id) ELSE COUNT(laporan_kegiatan_penunjang_profesis.sub_butir_kegiatan_id) END) AS volume,
                SUM(laporan_kegiatan_penunjang_profesis.score) AS jumlah_ak
            FROM butir_kegiatans
            JOIN sub_unsurs ON butir_kegiatans.sub_unsur_id = sub_unsurs.id
            JOIN unsurs ON unsurs.id = sub_unsurs.unsur_id
            LEFT JOIN sub_butir_kegiatans ON butir_kegiatans.id = sub_butir_kegiatans.butir_kegiatan_id
            JOIN laporan_kegiatan_penunjang_profesis ON (laporan_kegiatan_penunjang_profesis.butir_kegiatan_id = butir_kegiatans.id OR laporan_kegiatan_penunjang_profesis.sub_butir_kegiatan_id = sub_butir_kegiatans.id)
            WHERE unsurs.jenis_aparatur = ' . '"' . $jenis . '"' . '
                AND unsurs.jenis_kegiatan_id = 2
                AND laporan_kegiatan_penunjang_profesis.status = 3
                AND laporan_kegiatan_penunjang_profesis.user_id = ' . '"' . $user->id . '"' . '
                GROUP BY laporan_kegiatan_penunjang_profesis.butir_kegiatan_id, laporan_kegiatan_penunjang_profesis.sub_butir_kegiatan_id
        ');
        $profesis = DB::select('SELECT
                sub_unsurs.id AS sub_unsur_id,
                sub_unsurs.nama AS sub_unsur_nama,
                (CASE WHEN butir_kegiatans.score IS NOT NULL
                    THEN butir_kegiatans.nama
                    ELSE CONCAT(butir_kegiatans.nama, " ", UPPER(LEFT(sub_butir_kegiatans.nama,1)),
                        LOWER(SUBSTRING(sub_butir_kegiatans.nama,2,LENGTH(sub_butir_kegiatans.nama)))) END) AS nama,
                (CASE WHEN butir_kegiatans.score IS NOT NULL THEN butir_kegiatans.satuan_hasil ELSE sub_butir_kegiatans.satuan_hasil END) AS satuan_hasil,
                (CASE WHEN butir_kegiatans.score IS NOT NULL THEN butir_kegiatans.score ELSE sub_butir_kegiatans.score END) AS angka_kredit,
                (CASE WHEN laporan_kegiatan_penunjang_profesis.butir_kegiatan_id IS NOT NULL THEN COUNT(laporan_kegiatan_penunjang_profesis.butir_kegiatan_id) ELSE COUNT(laporan_kegiatan_penunjang_profesis.sub_butir_kegiatan_id) END) AS volume,
                SUM(laporan_kegiatan_penunjang_profesis.score) AS jumlah_ak
            FROM butir_kegiatans
            JOIN sub_unsurs ON butir_kegiatans.sub_unsur_id = sub_unsurs.id
            JOIN unsurs ON unsurs.id = sub_unsurs.unsur_id
            LEFT JOIN sub_butir_kegiatans ON butir_kegiatans.id = sub_butir_kegiatans.butir_kegiatan_id
            JOIN laporan_kegiatan_penunjang_profesis ON (laporan_kegiatan_penunjang_profesis.butir_kegiatan_id = butir_kegiatans.id OR laporan_kegiatan_penunjang_profesis.sub_butir_kegiatan_id = sub_butir_kegiatans.id)
            WHERE unsurs.jenis_aparatur = ' . '"' . $jenis . '"' . '
                AND unsurs.jenis_kegiatan_id = 3
                AND laporan_kegiatan_penunjang_profesis.status = 3
                AND laporan_kegiatan_penunjang_profesis.user_id = ' . '"' . $user->id . '"' . '
                GROUP BY laporan_kegiatan_penunjang_profesis.butir_kegiatan_id, laporan_kegiatan_penunjang_profesis.sub_butir_kegiatan_id
        ');
        $pdf_rekap = PDF::loadView('generate-pdf.pengembang', compact('penunjangs', 'profesis', 'user', 'role'))
            ->setPaper('A4');
        $file_name = uniqid();
        Storage::put("rekapitulasi/$file_name.pdf", $pdf_rekap->output());
        return [
            asset("storage/rekapitulasi/$file_name.pdf"),
            $file_name
        ];
    }

    public function generatePenilaianCapaian(Periode $periode, User $user, $target_ak_skp)
    {
        $data = $this->penilaianCapaianRepository->generatePenilaianCapaian($periode, $user, $target_ak_skp);
        $pdf_rekap = PDF::loadView('generate-pdf.penilaian-capaian', compact('data'))
            ->setPaper('A4');
        $file_name = uniqid();
        Storage::put("rekapitulasi/$file_name.pdf", $pdf_rekap->output());
        return [
            asset("storage/rekapitulasi/$file_name.pdf"),
            $file_name,
            $data['result']
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