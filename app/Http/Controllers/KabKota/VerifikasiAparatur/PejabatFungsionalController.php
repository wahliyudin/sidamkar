<?php

namespace App\Http\Controllers\KabKota\VerifikasiAparatur;

use App\DataTables\KabKota\VerifikasiAparatur\PejabatFungsionalDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PejabatFungsionalController extends Controller
{
    public function index(PejabatFungsionalDataTable $dataTable)
    {
        return $dataTable->render('kabkota.verifikasi-aparatur.pejabat-fungsional.index');
    }

    public function show($id)
    {
        $user = User::query()
            ->with('userAparatur')
            ->whereRoleIs(['damkar', 'analis_kebakaran'])
            ->findOrFail($id);
        return view('kabkota.verifikasi-aparatur.pejabat-fungsional.show', compact('user'));
    }

    public function verified($id)
    {
        User::query()->findOrFail($id)->update(['verified' => now()]);
        return to_route('kab-kota.verifikasi-aparatur.pejabat-fungsional.index')
            ->with('success', 'Berhasil diverifikasi');
    }
}
