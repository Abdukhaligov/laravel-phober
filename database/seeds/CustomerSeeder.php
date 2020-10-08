<?php

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder{
  public function run(){
    for($i = 0; $i < 10; $i++){
      /** @var Customer $customer */
      $customer = factory(Customer::class)->create();
      $customer->card()->create(['number' => rand(0, 100)]);
    }
  }
}
