<?php

use App\Http\Controllers\ErrorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $books_populer = DB::table('books')->limit(10)->orderBy('show', 'DESC')->get();
    return view('welcome', [
        'books_populer' => $books_populer
    ]);
})->name('welcome');

Route::get('/buku/{slug}', function ($slug) {
    $book = DB::table('books')->where('slug', '=', $slug)->first();
    return view('page.detailBuku', [
        'book' => $book
    ]);
})->name('user.detail.buku');

Route::get('/buku/baca/{slug}', function ($slug) {
    if (!Auth::check()) {
        notify()->info()->title('Harap Login Terlebih Dahulu')->send();
        return redirect()->route('login.index');
    }
    $book = DB::table('books')->where('slug', '=', $slug)->first();
    $cekBuku = DB::table('peminjams')->where('user_id', '=', Auth::user()->id)->first();
    if (!$cekBuku) {
        $peminjam_id = DB::table('peminjams')->insertGetId([
            "user_id" => Auth::user()->id,
            "tanggal_pinjam" => now(),
            "tanggal_kembali" => now(),
            "status" => 'dipinjam',
        ]);

        DB::table('detail_peminjams')->insert([
            'peminjam_id' => $peminjam_id,
            'buku_id' => $book->id,
            'jumlah' => 0,
            'created_at' => now()
        ]);

        notify()->success()->title('Buku Berhasil Di Pinjam')->send();
    } else {
        notify()->success()->title('Buku Sudah Di Pinjam')->send();
    }
    return view('page.bacaBuku', [
        'book' => $book
    ]);
})->name('user.baca.buku');


Route::get('/error/403', [ErrorController::class, 'forbidden'])->name('errors.403');
Route::any('{catchall]', [ErrorController::class, 'notfound'])->name('errors.404');

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';