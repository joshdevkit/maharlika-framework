<?php

namespace App\Providers;

use Maharlika\Providers\ServiceProvider;
use Maharlika\Facades\Gate;

class AuthorizationServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        //define gate here
        Gate::define('access-profile', function ($user) {
            return true; 
        });
    }
}