<x-guest-layout>
    <x-auth-session-status class="mb-4 text-purple-600" :status="session('status')" />

    <div class="bg-cover bg-center min-h-screen w-full bg-fixed" style="background-image: url('/login-background.png')">
        <form method="POST" action="{{ route('login') }}"
            class="bg-gradient-to-br from-yellow-300 via-pink-300 to-purple-300 shadow-md rounded-2xl px-8 pt-6 pb-8 mb-4 w-1/3 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
            @csrf

            <h1 class="text-4xl font-bold mb-4 text-purple-800">Selamat Datang!</h1>

            <!-- Username -->
            <div>
                <x-input-label for="email" :value="__('Username')" class="text-purple-600" />
                <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" placeholder="Masukkan Username"
                    :value="old('email')" required autofocus autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="text-purple-600" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" placeholder="*****"
                    name="password" required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
            </div>

            <div class="flex items-center justify-end mt-6">
                <a class="text-sm text-purple-700 no-underline hover:text-purple-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
                    href="{{ route('register') }}">
                    {{ __('Belum punya akun?') }}
                </a>

                <x-primary-button class="ms-4 bg-purple-600 hover:bg-purple-800">
                    {{ __('Masuk') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
