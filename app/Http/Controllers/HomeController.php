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
        if (auth()->user()->hasRole('damkar_pemula') ||
            auth()->user()->hasRole('damkar_terampil') ||
            auth()->user()->hasRole('damkar_mahir') ||
            auth()->user()->hasRole('damkar_penyelia') ||
            auth()->user()->hasRole('analis_kebakaran_ahli_pertama') ||
            auth()->user()->hasRole('analis_kebakaran_ahli_muda') ||
            auth()->user()->hasRole('analis_kebakaran_ahli_madya')
            ) {
            return to_route('overview');
        } elseif (auth()->user()->hasRole('kab_kota')) {
            return to_route('kab-kota.overview');
        } elseif (auth()->user()->hasRole('provinsi')) {
            return to_route('provinsi.overview.index');
        } elseif (auth()->user()->hasRole('atasan_langsung')) {
            return to_route('atasan-langsung.overview.index');
        }elseif (auth()->user()->hasRole('penilai_ak')) {
            return to_route('penilai-ak.overview');
        } elseif (auth()->user()->hasRole('kemendagri')) {
            return to_route('kemendagri.overview.index');
        } elseif (auth()->user()->hasRole('penetap_ak')) {
            return to_route('penetap-ak.overview');
        } else {
            return view('home');
        }
    }
}
