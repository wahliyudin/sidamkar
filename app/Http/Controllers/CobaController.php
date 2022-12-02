<?php

namespace App\Http\Controllers;

use App\Models\CrossPenilaiAndPenetap;
use App\Models\KabProvPenilaiAndPenetap;
use App\Models\LaporanKegiatanJabatan;
use App\Models\Provinsi;
use App\Models\Unsur;
use App\Models\User;
use App\Traits\AuthTrait;
use App\Traits\ScoringTrait;
use Illuminate\Http\Request;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Support\Facades\DB;

class CobaController extends Controller
{
    use ScoringTrait, AuthTrait;

    public function index()
    {
        // $unsurs = Unsur::query()
        //     ->kegiatanJabatan()
        //     ->withWhereHas('subUnsurs', function ($query) {
        //         $query->withWhereHas('butirKegiatans', function ($query) {
        //             $query->withSum('laporanKegiatanJabatans', 'score')
        //                 ->withCount('laporanKegiatanJabatans')
        //                 ->withWhereHas('laporanKegiatanJabatans', function ($query) {
        //                     $query->where('user_id', $this->authUser()->id);
        //                 });
        //         });
        //     })
        //     ->get();
        $unsurs = DB::table('laporan_kegiatan_jabatans')
            ->select('current_date', DB::raw("count(*) as laporan_count"), DB::raw("sum(score) as laporan_sum"))
            ->groupBy('current_date')
            ->get();
        return $unsurs;
    }
}