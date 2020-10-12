<?php

Route::group(['middleware' => ['auth:api']], function(){
  Route::apiResource('reservations', 'Api\ReservationController');
});