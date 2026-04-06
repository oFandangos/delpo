<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Gate::define('admin', function ($user){
            $admins = explode(',', trim(config('delpo.admins')));
            return in_array($user->codpes, $admins);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (\App::environment('production')) {
            \URL::forceScheme('https');
        }
    }
}
