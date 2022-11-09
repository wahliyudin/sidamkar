<?php

namespace App\Http\Controllers\KabKota\VerifikasiAparatur;

use App\DataTables\KabKota\VerifikasiAparatur\PejabatStrukturalDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\KabKota;
use App\Models\Provinsi;
use App\Notifications\UserVerified;
use Illuminate\Http\Request;

// use App\Models\UserPejabatStruktural;
use App\Models\Role;
use App\Models\UserPejabatStruktural;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\Auth;

// use Requests Data Aparatur
use App\Http\Requests\DataAparatur\StoreDataAparatur;
use App\Models\PangkatGolonganTmt;
use Carbon\Carbon;

class PejabatStrukturalController extends Controller
{
    public function index(PejabatStrukturalDataTable $dataTable)
    {   
        $judul = 'Manajemen User';
        return $dataTable->render('kabkota.verifikasi-aparatur.pejabat-struktural.index', compact('judul'));
    }

    public function show($id)
    {
        $user = User::query()
            ->with(['userPejabatStruktural.provinsi.kabkotas'])->find($id);
        $provinsis = Provinsi::query()->get();
        $kab_kota = KabKota::query()->get();
        $pangkats = PangkatGolonganTmt::query()->get();
        return view('kabkota.verifikasi-aparatur.pejabat-struktural.show', compact('user', 'provinsis', 'kab_kota', 'pangkats'));
    }
}
