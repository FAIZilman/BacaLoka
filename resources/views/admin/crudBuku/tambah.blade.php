<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Tambah Buku</title>
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
    @notifyCss
</head>

<body class="bg-slate-50 text-slate-800 overflow-x-hidden">

    <div class="min-h-screen bg-gray-100 flex justify-center py-12 px-4 sm:px-6 lg:px-8 font-sans">
        <div class="max-w-4xl w-full bg-white rounded-xl shadow-lg overflow-hidden">

            <div class="bg-white border-b border-gray-100 px-8 py-6">
                <h2 class="text-2xl font-bold text-gray-800">Tambah Koleksi Buku</h2>
                <p class="text-sm text-gray-500 mt-1">Isi formulir di bawah ini untuk menambahkan buku baru ke katalog.
                </p>
            </div>

            <form class="p-8 space-y-6" method="POST" action="{{ route('admin.katalogBuku.tambah.store') }}"
                enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                    <div class="space-y-6">
                        <div>
                            <label
                                class="block text-sm font-bold text-gray-700 mb-2 text-transform: uppercase tracking-wider">Cover
                                Buku (Image)</label>
                            <div
                                class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-blue-400 transition-colors group">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400 group-hover:text-blue-500"
                                        stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path
                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label
                                            class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500">
                                            <span>Upload image</span>
                                            <input name="image" type="file" class="sr-only">
                                        </label>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG up to 10MB</p>
                                </div>
                            </div>
                            @error ('image')
                            <p class="text-red-500 font-semibold text-xs">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wider">File
                                Digital (book_file)</label>
                            <input type="file" name="book_file" value="{{ old('book_file') }}"
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-200 rounded-lg p-2">
                            @error ('book_file')
                            <p class="text-red-500 font-semibold text-xs">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                    </div>

                    <div class="space-y-5">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Judul Buku (Title)</label>
                            <input type="text" name="title" value="{{ old('title') }}" placeholder="Masukkan judul buku"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition">
                            @error ('title')
                            <p class="text-red-500 font-semibold text-xs">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-1">Kategori (ID)</label>
                                <select name="kategori_id"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 outline-none appearance-none bg-white">
                                    @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->name_category }}</option>
                                    @endforeach
                                </select>
                                @error ('kategori_id')
                                <p class="text-red-500 font-semibold text-xs">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-1">Tahun Terbit</label>
                                <input type="number" value="{{ old('year_terbit') }}" name="year_terbit"
                                    placeholder="2024"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 outline-none">
                                @error ('year_terbit')
                                <p class="text-red-500 font-semibold text-xs">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Penulis (Author)</label>
                            <input type="text" name="author" value="{{ old('author') }}" placeholder="Nama penulis"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 outline-none">
                            @error ('author')
                            <p class="text-red-500 font-semibold text-xs">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Penerbit</label>
                            <input type="text" name="penerbit" value="{{ old('penerbit') }}" placeholder="Nama penerbit"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 outline-none">
                            @error ('penerbit')
                            <p class="text-red-500 font-semibold text-xs">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                    </div>
                </div>

                <div class="mt-6">
                    <label class="block text-sm font-bold text-gray-700 mb-1">Deskripsi Buku (Desc)</label>
                    <textarea name="desc" rows="4" value="{{ old('desc') }}"
                        placeholder="Tuliskan sinopsis atau deskripsi singkat buku..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 outline-none"></textarea>
                    @error ('desc')
                    <p class="text-red-500 font-semibold text-xs">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="pt-6 border-t border-gray-100 flex justify-end space-x-4">
                    <button type="button"
                        class="px-6 py-2.5 rounded-lg text-sm font-semibold text-gray-600 hover:bg-gray-100 transition-all">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-8 py-2.5 rounded-lg text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 shadow-md shadow-blue-200 transition-all transform active:scale-95">
                        Simpan Buku
                    </button>
                </div>
            </form>
        </div>
    </div>
    <x-notify::notify />
    @notifyJs

</body>

</html>