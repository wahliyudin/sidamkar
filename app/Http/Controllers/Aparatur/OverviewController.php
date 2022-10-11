<?php

namespace App\Http\Controllers\Aparatur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    public function index()
    {
        return view('overview');
    }
}
