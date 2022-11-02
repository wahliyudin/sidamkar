<?php

namespace App\Traits\AuthBackend;

use App\Models\User;
use App\Rules\OldPasswordRule;
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
        User::query()->whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);
    }

    public function validateChangePassword(Request $request)
    {
        $request->validate([
            'old_password' => ['required', new OldPasswordRule()],
            'password' => 'required|confirmed'
        ], [
            'old_password.required' => 'Password lama wajib diisi',
        ]);
    }
}
