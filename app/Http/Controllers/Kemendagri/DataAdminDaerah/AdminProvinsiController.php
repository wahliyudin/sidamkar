<?php

namespace App\Http\Controllers\Kemendagri\DataAdminDaerah;

use App\DataTables\Kemendagri\DataAdminDaerah\AdminProvinsiDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminProvinsiController extends Controller
{
    public function index(AdminProvinsiDataTable $dataTable)
    {
        return $dataTable->render('kemendagri.data-admin-daerah.admin-provinsi.index');
    }

    public function showDoc($id)
    {
        return view('kemendagri.verifikasi-data.document');
    }
}
