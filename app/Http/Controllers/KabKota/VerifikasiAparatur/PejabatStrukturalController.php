<?php

namespace App\Http\Controllers\KabKota\VerifikasiAparatur;

use App\DataTables\KabKota\VerifikasiAparatur\PejabatStrukturalDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PejabatStrukturalController extends Controller
{
    public function index(PejabatStrukturalDataTable $dataTable)
    {
        return $dataTable->render('kabkota.verifikasi-aparatur.pejabat-struktural.index');
    }

    public function show($id)
    {
        $user = User::query()
            ->with('userPejabatStruktural')
            ->whereRoleIs(['atasan_langsung', 'penilai_ak', 'penetap_ak'])
            ->findOrFail($id);
        return view('kabkota.verifikasi-aparatur.pejabat-struktural.show', compact('user'));
    }

    public function verified($id)
    {
        User::query()->findOrFail($id)->update(['verified' => now()]);
        return to_route('kab-kota.verifikasi-aparatur.pejabat-struktural.index')
            ->with('success', 'Berhasil diverifikasi');
    }
}
