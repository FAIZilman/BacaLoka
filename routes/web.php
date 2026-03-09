<?php

use App\Http\Controllers\ErrorController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $books_populer = DB::table('books')->limit(10)->orderBy('show', 'DESC')->get();
    return view('welcome', [
        'books_populer' => $books_populer
    ]);
})->name('welcome');

Route::get('/error/403', [ErrorController::class, 'forbidden'])->name('errors.403');
Route::any('{catchall]', [ErrorController::class, 'notfound'])->name('errors.404');

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';