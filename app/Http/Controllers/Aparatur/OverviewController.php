<?php

namespace App\Http\Controllers\Aparatur;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OverviewController extends Controller
{
    public function index()
    {
        $user = User::query()->with(['userAparatur.provinsi.kabkotas', 'dokKepegawaians', 'dokKompetensis'])->find(Auth::user()->id);
        return view('aparatur.overview', compact('user'));
    }
}
