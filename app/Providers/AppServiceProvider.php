<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Http\Controllers';
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    //     $this->configureRateLimiting();

    // $this->routes(function () {
    //     Route::middleware('web')
    //         ->namespace($this->namespace) // this line
    //         ->group(base_path('routes/web.php'));

    //     Route::prefix('api')
    //         ->middleware('api')
    //         ->namespace($this->namespace) // this line
    //         ->group(base_path('routes/api.php'));
    // });
    }

}
