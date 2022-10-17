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
        $user->update(['verified' => now()]);
        $user->notify(new UserVerified());
        if (is_null($user->userAparatur)) {
            return to_route('kab-kota.verifikasi-aparatur.pejabat-struktural.index')
                ->with('success', 'Berhasil diverifikasi');
        }
        return to_route('kab-kota.verifikasi-aparatur.pejabat-fungsional.index')
            ->with('success', 'Berhasil diverifikasi');
    }

    public function reject($id)
    {
        $user = User::query()->with('userAparatur', 'userPejabatStruktural')->findOrFail($id);
        $user->delete();
        if (is_null($user->userAparatur)) {
        }
        $user->notify(new UserReject());
        if (is_null($user->userAparatur)) {
            return to_route('kab-kota.verifikasi-aparatur.pejabat-fungsional.index')
                ->with('success', 'Berhasil ditolak');
        }
        return to_route('kab-kota.verifikasi-aparatur.pejabat-struktural.index')
            ->with('success', 'Berhasil ditolak');
    }
}
