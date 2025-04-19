<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\TodoTaskController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix'=>'v1', 'namespace'=>'App\Http\Controllers\Api\V1'], function () {
    Route::apiResource('user', UserController::class);
    Route::post('login', [AuthController::class, 'login']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('new-todo', [TodoTaskController::class, 'store']);
    });
    Route::get('all-todos', [TodoTaskController::class, 'index']);
    Route::delete('/todos/{id}', [TodoTaskController::class, 'destroy'])->middleware('auth:sanctum');
});
