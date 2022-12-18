<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class CobaController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        // dd(Auth::user()->roles()->first());
        return view('chatbox');
    }
}