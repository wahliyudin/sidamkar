<?php

namespace App\Http\Controllers\Kemendagri\VerifikasiData;

use App\DataTables\Kemendagri\VerifikasiData\AdminProvinsiDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\UserReject;
use App\Notifications\UserVerified;
use Illuminate\Http\Request;

class AdminProvinsiController extends Controller
{
    public function index(AdminProvinsiDataTable $dataTable)
    {
        return $dataTable->render('kemendagri.verifikasi-data.admin-provinsi.index');
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
