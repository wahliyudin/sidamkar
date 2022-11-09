<?php

namespace App\Http\Controllers\KabKota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    public function index()
    {   
        $judul = 'Kab/Kota Dasboard';
        return view('kabkota.overview', compact('judul'));
    }
}
