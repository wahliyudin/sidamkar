<?php

namespace App\Http\Controllers\Provinsi\ManajemenUser;

use App\DataTables\Provinsi\ManajemenUser\StrukturalDataTable;
use App\Http\Controllers\Controller;
use App\Services\StrukturalService;
use Illuminate\Http\Request;

class StrukturalController extends Controller
{
    private StrukturalService $strukturalService;

    public function __construct(StrukturalService $strukturalService)
    {
        $this->strukturalService = $strukturalService;
    }

    public function index(StrukturalDataTable $dataTable)
    {
        return $dataTable->render('provinsi.manajemen-user.struktural.index');
    }


    public function reject(Request $request, $id)
    {
        $this->strukturalService->reject($request, $id);
        return response()->json([
            'success' => 200,
            'message' => "Berhasil ditolak",
        ]);
    }

    public function verification($id)
    {
        $this->strukturalService->verification($id);
        return response()->json([
            'success' => 200,
            'message' => "Akun Berhasil DIVERIFIKASI",
        ]);
    }

    public function destroy($id)
    {
        $this->strukturalService->destroy($id);
        return response()->json([
            'success' => 200,
            'message' => "Berhasil dihapus",
        ]);
    }
}
