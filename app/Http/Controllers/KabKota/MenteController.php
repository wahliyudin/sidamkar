<?php

namespace App\Http\Controllers\KabKota;

use App\DataTables\KabKota\MenteDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenteController extends Controller
{
    public function index(MenteDataTable $dataTable)
    {
        return $dataTable->render('kabkota.mente.index');
    }
}
