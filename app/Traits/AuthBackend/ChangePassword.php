<?php

namespace App\Traits\AuthBackend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 *
 */
trait ChangePassword
{
    public function updatePassword(Request $request)
    {
        $this->validateChangePassword($request);
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Password lama tidak sesuai");
        }
        User::query()->whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);
    }

    public function validateChangePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ], [
            'old_password.required' => 'Password lama wajib diisi',
        ]);
    }
}
