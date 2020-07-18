<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Customer;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {

  switch ($number = rand(0,4)){
    case(0):$number = '55';break;
    case(1):$number = '50';break;
    case(2):$number = '51';break;
    case(3):$number = '70';break;
    case(4):$number = '77';break;
  }

  return [
      'name' => $faker->name,
      'gender' => (boolean)rand(0, 1),
      'phone' => '994' . $number . rand(221, 795) . rand(21, 98) . rand(10, 85),
      'email' => (boolean)rand(0, 1) ? $faker->email : '',
      'birthday' => $faker->dateTime,
      'created_by' => User::all()->random()
  ];
});
