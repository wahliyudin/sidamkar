<?php

namespace App\Http\Controllers\AtasanLangsung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengajuanKegiatanController extends Controller
{
    public function index()
    {
        return view('atasan-langsung.pengajuan-kegiatan.index');
    }
}