<?php

namespace App\Http\Controllers\Aparatur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataSayaController extends Controller
{
    public function index()
    {
        return view('aparatur.data-saya');
    }
}
