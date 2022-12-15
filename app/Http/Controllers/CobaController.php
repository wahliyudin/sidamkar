<?php

namespace App\Http\Controllers;

use App\Facades\Repositories\RekapitulasiKegiatanFacade;
use App\Models\CrossPenilaiAndPenetap;
use App\Models\JenisKegiatan;
use App\Models\KabProvPenilaiAndPenetap;
use App\Models\LaporanKegiatanJabatan;
use App\Models\Provinsi;
use App\Models\RekapitulasiKegiatan;
use App\Models\Rencana;
use App\Models\Role;
use App\Models\SubUnsur;
use App\Models\Unsur;
use App\Models\User;
use App\Repositories\PeriodeRepository;
use App\Services\Aparatur\LaporanKegiatan\KegiatanProfesiService;
use App\Traits\AuthTrait;
use App\Traits\DataTableTrait;
use App\Traits\ScoringTrait;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class CobaController extends Controller
{
    use ScoringTrait, AuthTrait, DataTableTrait;

    private PeriodeRepository $periodeRepository;
    private KegiatanProfesiService $kegiatanProfesiService;

    public function __construct(PeriodeRepository $periodeRepository, KegiatanProfesiService $kegiatanProfesiService)
    {
        $this->periodeRepository = $periodeRepository;
    }

    public function index()
    {
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
            WHERE unsurs.jenis_aparatur = "analis"
                AND unsurs.jenis_kegiatan_id = 2
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
            WHERE unsurs.jenis_aparatur = "analis"
                AND unsurs.jenis_kegiatan_id = 3
                GROUP BY laporan_kegiatan_penunjang_profesis.butir_kegiatan_id, laporan_kegiatan_penunjang_profesis.sub_butir_kegiatan_id
        ');
        $pdf_rekap = PDF::loadView('generate-pdf.pengembang', compact('penunjangs', 'profesis'))
            ->setPaper('A4');
        unlink(public_path('coba.pdf'));
        $pdf_rekap->save('coba.pdf');
        return response()->file('coba.pdf');
    }
}