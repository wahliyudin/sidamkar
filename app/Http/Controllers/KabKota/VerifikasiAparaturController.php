<?php

namespace App\Http\Controllers\KabKota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerifikasiAparaturController extends Controller
{
    public function index()
    {
        return view('kabkota.verifikasi-data');
    }
}
