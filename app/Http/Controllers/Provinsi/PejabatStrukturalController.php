<?php

namespace App\Http\Controllers\provinsi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PejabatStrukturalController extends Controller
{
    public function index() {
        return view('provinsi.pejabat-struktural');
    }
}
