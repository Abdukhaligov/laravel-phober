<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration {
  public function up() {
    Schema::create('devices', function (Blueprint $table) {
      $table->id();
      $table->string("name");
      $table->string("slug");
      $table->json("description")->nullable();
      $table->timestamps();
    });
  }

  public function down() {
    Schema::dropIfExists('devices');
  }
}
