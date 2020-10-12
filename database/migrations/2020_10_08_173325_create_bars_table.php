<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarsTable extends Migration{
  public function up(){
    Schema::create('bars', function(Blueprint $table){
      $table->id();
      $table->string("name");
      $table->float("price");
      $table->integer("amount");
      $table->timestamps();
    });
  }

  public function down(){
    Schema::dropIfExists('bars');
  }
}
