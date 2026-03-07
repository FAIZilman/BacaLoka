<?php

use App\Http\Controllers\Admin\BukuController;
use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware('role:admin')->name('admin.dashboard');


Route::controller(BukuController::class)->group(function () {
    Route::get('/admin/katalog-buku', 'index')->name('admin.katalogBuku');
    Route::get('/admin/katalog-buku/tambah', 'create')->name('admin.katalogBuku.tambah.index');
    Route::post('/admin/katalog-buku', 'store')->name('admin.katalogBuku.tambah.store');
    Route::get('/admin/katalog-buku/{slug}/edit', 'edit')->name('admin.katalogBuku.ubah.edit');
    Route::put('/admin/katalog-buku/{slug}', 'update')->name('admin.katalogBuku.ubah.update');
    Route::get('/admin/katalog-buku/{slug}', 'show')->name('admin.katalogBuku.show');
    Route::delete('/admin/katalog-buku/{slug}', 'destroy')->name('admin.katalogBuku.destroy');
    Route::get('/admin/katalog-buku/pdf/{slug}', 'downloadPdf')->name('admin.katalogBuku.pdf');
    Route::get('/admin/katalog-buku/export/CSV', 'exportCSV')->name('admin.katalogBuku.exportCSV');
})->middleware('role:admin');

Route::controller(UserController::class)->group(function () {
    Route::get('/admin/user', 'index')->name('admin.user');
    // Route::get('/admin/user/tambah', 'create')->name('admin.user.tambah.create');
    // Route::post('/admin/user', 'store')->name('admin.user.tambah.store');
    Route::get('/admin/user/{id}/edit', 'edit')->name('admin.user.ubah.edit');
    Route::put('/admin/user/{id}', 'update')->name('admin.user.ubah.update');
    // Route::get('/admin/user/{id}', 'show')->name('admin.user.show');
    Route::delete('/admin/user/{id}', 'destroy')->name('admin.user.destroy');
    Route::get('/admin/user/exportCSV', 'exportCSV')->name('admin.user.exportCSV');
    // Route::get('/user/pdf', );
})->middleware('role:admin');

// Route::get('/log');