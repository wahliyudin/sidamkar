<?php

namespace App\Services\KabKota\ManajemenUser;

use App\Notifications\UserReject;
use App\Notifications\UserVerified;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class FungsionalService
{
    private UserRepository $userRepository;

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

    public function destroy($id)
    {
        $user = $this->userRepository->getUserById($id);
        return $this->userRepository->destroyFungsional($user);
    }
}
