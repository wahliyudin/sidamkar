<?php

namespace App\Http\Controllers\KabKota;

use App\DataTables\VerifikasiAparaturDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerifikasiAparaturController extends Controller
{
    public function index(VerifikasiAparaturDataTable $dataTable)
    {
        return $dataTable->render('kabkota.verifikasi-data');
    }
}
