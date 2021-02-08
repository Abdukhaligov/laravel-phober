<?php

namespace App\Providers;

use App\Models\Device;
use App\Models\DeviceInstance;
use App\Models\Game;
use App\Observers\DeviceInstanceObserver;
use App\Observers\SluggableObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register(){
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot(){
    DeviceInstance::observe(DeviceInstanceObserver::class);

    Game::observe(SluggableObserver::class);
    Device::observe(SluggableObserver::class);
  }
}
