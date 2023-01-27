<?php

namespace App\Services\KabKota;

use App\Services\KabKota\VerificationUserService;

class StrukturalService extends VerificationUserService
{
    public function destroy($id)
    {
        $user = $this->userRepository->getUserById($id);
        return $this->userRepository->destroyStruktural($user);
    }
}
