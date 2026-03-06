<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BacaLoka | Solusi Literasi Digital</title>
    @vite(['resources/css/app.css', 'resources/css/app.js']);
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

<body class="text-gray-800">

    <div class="bg-red-500 text-white text-[11px] py-1.5 text-center font-semibold tracking-wide uppercase">
        Pinjam E-Book Lebih Praktis Melalui Aplikasi PurpleLib Mobile
    </div>

    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50 py-3 shadow-sm">
        <div class="container mx-auto flex items-center gap-8">
            <div class="flex items-center space-x-2 shrink-0">
                <div class="bg-gramed-purple p-2 rounded-lg">
                    <i class="fas fa-book-open text-white"></i>
                </div>
                <span class="text-2xl font-black text-gramed-purple tracking-tighter">PURPLE<span
                        class="text-gramed-accent">LIB</span></span>
            </div>

            <button class="hidden lg:flex items-center space-x-2 text-gray-600 font-bold hover:text-gramed-purple">
                <i class="fas fa-bars"></i>
                <span>KATEGORI</span>
            </button>

            <div class="flex-1 relative">
                <input type="text" placeholder="Cari Judul Buku, Penulis, atau ISBN..."
                    class="w-full bg-gray-100 border-none rounded-md py-2.5 px-11 text-sm focus:ring-2 focus:ring-gramed-purple/20 transition-all">
                <i class="fas fa-search absolute left-4 top-3 text-gray-400"></i>
            </div>

            <div class="flex items-center space-x-6 text-gray-500">
                <a href="#" class="hover:text-gramed-purple relative">
                    <i class="far fa-heart text-xl"></i>
                </a>
                <a href="#" class="hover:text-gramed-purple relative">
                    <i class="fas fa-shopping-basket text-xl"></i>
                    <span
                        class="absolute -top-2 -right-2 bg-red-500 text-white text-[10px] rounded-full px-1.5 font-bold">0</span>
                </a>
                <div class="h-6 w-px bg-gray-200"></div>
                @if (Auth::check())
                <div class="pl-2 group relative cursor-pointer">
                    @if (Auth::user()->role == 'admin')
                    <a href="{{ route('admin.dashboard') }}">Dashboard Admin</a>
                    @else
                    {{ Auth::user()->name }}
                    <div id="dropdownInformation"
                        class="z-10 hidden group-hover:block absolute bg-white border border-default-medium rounded-base shadow-lg w-72 transition-all right-0">
                        <div class="p-2">
                            <div
                                class="flex items-center px-2.5 p-2 space-x-1.5 text-sm bg-neutral-secondary-strong rounded">
                                {{-- <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-5.jpg"
                                    alt="Rounded avatar"> --}}
                                <div class="text-sm">
                                    <div class="font-medium text-heading">{{ Auth::user()->name }}</div>
                                    <div class="truncate text-body">{{ Auth::user()->email }}</div>
                                </div>
                            </div>
                        </div>
                        <ul class="px-2 pb-2 text-sm text-body font-medium" aria-labelledby="dropdownInformationButton">
                            <li>
                                <a href="#"
                                    class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">
                                    <svg class="w-4 h-4 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-width="2"
                                            d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                    Account
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">
                                    <svg class="w-4 h-4 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                            d="M20 6H10m0 0a2 2 0 1 0-4 0m4 0a2 2 0 1 1-4 0m0 0H4m16 6h-2m0 0a2 2 0 1 0-4 0m4 0a2 2 0 1 1-4 0m0 0H4m16 6H10m0 0a2 2 0 1 0-4 0m4 0a2 2 0 1 1-4 0m0 0H4" />
                                    </svg>
                                    Settings
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">
                                    <svg class="w-4 h-4 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 14v3m-3-6V7a3 3 0 1 1 6 0v4m-8 0h10a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1Z" />
                                    </svg>
                                    Privacy
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">
                                    <svg class="w-4 h-4 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 5.365V3m0 2.365a5.338 5.338 0 0 1 5.133 5.368v1.8c0 2.386 1.867 2.982 1.867 4.175 0 .593 0 1.292-.538 1.292H5.538C5 18 5 17.301 5 16.708c0-1.193 1.867-1.789 1.867-4.175v-1.8A5.338 5.338 0 0 1 12 5.365ZM8.733 18c.094.852.306 1.54.944 2.112a3.48 3.48 0 0 0 4.646 0c.638-.572 1.236-1.26 1.33-2.112h-6.92Z" />
                                    </svg>
                                    Notifications
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">
                                    <svg class="w-4 h-4 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9.529 9.988a2.502 2.502 0 1 1 5 .191A2.441 2.441 0 0 1 12 12.582V14m-.01 3.008H12M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    Help center
                                </a>
                            </li>
                            <li
                                class="flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded mb-1.5">
                                <a href="#" class="inline-flex items-center">
                                    <svg class="w-4 h-4 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 21a9 9 0 0 1-.5-17.986V3c-.354.966-.5 1.911-.5 3a9 9 0 0 0 9 9c.239 0 .254.018.488 0A9.004 9.004 0 0 1 12 21Z" />
                                    </svg>
                                    Dark mode
                                </a>
                                <label class="inline-flex items-center cursor-pointer ms-auto">
                                    <input type="checkbox" value="" class="sr-only peer">
                                    <div
                                        class="relative w-9 h-5 bg-neutral-quaternary peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-brand-soft dark:peer-focus:ring-brand-soft rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-buffer after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-brand">
                                    </div>
                                    <span class="ms-3 text-sm font-medium text-heading sr-only">Toggle me</span>
                                </label>
                            </li>
                            <li class="border-t border-default-medium pt-1.5">
                                <a href="#"
                                    class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">
                                    <svg class="w-4 h-4 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="m10.051 8.102-3.778.322-1.994 1.994a.94.94 0 0 0 .533 1.6l2.698.316m8.39 1.617-.322 3.78-1.994 1.994a.94.94 0 0 1-1.595-.533l-.4-2.652m8.166-11.174a1.366 1.366 0 0 0-1.12-1.12c-1.616-.279-4.906-.623-6.38.853-1.671 1.672-5.211 8.015-6.31 10.023a.932.932 0 0 0 .162 1.111l.828.835.833.832a.932.932 0 0 0 1.111.163c2.008-1.102 8.35-4.642 10.021-6.312 1.475-1.478 1.133-4.77.855-6.385Zm-2.961 3.722a1.88 1.88 0 1 1-3.76 0 1.88 1.88 0 0 1 3.76 0Z" />
                                    </svg>
                                    Upgrade to PRO
                                </a>
                            </li>
                            <li>
                                <a href=""
                                    class="inline-flex items-center w-full p-2 text-fg-danger hover:bg-neutral-tertiary-medium rounded">
                                    <svg class="w-4 h-4 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2" />
                                    </svg>
                                    Sign out
                                </a>
                            </li>
                        </ul>
                    </div>
                    @endif
                </div>
                @else
                <a href="{{ route('login.index') }}"
                    class="font-bold text-sm text-gramed-purple border-2 border-gramed-purple px-6 py-1.5 rounded-md hover:bg-gramed-purple hover:text-white transition">MASUK</a>
                @endif
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-8">

            <aside class="hidden lg:block w-64 shrink-0">
                <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-100 sticky top-24">
                    <h3 class="font-bold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-filter mr-2 text-gramed-purple text-xs"></i> FILTER
                    </h3>

                    <div class="mb-6">
                        <p class="text-xs font-bold text-gray-400 uppercase mb-3 tracking-widest">Format Buku</p>
                        <label class="flex items-center mb-2 cursor-pointer group">
                            <input type="checkbox" class="rounded text-gramed-purple focus:ring-gramed-purple">
                            <span class="ml-3 text-sm group-hover:text-gramed-purple transition">Buku Fisik</span>
                        </label>
                        <label class="flex items-center mb-2 cursor-pointer group">
                            <input type="checkbox" class="rounded text-gramed-purple focus:ring-gramed-purple">
                            <span class="ml-3 text-sm group-hover:text-gramed-purple transition">E-Book Digital</span>
                        </label>
                    </div>

                    <div class="mb-6">
                        <p class="text-xs font-bold text-gray-400 uppercase mb-3 tracking-widest">Kategori Utama</p>
                        <ul class="text-sm space-y-2 text-gray-600">
                            <li class="hover:text-gramed-purple cursor-pointer flex justify-between italic">
                                <span>Fiksi</span> <i class="fas fa-chevron-right text-[10px] mt-1"></i>
                            </li>
                            <li class="hover:text-gramed-purple cursor-pointer flex justify-between italic">
                                <span>Pengembangan Diri</span> <i class="fas fa-chevron-right text-[10px] mt-1"></i>
                            </li>
                            <li class="hover:text-gramed-purple cursor-pointer flex justify-between italic"><span>Anak &
                                    Remaja</span> <i class="fas fa-chevron-right text-[10px] mt-1"></i></li>
                            <li class="hover:text-gramed-purple cursor-pointer flex justify-between italic">
                                <span>Teknologi & Komputer</span> <i class="fas fa-chevron-right text-[10px] mt-1"></i>
                            </li>
                        </ul>
                    </div>

                    <div class="pt-4 border-t border-gray-100">
                        <img src="https://via.placeholder.com/200x300?text=Iklan+Event+Ungu"
                            class="rounded-lg shadow-inner opacity-80" alt="Promo">
                    </div>
                </div>
            </aside>

            <main class="flex-1">
                <div
                    class="w-full h-48 md:h-64 bg-gradient-to-r from-gramed-purple to-gramed-accent rounded-xl mb-8 relative overflow-hidden shadow-lg">
                    <div class="p-8 md:p-12 relative z-10">
                        <p class="text-white text-sm font-bold uppercase tracking-widest mb-2">Promo Spesial Mei</p>
                        <h2 class="text-white text-3xl md:text-4xl font-black max-w-sm leading-tight">Bebas Denda Selama
                            <br> Bulan Ramadhan!
                        </h2>
                        <button
                            class="mt-6 bg-white text-gramed-purple font-bold px-6 py-2 rounded shadow-xl hover:scale-105 transition">Cek
                            Syaratnya</button>
                    </div>
                    <i class="fas fa-book-reader absolute -right-4 -bottom-4 text-[180px] text-white/10 rotate-12"></i>
                </div>

                <div class="flex justify-between items-center mb-6">
                    <h2
                        class="text-xl font-black text-gray-800 border-b-4 border-gramed-purple pb-1 uppercase tracking-tighter italic">
                        Buku Paling Populer</h2>
                    <a href="#" class="text-sm font-bold text-gramed-purple hover:underline italic">Lihat Semua</a>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">

                    <div
                        class="bg-white rounded-lg p-3 shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 group flex flex-col">
                        <div class="relative aspect-[3/4.5] overflow-hidden rounded mb-3">
                            <img src="https://covers.openlibrary.org/b/id/8226191-L.jpg"
                                class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            <div
                                class="absolute top-2 left-2 bg-gramed-purple text-white text-[9px] font-black px-2 py-0.5 rounded">
                                TERSEDIA</div>
                        </div>
                        <p class="text-[10px] text-gray-400 font-bold uppercase mb-1">James Clear</p>
                        <h3
                            class="font-bold text-sm text-gray-800 line-clamp-2 leading-snug flex-1 hover:text-gramed-purple cursor-pointer">
                            Atomic Habits: Perubahan Kecil Yang Memberikan Hasil Luar Biasa</h3>
                        <div class="mt-3 flex items-center justify-between">
                            <p class="text-gramed-purple font-black text-base italic">Gratis</p>
                            <div class="text-yellow-400 text-[10px]">
                                <i class="fas fa-star"></i> 5.0
                            </div>
                        </div>
                        <button
                            class="w-full mt-4 border border-gramed-purple text-gramed-purple py-2 rounded text-xs font-black hover:bg-gramed-purple hover:text-white transition">PINJAM
                            BUKU</button>
                    </div>

                    <div
                        class="bg-white rounded-lg p-3 shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 group flex flex-col">
                        <div class="relative aspect-[3/4.5] overflow-hidden rounded mb-3">
                            <img src="https://covers.openlibrary.org/b/id/12547191-L.jpg"
                                class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            <div
                                class="absolute top-2 left-2 bg-gramed-accent text-white text-[9px] font-black px-2 py-0.5 rounded uppercase italic tracking-widest">
                                E-Book Digital</div>
                        </div>
                        <p class="text-[10px] text-gray-400 font-bold uppercase mb-1">Henry Manampiring</p>
                        <h3
                            class="font-bold text-sm text-gray-800 line-clamp-2 leading-snug flex-1 hover:text-gramed-purple cursor-pointer">
                            Filosofi Teras: Stoisisme Untuk Hidup Masa Kini</h3>
                        <div class="mt-3">
                            <p class="text-gramed-purple font-black text-base italic leading-none">Anggota Silver</p>
                        </div>
                        <button
                            class="w-full mt-4 bg-gramed-purple text-white py-2 rounded text-xs font-black hover:bg-gramed-accent transition">BACA
                            DIGITAL</button>
                    </div>

                    <div
                        class="bg-white rounded-lg p-3 shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 group flex flex-col">
                        <div class="relative aspect-[3/4.5] overflow-hidden rounded mb-3">
                            <img src="https://covers.openlibrary.org/b/id/12915858-L.jpg"
                                class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        </div>
                        <p class="text-[10px] text-gray-400 font-bold uppercase mb-1">Tere Liye</p>
                        <h3
                            class="font-bold text-sm text-gray-800 line-clamp-2 leading-snug flex-1 hover:text-gramed-purple cursor-pointer">
                            Bumi (Edisi Kolektor Ungu)</h3>
                        <div class="mt-3 flex items-center justify-between">
                            <p class="text-gramed-purple font-black text-base italic font-light italic">Pinjam Fisik</p>
                        </div>
                        <button
                            class="w-full mt-4 border border-gramed-purple text-gramed-purple py-2 rounded text-xs font-black hover:bg-gramed-purple hover:text-white transition uppercase">Cek
                            Ketersediaan</button>
                    </div>

                    <div
                        class="bg-white rounded-lg p-3 shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 group flex flex-col opacity-75">
                        <div class="relative aspect-[3/4.5] overflow-hidden rounded mb-3">
                            <img src="https://covers.openlibrary.org/b/id/10521270-L.jpg"
                                class="w-full h-full object-cover grayscale">
                            <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                                <span
                                    class="text-white font-black text-xs uppercase tracking-widest bg-black/60 px-3 py-1">Kosong</span>
                            </div>
                        </div>
                        <p class="text-[10px] text-gray-400 font-bold uppercase mb-1">Neil deGrasse Tyson</p>
                        <h3 class="font-bold text-sm text-gray-800 line-clamp-2 leading-snug flex-1">Astrophysics for
                            People in a Hurry</h3>
                        <div class="mt-3">
                            <p class="text-gray-400 font-black text-base italic italic">Tersedia di Juli</p>
                        </div>
                        <button disabled
                            class="w-full mt-4 bg-gray-200 text-gray-400 py-2 rounded text-xs font-black cursor-not-allowed uppercase italic">Tunggu
                            Antrean</button>
                    </div>

                </div>
            </main>
        </div>
    </div>

    <footer class="bg-white border-t border-gray-200 mt-20 pt-16 pb-8">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-12 text-center md:text-left">
            <div>
                <h4 class="text-gramed-purple text-2xl font-black mb-6 tracking-tighter italic uppercase">PurpleLib</h4>
                <p class="text-xs text-gray-500 leading-relaxed font-medium">Platform perpustakaan digital terintegrasi
                    yang memudahkan akses literasi bagi semua kalangan dengan warna ungu yang elegan.</p>
            </div>
            <div>
                <h5 class="font-black text-xs uppercase tracking-[0.2em] mb-6">Tentang PurpleLib</h5>
                <ul class="text-sm text-gray-500 space-y-4 font-semibold">
                    <li class="hover:text-gramed-purple cursor-pointer italic transition">Profil Perusahaan</li>
                    <li class="hover:text-gramed-purple cursor-pointer italic transition">Syarat & Ketentuan</li>
                    <li class="hover:text-gramed-purple cursor-pointer italic transition">Kebijakan Privasi</li>
                </ul>
            </div>
            <div>
                <h5 class="font-black text-xs uppercase tracking-[0.2em] mb-6">Layanan</h5>
                <ul class="text-sm text-gray-500 space-y-4 font-semibold">
                    <li class="hover:text-gramed-purple cursor-pointer italic transition">Bantuan Peminjaman</li>
                    <li class="hover:text-gramed-purple cursor-pointer italic transition">Pusat Hubungan</li>
                    <li class="hover:text-gramed-purple cursor-pointer italic transition">Daftar Penulis</li>
                </ul>
            </div>
            <div>
                <h5 class="font-black text-xs uppercase tracking-[0.2em] mb-6">Hubungkan Kami</h5>
                <div class="flex justify-center md:justify-start space-x-4 mb-6">
                    <a href="#" class="text-gramed-purple text-xl hover:scale-110 transition"><i
                            class="fab fa-facebook-square"></i></a>
                    <a href="#" class="text-gramed-purple text-xl hover:scale-110 transition"><i
                            class="fab fa-instagram-square"></i></a>
                    <a href="#" class="text-gramed-purple text-xl hover:scale-110 transition"><i
                            class="fab fa-twitter-square"></i></a>
                </div>
                <img src="https://via.placeholder.com/150x50?text=Download+App" class="opacity-80 cursor-pointer"
                    alt="PlayStore">
            </div>
        </div>
        <div
            class="container mx-auto px-4 border-t border-gray-100 mt-16 pt-8 text-center text-[10px] text-gray-400 font-bold uppercase tracking-widest">
            &copy; 2026 PT PurpleLib Digital Literasi Indonesia. Terinspirasi dari Gramedia.
        </div>
    </footer>
    <x-notify::notify />
    @notifyJs
</body>

</html>