<?php

namespace App\Services\Kemendagri;

use App\Jobs\SendRejectToUser;
use App\Jobs\SendVerifToUser;
use App\Notifications\UserReject;
use App\Notifications\UserVerified;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AdminKabKotaService
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function verification($id)
    {
        $user = $this->userRepository->getUserById($id);
        if (!$user) throw ValidationException::withMessages(['message' => 'Data Tidak Ditemukan']);
        $this->userRepository->updateStatusAkunVerified($user);
        SendVerifToUser::dispatch($user);
    }

    public function reject(Request $request, $id)
    {
        $user = $this->userRepository->getUserById($id);
        if (!$user) throw ValidationException::withMessages(['message' => 'Data Tidak Ditemukan']);
        $this->userRepository->updateStatusAkunReject($user);
        SendRejectToUser::dispatch($user, $request->catatan);
    }

    public function destroy($id)
    {
        $user = $this->userRepository->getUserById($id);
        if (!$user) throw ValidationException::withMessages(['message' => 'Data Tidak Ditemukan']);
        deleteImage($user->userProvKabKota?->file_permohonan);
        $user->delete();
    }
}
