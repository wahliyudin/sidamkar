<?php

namespace App\Services\Provinsi;

use App\Services\Provinsi\VerificationUserService;

class StrukturalService extends VerificationUserService
{
    public function destroy($id)
    {
        $user = $this->userRepository->getUserById($id);
        return $this->userRepository->destroyStruktural($user);
    }
}