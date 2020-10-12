<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration{
  public function up(){
    Schema::create('games', function(Blueprint $table){
      $table->id();
      $table->string("name");
      $table->string("slug")->nullable();
      $table->string("video")->nullable();
      $table->json("description")->nullable();
      $table->integer("rating")->nullable()->default(0);
      $table->boolean("multiplayer")->default(FALSE);
      $table->timestamps();
    });
  }

  public function down(){
    Schema::dropIfExists('games');
  }
}
