<?php

namespace App\Http\Controllers\Kemendagri;

use App\DataTables\Kemendagri\DataProvKabKotaDataTable;
use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class DataProvKabKotaController extends Controller
{
    public function index(DataProvKabKotaDataTable $dataTable)
    {
        $provinsis = Provinsi::query()->get(['id', 'nama']);
        return $dataTable->render('kemendagri.data-prov-kab-kota.index', compact('provinsis'));
    }
}
