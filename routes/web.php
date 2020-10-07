<?php

Route::get('/', function(){
  return view('welcome');
});

Route::get('/res{any}', 'SpaController@index')->where('any', '^.*$');