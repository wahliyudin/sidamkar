<?php

namespace App\Traits;

use App\Models\Role;

/**
 * Auth
 */
trait AuthTrait
{
    public function getFirstRole(): Role
    {
        return auth()->user()->load('roles')->roles()->first();
    }
}
