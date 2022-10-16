<?php

namespace App\Http\Controllers\KabKota;

use App\DataTables\KabKota\DataAparaturDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class DataAparaturController extends Controller
{
    public function index(DataAparaturDataTable $dataTable)
    {
        return $dataTable->render('kabkota.data-aparatur.index');
    }

    public function show($id)
    {
        $user = User::query()
            ->with(['userAparatur', 'userPejabatStruktural'])
            ->whereRoleIs(['damkar', 'analis_kebakaran', 'atasan_langsung', 'penilai_ak', 'penetap_ak'])
            ->findOrFail($id);
        if (is_null($user->userAparatur)) {
            return view('kabkota.detail-data-aparatur');
        }
        return view('kabkota.detail-data-aparatur');
    }
}
