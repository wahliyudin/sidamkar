<?php

namespace App\Http\Controllers;

use App\Models\CrossPenilaiAndPenetap;
use App\Models\KabProvPenilaiAndPenetap;
use App\Models\Provinsi;
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
        dd(Provinsi::query()->create([
        'nama' => 'Coba Provinsi'
        ]));
    }
}