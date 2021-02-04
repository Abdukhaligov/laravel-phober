<?php

use App\Http\Controllers\Api\V1\GameController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Support\Facades\Route;

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

Route::middleware('auth:api')->group(function (){
  Route::get('user', [UserController::class, 'user']);
});

Route::prefix('games')->group(function (){
  Route::get('/', [GameController::class, 'index']);
  Route::get('{id}', [GameController::class, 'show']);
  Route::get('findByGenre/{id}', [GameController::class, 'findByGenre']);
  Route::get('findByDevice/{id}', [GameController::class, 'findByDevice']);
  Route::get('findByRating/{value}', [GameController::class, 'findByRating']);
});


