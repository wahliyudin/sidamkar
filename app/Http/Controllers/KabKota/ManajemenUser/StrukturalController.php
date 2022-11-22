<?php

namespace App\Http\Controllers\KabKota\ManajemenUser;

use App\DataTables\KabKota\ManajemenUser\StrukturalDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StrukturalController extends Controller
{
    public function index(StrukturalDataTable $dataTable)
    {
        return $dataTable->render('kabkota.manajemen-user.struktural.index');
    }
}
