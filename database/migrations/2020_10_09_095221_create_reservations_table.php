<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration{
  public function up(){
    Schema::create('reservations', function(Blueprint $table){
      $table->id();
      $table->string('full_name')->nullable();
      $table->string('phone')->nullable();
      $table->dateTime('date')->nullable();
      $table->smallInteger('players_count')->unsigned()->nullable();
      $table->smallInteger('players_age')->unsigned()->nullable();
      $table->text('note')->nullable();
      $table->bigInteger('type_id')->unsigned()->nullable();
      $table->foreign('type_id')->references('id')->on('reservation_types')->onDelete('SET NULL');
      $table->bigInteger('author_id')->unsigned()->nullable();
      $table->foreign('author_id')->references('id')->on('users')->onDelete('SET NULL');
      $table->timestamps();
    });
  }

  public function down(){
    Schema::dropIfExists('reservations');
  }
}
