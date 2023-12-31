<?php

namespace App\Providers;

use App\Models\User;
use App\Traits\AuthTrait;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    use AuthTrait;
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        Queue::failing(function (JobFailed $event) {
            // $event->connectionName
            // $event->job
            // $event->exception
            Artisan::command('queue:retry all');
        });
        Blade::if('roleIs', function ($value) {
            return $this->getFirstRole()->name == $value;
        });
    }
}
