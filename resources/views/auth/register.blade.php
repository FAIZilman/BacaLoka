<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js']);
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
    <title>Daftar Akun | Pustaka Digital</title>
    @notifyCss
</head>

<body class="bg-white md:bg-gray-50 flex flex-col min-h-screen">

    <header class="p-6 md:px-20">
        <a href="#" class="text-2xl font-black text-purple-900 tracking-tighter decoration-none">
            PUSTAKA<span class="text-purple-600">DIGITAL</span>
        </a>
    </header>

    <main class="flex-grow flex items-center justify-center p-4">
        <div class="w-full max-w-[450px] bg-white md:shadow-xl md:rounded-2xl md:border border-gray-100 p-6 md:p-10">

            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800">Daftar Akun</h2>
                <p class="text-sm text-gray-500 mt-2">Lengkapi data diri untuk menikmati layanan perpustakaan kami.</p>
            </div>

            <form action="{{ route('register.store') }}" method="POST" class="space-y-6">
                @csrf
                @method('POST')
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-400 mb-1">Nama
                        Lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full px-0 py-2 border-b-2 border-gray-200 focus:border-purple-600 outline-none transition-colors text-gray-800 placeholder-gray-300"
                        placeholder="Masukkan nama lengkap sesuai identitas">
                    @error('name')
                    <p class="text-red-500 text-xs font-semibold">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-400 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full px-0 py-2 border-b-2 border-gray-200 focus:border-purple-600 outline-none transition-colors text-gray-800 placeholder-gray-300"
                        placeholder="example@email.com">
                    @error('email')
                    <p class="text-red-500 text-xs font-semibold">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-400 mb-1">Kata
                        Sandi</label>
                    <div class="relative">
                        <input type="password" name="password"
                            class="w-full px-0 py-2 border-b-2 border-gray-200 focus:border-purple-600 outline-none transition-colors text-gray-800 placeholder-gray-300"
                            placeholder="Buat kata sandi minimal 8 karakter">
                        <button type="button"
                            class="absolute right-0 top-2 text-xs font-bold text-purple-600 hover:text-purple-800 uppercase">Lihat</button>

                    </div>
                    @error('password')
                    <p class="text-red-500 text-xs font-semibold">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-400 mb-1">Konfirmasi Kata
                        Sandi</label>
                    <div class="relative">
                        <input type="password" name="password_confirmation"
                            class="w-full px-0 py-2 border-b-2 border-gray-200 focus:border-purple-600 outline-none transition-colors text-gray-800 placeholder-gray-300"
                            placeholder="Buat kata sandi minimal 8 karakter">
                        <button type="button"
                            class="absolute right-0 top-2 text-xs font-bold text-purple-600 hover:text-purple-800 uppercase">Lihat</button>
                    </div>
                </div>

                <div class="pt-2">
                    <p class="text-[11px] text-gray-500 leading-relaxed">
                        Dengan mendaftar, saya menyetujui <a href="#"
                            class="text-purple-600 font-bold hover:underline">Syarat & Ketentuan</a> serta <a href="#"
                            class="text-purple-600 font-bold hover:underline">Kebijakan Privasi</a> Pustaka Digital.
                    </p>
                </div>

                <button type="submit"
                    class="w-full bg-purple-700 hover:bg-purple-800 text-white font-bold py-3 rounded-full transition-all duration-300 shadow-lg shadow-purple-100 mt-4 uppercase tracking-wide cursor-pointer">
                    Daftar Sekarang
                </button>
            </form>

            <div class=" text-center pt-6 border-t border-gray-50">
                <p class="text-sm text-gray-500">
                    Sudah punya akun?
                    <a href="{{ route('login.index') }}" class="text-purple-600 font-bold hover:underline ml-1">Masuk di
                        sini</a>
                </p>
            </div>
        </div>
    </main>

    <footer class="p-6 text-center text-gray-400 text-[10px] uppercase tracking-widest">
        &copy; 2026 Pustaka Digital Indonesia.
    </footer>
    <x-notify::notify />
    @notifyJs
</body>

</html>