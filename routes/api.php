<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DeskripsiUmumController;
use App\Http\Controllers\Api\BatimetriController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('deskripsi-umum', DeskripsiUmumController::class);
Route::apiResource('batimetri', BatimetriController::class);