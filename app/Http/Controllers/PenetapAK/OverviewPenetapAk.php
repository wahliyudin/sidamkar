<?php

namespace App\Http\Controllers\PenetapAK;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OverviewPenetapAk extends Controller
{
    public function index() {
        return view('penetap-ak.overview');
    }
}
