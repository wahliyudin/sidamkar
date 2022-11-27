<?php

namespace App\Http\Controllers\KabKota\ManajemenUser;

use App\DataTables\KabKota\ManajemenUser\StrukturalDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RejectRequest;
use App\Http\Requests\VerifStrukturalRequest;
use App\Services\KabKota\StrukturalService;
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
        return $dataTable->render('kabkota.manajemen-user.struktural.index');
    }

    public function reject(RejectRequest $request, $id)
    {
        $this->strukturalService->reject($request, $id);
        return response()->json([
            'success' => 200,
            'message' => "Berhasil ditolak",
        ]);
    }

    public function verification(VerifStrukturalRequest $requset, $id)
    {
        $this->strukturalService->verificationStruktural($requset, $id);
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