<?php

Route::post('login', 'Api\UserController@login');

Route::group(['middleware' => ['auth:api']], function(){
  Route::apiResource('users', 'Api\UserController');

  Route::put('profile/update', 'Api\UserController@profileUpdate');
  Route::post('details', 'Api\UserController@details');
  Route::get('role/list', 'Api\UserController@roleList');
});