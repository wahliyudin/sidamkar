<?php

namespace App\Providers;

use App\Modules\DestructRole;
use Illuminate\Support\ServiceProvider;

class ModulesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('destruct_role',function(){
            return new DestructRole();
        });
    }
}