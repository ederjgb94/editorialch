<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Deshabilitar cache en entorno local
        if ($this->app->environment('local')) {
            $this->app->singleton('files.changed', function () {
                return true;
            });
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Suprimir deprecation warnings de PDO en PHP 8.5 que contaminan el output JSON
        error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
    }
}

