<?php

namespace App\Http\Controllers\PenilaiAk\DataPengajuan\Internal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnalisController extends Controller
{
    public function index()
    {
        return view('penilai-ak.data-pengajuan.internal.analis.index');
    }
}