<?php

namespace App\Http\Controllers\PenilaiAk\DataPengajuan;

use App\DataTables\PenilaiAk\DataPengajuan\InternalDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InternalController extends Controller
{
    public function index(InternalDataTable $dataTable)
    {
        return $dataTable->render('penilai-ak.data-pengajuan.internal.index');
    }
}