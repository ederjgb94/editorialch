<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\BookController;

Route::prefix('v1')->group(function () {
    Route::get('/user', function (Request $request) {
        return Auth::user();
    })->middleware('auth:sanctum');

    // Definir la ruta de búsqueda antes de la definición de apiResource
    Route::get('books/search', [BookController::class, 'search'])->name('api.books.search');
    Route::apiResource('books', BookController::class);
});

// Agregar una ruta alternativa sin el prefijo v1 para mayor compatibilidad
Route::get('books/search', [BookController::class, 'search'])->name('api.books.search.direct');
