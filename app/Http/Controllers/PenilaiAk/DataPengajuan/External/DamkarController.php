<?php

namespace App\Http\Controllers\PenilaiAk\DataPengajuan\External;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DamkarController extends Controller
{
    public function index()
    {
        return view('penilai-ak.data-pengajuan.external.damkar.index');
    }
}