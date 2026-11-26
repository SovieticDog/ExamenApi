<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EventoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);

    Route::middleware('auth:api')->group(function () {
        Route::get('me', [AuthController::class, 'me']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
    });
});

Route::middleware('auth:api')->group(function () {
    Route::get('eventos/export', [EventoController::class, 'export']);

    Route::apiResource('eventos', EnventoController::class);
});
