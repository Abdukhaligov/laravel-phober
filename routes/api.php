<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['api']], function(){

  Route::post('login', 'API\UserController@login');

  Route::group(['middleware' => ['auth']], function(){
    Route::post('details', 'API\UserController@details');
    Route::put('profile/edit', 'API\UserController@edit');
  });

  Route::get('/', function () {
    return response()->json(['Good Bye, World!'], 202);
  });

});



