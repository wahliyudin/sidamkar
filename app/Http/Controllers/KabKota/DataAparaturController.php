<?php

namespace App\Http\Controllers\KabKota;

use App\DataTables\KabKota\DataAparaturDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DataAparaturController extends Controller
{
    public function index(DataAparaturDataTable $dataTable)
    {
        return $dataTable->render('kabkota.data-aparatur.index');
    }

    public function show($id)
    {
        dd(User::query()->with('userAparatur')->findOrFail($id));
        return view('kabkota.detail-data-aparatur');
    }
}
