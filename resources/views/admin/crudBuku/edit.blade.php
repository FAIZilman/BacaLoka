<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Edit Buku - Admin Panel</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap');

        body {
            font-family: 'inter', sans-serif;
        }

        /* Smooth transition for sidebar */
        .sidebar-transition {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>
</head>

<body class="bg-gray-50 py-10">

    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
        <div class="px-8 py-6 border-b border-gray-100 bg-white">
            <h1 class="text-2xl font-bold text-gray-800">Edit Informasi Buku</h1>
            <p class="text-sm text-gray-500">Perbarui detail buku, gambar sampul, dan berkas digital.</p>
        </div>

        <form action="{{ route('admin.katalogBuku.ubah.update', [
        'slug' => $book->slug]) }}" method="post" enctype="multipart/form-data" class="p-8 space-y-6">
            @method('put')
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Buku</label>
                    <input type="text" name="title" value="{{ $book->title }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                    @error ('title')
                    <p class="text-red-500 font-semibold text-xs">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Slug (URL)</label>
                    <input type="text" name="slug" value="{{ $book->slug }}" readonly
                        class="w-full px-4 py-2 border border-gray-200 bg-gray-50 rounded-lg text-gray-500 cursor-not-allowed">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
                    <select name="kategori_id"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none">
                        @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" @if ($kategori->id == $book->kategori_id) selected
                            @endif>{{ $kategori->name_category }}</option>
                        @endforeach
                    </select>
                    @error ('kategori_id')
                    <p class="text-red-500 font-semibold text-xs">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Penulis</label>
                    <input type="text" name="author" value="{{ $book->author }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none">
                    @error ('author')
                    <p class="text-red-500 font-semibold text-xs">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Penerbit</label>
                    <input type="text" name="penerbit" value="{{ $book->penerbit }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none">
                    @error ('penerbit')
                    <p class="text-red-500 font-semibold text-xs">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tahun Terbit</label>
                    <input type="number" name="year_terbit" value="{{ $book->year_terbit }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none">
                    @error ('year_terbit')
                    <p class="text-red-500 font-semibold text-xs">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Buku</label>
                    <textarea name="desc" rows="5"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none">{{ $book->title }}</textarea>
                    @error ('desc')
                    <p class="text-red-500 font-semibold text-xs">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">Gambar Sampul (Image)</label>
                    <div class="mt-1 flex items-center gap-4">
                        <div
                            class="w-20 h-28 bg-gray-100 rounded border flex items-center justify-center text-gray-400">
                            <img src="{{ asset('storage/'. $book->image) }}" alt="{{ $book->title }}">
                        </div>
                        <input type="file" name="image"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer" />
                        @error ('image')
                        <p class="text-red-500 font-semibold text-xs">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">File Buku (PDF/EPUB)</label>
                    <input type="file" name="book_file"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100 cursor-pointer" />
                    <p class="mt-1 text-xs text-gray-400 font-normal italic">*Maksimal 20MB</p>
                    @error ('book_file')
                    <p class="text-red-500 font-semibold text-xs">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

            </div>

            <div class="flex justify-end gap-3 pt-6 border-t border-gray-100">
                <a href="{{ route('admin.katalogBuku') }}"
                    class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition font-medium">
                    Batal
                </a>
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium shadow-sm shadow-blue-200 cursor-pointer">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

</body>

</html>