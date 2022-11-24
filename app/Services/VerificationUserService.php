<?php

namespace App\Services;

use App\Notifications\UserReject;
use App\Notifications\UserVerified;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class VerificationUserService
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function verification($id)
    {
        $user = $this->userRepository->getUserById($id);
        $this->userRepository->updateStatusAkunVerified($user);
        $user->notify(new UserVerified());
    }

    public function reject(Request $request, $id)
    {
        $user = $this->userRepository->getUserById($id);
        $this->userRepository->updateStatusAkunReject($user);
        $user->notify(new UserReject($request->catatan));
    }
}