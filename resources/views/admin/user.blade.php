<x-admin.template.app title="Admin Panel Anggota | BacaLoka">
    <x-slot:alert>
        <div class="bg-red-500 text-xs font-semibold text-white py-2 text-center w-full">
            Setiap data Pengguna memiliki Role User dan Khusus untuk role super admin akan mengelola seluruh pengguna
            termasuk
            admin
        </div>
    </x-slot:alert>
    <div class="bg-gray-50 min-h-screen p-6 md:p-8">

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Manajemen Anggota</h1>
                <p class="text-sm text-gray-500 mt-1">Total 1,240 anggota terdaftar dalam sistem.</p>
            </div>
            <div class="flex gap-3">
                <button
                    class="flex items-center gap-2 px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-semibold text-gray-700 hover:bg-gray-50 transition shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    Export CSV
                </button>
                {{-- <button
                    class="flex items-center gap-2 px-4 py-2 bg-blue-600 rounded-lg text-sm font-semibold text-white hover:bg-blue-700 transition shadow-md shadow-blue-100">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Anggota
                </button> --}}
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-white p-4 rounded-xl border border-gray-200">
                <p class="text-xs font-medium text-gray-500 uppercase">Baru Minggu Ini</p>
                <p class="text-xl font-bold text-gray-900 mt-1">48 <span class="text-xs text-green-500 font-normal">↑
                        12%</span></p>
            </div>
            <div class="bg-white p-4 rounded-xl border border-gray-200">
                <p class="text-xs font-medium text-gray-500 uppercase">Anggota Aktif</p>
                <p class="text-xl font-bold text-gray-900 mt-1">1,102</p>
            </div>
            <div class="bg-white p-4 rounded-xl border border-gray-200">
                <p class="text-xs font-medium text-gray-500 uppercase">Premium</p>
                <p class="text-xl font-bold text-blue-600 mt-1">325</p>
            </div>
            <div class="bg-white p-4 rounded-xl border border-gray-200">
                <p class="text-xs font-medium text-gray-500 uppercase">Pending Verifikasi</p>
                <p class="text-xl font-bold text-orange-500 mt-1">14</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">

            <div class="p-4 border-b border-gray-100 flex flex-col md:flex-row justify-between gap-4 bg-gray-50/50">
                <div class="relative w-full md:w-80">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </span>
                    <input type="text" placeholder="Cari berdasarkan nama atau email..."
                        class="w-full pl-9 pr-4 py-2 bg-white border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                </div>
                <div class="flex items-center gap-2">
                    <select
                        class="text-sm border border-gray-200 rounded-lg px-3 py-2 bg-white outline-none focus:ring-2 focus:ring-blue-500">
                        <option>Semua Kategori</option>
                        <option>Premium</option>
                        <option>Reguler</option>
                    </select>
                    <select
                        class="text-sm border border-gray-200 rounded-lg px-3 py-2 bg-white outline-none focus:ring-2 focus:ring-blue-500">
                        <option>Urutkan Terbaru</option>
                        <option>Nama A-Z</option>
                    </select>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-50/50">
                        <tr class="text-xs font-bold text-gray-500 uppercase tracking-wider">
                            <th class="px-6 py-4">Informasi Profil</th>
                            <th class="px-6 py-4">Status Akun</th>
                            <th class="px-6 py-4">Paket Langganan</th>
                            <th class="px-6 py-4">Total Pinjam</th>
                            <th class="px-6 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($users as $user)

                        <tr class="hover:bg-blue-50/30 transition group">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <img class="h-10 w-10 rounded-full object-cover border border-gray-200"
                                        src="https://ui-avatars.com/api/?name=Ani+Wijaya&background=E11D48&color=fff"
                                        alt="">
                                    <div>
                                        <div class="text-sm font-bold text-gray-900">{{ $user->name }}</div>
                                        <div class="text-xs text-gray-500">{{ $user->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    <span class="w-1.5 h-1.5 rounded-full bg-gray-400 mr-1.5"></span>
                                    Non-aktif
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                Reguler
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                5 Buku
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.user.ubah.edit', ['id' => $user->id]) }}"
                                        class="p-1.5 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-md transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a href="{{ route('admin.user.destroy', ['id' => $user->id]) }}"
                                        class=" p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition"
                                        data-confirm-delete="true"><i class="fas fa-trash text-sm"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="px-6 py-4 bg-gray-50/50 border-t border-gray-100 flex items-center justify-between">
                <span class="text-sm text-gray-500 italic">Showing 1 to 10 of 1,240 results</span>
                <div class="flex gap-1">
                    <button
                        class="px-3 py-1 border border-gray-300 rounded text-sm bg-white hover:bg-gray-50 disabled:opacity-50">Prev</button>
                    <button
                        class="px-3 py-1 border border-blue-600 bg-blue-600 text-white rounded text-sm font-semibold">1</button>
                    <button
                        class="px-3 py-1 border border-gray-300 rounded text-sm bg-white hover:bg-gray-50">2</button>
                    <button
                        class="px-3 py-1 border border-gray-300 rounded text-sm bg-white hover:bg-gray-50">Next</button>
                </div>
            </div>
        </div>
    </div>
</x-admin.template.app>