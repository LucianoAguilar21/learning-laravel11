<?php

use App\Http\Controllers\Api\ChirpController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/chirps', [ChirpController::class, 'getChirps'])->middleware('auth:sanctum');

Route::get('/users', [ChirpController::class, 'getUsers'])->middleware('auth:sanctum');
