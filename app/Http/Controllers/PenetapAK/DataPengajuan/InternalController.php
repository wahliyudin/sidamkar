<?php

namespace App\Http\Controllers\PenetapAK\DataPengajuan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InternalController extends Controller
{
    public function index()
    {
        return view('penetap-ak.data-pengajuan.internal.index');
    }
}