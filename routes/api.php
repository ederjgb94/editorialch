<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\BookController;

Route::prefix('v1')->group(function () {
    Route::get('/user', function (Request $request) {
        return Auth::user();
    })->middleware('auth:sanctum');

    Route::apiResource('books', BookController::class);
});
