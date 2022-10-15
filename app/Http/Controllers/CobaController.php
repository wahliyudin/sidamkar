<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CobaController extends Controller
{
    public function index()
    {
        return view('coba');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
