<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CobaController extends Controller
{
    public function index()
    {
        return view('sweet');
    }

    public function delete($id)
    {
        return response()->json([
            'success' => true,
            'message' => $id,
        ]);
    }
}
