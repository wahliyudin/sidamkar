<?php

namespace App\Http\Controllers;

use App\Models\Unsur;
use App\Models\User;
use App\Traits\AuthTrait;
use App\Traits\ScoringTrait;
use Illuminate\Http\Request;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class CobaController extends Controller
{
    use ScoringTrait, AuthTrait;

    public function index()
    {
        return Unsur::query()
            ->kegiatanJabatan()
            ->withWhereHas('subUnsurs', function($query){
                $query->withWhereHas('butirKegiatans', function($query){
                    $query->withSum('laporanKegiatanJabatans', 'score')
                        ->withCount('laporanKegiatanJabatans')
                        ->withWhereHas('laporanKegiatanJabatans', function($query){
                        $query->where('user_id', $this->authUser()->id);
                    });
                });
            })
            ->get();
        return PDF::loadView('generate-pdf.old')
            ->setPaper('a4')
            ->inline('123.pdf');
    }
}