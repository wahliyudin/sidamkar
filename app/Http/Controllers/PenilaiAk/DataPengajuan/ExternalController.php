<?php

namespace App\Http\Controllers\PenilaiAk\DataPengajuan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExternalController extends Controller
{
    public function index()
    {
        return view('penilai-ak.data-pengajuan.external.index');
    }
}