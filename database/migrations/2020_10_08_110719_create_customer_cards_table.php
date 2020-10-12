<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerCardsTable extends Migration{
  public function up(){
    Schema::create('customer_cards', function(Blueprint $table){
      $table->id();
      $table->integer('number');
      $table->string('balance')->default(0);
      $table->bigInteger('owner_id')->unsigned()->nullable();
      $table->foreign('owner_id')->references('id')->on('customers')->onDelete('SET NULL');

      $table->bigInteger('author_id')->unsigned()->nullable();
      $table->foreign('author_id')->references('id')->on('users')->onDelete('SET NULL');
      $table->timestamps();
    });
  }

  public function down(){
    Schema::dropIfExists('customer_cards');
  }
}
