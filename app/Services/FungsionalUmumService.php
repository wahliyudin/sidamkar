<?php

namespace App\Services;

use App\Services\VerificationUserService;

class FungsionalUmumService extends VerificationUserService
{
    public function destroy($id)
    {
        $user = $this->userRepository->getUserById($id);
        return $this->userRepository->destroyFungsional($user);
    }
}
