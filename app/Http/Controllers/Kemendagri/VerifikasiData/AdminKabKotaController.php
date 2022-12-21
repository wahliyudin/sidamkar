<?php

namespace App\Http\Controllers\Kemendagri\VerifikasiData;

use App\DataTables\Kemendagri\VerifikasiData\AdminKabKotaDataTable;
use App\Http\Controllers\Controller;
use App\Services\Kemendagri\AdminKabKotaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class AdminKabKotaController extends Controller
{
    protected AdminKabKotaService $adminKabKotaService;

    public function __construct(AdminKabKotaService $adminKabKotaService)
    {
        $this->adminKabKotaService = $adminKabKotaService;
    }

    public function index()
    {
        $judul = 'Manajemen User Kab/Kota';
        return view('kemendagri.verifikasi-data.admin-kabkota.index', compact('judul'));
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::select('SELECT
                users.id,
                users.username AS nama,
                provinsis.nama AS provinsi,
                kab_kotas.nama AS kab_kota,
                user_prov_kab_kotas.file_permohonan,
                users.status_akun
            FROM users
            JOIN user_prov_kab_kotas ON user_prov_kab_kotas.user_id = users.id
            JOIN provinsis ON provinsis.id = user_prov_kab_kotas.provinsi_id
            JOIN kab_kotas ON kab_kotas.id = user_prov_kab_kotas.kab_kota_id');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('file_permohonan', function ($row) {
                    return '<div data-bs-toggle="modal" data-bs-target="#filePermohonan' . $row->id . '" style="cursor: pointer; display: flex; align-items: center;">
                        <img src="' . asset('assets/images/template/lihat-doc.png') . '" style="width: 26px;" alt="">
                        <span style="color: #0090FF; font-weight: 600;">Lihat</span>
                        ' . view('kemendagri.verifikasi-data.admin-kabkota.document', compact('row'))->render() . '
                    </div>';
                })
                ->addColumn('status', function ($row) {
                    return $this->statusAkun($row->status_akun);
                })
                ->addColumn('action', function ($row) {
                    return view('kemendagri.extensions.buttons-tolak-verif', compact('row'))->render();
                })
                ->rawColumns(['action', 'status', 'file_permohonan'])
                ->make(true);
        }
    }

    public function statusAkun($status)
    {
        switch ($status) {
            case 0:
                return '<span class="badge bg-yellow text-white text-sm py-2 px-3 rounded-md">Menunggu</span>';
                break;
            case 1:
                return '<span class="badge bg-green text-white text-sm py-2 px-3 rounded-md">Verified</span>';
                break;
            case 2:
                return '<span class="badge bg-red text-white text-sm py-2 px-3 rounded-md">Ditolak</span>';
                break;
        }
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