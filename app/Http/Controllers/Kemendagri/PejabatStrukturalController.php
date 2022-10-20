<?php

namespace App\Http\Controllers\Kemendagri;

use App\DataTables\Kemendagri\PejabatStrukturalDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PejabatStrukturalController extends Controller
{
    public function index(PejabatStrukturalDataTable $dataTable)
    {
        return $dataTable->render('kemendagri.pejabat-struktural.index');
    }

    public function show($id)
    {
        return view('kemendagri.pejabat-struktural.show');
    }

    public function nonActive(Request $request, $id)
    {
        $user = User::query()->find($id);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
            ]);
        }
        $user->userPejabatStruktural()->update([
            'is_active' => false,
            'catatan' => $request->catatan
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Berhasil dinonaktifkan',
        ]);
    }

    public function active($id)
    {
        $user = User::query()->find($id);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
            ]);
        }
        $user->userPejabatStruktural()->update([
            'is_active' => true,
            'catatan' => null
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Berhasil diaktifkan',
        ]);
    }
}
