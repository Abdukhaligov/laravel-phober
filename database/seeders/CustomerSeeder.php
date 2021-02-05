<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder{
  public function run(){
    for($i = 0; $i < 10; $i++){
      /** @var Customer $customer */
      $customer = Customer::factory()->create();
      //$customer->card()->create(['number' => rand(0, 100)]);
    }
  }
}
