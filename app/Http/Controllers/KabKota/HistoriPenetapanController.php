<?php

namespace App\Http\Controllers\KabKota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HistoriPenetapanController extends Controller
{
    public function index()
    {
        return view('kabkota.histori-penetapan.index');
    }
}