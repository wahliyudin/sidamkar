<?php

namespace App\Http\Controllers\KabKota\ManajemenUser;

use App\DataTables\KabKota\ManajemenUser\FungsionalDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FungsionalController extends Controller
{
    public function index(FungsionalDataTable $dataTable)
    {
        return $dataTable->render('kabkota.manajemen-user.fungsional.index');
    }
}
