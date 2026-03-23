<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BacaLoka | Solusi Literasi Digital</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']);
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f4f4;
        }
    </style>
    @notifyCss
</head>

<body>

    <div class="min-h-screen bg-[#f8fafc] text-slate-800 p-6 font-sans">
        <nav class="mb-8 text-sm text-slate-400">
            <a href="#" class="hover:text-violet-600 transition">Koleksi Digital</a> /
            <a href="#" class="hover:text-violet-600 transition">E-Book</a> /
            <span class="text-slate-600 font-medium">Baca Sekarang</span>
        </nav>

        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-10">

            <div class="lg:col-span-4 space-y-6">
                <div
                    class="relative group rounded-3xl bg-white shadow-[0_20px_50px_rgba(0,0,0,0.04)] border border-slate-100 p-5">
                    <img src="{{ asset('storage/'. $book->image) }}" alt="{{ $book->slug }}"
                        class="w-full h-[500px] object-cover rounded-2xl shadow-md transition-all duration-500 group-hover:shadow-violet-200 group-hover:-translate-y-1">

                    <div
                        class="absolute top-10 left-10 bg-white/90 backdrop-blur-md text-slate-800 text-[10px] font-black px-3 py-1.5 rounded-lg uppercase tracking-widest shadow-sm border border-slate-100">
                        E-Book Edition
                    </div>
                </div>

                <div class="flex gap-3">
                    <button
                        class="flex-1 flex items-center justify-center gap-2 py-3 bg-white hover:bg-slate-50 border border-slate-200 rounded-2xl transition-all shadow-sm active:scale-95">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-rose-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        <span class="font-bold text-xs text-slate-600 uppercase tracking-tight">Simpan</span>
                    </button>
                    <button
                        class="flex-1 flex items-center justify-center gap-2 py-3 bg-white hover:bg-slate-50 border border-slate-200 rounded-2xl transition-all shadow-sm active:scale-95">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-slate-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                        </svg>
                        <span class="font-bold text-xs text-slate-600 uppercase tracking-tight">Bagikan</span>
                    </button>
                </div>
            </div>

            <div class="lg:col-span-8 space-y-6">
                <div
                    class="bg-white border border-slate-200 shadow-[0_8px_40px_rgba(0,0,0,0.02)] p-10 rounded-[2.5rem] relative overflow-hidden">

                    <div class="relative z-10">
                        <div class="flex items-center gap-3 mb-4">
                            <span
                                class="bg-violet-50 text-violet-600 text-[10px] font-black uppercase tracking-[0.15em] px-3 py-1.5 rounded-full border border-violet-100">Akses
                                Instan</span>
                            <div class="h-1 w-1 rounded-full bg-slate-300"></div>
                            <span class="text-slate-400 text-[10px] font-bold uppercase tracking-widest">Premium
                                Quality</span>
                        </div>

                        <h1 class="text-5xl font-black text-slate-900 tracking-tight mb-4 leading-tight">{{ $book->title
                            }}</h1>
                        <p class="text-violet-600 font-bold text-xl mb-8 flex items-center gap-2">
                            Oleh <span
                                class="hover:text-violet-700 cursor-pointer border-b-2 border-violet-100 pb-0.5">{{
                                $book->author }}</span>
                        </p>

                        <div class="flex flex-wrap items-center gap-8 mb-10 pb-8 border-b border-slate-100">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 rounded-xl bg-yellow-50 flex items-center justify-center text-yellow-600 border border-yellow-100">
                                    <span class="font-black text-sm">4.9</span>
                                </div>
                                <div class="text-xs">
                                    <p class="font-black text-slate-800 italic leading-none mb-1">Excellent</p>
                                    <p class="text-slate-400 font-medium leading-none">{{ $book->show }} Pembaca</p>
                                </div>
                            </div>

                            <div class="h-8 w-px bg-slate-100 hidden md:block"></div>

                            <div class="flex items-center gap-3 italic">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-slate-600 font-medium">Tersedia untuk dipinjam</span>
                            </div>
                        </div>

                        <div class="mb-10">
                            <h3 class="text-xs font-black uppercase tracking-[0.2em] text-slate-300 mb-4">Deskripsi</h3>
                            <p class="text-slate-600 leading-relaxed text-lg font-normal">
                                {{ $book->desc }}
                            </p>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-12">
                            <div
                                class="bg-slate-50/50 p-5 rounded-[1.5rem] border border-slate-100 flex items-center gap-4">
                                <div class="bg-white p-2.5 rounded-xl shadow-sm"><svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 text-violet-500" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg></div>
                                <div>
                                    <p class="text-[9px] text-slate-400 uppercase font-bold tracking-widest mb-0.5">
                                        Format</p>
                                    <p class="font-bold text-slate-700 text-sm">PDF, EPUB</p>
                                </div>
                            </div>
                            <div
                                class="bg-slate-50/50 p-5 rounded-[1.5rem] border border-slate-100 flex items-center gap-4">
                                <div class="bg-white p-2.5 rounded-xl shadow-sm"><svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 text-violet-500" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg></div>
                                <div>
                                    <p class="text-[9px] text-slate-400 uppercase font-bold tracking-widest mb-0.5">
                                        Ukuran</p>
                                    <p class="font-bold text-slate-700 text-sm">12.4 MB</p>
                                </div>
                            </div>
                            <div
                                class="bg-slate-50/50 p-5 rounded-[1.5rem] border border-slate-100 flex items-center gap-4">
                                <div class="bg-white p-2.5 rounded-xl shadow-sm"><svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 text-violet-500" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg></div>
                                <div>
                                    <p class="text-[9px] text-slate-400 uppercase font-bold tracking-widest mb-0.5">
                                        Akses</p>
                                    <p class="font-bold text-slate-700 text-sm">Selamanya</p>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('user.baca.buku', ['slug' => $book->slug]) }}"
                            class="group w-full md:w-auto px-20 py-5 rounded-2xl font-black text-lg transition-all duration-500 flex items-center justify-center gap-3 shadow-[0_20px_40px_rgba(124,58,237,0.2)]">

                            <span class="flex items-center gap-3">
                                PINJAM & BACA SEKARANG
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6 group-hover:translate-x-1 transition-transform" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>