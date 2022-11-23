<?php

namespace App\Http\Controllers\KabKota\ManajemenUser;

use App\DataTables\KabKota\ManajemenUser\FungsionalUmumDataTable;
use App\Http\Controllers\Controller;
use App\Services\FungsionalUmumService;
use Illuminate\Http\Request;

class FungsionalUmumController extends Controller
{
    private FungsionalUmumService $fungsionalUmumService;

    public function __construct(FungsionalUmumService $fungsionalUmumService)
    {
        $this->fungsionalUmumService = $fungsionalUmumService;
    }

    public function index(FungsionalUmumDataTable $dataTable)
    {
        return $dataTable->render('kabkota.manajemen-user.fungsional-umum.index');
    }

    public function reject(Request $request, $id)
    {
        $this->fungsionalUmumService->reject($request, $id);
        return response()->json([
            'success' => 200,
            'message' => "Berhasil ditolak",
        ]);
    }

    public function verification($id)
    {
        $this->fungsionalUmumService->verification($id);
        return response()->json([
            'success' => 200,
            'message' => "Akun Berhasil DIVERIFIKASI",
        ]);
    }

    public function destroy($id)
    {
        $this->fungsionalUmumService->destroy($id);
        return response()->json([
            'success' => 200,
            'message' => "Berhasil dihapus",
        ]);
    }
}
