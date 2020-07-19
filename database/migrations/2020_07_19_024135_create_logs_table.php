<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration {
  public function up() {
    Schema::create('logs', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('loggable_id')->unsigned()->nullable();
      $table->string('loggable_type')->nullable();
      $table->string('action')->nullable();
      $table->bigInteger('author_id')->unsigned()->nullable();
      $table->foreign('author_id')->references('id')->on('users')->onDelete('SET NULL');
      $table->ipAddress('ip');
      $table->string('url');
      $table->json('body');
      $table->timestamps();
    });
  }


  public function down() {
    Schema::dropIfExists('logs');
  }
}
