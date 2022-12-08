<?php

namespace App\Http\Controllers;

use App\Models\CrossPenilaiAndPenetap;
use App\Models\KabProvPenilaiAndPenetap;
use App\Models\LaporanKegiatanJabatan;
use App\Models\Provinsi;
use App\Models\RekapitulasiKegiatan;
use App\Models\Rencana;
use App\Models\Unsur;
use App\Models\User;
use App\Repositories\PeriodeRepository;
use App\Traits\AuthTrait;
use App\Traits\ScoringTrait;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class CobaController extends Controller
{
    use ScoringTrait, AuthTrait;

    private PeriodeRepository $periodeRepository;

    public function __construct(PeriodeRepository $periodeRepository)
    {
        $this->periodeRepository = $periodeRepository;
    }

    public function index()
    {
        // kab_kota_id
        // return DB::table('unsurs')->select([
        //     'laporan_kegiatan_jabatans.id as laporan_jabatan_id',
        //     'unsurs.id as unsur_id',
        //     'unsurs.nama as unsur',
        //     'sub_unsurs.id as sub_unsur_id',
        //     'sub_unsurs.nama as sub_unsur',
        //     'butir_kegiatans.nama as butir',
        //     DB::raw('DATE(laporan_kegiatan_jabatans.current_date) as tanggal'),
        //     'butir_kegiatans.satuan_hasil',
        //     DB::raw('COUNT(laporan_kegiatan_jabatans.butir_kegiatan_id) as volume'),
        //     'butir_kegiatans.score',
        //     DB::raw('SUM(laporan_kegiatan_jabatans.score) as jumlah_angka_kredit')
        // ])->join('sub_unsurs', 'unsurs.id', '=', 'sub_unsurs.unsur_id')
        // ->join('butir_kegiatans', 'sub_unsurs.id', '=', 'butir_kegiatans.sub_unsur_id')
        // ->join('laporan_kegiatan_jabatans', 'butir_kegiatans.id', '=', 'laporan_kegiatan_jabatans.butir_kegiatan_id')
        // ->where('laporan_kegiatan_jabatans.status', '=', 3)
        // ->groupBy('butir_kegiatans.id', DB::raw('DATE(laporan_kegiatan_jabatans.current_date)'))
        // ->orderByDesc(DB::raw('DATE(laporan_kegiatan_jabatans.current_date)'))
        // ->orderBy('butir_kegiatans.id')
        // ->get();
        return DB::select('SELECT laporan_kegiatan_jabatans.id as laporan_jabatan_id, unsurs.id as unsur_id, unsurs.nama as unsur, sub_unsurs.id as sub_unsur_id, sub_unsurs.nama as sub_unsur, butir_kegiatans.nama as butir, DATE(laporan_kegiatan_jabatans.current_date) as tanggal, butir_kegiatans.satuan_hasil, COUNT(laporan_kegiatan_jabatans.butir_kegiatan_id) as volume, butir_kegiatans.score, SUM(laporan_kegiatan_jabatans.score) as jumlah_angka_kredit FROM unsurs JOIN sub_unsurs ON unsurs.id = sub_unsurs.unsur_id JOIN butir_kegiatans ON sub_unsurs.id = butir_kegiatans.sub_unsur_id JOIN laporan_kegiatan_jabatans ON butir_kegiatans.id = laporan_kegiatan_jabatans.butir_kegiatan_id WHERE laporan_kegiatan_jabatans.status = 3 GROUP BY butir_kegiatans.id, DATE(laporan_kegiatan_jabatans.current_date) ORDER BY DATE(laporan_kegiatan_jabatans.current_date) DESC, butir_kegiatans.id ASC');
    }
}