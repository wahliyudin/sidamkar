<?php

namespace App\Http\Controllers\Kemendagri\VerifikasiData;

use App\DataTables\Kemendagri\VerifikasiData\AdminProvinsiDataTable;
use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use App\Models\User;
use App\Notifications\UserReject;
use App\Notifications\UserVerified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class AdminProvinsiController extends Controller
{
    public function index()
    {
        $judul = 'Manajemen User Provinsi';
        $provinsis = Provinsi::query()->get(['id', 'nama']);
        return view('kemendagri.verifikasi-data.admin-provinsi.index', compact('judul', 'provinsis'));
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::select('SELECT
                    users.id,
                    users.username AS nama,
                    provinsis.nama AS provinsi,
                    user_prov_kab_kotas.file_permohonan,
                    users.status_akun
            FROM users
            JOIN user_prov_kab_kotas ON user_prov_kab_kotas.user_id = users.id
            JOIN provinsis ON provinsis.id = user_prov_kab_kotas.provinsi_id
            JOIN role_user ON role_user.user_id = users.id
            JOIN roles ON roles.id = role_user.role_id
            WHERE roles.name = "provinsi"');
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
        $user = User::query()->with('userProvKabKota')->find($id);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => "Data tidak ditemukan",
            ]);
        }
        $user->update(['status_akun' => 1]);
        $user->notify(new UserVerified());
        return response()->json([
            'success' => true,
            'message' => "Berhasil diverifikasi",
        ]);
    }

    public function reject(Request $request, $id)
    {
        $user = User::query()->with('userProvKabKota')->find($id);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => "Data tidak ditemukan",
            ]);
        }
        $user->update(['status_akun' => 2]);
        $user->notify(new UserReject($request->catatan));
        return response()->json([
            'success' => true,
            'message' => "Berhasil ditolak",
        ]);
    }

    public function hapus($id)
    {
        $user = User::query()->with('userProvKabKota')->find($id);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => "Data tidak ditemukan",
            ]);
        }
        deleteImage($user->userProvKabKota?->file_permohonan);
        $user->delete();
        return response()->json([
            'success' => true,
            'message' => "Berhasil dihapus",
        ]);
    }
}