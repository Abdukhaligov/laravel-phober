<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstancesTable extends Migration{
  public function up(){
    Schema::create('instances', function(Blueprint $table){
      $table->id();
      $table->bigInteger("device_id")->unsigned();
      $table->foreign("device_id")->references("id")->on("devices")->onDelete("CASCADE");
      $table->boolean("active")->default(TRUE);
      $table->dateTime("deactivation_start")->nullable();
      $table->dateTime("deactivation_end")->nullable();
      $table->timestamps();
    });
  }

  public function down(){
    Schema::dropIfExists('instances');
  }
}
