<?php

namespace App\Providers;

use Maharlika\Database\FluentORM\Model;
use Maharlika\Facades\View;
use Maharlika\Providers\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services
     */
    public function register(): void
    {
        View::directive('headerclock', function ($expression = null) {
            if ($expression === null) {
                return $this->renderRealtimeClock();
            }
        });
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

    protected function renderRealtimeClock(): string
    {
        return '<span class="live-clock"></span>
                <script>
                (function() {
                    function updateClock() {
                        const now = new Date();
                        const options = { 
                            year: "numeric", 
                            month: "long", 
                            day: "2-digit", 
                            hour: "2-digit", 
                            minute: "2-digit",
                            second: "2-digit",
                            hour12: true 
                        };
                        const formatted = now.toLocaleString("en-US", options).replace(",", "");
                        document.querySelectorAll(".live-clock").forEach(el => {
                            el.textContent = formatted;
                        });
                    }
                    updateClock();
                    setInterval(updateClock, 1000);
                })();
                </script>';
    }
}
