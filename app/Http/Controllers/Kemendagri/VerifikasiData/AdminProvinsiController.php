<?php

namespace App\Http\Controllers\Kemendagri\VerifikasiData;

use App\DataTables\Kemendagri\VerifikasiData\AdminProvinsiDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProvinsiController extends Controller
{
    public function index(AdminProvinsiDataTable $dataTable)
    {
        return $dataTable->render('kemendagri.verifikasi-data.admin-provinsi.index');
    }
}
