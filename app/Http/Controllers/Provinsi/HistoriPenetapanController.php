<?php

namespace App\Http\Controllers\Provinsi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HistoriPenetapanController extends Controller
{
    public function index() {
        return view('provinsi.histori-penetapan.index');
    }
}
