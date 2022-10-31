<?php

namespace App\Http\Controllers\KabKota\DataAparatur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PejabatstrukturalController extends Controller
{
    public function index()
    {
        return view('kabkota.data-aparatur.pejabat-struktural.index');
    }
}
