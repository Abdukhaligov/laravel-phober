<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration{
  public function up(){
    Schema::create('customers', function (Blueprint $table){
      $table->id();
      $table->string('first_name')->nullable();
      $table->string('last_name')->nullable();
      $table->string('phone')->nullable();
      $table->string('email')->nullable();
      $table->boolean('gender')->default(false);
      $table->date('birthday')->nullable();
      $table->bigInteger('author_id')->unsigned()->nullable();
      $table->foreign('author_id')->references('id')->on('users')->onDelete('SET NULL');
      $table->timestamps();
    });
  }

  public function down(){
    Schema::dropIfExists('customers');
  }
}
