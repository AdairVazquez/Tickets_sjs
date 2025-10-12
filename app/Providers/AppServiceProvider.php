<?php

namespace App\Providers;

use App\Http\Middleware\RolAdmin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
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
        //registro del middleware para los roles de usuario
        Route::aliasMiddleware('rol.admin', RolAdmin::class);
    }
}
