<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/css/app.js']);
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
    @notifyCss
    <title>Masuk | Pustaka Digital</title>
</head>

<body class="bg-white md:bg-gray-50 flex flex-col min-h-screen">

    <header class="p-6 md:px-20">
        <h1 class="text-2xl font-black text-purple-900 tracking-tighter cursor-pointer">
            PUSTAKA<span class="text-purple-600">DIGITAL</span>
        </h1>
    </header>

    <main class="flex-grow flex items-center justify-center p-4">
        <div class="w-full max-w-[400px] bg-white md:shadow-xl md:rounded-2xl md:border border-gray-100 p-6 md:p-10">

            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800">Masuk</h2>
                <p class="text-sm text-gray-500 mt-2">Masuk dengan email dan kata sandi perpustakaanmu</p>
            </div>

            <form action="{{ route('login.store') }}" method="POST" class="space-y-5">
                @csrf
                @method('POST')
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-400 mb-1">Email</label>
                    <input name="email" type="email"
                        class="w-full px-0 py-2 border-b-2 border-gray-200 focus:border-purple-600 outline-none transition-colors text-gray-800 placeholder-gray-300"
                        placeholder="Contoh: user@email.com">
                    @error ('email')
                    <p class="text-red-500 font-semibold text-xs">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-400 mb-1">Kata
                        Sandi</label>
                    <div class="relative">
                        <input name="password" type="password"
                            class="w-full px-0 py-2 border-b-2 border-gray-200 focus:border-purple-600 outline-none transition-colors text-gray-800 placeholder-gray-300"
                            placeholder="Masukkan kata sandi">
                        <div type="button"
                            class="absolute right-0 top-2 text-xs font-bold text-purple-600 hover:text-purple-800">LIHAT
                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <a href="#" class="text-sm font-semibold text-purple-600 hover:text-purple-800 transition">Lupa Kata
                        Sandi?</a>
                </div>

                <button type="submit"
                    class="w-full bg-purple-700 hover:bg-purple-800 text-white font-bold py-3 rounded-full transition-all duration-300 shadow-lg shadow-purple-100 mt-4 cursor-pointer">
                    MASUK
                </button>
            </form>

            <div class="relative my-10 flex items-center">
                <div class="flex-grow border-t border-gray-200"></div>
                <span class="flex-shrink mx-4 text-gray-400 text-xs font-bold uppercase tracking-widest">Atau</span>
                <div class="flex-grow border-t border-gray-200"></div>
            </div>

            <button
                class="w-full flex items-center justify-center gap-3 border border-gray-300 hover:bg-gray-50 py-3 rounded-full transition duration-300 mb-8">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5" alt="Google icon">
                <span class="text-sm font-bold text-gray-700">Google</span>
            </button>

            <div class="text-center">
                <p class="text-sm text-gray-500">
                    Belum punya akun?
                    <a href="{{ route('register.index') }}"
                        class="text-purple-600 font-bold hover:underline ml-1">Daftar Sekarang</a>
                </p>
            </div>
        </div>
    </main>

    <footer class="p-6 text-center text-gray-400 text-xs">
        &copy; 2024 Pustaka Digital Indonesia. Semua Hak Dilindungi.
    </footer>
    <x-notify::notify />
    @notifyJs

</body>

</html>