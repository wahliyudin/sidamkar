<?php

namespace App\Http\Controllers\KabKota\VerifikasiAparatur;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\UserReject;
use App\Notifications\UserVerified;
use Illuminate\Http\Request;

class VerifikasiAparaturController extends Controller
{
    public function verified($id)
    {
        $user = User::query()->with('userAparatur', 'userPejabatStruktural')->findOrFail($id);
        $user->update(['status_akun' => 1]);
        $user->notify(new UserVerified());
        return response()->json([
            'success' => true,
            'message' => "Berhasil diverifikasi",
        ]);
    }

    public function reject(Request $request, $id)
    {
        $user = User::query()->with('userAparatur', 'userPejabatStruktural')->findOrFail($id);
        $user->update(['status_akun' => 2]);
        $user->notify(new UserReject($request->catatan));
        return response()->json([
            'success' => true,
            'message' => "Berhasil ditolak",
        ]);
    }
}
