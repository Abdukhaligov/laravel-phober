<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameSessionsTable extends Migration{
  public function up(){
    Schema::create('game_sessions', function(Blueprint $table){
      $table->id();
      $table->bigInteger('customer_id')->unsigned()->nullable();
      $table->bigInteger('instance_id')->unsigned()->nullable();
      $table->bigInteger('user_id')->unsigned()->nullable();
      $table->bigInteger('author_id')->unsigned()->nullable();

      $table->tinyInteger('status')->default(1);
      $table->dateTime('start_at')->nullable();
      $table->dateTime('end_at')->nullable();

      $table->foreign('customer_id')->references('id')->on('customers')->onDelete('SET NULL');
      $table->foreign('author_id')->references('id')->on('users')->onDelete('SET NULL');
      $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
      $table->foreign('instance_id')->references('id')->on('instances')->onDelete('SET NULL');
      $table->timestamps();
    });
  }

  public function down(){
    Schema::dropIfExists('game_sessions');
  }
}
