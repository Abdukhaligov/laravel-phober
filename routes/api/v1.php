<?php

use App\Http\Controllers\Api\V1\DeviceController;
use App\Http\Controllers\Api\V1\DeviceInstanceController;
use App\Http\Controllers\Api\V1\GameController;
use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth:api')->group(function (){
  Route::get('user', [AuthController::class, 'user']);
});

Route::prefix('games')->group(function (){
  Route::get('/', [GameController::class, 'index']);
  Route::get('{id}', [GameController::class, 'show']);
  Route::get('findByGenre/{id}', [GameController::class, 'findByGenre']);
  Route::get('findByDevice/{id}', [GameController::class, 'findByDevice']);
  Route::get('findByRating/{value}', [GameController::class, 'findByRating']);
});

Route::prefix('devices')->group(function (){
  Route::get('/', [DeviceController::class, 'index']);
  Route::get('{id}', [DeviceController::class, 'show']);
});

Route::prefix('device-instances')->group(function (){
  Route::get('/', [DeviceInstanceController::class, 'index']);
  Route::get('{id}', [DeviceInstanceController::class, 'show']);
});

