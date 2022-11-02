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
        return $this->redirectTo($user->hasRole(getAllRoleFungsional()), 'Berhasil diverifikasi');
    }

    public function reject($id)
    {
        $user = User::query()->with('userAparatur', 'userPejabatStruktural')->findOrFail($id);
        $user->update(['status_akun' => 2]);
        $user->notify(new UserReject());
        return $this->redirectTo($user->hasRole(getAllRoleFungsional()), 'Berhasil ditolak');
    }

    private function redirectTo(bool $isFungsional, string $message)
    {
        $route = 'kab-kota.verifikasi-aparatur.pejabat-struktural.index';
        if ($isFungsional) {
            $route = 'kab-kota.verifikasi-aparatur.pejabat-fungsional.index';
        }
        return to_route($route)->with('success', $message);
    }
}
