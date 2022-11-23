<?php

namespace App\Http\Controllers\KabKota\ManajemenUser;

use App\DataTables\KabKota\ManajemenUser\FungsionalDataTable;
use App\Http\Controllers\Controller;
use App\Services\KabKota\ManajemenUser\FungsionalService;
use Illuminate\Http\Request;

class FungsionalController extends Controller
{
    private FungsionalService $fungsionalService;

    public function __construct(FungsionalService $fungsionalService)
    {
        $this->fungsionalService = $fungsionalService;
    }

    public function index(FungsionalDataTable $dataTable)
    {
        return $dataTable->render('kabkota.manajemen-user.fungsional.index');
    }

    public function reject(Request $request, $id)
    {
        $this->fungsionalService->reject($request, $id);
        return response()->json([
            'success' => 200,
            'message' => "Berhasil ditolak",
        ]);
    }

    public function verification($id)
    {
        $this->fungsionalService->verification($id);
        return response()->json([
            'success' => 200,
            'message' => "Akun Berhasil DIVERIFIKASI",
        ]);
    }

    public function destroy($id)
    {
        $this->fungsionalService->destroy($id);
        return response()->json([
            'success' => 200,
            'message' => "Berhasil dihapus",
        ]);
    }
}
