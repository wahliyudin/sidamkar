<?php

namespace App\Traits;

use App\Models\Role;
use App\Models\User;

/**
 * Auth
 */
trait AuthTrait
{
    public function getFirstRole(): Role
    {
        return $this->authUser()->load('roles')->roles()->first();
    }

    public function authUser(): User
    {
        return auth()->user();
    }
}
