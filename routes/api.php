<?php

use App\Http\Controllers\API\V1\Advertisement\StoreAdvertisementController;
use App\Http\Controllers\API\V1\Auth\AuthLoginController;
use App\Http\Controllers\API\V1\Auth\AuthRegisterController;
use Illuminate\Support\Facades\Route;

Route::post('/register', AuthRegisterController::class);
Route::post('/login', AuthLoginController::class);

Route::post('/advertisements', StoreAdvertisementController::class)->middleware('auth:sanctum');

