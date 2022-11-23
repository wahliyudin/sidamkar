<?php

namespace App\Services\KabKota\ManajemenUser;

use App\Notifications\UserReject;
use App\Notifications\UserVerified;
use App\Repositories\UserRepository;
use App\Services\VerificationUserService;
use Illuminate\Http\Request;

class FungsionalUmumService extends VerificationUserService
{
    public function destroy($id)
    {
        $user = $this->userRepository->getUserById($id);
        return $this->userRepository->destroyFungsional($user);
    }
}
