<?php

namespace App\Facades\Modules;

use Illuminate\Support\Facades\Facade;

class DestructRoleFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'destruct_role';
    }
}
