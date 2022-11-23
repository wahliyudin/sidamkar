<?php

namespace App\Http\Controllers\Provinsi\ManajemenUser;

use App\DataTables\Provinsi\ManajemenUser\UserKabKotaDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserKabKotaController extends Controller
{
    public function index(UserKabKotaDataTable $dataTable)
    {
        return $dataTable->render('provinsi.manajemen-user.user-kab-kota.index');
    }
}
