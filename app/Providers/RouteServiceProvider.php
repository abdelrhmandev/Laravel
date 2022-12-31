<?php

namespace App\Providers;
use LaravelLocalization;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    // use \Mcamara\LaravelLocalization\Traits\LoadsTranslatedCachedRoutes;
    
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    protected $admin_namespace = 'App\Http\Controllers\backend';

    protected $admin_route_alias = 'admin.';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
            

                $this->mapAdminRoutes();

        });
    }

    protected function mapAdminRoutes(){
        Route::group(['prefix' => LaravelLocalization::setLocale() , 
        'middleware' => ['localeSessionRedirect', 'localizationRedirect','localeViewPath']] , 
        function(){

            // Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {
            Route::group([
                'prefix'        =>config('custom.route_prefix') , 
                'namespace'     => $this->admin_namespace,
                // 'middleware'    => ['auth','admin' , 'admin-permissions']
                'middleware'    => ['auth']
                ], function() {
                    require_once base_path('routes/admin.php');
            });
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
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
