<?php

use App\Http\Controllers\ErrorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/error/403', [ErrorController::class, 'forbidden'])->name('errors.403');
Route::any('{catchall]', [ErrorController::class, 'notfound'])->name('errors.404');

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';