<?php

namespace App\Http\Controllers\Kemendagri\VerifikasiData;

use App\DataTables\Kemendagri\VerifikasiData\AparaturDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AparaturController extends Controller
{
    public function index(AparaturDataTable $dataTable)
    {
        return $dataTable->render('kemendagri.verifikasi-data.aparatur.index');
    }
}
