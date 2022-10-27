<?php

namespace App\Http\Controllers\KabKota\VerifikasiAparatur;

use App\DataTables\KabKota\VerifikasiAparatur\PejabatFungsionalDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
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
        $user = User::query()
            ->with('userAparatur')
            ->where('verified', null)
            ->whereRoleIs(getAllRoleFungsional())
            ->findOrFail($id);
        return view('kabkota.verifikasi-aparatur.pejabat-fungsional.show', compact('user'));
    }
}
