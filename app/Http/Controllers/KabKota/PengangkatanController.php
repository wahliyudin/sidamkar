<?php

namespace App\Http\Controllers\KabKota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengangkatanController extends Controller
{
    public function index() {
        return view('kabkota.pengangkatan.index');
    }
}
