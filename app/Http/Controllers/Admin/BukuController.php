<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Mckenziearts\Notify\Action\NotifyAction;

class BukuController extends Controller
{
    public function index()
    {
        $title = 'Delete User!';
        $text = 'Are you sure you want to delete?';
        confirmDelete($title, $text);

        return view('admin.katalogBuku', [
            'books' => DB::table('books')
                ->select(['image', 'title', 'slug', 'author', 'penerbit', 'year_terbit'])
                ->orderBy('created_at', 'DESC')
                ->get(),
        ]);
    }
    public function create()
    {
        return view('admin.crudBuku.tambah', [
            'kategoris' => DB::table('kategoris')->select('id', 'name_category')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required',
            'kategori_id' => 'required',
            'title' => 'required|max:255|unique:books,title',
            'desc' => 'required',
            'author' => 'required',
            'penerbit' => 'required',
            'year_terbit' => 'required',
            'book_file' => 'required|mimes:pdf',
        ]);

        $path_image = $request->file('image')->store('images', 'public');
        $path_book_file = $request->file('book_file')->store('book_file', 'public');

        DB::table('books')->insert([
            'image' => $path_image,
            'kategori_id' => $request->input('kategori_id'),
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
            'desc' => $request->input('desc'),
            'author' => $request->input('author'),
            'penerbit' => $request->input('penerbit'),
            'year_terbit' => $request->input('year_terbit'),
            'book_file' => $path_book_file,
            'created_at' => now(),
        ]);

        notify()->success()->title('Data Berhasil Ditambahkan')->send();
        return redirect()->route('admin.katalogBuku');
    }

    public function edit($slug)
    {
        $book = DB::table('books')->where('slug', '=', $slug)->first();
        $kategoris = DB::table('kategoris')->get();
        return view('admin.crudBuku.edit', [
            'kategoris' => $kategoris,
            'book' => $book,
        ]);
    }

    public function update(Request $request, $slug)
    {
        $validated = $request->validate([
            'image' => '',
            'kategori_id' => 'required',
            'title' => 'required|max:255',
            'desc' => 'required',
            'author' => 'required',
            'penerbit' => 'required',
            'year_terbit' => 'required',
            'book_file' => '',
        ]);

        $book = DB::table('books')
            ->where('slug', '=', $slug)
            ->select(['image', 'book_file'])
            ->first();

        if ($request->file('book_file') || $request->file('image')) {
            if ($request->file('book_file')) {
                $path_book_file_new = $request->file('book_file')->store('book_file', 'public');
                Storage::disk('public')->delete($book->book_file);
            }
            if ($request->file('image')) {
                $path_image_new = $request->file('image')->store('images', 'public');
                Storage::disk('public')->delete($book->image);
            }
            DB::table('books')
                ->where('slug', '=', $slug)
                ->update([
                    'image' => $path_image_new ?? $book->image,
                    'kategori_id' => $request->input('kategori_id'),
                    'title' => $request->input('title'),
                    'slug' => Str::slug($request->input('title')),
                    'desc' => $request->input('desc'),
                    'author' => $request->input('author'),
                    'penerbit' => $request->input('penerbit'),
                    'year_terbit' => $request->input('year_terbit'),
                    'book_file' => $path_book_file_new ?? $book->book_file,
                    'updated_at' => now(),
                ]);
            notify()->success()->title('Data Berhasil Diubah')->send();
            return redirect()->route('admin.katalogBuku');
        }
        DB::table('books')
            ->where('slug', '=', $slug)
            ->update([
                'kategori_id' => $request->input('kategori_id'),
                'title' => $request->input('title'),
                'slug' => Str::slug($request->input('title')),
                'desc' => $request->input('desc'),
                'author' => $request->input('author'),
                'penerbit' => $request->input('penerbit'),
                'year_terbit' => $request->input('year_terbit'),
                'updated_at' => now(),
            ]);
        notify()->success()->title('Data Berhasil Di ubah')->send();
        return redirect()->route('admin.katalogBuku');
    }

    public function show($slug)
    {
        $book = DB::table('books')->where('slug', '=', $slug)->first();
        return view('admin.crudBuku.detail', [
            'book' => $book,
        ]);
    }

    public function destroy($slug)
    {
        $deleted = DB::table('books')->where('slug', '=', $slug)->delete();
        if (!$deleted) {
            notify()->error()->title('Data Gagal DiHapus')->send();
            return redirect()->route('admin.katalogBuku');
        }

        notify()
            ->success()
            ->title('User deleted')
            ->message('The user has been moved to trash')
            ->actions([NotifyAction::make()->label('Undo')->action(route('admin.katalogBuku', $slug))->method('POST'), NotifyAction::make()->label('View Trash')->url(route('admin.katalogBuku.tambah.store'))->openUrlInNewTab()])
            ->send();

        return redirect()->route('admin.katalogBuku');
    }

    public function downloadPdf($slug)
    {
        $book = DB::table('books')->where('slug', '=', $slug)->select('book_file')->first();
        return response()->download(storage_path('app/public/' . $book->book_file));
    }
}