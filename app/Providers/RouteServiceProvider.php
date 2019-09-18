<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{

    
    protected $namespace = 'App\Http\Controllers';
    protected $backEndNamespace = 'App\Http\Controllers\BackEnd';


    
    public function boot()
    {
        //

        parent::boot();
    }

    
    
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();
        $this->mapWebAdminRoutes();

        //
    }

   
    
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    protected function mapWebAdminRoutes()
    {
        Route::middleware('web')
            ->namespace($this->backEndNamespace)
            ->group(base_path('routes/admin/web.php'));
    }


    
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
