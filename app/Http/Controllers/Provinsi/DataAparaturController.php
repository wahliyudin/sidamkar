<?php

namespace App\Http\Controllers\Provinsi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataAparaturController extends Controller
{
    public function index() {
        return view('provinsi.aparatur.data-aparatur');
    }
}
