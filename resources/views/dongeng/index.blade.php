<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-gray-600">
            {{ __('Daftar Dongeng') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-8 p-5 rounded-xl bg-gradient-to-r from-sky-200 to-pink-200 shadow-md">

        <div class="flex justify-end mb-4">
            <a href="{{ route('dongeng.create') }}"
                class="bg-gradient-to-r from-green-500 to-sky-500 text-white px-4 py-2 rounded-md">Tambah
                Dongeng</a>
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
                @forelse ($dongengs as $dongeng)
                    <tr>
                        <td class="py-2 px-4 text-center border-b">{{ $dongeng->title }}</td>
                        <td class="py-2 px-4 text-center border-b">{{ $dongeng->description }}</td>
                        <td class="py-2 px-4 text-center  border-b">
                            <div class="space-x-2 flex justify-center">
                                <a href="{{ route('dongeng.show', $dongeng->id) }}"
                                    class="bg-gradient-to-r from-green-500 to-sky-500 text-white px-4 py-2 rounded-md">Detail</a>
                                <a href="{{ route('dongeng.edit', $dongeng->id) }}"
                                    class="bg-gradient-to-r from-yellow-500 to-blue-500 text-white px-4 py-2 rounded-md">Edit</a>
                                <form action="{{ route('dongeng.destroy', $dongeng->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus dongeng ini?')">
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
                        <td class="py-4 px-4 text-center" colspan="3">Tidak ada dongeng saat ini.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-app-layout>
