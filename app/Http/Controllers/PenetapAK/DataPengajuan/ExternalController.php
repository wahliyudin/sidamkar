<?php

namespace App\Http\Controllers\PenetapAK\DataPengajuan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExternalController extends Controller
{
    public function index()
    {
        return view('penetap-ak.data-pengajuan.external.index');
    }
}