<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EventoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventosController;

Route::prefix('v1')->group(function () {
    Route::get('eventos/titulo/{titulo}', [EventosController::class, 'findByTitulo']);
    Route::get('eventos/descripcion/{descripcion}', [EventosController::class, 'findByDescripcion']);
    Route::get('eventos/fecha/{fecha}', [EventosController::class, 'findByFecha']);
    Route::get('eventos/lugar/{lugar}', [EventosController::class, 'findByLugar']);
    Route::get('eventos/cupo/{cupo}', [EventosController::class, 'findByCupo']);
    Route::get('eventos/estado/{estado}', [EventosController::class, 'findByEstado']);
    Route::apiResource('eventos', EventosController::class);

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

});
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
