<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;

Route::prefix('v1')->group(function () {

Route::apiResource('roles', RoleController::class);

});
