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
    <div class="max-w-5xl mx-auto p-6 bg-gray-50 min-h-screen">
        <nav class="text-sm text-gray-500 mb-6">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a> / <a
                href="{{ route('admin.katalogBuku') }}">Katalog</a> / <span class="font-semibold text-indigo-600">Detail
                Buku</span>
        </nav>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="flex flex-col md:flex-row">

                <div class="md:w-1/3 bg-gray-200 flex items-center justify-center p-8">
                    <img src="{{ asset('storage/'. $book->image) }}" alt="Book Cover"
                        class="w-full h-auto rounded-lg shadow-lg hover:scale-105 transition-transform duration-300">
                </div>

                <div class="md:w-2/3 p-8">
                    <div class="flex justify-between items-start mb-4">
                        <span
                            class="px-3 py-1 bg-indigo-100 text-indigo-700 text-xs font-bold uppercase tracking-wider rounded-full">
                            Kategori ID: #001
                        </span>
                        <span class="text-gray-400 text-sm font-medium">Tahun Terbit: {{ $book->year_terbit }}</span>
                    </div>

                    <h1 class="text-3xl font-extrabold text-gray-900 mb-1">{{ $book->title }}</h1>
                    <p class="text-sm text-gray-400 italic mb-6">slug: {{ $book->slug }}</p>

                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <div class="border-l-4 border-indigo-500 pl-4">
                            <p class="text-xs text-gray-500 uppercase">Penulis</p>
                            <p class="text-lg font-semibold text-gray-800">{{ $book->author }}</p>
                        </div>
                        <div class="border-l-4 border-emerald-500 pl-4">
                            <p class="text-xs text-gray-500 uppercase">Penerbit</p>
                            <p class="text-lg font-semibold text-gray-800">{{ $book->author }}</p>
                        </div>
                    </div>

                    <div class="mb-8">
                        <h3 class="text-gray-900 font-bold mb-2 text-lg">Deskripsi</h3>
                        <p class="text-gray-600 leading-relaxed text-justify">
                            {{ $book->desc }}
                        </p>
                    </div>

                    <div class="pt-6 border-t border-gray-100">
                        <a href="{{ route('admin.katalogBuku.pdf', ['slug' => $book->slug]) }}"
                            class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-xl text-white bg-indigo-600 hover:bg-indigo-700 transition-colors shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="size-6 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m9 13.5 3 3m0 0 3-3m-3 3v-6m1.06-4.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                            </svg>
                            Download Book File (PDF)
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>