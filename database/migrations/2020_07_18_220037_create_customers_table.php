<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration {
  public function up() {
    Schema::create('customers', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('phone');
      $table->string('email')->nullable();
      $table->boolean('gender')->default(false);
      $table->date('birthday');
      $table->bigInteger('author_id')->unsigned();
      $table->foreign('author_id')->references('id')->on('users');
      $table->timestamps();
    });
  }

  public function down() {
    Schema::dropIfExists('customers');
  }
}
