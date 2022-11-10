<?php

namespace App\Http\Controllers\Aparatur;

use App\Http\Controllers\Controller;
use App\Traits\AuthBackend\ChangePassword;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    use ChangePassword;

    public function index()
    {   
        $judul = 'Ubah Password';
        return view('auth.passwords.ubah-password', compact('judul'));
    }

    public function update(Request $request)
    {
        $this->updatePassword($request);
        return back()->with('success', 'Password berhasil diubah');
    }
}
