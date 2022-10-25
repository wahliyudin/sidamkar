<?php

namespace App\Http\Controllers\Aparatur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class tabelPenunjangController extends Controller
{
    public function index() {
        return view('aparatur.tabel-penunjang');
    }
}
