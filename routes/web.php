<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('books', BookController::class);
