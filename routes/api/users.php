<?php

Route::post('login', 'Api\UserController@login');

Route::group(['middleware' => ['auth:api']], function(){
  Route::apiResource('users', 'Api\UserController');

  Route::patch('profile/update', 'Api\UserController@profileUpdate');
  Route::get('details', 'Api\UserController@details');
  Route::get('role/list', 'Api\UserController@roleList');
});