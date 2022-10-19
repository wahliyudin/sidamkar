<?php

namespace App\Http\Controllers\Kemendagri;

use App\DataTables\Kemendagri\PejabatStrukturalDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PejabatStrukturalController extends Controller
{
    public function index(PejabatStrukturalDataTable $dataTable)
    {
        return $dataTable->render('kemendagri.pejabat-struktural.index');
    }

    public function show($id)
    {
        return view('kemendagri.pejabat-struktural.show');
    }
}
