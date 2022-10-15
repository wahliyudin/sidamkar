<?php

namespace App\Http\Controllers\KabKota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataAparaturController extends Controller
{
    public function index()
    {
        return view('kabkota.data-aparatur');
    }

    public function show()
    {
        return view('kabkota.detail-data-aparatur');
    }
}
