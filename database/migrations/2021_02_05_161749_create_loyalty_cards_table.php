<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoyaltyCardsTable extends Migration{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(){
    Schema::create('loyalty_cards', function (Blueprint $table){
      $table->id();
      $table->integer('number');
      $table->unsignedBigInteger('owner_id')->nullable();
      $table->foreign('owner_id')->references('id')->on('customers')->onDelete('SET NULL');
      $table->unsignedBigInteger('author_id')->nullable();
      $table->foreign('author_id')->references('id')->on('users')->onDelete('SET NULL');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(){
    Schema::dropIfExists('loyalty_cards');
  }
}
