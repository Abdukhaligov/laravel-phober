<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Customer::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition(){
    switch($number = rand(0, 4)){
    case(0):$number = '55';break;
    case(1):$number = '50';break;
    case(2):$number = '51';break;
    case(3):$number = '70';break;
    case(4):$number = '77';break;}

    return [
      'name' => $this->faker->name,
      'surname' => $this->faker->lastName,
      'gender' => (boolean) rand(0, 1),
      'phone' => '994'.$number.rand(221, 795).rand(21, 98).rand(10, 85),
      'email' => (boolean) rand(0, 1) ? $this->faker->email : null,
      'birthday' => $this->faker->dateTime,
      'author_id' => User::all()->random()
    ];
  }
}
