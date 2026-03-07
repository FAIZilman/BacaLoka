@props(['title' => 'Admin Panel', 'alert' => ''])
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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
    @include('sweetalert::alert')

</head>

<body class="bg-slate-50 text-slate-800 overflow-x-hidden">

    <div id="overlay" onclick="toggleSidebar()"
        class="fixed inset-0 bg-slate-900/50 z-20 hidden backdrop-blur-sm transition-opacity"></div>

    <div class="flex h-screen overflow-hidden">

        <aside id="sidebar"
            class="sidebar-transition fixed h-screen left-0 z-30 w-64 bg-white border-r border-slate-200 transform -translate-x-full lg:translate-x-0 lg:relative flex flex-col overflow-auto">

            <div class="p-6 flex items-center justify-between">
                <div class="flex items-center gap-3 text-purple-700">
                    <div class="w-8 h-8 bg-purple-600 rounded-lg flex items-center justify-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor font-bold">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <span id="logo-text"
                        class="font-bold text-xl tracking-tight text-slate-900 whitespace-nowrap">Pustaka<span
                            class="text-purple-600">Gram</span></span>
                </div>
                <button onclick="toggleSidebar()" class="lg:hidden text-slate-400 hover:text-slate-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <nav class="flex-1 px-4 space-y-1 mt-4">
                <a href="{{ route('admin.dashboard') }}" class="@if ( request()->is('dashboard'))
                    text-purple-700 bg-purple-50 font-semibold
                    @else
                    text-slate-500
                    @endif group flex items-center gap-3 px-4 py-3    rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor font-bold">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    <span class="menu-label">Dashboard</span>
                </a>
                <a href="{{ route('admin.user') }}"
                    class="@if ( request()->is('admin/user'))
                        text-purple-700 bg-purple-50 font-semibold
                        @else
                        text-slate-500
                        @endif group flex items-center gap-3 px-4 py-3  hover:bg-slate-50 hover:text-purple-600 rounded-xl transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>

                    <span class="menu-label text-sm">Anggota</span>
                </a>
                <a href="{{ route('admin.katalogBuku') }}"
                    class="@if ( request()->is('admin/katalog-buku'))
                        text-purple-700 bg-purple-50 font-semibold
                        @else
                        text-slate-500
                        @endif group flex items-center gap-3 px-4 py-3  hover:bg-slate-50 hover:text-purple-600 rounded-xl transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <span class="menu-label text-sm">Katalog Buku</span>
                </a>
            </nav>

            <div class="p-4 border-t border-slate-100">
                <button
                    class="flex items-center gap-3 w-full px-4 py-3 text-red-500 hover:bg-red-50 rounded-xl transition-all font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span class="menu-label">Logout</span>
                </button>
            </div>
        </aside>

        <main class="flex-1 flex flex-col min-w-0 overflow-hidden">
            <header class="w-full">
                <div
                    class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-4 lg:px-8 sticky top-0 z-10">

                    <div class="flex items-center gap-4">
                        <button onclick="toggleSidebar()"
                            class="p-2 rounded-lg bg-slate-100 text-slate-600 hover:bg-purple-100 hover:text-purple-600 transition-colors">
                            <svg id="toggleIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                        <h2 class="font-bold text-slate-800 hidden sm:block">Dashboard Admin</h2>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="text-right hidden md:block">
                            <p class="text-sm font-bold text-slate-900 leading-none">Admin Pustaka</p>
                            <p class="text-[10px] text-slate-400 font-semibold uppercase tracking-wider mt-1">Super
                                Admin
                            </p>
                        </div>
                        <div
                            class="w-10 h-10 rounded-xl bg-purple-600 border-4 border-purple-100 flex items-center justify-center text-white font-bold shadow-sm">
                            A
                        </div>
                    </div>
                </div>
                {{ $alert }}
            </header>
            <div class="flex-1 overflow-y-auto">
                {{ $slot }}
            </div>
        </main>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            const menuLabels = document.querySelectorAll('.menu-label');
            const logoText = document.getElementById('logo-text');

            // Cek apakah layar berukuran desktop (lg: 1024px)
            if (window.innerWidth >= 1024) {
                // Mode Desktop: Mengecilkan Sidebar (Mini Sidebar)
                if (sidebar.classList.contains('w-64')) {
                    sidebar.classList.replace('w-64', 'w-20');
                    menuLabels.forEach(el => el.classList.add('hidden'));
                    logoText.classList.add('hidden');
                } else {
                    sidebar.classList.replace('w-20', 'w-64');
                    menuLabels.forEach(el => el.classList.remove('hidden'));
                    logoText.classList.remove('hidden');
                }
            } else {
                // Mode Mobile: Slide In/Out
                if (sidebar.classList.contains('-translate-x-full')) {
                    sidebar.classList.remove('-translate-x-full');
                    overlay.classList.remove('hidden');
                } else {
                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.add('hidden');
                }
            }
        }
    </script>
    <x-notify::notify />
    @notifyJs
</body>

</html>