<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <title>403 - Akses Terbatas</title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    </style>
</head>

<body class="bg-[#F8F7FF] flex items-center justify-center min-h-screen p-6">

    <div class="fixed top-0 left-0 w-full h-full overflow-hidden -z-10">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] rounded-full bg-purple-100 blur-[120px] opacity-60">
        </div>
        <div
            class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] rounded-full bg-indigo-100 blur-[120px] opacity-60">
        </div>
    </div>

    <main class="max-w-2xl w-full text-center">
        <div
            class="mb-10 inline-flex items-center justify-center w-24 h-24 rounded-3xl bg-white shadow-sm border border-purple-50 transition-transform hover:rotate-3 duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-purple-500" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11v3m0 3h.01"
                    class="text-purple-700" />
            </svg>
        </div>

        <div class="space-y-6">
            <h1 class="text-sm font-bold tracking-[0.2em] text-purple-400 uppercase">Status Error 403</h1>
            <h2 class="text-4xl md:text-5xl font-bold text-slate-800 tracking-tight">Rak Buku Ini Terkunci</h2>
            <p class="text-slate-500 text-lg max-w-md mx-auto leading-relaxed">
                Anda mencoba memasuki arsip terbatas. Mohon maaf, halaman ini hanya tersedia untuk anggota staf
                perpustakaan.
            </p>
        </div>

        <div class="mt-12 flex flex-col sm:flex-row items-center justify-center gap-4">
            <button onclick="history.back()"
                class="group relative px-8 py-4 bg-purple-600 text-white font-semibold rounded-2xl transition-all hover:bg-purple-700 hover:shadow-[0_20px_40px_-15px_rgba(147,51,234,0.3)] flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 transform group-hover:-translate-x-1 transition-transform" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Halaman Sebelumnya
            </button>

            <a href="{{ route('welcome') }}"
                class="px-8 py-4 bg-white text-slate-600 font-semibold rounded-2xl border border-slate-200 hover:border-purple-200 hover:text-purple-600 transition-all shadow-sm">
                Ke Beranda Utama
            </a>
        </div>

        <p class="mt-16 text-slate-400 text-sm">
            Kesalahan sistem? <a href="#" class="text-purple-500 font-medium hover:underline">Lapor ke Pustakawan IT</a>
        </p>
    </main>

</body>

</html>