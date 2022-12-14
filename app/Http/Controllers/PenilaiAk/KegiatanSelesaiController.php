<?php

namespace App\Http\Controllers\PenilaiAK;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KegiatanSelesaiController extends Controller
{
    public function index()
    {
        return view('penilai-ak.kegiatan-selesai.index');
    }
}
