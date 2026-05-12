<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/admin/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        // Deshabilitar la caché de rutas en entorno local
        if ($this->app->environment('local')) {
            $this->app->booted(function () {
                $this->disableRouteCache();
            });
        }

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('admin/api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->prefix('admin')
                ->group(base_path('routes/web.php'));

            // Rutas públicas sin prefijo (home, catálogo, contacto, nosotros)
            Route::middleware('web')
                ->group(base_path('routes/public.php'));
        });

    }

    /**
     * Configure the rate limiters for the application.
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }

    /**
     * Disable route cache in local environment
     */
    protected function disableRouteCache(): void
    {
        if (file_exists($this->app->getCachedRoutesPath())) {
            unlink($this->app->getCachedRoutesPath());
        }
    }
}
