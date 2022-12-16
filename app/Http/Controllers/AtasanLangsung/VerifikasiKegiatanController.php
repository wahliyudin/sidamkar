<?php

namespace App\Http\Controllers\AtasanLangsung;

use App\DataTables\AtasanLangsung\VerifikasiKegiatanDataTable;
use App\Http\Controllers\Controller;

class VerifikasiKegiatanController extends Controller
{
    public function index(VerifikasiKegiatanDataTable $dataTable)
    {
        $judul = 'Verifikasi Kegiatan';
        return $dataTable->render('atasan-langsung.verifikasi-kegiatan.index', compact('judul'));
    }
}