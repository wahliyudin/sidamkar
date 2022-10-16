<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return User::query()->with('kabKota.provinsi')->find(Auth::user()->id);
        if (auth()->user()->hasRole('damkar') || auth()->user()->hasRole('analis_kebakaran')) {
            return to_route('overview');
        } elseif (auth()->user()->hasRole('kab_kota')) {
            return to_route('kab-kota.overview');
        } elseif (auth()->user()->hasRole('provinsi')) {
            return to_route('provinsi.overview.index');
        } elseif (auth()->user()->hasRole('atasan_langsung')) {
            return to_route('atasan-langsung.overview.index');
        }  else {
            return view('home');
        }
    }
}
