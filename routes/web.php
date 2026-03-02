<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome')->middleware('role:user');

Route::get('/error/403', function () {
    return view('errors.403');
})->name('errors.403');

require __DIR__ . '/auth.php';