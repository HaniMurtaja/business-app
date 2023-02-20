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

       $this->configureRateLimiting();

        $this->routes(function () {
        Route::middleware('web')
                ->group(base_path('routes/web.php'));
        
        Route::middleware('api')
         ->prefix('api')
         ->group(base_path('routes/api.php'));

        // Admin Route file 
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/admin.php'));

       // Customer Route file
       Route::middleware('web')
       ->namespace($this->namespace)
       ->group(base_path('routes/customer.php'));

    });

    }

    protected function configureRateLimiting()
    {
       /* RateLimiter::for('api', function (Request $request) {
         return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
        */
    }


    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
      
        
    }

    
   
}
