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
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')->prefix('api')->group(base_path('routes/api.php'));

            if (env("APP_ENV") == "production") {

                Route::domain(env("DOMAIN_JEDER_ADMIN1"))->middleware('web')->group(base_path('routes/admin.php'));
                Route::domain(env("DOMAIN_JEDER_ADMIN2"))->middleware('web')->group(base_path('routes/admin.php'));
                Route::domain(env("DOMAIN_JEDER_ADMIN3"))->middleware('web')->group(base_path('routes/admin.php'));

                Route::domain(env("DOMAIN_JEDER1"))->middleware('web')->group(base_path('routes/web.php'));
                Route::domain(env("DOMAIN_JEDER2"))->middleware('web')->group(base_path('routes/web.php'));
                Route::domain(env("DOMAIN_JEDER3"))->middleware('web')->group(base_path('routes/web.php'));
            }else{
                Route::middleware('web')->group(base_path('routes/web.php'));
            }
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
