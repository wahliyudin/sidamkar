<?php

namespace App\Http\Controllers\PenilaiAk\DataPengajuan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InternalController extends Controller
{
    public function index()
    {
        return view('penilai-ak.data-pengajuan.internal.index');
    }
}