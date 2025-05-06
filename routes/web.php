<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\BookController;
use App\Http\Controllers\Admin\AdminBookController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\SubmissionRequestController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

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

    // Rutas de solicitudes de publicación
    Route::resource('submissions', SubmissionRequestController::class)
        ->except(['edit', 'update']);
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
    Route::get('/submissions', [\App\Http\Controllers\Arbitrator\SubmissionController::class, 'index'])->name('submissions');
    Route::get('/submissions/{submission}', [\App\Http\Controllers\Arbitrator\SubmissionController::class, 'show'])->name('submissions.show');
    Route::post('/submissions/{submission}/evaluate', [\App\Http\Controllers\Arbitrator\SubmissionController::class, 'evaluate'])->name('submissions.evaluate');
    Route::put('/submissions/{submission}/update-status', [\App\Http\Controllers\Arbitrator\SubmissionController::class, 'updateStatus'])->name('submissions.update-status');
});

// Rutas para editores
Route::middleware(['auth', 'role:asociado-editor'])->prefix('editor')->name('editor.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Rutas para gestión de solicitudes y asignación de árbitros
    Route::get('/submissions', [\App\Http\Controllers\Editor\SubmissionManagementController::class, 'index'])->name('submissions.index');
    Route::get('/submissions/{submission}/assign', [\App\Http\Controllers\Editor\SubmissionManagementController::class, 'assignArbitrators'])->name('submissions.assign');
    Route::post('/submissions/{submission}/assign', [\App\Http\Controllers\Editor\SubmissionManagementController::class, 'storeAssignment'])->name('submissions.store-assignment');

    // Rutas para seguimiento de actualizaciones
    Route::get('/progress', [\App\Http\Controllers\Editor\ProgressTrackingController::class, 'index'])->name('progress.index');
    Route::get('/progress/{submission}', [\App\Http\Controllers\Editor\ProgressTrackingController::class, 'show'])->name('progress.show');
    Route::put('/progress/{submission}/approve', [\App\Http\Controllers\Editor\ProgressTrackingController::class, 'approveSubmission'])->name('progress.approve');
    Route::put('/progress/{submission}/reject', [\App\Http\Controllers\Editor\ProgressTrackingController::class, 'rejectSubmission'])->name('progress.reject');
});

// Ruta principal redirige al dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

require __DIR__ . '/auth.php';
