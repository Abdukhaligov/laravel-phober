<?php

namespace App\Tools\NovaPermissionTool;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class ToolServiceProvider extends ServiceProvider {
  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot() {
    $this->app->booted(function () {
      $this->routes();
    });

    Nova::serving(function (ServingNova $event) {
      //
    });
  }

  /**
   * Register the tool's routes.
   *
   * @return void
   */
  protected function routes() {
    if ($this->app->routesAreCached()) {
      return;
    }
    //
  }

  /**
   * Register any application services.
   *
   * @return void
   */
  public function register() {
    //
  }
}
