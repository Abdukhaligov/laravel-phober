<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider{
  /**
   * The path to the "home" route for your application.
   * This is used by Laravel authentication to redirect users after login.
   * @var string
   */
  public const HOME = '/home';

  /**
   * Define your route model bindings, pattern filters, etc.
   * @return void
   */
  public function boot(){
    $this->configureRateLimiting();

    $this->mapApiRoutes();

    $this->routes(function (){
      Route::middleware('web')
        ->group(base_path('routes/web.php'));
    });
  }

  /**
   * Define the "api" routes for the application.
   * These routes are typically stateless.
   * @return void
   */
  protected function mapApiRoutes(){
    Route::prefix('api')->middleware(['forceJson', 'api'])->group(function (){
      Route::get('/', function (){
        return response()->json([
          "info" => config('api.info'), "version" => config('api.version')
        ]);
      });

      Route::prefix('v1')->group(base_path('routes/api/v1.php'));
    });
  }

  /**
   * Configure the rate limiters for the application.
   * @return void
   */
  protected function configureRateLimiting(){
    RateLimiter::for('api', function (Request $request){
      return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
    });
  }
}
