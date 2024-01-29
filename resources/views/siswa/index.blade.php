<x-app-layout>

    <div class="container mx-auto my-8">
        <h2 class="text-2xl font-semibold mb-4">Daftar Siswa</h2>

        <a href="{{ route('siswa.create') }}"
            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4">Tambah Siswa</a>

        <table class="min-w-full mt-5 bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Nama</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Jenis Kelamin</th>
                    <th class="py-2 px-4 border-b">Alamat</th>
                    <th class="py-2 px-4 border-b">Umur</th>
                    <th class="py-2 px-4 border-b">No. Identitas</th>
                    <th class="py-2 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswaList as $siswa)
                    <tr>
                        <td class="py-2 px-4 text-center border-b">{{ $siswa->id }}</td>
                        <td class="py-2 px-4 text-center border-b">{{ $siswa->name }}</td>
                        <td class="py-2 px-4 text-center border-b">{{ $siswa->email }}</td>
                        <td class="py-2 px-4 text-center border-b">{{ $siswa->jenis_kelamin }}</td>
                        <td class="py-2 px-4 text-center border-b">{{ $siswa->alamat }}</td>
                        <td class="py-2 px-4 text-center border-b">{{ $siswa->umur }}</td>
                        <td class="py-2 px-4 text-center border-b">{{ $siswa->no_identitas }}</td>
                        <td class="py-2 px-4 text-center border-b">
                            <a href="{{ route('siswa.edit', $siswa->id) }}"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</a>
                            <form action="{{ route('siswa.destroy', $siswa->id) }}" method="post" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
