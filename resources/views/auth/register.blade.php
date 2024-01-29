<x-guest-layout>
    <div class="bg-cover bg-center min-h-screen w-full bg-fixed" style="background-image: url('/login-background.png')">
        <form method="POST" action="{{ route('register') }}" class="bg-gradient-to-br from-yellow-300 via-pink-300 to-purple-300 shadow-md rounded-2xl px-8 pt-6 pb-8 mb-4 w-1/3 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
            @csrf

            <h1 class="text-4xl font-bold mb-4 text-purple-800">Halaman Daftar</h1>

            <!-- Nama -->
            <div class="mt-4">
                <x-input-label for="name" :value="__('Nama')" class="text-purple-600" />
                <x-text-input id="name" class="block mt-1 w-full" placeholder="John Doe" type="text" name="name" :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500" />
            </div>

            <!-- Username -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Username')" class="text-purple-600" />
                <x-text-input id="email" class="block mt-1 w-full" placeholder="dudung" type="text" name="email" :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="text-purple-600" />
                <x-text-input id="password" class="block mt-1 w-full" placeholder="*****" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
            </div>

            <!-- NIP -->
            <div class="mt-4">
                <x-input-label for="nip" :value="__('NIP')" class="text-purple-600" />
                <x-text-input id="nip" class="block mt-1 w-full" placeholder="123456789" type="text" name="no_identitas" :value="old('nip')" required />
                <x-input-error :messages="$errors->get('nip')" class="mt-2 text-red-500" />
            </div>

            <!-- Jenis Kelamin -->
            <div class="mt-4">
                <x-input-label :value="__('Jenis Kelamin')" class="text-purple-600" />
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" name="jenis_kelamin" value="Laki-laki" class="form-radio text-purple-600">
                        <span class="ml-2">Laki-laki</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" name="jenis_kelamin" value="Perempuan" class="form-radio text-purple-600">
                        <span class="ml-2">Perempuan</span>
                    </label>
                </div>
                <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2 text-red-500" />
            </div>

            <!-- Alamat -->
            <div class="mt-4">
                <x-input-label for="alamat" :value="__('Alamat')" class="text-purple-600" />
                <textarea id="alamat" name="alamat" class="block mt-1 w-full" placeholder="Alamat lengkap" required>{{ old('alamat') }}</textarea>
                <x-input-error :messages="$errors->get('alamat')" class="mt-2 text-red-500" />
            </div>

            <!-- Umur -->
            <div class="mt-4">
                <x-input-label for="umur" :value="__('Umur')" class="text-purple-600" />
                <x-text-input id="umur" class="block mt-1 w-full" placeholder="30" type="text" name="umur" :value="old('umur')" required />
                <x-input-error :messages="$errors->get('umur')" class="mt-2 text-red-500" />
            </div>

            <div class="flex items-center justify-end mt-6">
                <a class="text-sm text-purple-700 no-underline hover:text-purple-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500" href="{{ route('login') }}">
                    {{ __('Sudah punya akun?') }}
                </a>
                <x-primary-button class="ms-4 bg-purple-600 hover:bg-purple-800">
                    {{ __('Daftar') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
