<?php

namespace App\Http\Controllers\Kemendagri\VerifikasiData;

use App\DataTables\Kemendagri\VerifikasiData\AdminKabKotaDataTable;
use App\Http\Controllers\Controller;
use App\Services\Kemendagri\AdminKabKotaService;
use Illuminate\Http\Request;

class AdminKabKotaController extends Controller
{
    protected AdminKabKotaService $adminKabKotaService;

    public function __construct(AdminKabKotaService $adminKabKotaService)
    {
        $this->adminKabKotaService = $adminKabKotaService;
    }

    public function index(AdminKabKotaDataTable $dataTable)
    {
        $judul = 'Manajemen User Kab/Kota';
        return $dataTable->render('kemendagri.verifikasi-data.admin-kabkota.index', compact('judul'));
    }

    public function verified($id)
    {
        $this->adminKabKotaService->verification($id);
        return response()->json([
            'success' => true,
            'message' => "Akun Berhasil DIVERIFIKASI",
        ]);
    }

    public function reject(Request $request, $id)
    {
        $this->adminKabKotaService->reject($request, $id);
        return response()->json([
            'success' => true,
            'message' => "Berhasil ditolak",
        ]);
    }

    public function hapus($id)
    {
        $this->adminKabKotaService->destroy($id);
        return response()->json([
            'success' => true,
            'message' => "Berhasil dihapus",
        ]);
    }
}