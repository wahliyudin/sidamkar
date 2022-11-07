<?php

namespace App\Http\Controllers\KabKota\VerifikasiAparatur;

use App\DataTables\KabKota\VerifikasiAparatur\PejabatFungsionalDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\KabKota;
use App\Models\Provinsi;
use App\Models\PangkatGolonganTmt;
use App\Notifications\UserVerified;
use Illuminate\Http\Request;

class PejabatFungsionalController extends Controller
{
    public function index(PejabatFungsionalDataTable $dataTable)
    {
        return $dataTable->render('kabkota.verifikasi-aparatur.pejabat-fungsional.index');
    }

    public function show($id)
    {
        // return ($id);
        $user = User::query()
            ->with(['userAparatur.provinsi.kabkotas'])->find($id);
        $provinsis = Provinsi::query()->get();
        $kab_kota = KabKota::query()->get();
        $pangkats = PangkatGolonganTmt::query()->get();
        return view('kabkota.verifikasi-aparatur.pejabat-fungsional.show', compact('user', 'provinsis', 'kab_kota', 'pangkats'));
    }
}
