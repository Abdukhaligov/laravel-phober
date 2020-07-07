<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['api']], function(){
  Route::group(['middleware' => ['auth']], function(){
    //
  });

  Route::get('/', function () {
    return "Good Bye World?";
  });
});