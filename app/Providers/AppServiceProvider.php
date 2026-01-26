<?php

namespace App\Providers;

use Maharlika\Database\FluentORM\Model;
use Maharlika\Providers\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services
     */
    public function register(): void
    {
       // Bind application services here...
    }

    /**
     * Bootstrap any application services
     */
    public function boot(): void
    {
        if (app()->environment('local')) {
            Model::preventLazyLoading(true);
        }
        
        Model::shouldBeStrict(!app()->isProduction());
    }
}
