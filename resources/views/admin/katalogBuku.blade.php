<x-admin.template.app title="Admin Panel Buku | BacaLoka">
    <main class="flex-1 overflow-x-hidden p-4 md:p-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Manajemen Katalog</h2>
                <p class="text-sm text-gray-500 mt-1">Kelola lebih dari 2.500 koleksi buku Anda.</p>
            </div>
            <div class="flex gap-2 w-full md:w-auto">
                <button
                    class="flex-1 md:flex-none px-4 py-2 border border-gray-200 bg-white text-gray-700 rounded-xl hover:bg-gray-50 font-medium transition flex items-center justify-center">
                    <i class="fas fa-download mr-2 text-xs"></i> Export CSV
                </button>
                <a href="{{ route('admin.katalogBuku.tambah.index') }}"
                    class="flex-1 md:flex-none px-6 py-2 bg-purple-600 text-white rounded-xl hover:bg-purple-700 shadow-lg shadow-blue-200 font-medium transition flex items-center justify-center">
                    <i class="fas fa-plus mr-2 text-xs"></i> Tambah Buku
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100">
                <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center mb-4"><i
                        class="fas fa-book"></i></div>
                <p class="text-sm text-gray-500">Total Koleksi</p>
                <p class="text-2xl font-bold text-gray-800">2,482</p>
            </div>
            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100">
                <div class="w-10 h-10 bg-green-100 text-green-600 rounded-lg flex items-center justify-center mb-4"><i
                        class="fas fa-shopping-bag"></i></div>
                <p class="text-sm text-gray-500">Terjual Hari Ini</p>
                <p class="text-2xl font-bold text-gray-800">154</p>
            </div>
            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100">
                <div class="w-10 h-10 bg-orange-100 text-orange-600 rounded-lg flex items-center justify-center mb-4"><i
                        class="fas fa-box-open"></i></div>
                <p class="text-sm text-gray-500">Stok Menipis</p>
                <p class="text-2xl font-bold text-gray-800">18</p>
            </div>
            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100">
                <div class="w-10 h-10 bg-purple-100 text-purple-600 rounded-lg flex items-center justify-center mb-4"><i
                        class="fas fa-star"></i></div>
                <p class="text-sm text-gray-500">Rating Rata-rata</p>
                <p class="text-2xl font-bold text-gray-800">4.8/5.0</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-5 border-b border-gray-50 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="relative w-full md:w-96">
                    <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input type="text" placeholder="Cari Judul, Penulis atau ISBN..."
                        class="w-full pl-11 pr-4 py-2.5 bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-blue-500 text-sm">
                </div>
                <select class="bg-gray-50 border-none rounded-xl text-sm px-4 py-2.5 focus:ring-2 focus:ring-blue-500">
                    <option>Semua Kategori</option>
                    <option>Fiksi</option>
                    <option>Non-Fiksi</option>
                    <option>Teknologi</option>
                </select>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left whitespace-nowrap">
                    <thead>
                        <tr class="text-xs font-semibold text-gray-400 uppercase tracking-wider bg-gray-50/50">
                            <th class="px-6 py-4">Buku</th>
                            <th class="px-6 py-4 text-center">Stok</th>
                            <th class="px-6 py-4">Author</th>
                            <th class="px-6 py-4">Tahun Terbit</th>
                            <th class="px-6 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($books as $book)
                        <tr class="hover:bg-blue-50/30 transition-colors group">
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="w-10 h-14 bg-gray-200 rounded shadow-sm overflow-hidden flex-shrink-0">
                                        <img src="{{ asset('storage/'.$book->image) }}" alt="cover"
                                            class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-800 group-hover:text-blue-700 transition">
                                            {{ $book->title }}</p>
                                        <p class="text-xs text-gray-500">{{ $book->author }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-sm font-medium">128</span>
                            </td>
                            <td class="px-6 py-4 font-bold text-sm text-gray-700">{{ $book->author }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ $book->year_terbit }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end space-x-2">
                                    <a href="{{ route('admin.katalogBuku.show', ['slug' => $book->slug]) }}"
                                        class="p-2 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition"><i
                                            class="fas fa-eye text-sm"></i></a>
                                    <a href="{{ route('admin.katalogBuku.ubah.edit', ['slug' => $book->slug]) }}"
                                        class="p-2 text-gray-400 hover:text-yellow-600 hover:bg-yellow-50 rounded-lg transition"><i
                                            class="fas fa-pencil-alt text-sm"></i></a>
                                    {{-- <form
                                        action="{{ route('admin.katalogBuku.destroy', ['slug' => $book->slug]) }}" --}}
                                        {{-- method="post"> --}}
                                        {{-- @csrf --}}
                                        {{-- @method('DELETE') --}}
                                        <a href="{{ route('admin.katalogBuku.destroy', ['slug' => $book->slug]) }}"
                                            class=" p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition"
                                            data-confirm-delete="true"><i class="fas fa-trash text-sm"></i></a>
                                        {{--
                                    </form> --}}
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</x-admin.template.app>