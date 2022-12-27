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
        if (
            auth()->user()->hasRole('damkar_pemula') ||
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
        } elseif (
            auth()->user()->hasRole('atasan_langsung') ||
            auth()->user()->hasRole('penilai_ak_damkar') ||
            auth()->user()->hasRole('penilai_ak_analis') ||
            auth()->user()->hasRole('penetap_ak_damkar') ||
            auth()->user()->hasRole('penetap_ak_analis')
        ) {
            return to_route('struktural.dashboard');
        } elseif (auth()->user()->hasRole('kemendagri')) {
            return to_route('kemendagri.overview.index');
        } elseif (auth()->user()->hasRole('penilai_ak_damkar_kemendagri')) {
            return to_route('penilai-ak-damkar-kemendagri.data-pengajuan');
        } elseif (auth()->user()->hasRole('penetap_ak_damkar_kemendagri')) {
            return to_route('penetap-ak-damkar-kemendagri.data-pengajuan');
        } elseif (auth()->user()->hasRole('penilai_ak_analis_kemendagri')) {
            return to_route('penilai-ak-analis-kemendagri.data-pengajuan');
        } elseif (auth()->user()->hasRole('penetap_ak_analis_kemendagri')) {
            return to_route('penetap-ak-analis-kemendagri.data-pengajuan');
        } else {
            return to_route('login')->with('warning', 'Kamu Tidak Dapat Mengakses Sistem');
        }
    }
}