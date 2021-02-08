<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceInstanceReservationTable extends Migration{
  public function up(){
    Schema::create('device_instance_reservation', function(Blueprint $table){
      $table->id();

      $table->unsignedBigInteger("reservation_id");
      $table->foreign("reservation_id")->references("id")->on("reservations")->onDelete("CASCADE");

      $table->unsignedBigInteger("device_instance_id");
      $table->foreign("device_instance_id")->references("id")->on("device_instances")->onDelete("CASCADE");

      $table->timestamps();
    });
  }

  public function down(){
    Schema::dropIfExists('device_instance_reservation');
  }
}
