<?php

namespace App\Http\Controllers\Provinsi\ManajemenUser;

use App\DataTables\Provinsi\ManajemenUser\StrukturalDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StrukturalController extends Controller
{
    public function index(StrukturalDataTable $dataTable)
    {
        return $dataTable->render('provinsi.manajemen-user.struktural.index');
    }
}
