<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameDeviceTable extends Migration{
  public function up(){
    Schema::create('game_device', function (Blueprint $table){
      $table->unsignedBigInteger("game_id");
      $table->foreign("game_id")->references("id")->on("games")->onDelete("CASCADE");
      $table->unsignedBigInteger("device_id");
      $table->foreign("device_id")->references("id")->on("devices")->onDelete("CASCADE");
    });
  }

  public function down(){
    Schema::dropIfExists('game_device');
  }
}
