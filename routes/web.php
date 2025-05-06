<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\BookController;
use App\Http\Controllers\Admin\AdminBookController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AstroController;

// Rutas de autenticación
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    // Rutas del perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');

    // Dashboard general
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Rutas para administradores
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('books', AdminBookController::class);
    Route::resource('users', UserController::class);
});

// Rutas para autores
Route::middleware(['auth', 'role:asociado-autor'])->prefix('autor')->name('autor.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Rutas para árbitros
Route::middleware(['auth', 'role:asociado-arbitro'])->prefix('arbitro')->name('arbitro.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Rutas para editores
Route::middleware(['auth', 'role:asociado-editor'])->prefix('editor')->name('editor.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Rutas Astro Frontend
Route::get('/', [AstroController::class, 'handle'])->name('astro.home');
Route::get('/libros', [AstroController::class, 'handle'])->name('astro.libros');
Route::get('/book/{id}', [AstroController::class, 'handle'])->name('astro.book');
Route::get('/contacto', [AstroController::class, 'handle'])->name('astro.contacto');

// Catch-all route for Astro assets
Route::get('assets/{path}', function ($path) {
    return response()->file(public_path('astro/client/assets/' . $path));
})->where('path', '.*');

// Wildcard route for any Astro page not explicitly defined
Route::get('{path}', [AstroController::class, 'handle'])
    ->where('path', '^(?!api|admin|profile|dashboard|autor|arbitro|editor|login|register|assets).*$');

require __DIR__ . '/auth.php';
