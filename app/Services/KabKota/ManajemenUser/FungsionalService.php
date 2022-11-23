<?php

namespace App\Services\KabKota\ManajemenUser;

use App\Services\VerificationUserService;

class FungsionalService extends VerificationUserService
{
    public function destroy($id)
    {
        $user = $this->userRepository->getUserById($id);
        return $this->userRepository->destroyFungsional($user);
    }
}
