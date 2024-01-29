<!-- resources/views/siswa/create.blade.php -->

<x-app-layout>

    <div class="container mx-auto my-8">
        <h2 class="text-2xl font-semibold mb-4">Create Siswa</h2>
        <form action="{{ route('siswa.store') }}" method="post" class="bg-white p-6 rounded shadow-md">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Nama</label>
                <input type="text" class="mt-1 p-2 border rounded-md w-full" autofocus id="name" name="name" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">Username</label>
                <input type="text" class="mt-1 p-2 border rounded-md w-full" id="email" name="email" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" class="mt-1 p-2 border rounded-md w-full" id="password" name="password" required>
            </div>

            <div class="mb-4">
                <label for="jenis_kelamin" class="block text-sm font-medium text-gray-600">Jenis Kelamin</label>
                <select class="mt-1 p-2 border rounded-md w-full" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="alamat" class="block text-sm font-medium text-gray-600">Alamat</label>
                <textarea class="mt-1 p-2 border rounded-md w-full" id="alamat" name="alamat" rows="3" required></textarea>
            </div>

            <div class="mb-4">
                <label for="umur" class="block text-sm font-medium text-gray-600">Umur</label>
                <input type="number" class="mt-1 p-2 border rounded-md w-full" id="umur" name="umur" required>
            </div>

            <div class="mb-4">
                <label for="no_identitas" class="block text-sm font-medium text-gray-600">NIS</label>
                <input type="text" class="mt-1 p-2 border rounded-md w-full" id="no_identitas" name="no_identitas" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Submit</button>
        </form>
    </div>
</x-app-layout>
