<?php

namespace App\Http\Controllers\KabKota\ManajemenUser;

use App\DataTables\KabKota\ManajemenUser\FungsionalUmumDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FungsionalUmumController extends Controller
{
    public function index(FungsionalUmumDataTable $dataTable)
    {
        return $dataTable->render('kabkota.manajemen-user.fungsional-umum.index');
    }
}
