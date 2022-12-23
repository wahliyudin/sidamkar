<?php

namespace App\Http\Controllers\Provinsi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengangkatanController extends Controller
{
    public function index()
    {
        return view('provinsi.pengangkatan.index');
    }
}
