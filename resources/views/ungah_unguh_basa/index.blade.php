<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-gray-600">
            {{ __('Daftar Ungah Unguh Basa') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-8 p-5 rounded-xl bg-gradient-to-r from-sky-200 to-pink-200 shadow-md">

        <div class="flex justify-end mb-4">
            <a href="{{ route('ungah_unguh_basa.create') }}"
                class="bg-gradient-to-r from-green-500 to-sky-500 text-white px-4 py-2 rounded-md">Tambah Ungah Unguh
                Basa</a>
        </div>

        <table class="min-w-full border border-gray-300 rounded-md">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Judul</th>
                    <th class="py-2 px-4 border-b">Deskripsi</th>
                    <th class="py-2 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ungahUnguhBasas as $ungahUnguhBasa)
                    <tr>
                        <td class="py-2 px-4 text-center border-b">{{ $ungahUnguhBasa->title }}</td>
                        <td class="py-2 px-4 text-center border-b">{{ $ungahUnguhBasa->description }}</td>
                        <td class="py-2 px-4 text-center  border-b">
                            <div class="space-x-2 flex justify-center">
                                <a href="{{ route('ungah_unguh_basa.edit', $ungahUnguhBasa->id) }}"
                                    class="bg-gradient-to-r from-sky-500 to-blue-500 text-white px-4 py-2 rounded-md">Kelola Permainan</a>
                                <a href="{{ route('ungah_unguh_basa.show', $ungahUnguhBasa->id) }}"
                                    class="bg-gradient-to-r from-green-500 to-sky-500 text-white px-4 py-2 rounded-md">Detail</a>
                                <a href="{{ route('ungah_unguh_basa.edit', $ungahUnguhBasa->id) }}"
                                    class="bg-gradient-to-r from-yellow-500 to-blue-500 text-white px-4 py-2 rounded-md">Edit</a>
                                <form action="{{ route('ungah_unguh_basa.destroy', $ungahUnguhBasa->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus Ungah Unguh Basa ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-gradient-to-r from-red-500 to-yellow-500 text-white px-4 py-2 rounded-md">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="py-4 px-4 text-center" colspan="3">Tidak ada Ungah Unguh Basa saat ini.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-app-layout>
