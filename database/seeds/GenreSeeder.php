<?php

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder {
  public function run() {
    Genre::create(array("name" => "Action"));
    Genre::create(array("name" => "Child-Game"));
    Genre::create(array("name" => "Cyberpunk"));
    Genre::create(array("name" => "Design"));
    Genre::create(array("name" => "Detective"));
    Genre::create(array("name" => "Exploration"));
    Genre::create(array("name" => "Singleplayer"));
    Genre::create(array("name" => "Fantasy"));
    Genre::create(array("name" => "Horror"));
    Genre::create(array("name" => "Sport"));
    Genre::create(array("name" => "Space"));
    Genre::create(array("name" => "Quest"));
    Genre::create(array("name" => "Adventure"));
    Genre::create(array("name" => "Music"));
    Genre::create(array("name" => "Multiplayer"));
    Genre::create(array("name" => "Rhythm"));
    Genre::create(array("name" => "Violent"));
    Genre::create(array("name" => "Simulation"));
    Genre::create(array("name" => "Strategy"));
    Genre::create(array("name" => "Survival"));
    Genre::create(array("name" => "Shooter"));
    Genre::create(array("name" => "Racing"));
  }
}





