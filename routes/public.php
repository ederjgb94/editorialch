<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\BookController;
use App\Http\Controllers\Web\PublicHomeController;
use App\Http\Controllers\Web\PublicPageController;

// ══════════════════════════════════════════════════
// Rutas Públicas del Sitio — SIN prefijo /admin
// Se registran directamente en la raíz del dominio
// ══════════════════════════════════════════════════

Route::get('/',         [PublicHomeController::class, 'index'])->name('home');
Route::get('/libros',   [BookController::class, 'index'])->name('books.public.index');
Route::get('/libros/{book}', [BookController::class, 'show'])->name('books.public.show');
Route::get('/contacto', [PublicPageController::class, 'contact'])->name('contact');
