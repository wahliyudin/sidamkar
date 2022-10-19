<?php

namespace App\Http\Controllers\Kemendagri\DataAdminDaerah;

use App\DataTables\Kemendagri\DataAdminDaerah\AdminKabKotaDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminKabKotaController extends Controller
{
    public function index(AdminKabKotaDataTable $dataTable)
    {
        return $dataTable->render('kemendagri.data-admin-daerah.admin-kabkota.index');
    }
}
