<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapSocialRoutes();

        $this->mapRoomRoutes();

        $this->mapAdminRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    /**
     * Роуты для социальной авторизации
     */
    protected function mapSocialRoutes()
    {
        Route::prefix('social')
            ->middleware(['web'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/social.php'));
    }

    /**
     * Роуты для личного кабинета авторизации
     */
    protected function mapRoomRoutes()
    {
        Route::prefix('room')
            ->middleware(['web', 'auth', 'start'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/room.php'));
    }

    /**
     * роуты для админки
     */
    protected function mapAdminRoutes()
    {
        Route::prefix('admin')
            ->middleware(['web'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/admin.php'));
    }
}
