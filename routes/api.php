<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['api']], function(){

  Route::post('login', 'Api\UserController@login');

  Route::group(['middleware' => ['auth']], function(){
    Route::post('details', 'Api\UserController@details');
    Route::put('profile/edit', 'Api\UserController@edit');
  });

  Route::get('/', function () {
    return response()->json(['Good Bye, World!'], 202);
  });

  Route::get('/instances/{id}', 'Api\InstanceController@show');

});



