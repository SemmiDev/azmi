<x-app-layout>

    <div class="container mx-auto my-8">
        <h2 class="text-2xl font-semibold mb-4">Edit Siswa</h2>
        <form action="{{ route('siswa.update', $siswa->id) }}" method="post" class="bg-white p-6 rounded shadow-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Nama</label>
                <input type="text" class="mt-1 p-2 border rounded-md w-full" id="name" name="name"
                    value="{{ $siswa->name }}" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">Username</label>
                <input type="text" class="mt-1 p-2 border rounded-md w-full" id="email" name="email"
                    value="{{ $siswa->email }}" required>
            </div>

            <div class="mb-4">
                <label for="jenis_kelamin" class="block text-sm font-medium text-gray-600">Jenis Kelamin</label>
                <select class="mt-1 p-2 border rounded-md w-full" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="Laki-laki" {{ $siswa->jenis_kelamin === 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                    </option>
                    <option value="Perempuan" {{ $siswa->jenis_kelamin === 'Perempuan' ? 'selected' : '' }}>Perempuan
                    </option>
                </select>
            </div>

            <div class="mb-4">
                <label for="alamat" class="block text-sm font-medium text-gray-600">Alamat</label>
                <textarea class="mt-1 p-2 border rounded-md w-full" id="alamat" name="alamat" rows="3" required>{{ $siswa->alamat }}</textarea>
            </div>

            <div class="mb-4">
                <label for="umur" class="block text-sm font-medium text-gray-600">Umur</label>
                <input type="number" class="mt-1 p-2 border rounded-md w-full" id="umur" name="umur"
                    value="{{ $siswa->umur }}" required>
            </div>

            <div class="mb-4">
                <label for="no_identitas" class="block text-sm font-medium text-gray-600">NIS</label>
                <input type="text" class="mt-1 p-2 border rounded-md w-full" id="no_identitas" name="no_identitas"
                    value="{{ $siswa->no_identitas }}" required>
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Update</button>
        </form>
    </div>

</x-app-layout>
