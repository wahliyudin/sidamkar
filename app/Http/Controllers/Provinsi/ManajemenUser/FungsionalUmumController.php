<?php

namespace App\Http\Controllers\Provinsi\ManajemenUser;

use App\DataTables\Provinsi\ManajemenUser\FungsionalUmumDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FungsionalUmumController extends Controller
{
    public function index(FungsionalUmumDataTable $dataTable)
    {
        return $dataTable->render('provinsi.manajemen-user.fungsional-umum.index');
    }
}
