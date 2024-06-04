<?php

use App\Http\Controllers\API\V1\AuthLoginController;
use App\Http\Controllers\API\V1\AuthRegisterController;
use Illuminate\Support\Facades\Route;

Route::post('/register', AuthRegisterController::class);
Route::post('/login', AuthLoginController::class);

Route::get('/advertisements', function() {
    return "success";
})->middleware('auth:sanctum');

