<?php

use App\Http\Controllers\API\V1\Advertisement\CancelAdvertisementController;
use App\Http\Controllers\API\V1\Advertisement\StoreAdvertisementController;
use App\Http\Controllers\API\V1\Advertisement\GetAllAdvertisementController;
use App\Http\Controllers\API\V1\Auth\AuthLoginController;
use App\Http\Controllers\API\V1\Auth\AuthRegisterController;
use Illuminate\Support\Facades\Route;

Route::post('/register', AuthRegisterController::class);
Route::post('/login', AuthLoginController::class);

Route::get('/advertisements', GetAllAdvertisementController::class);
Route::post('/advertisements', StoreAdvertisementController::class)->middleware('auth:sanctum');
Route::delete('/advertisements/{advertisement}', CancelAdvertisementController::class)->middleware('auth:sanctum');

