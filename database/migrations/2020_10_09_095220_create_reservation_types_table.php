<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationTypesTable extends Migration{
  public function up(){
    Schema::create('reservation_types', function(Blueprint $table){
      $table->id();
      $table->string('name')->nullable();
      $table->timestamps();
    });
  }

  public function down(){
    Schema::dropIfExists('reservation_types');
  }
}