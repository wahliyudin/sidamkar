<?php

namespace App\Http\Controllers\Kemendagri\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KegiatanProfesiController extends Controller
{
    public function index()
    {
        return view('kemendagri.cms.kegiatan-profesi.index');
    }
}
