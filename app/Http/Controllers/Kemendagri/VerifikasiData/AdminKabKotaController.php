<?php

namespace App\Http\Controllers\Kemendagri\VerifikasiData;

use App\DataTables\Kemendagri\VerifikasiData\AdminKabKotaDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminKabKotaController extends Controller
{
    public function index(AdminKabKotaDataTable $dataTable)
    {
        return $dataTable->render('kemendagri.verifikasi-data.admin-kabkota.index');
    }
}
