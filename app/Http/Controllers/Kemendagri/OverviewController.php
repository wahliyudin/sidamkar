<?php

namespace App\Http\Controllers\Kemendagri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    public function index()
    {
        return view('kemendagri.overview');
    }
}
