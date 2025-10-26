<x-guest-layout>
    <div class=" items-center justify-center bg-white">
        <div class="w-full max-w-md bg-white border border-blue-100 rounded-2xl shadow-lg p-8">

            <!-- Judul -->
            <div class="text-center mb-6">
                <h2 class="text-3xl font-bold text-blue-700">Login</h2>
                <p class="text-sm text-gray-500 mt-1">Selamat datang kembali di sistem perpustakaan</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Form Login -->
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-blue-700 mb-1">Email</label>
                    <input id="email" type="email" name="email"
                        value="{{ old('email') }}"
                        required autofocus
                        class="w-full border border-blue-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 placeholder-gray-400"
                        placeholder="Masukkan email Anda">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-blue-700 mb-1">Password</label>
                    <input id="password" type="password" name="password" required
                        class="w-full border border-blue-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 placeholder-gray-400"
                        placeholder="Masukkan password Anda">
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember"
                            class="rounded border-blue-300 text-blue-600 focus:ring-blue-400">
                        <span class="ml-2 text-gray-600">Ingat saya</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline">
                            Lupa password?
                        </a>
                    @endif
                </div>

                <!-- Tombol -->
                <div class="pt-2">
                    <button type="submit"
                        class="w-full bg-blue-600 text-white font-semibold py-2.5 rounded-lg shadow-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-300 transition">
                        Masuk
                    </button>
                </div>
            </form>

            <!-- Register -->
            @if (Route::has('register'))
                <p class="mt-6 text-center text-sm text-gray-600">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:underline">
                        Daftar Sekarang
                    </a>
                </p>
            @endif
        </div>
    </div>
</x-guest-layout>
