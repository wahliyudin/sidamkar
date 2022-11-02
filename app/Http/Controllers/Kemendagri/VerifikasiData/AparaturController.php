<?php

namespace App\Http\Controllers\Kemendagri\VerifikasiData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AparaturController extends Controller
{
    public function index()
    {
        return view('kemendagri.verifikasi-data.aparatur.aparatur');
    }
}
