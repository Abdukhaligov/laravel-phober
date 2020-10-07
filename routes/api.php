<?php

Route::group(['middleware' => ['api']], function(){
  require 'api/customers.php';
  require 'api/instances.php';
  require 'api/users.php';
});



