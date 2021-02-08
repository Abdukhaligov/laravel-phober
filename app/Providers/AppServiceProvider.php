<?php

namespace App\Providers;

use App\Models\Cards\LoyaltyCard;
use App\Models\Customer;
use App\Models\Device;
use App\Models\DeviceInstance;
use App\Models\Game;
use App\Models\Reservation;
use App\Observers\AuthorableObserver;
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

    Customer::observe(AuthorableObserver::class);
    Reservation::observe(AuthorableObserver::class);
    LoyaltyCard::observe(AuthorableObserver::class);

    Game::observe(SluggableObserver::class);
    Device::observe(SluggableObserver::class);
  }
}
