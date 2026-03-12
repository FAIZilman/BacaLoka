<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembaca Buku Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Sembunyikan scrollbar utama agar fokus ke PDF */
        body {
            overflow: hidden;
        }

        .reader-container {
            height: calc(100vh - 64px);
        }
    </style>
    @notifyCss
</head>

<body class="bg-[#1a1a1a] font-sans text-gray-200">

    <header class="h-16 bg-[#252525] border-b border-gray-700 flex items-center justify-between px-6 shadow-md">
        <div class="flex items-center space-x-4">
            <a href="#" class="p-2 hover:bg-gray-700 rounded-full transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <div>
                <h1 class="text-sm font-bold text-white uppercase tracking-wider">Membaca Buku</h1>
                <p class="text-xs text-gray-400">Judul_Buku_Anda.pdf</p>
            </div>
        </div>

        <div class="flex items-center space-x-3">
            <button class="text-xs bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-medium transition">
                Tandai Halaman
            </button>
            <button class="p-2 hover:bg-gray-700 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                </svg>
            </button>
        </div>
    </header>

    <div class="flex reader-container">
        <aside class="hidden lg:flex w-64 bg-[#212121] border-r border-gray-700 flex-col p-4">
            <h2 class="text-xs font-semibold text-gray-500 uppercase mb-4">Daftar Isi</h2>
            <ul class="space-y-2 text-sm">
                <li><a href="#" class="block p-2 bg-blue-900/30 text-blue-400 rounded">Bab 1: Pendahuluan</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-800 rounded transition">Bab 2: Pembahasan Utama</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-800 rounded transition">Bab 3: Kesimpulan</a></li>
            </ul>
        </aside>

        <main class="flex-1 bg-[#121212] relative group">
            <iframe src="{{ asset('storage/'. $book->book_file) }}#toolbar=1&navpanes=0" width="100%" height="100%"
                style="border: none;" class="shadow-2xl">
            </iframe>

            <div
                class="absolute bottom-6 left-1/2 -translate-x-1/2 bg-black/60 backdrop-blur-md px-4 py-2 rounded-full text-xs border border-white/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                Gunakan toolbar atas untuk Zoom & Navigasi
            </div>
        </main>
    </div>
    <x-notify::notify />
    @notifyJs

</body>

</html>