<?php

namespace App\Http\Controllers\Provinsi\ManajemenUser;

use App\DataTables\Provinsi\ManajemenUser\FungsionalDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FungsionalController extends Controller
{
    public function index(FungsionalDataTable $dataTable)
    {
        return $dataTable->render('provinsi.manajemen-user.fungsional.index');
    }
}
