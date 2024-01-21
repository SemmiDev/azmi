<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-gray-600">
            {{ __('Daftar Arane Kewan') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-8 p-5 rounded-xl bg-gradient-to-r from-sky-200 to-pink-200 shadow-md">

        <div class="flex justify-end items-center mb-4 gap-2">
            <a href="{{ route('start_arane_kewan_game.material') }}"
                class="bg-gradient-to-r from-pink-500 to-pink-500 text-white px-4 py-2 rounded-md">Mainkan</a>

            <a href="{{ route('arane_kewan.create') }}"
                class="bg-gradient-to-r from-green-500 to-sky-500 text-white px-4 py-2 rounded-md">Tambah
                Arane Kewan</a>
        </div>

        <table class="min-w-full border border-gray-300 rounded-md">
            <thead>
                <tr>
                    <th class="py-2 border-b"></th>
                    <th class="py-2 px-4 border-b">Judul</th>
                    <th class="py-2 px-4 border-b">Deskripsi</th>
                    <th class="py-2 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($araneKewans as $araneKewan)
                    <tr>
                        <td class="py-2 px-4 text-center border-b">
                            <div class="w-20 h-20 rounded-full overflow-hidden">
                                <img src="{{ asset('storage/' . $araneKewan->background) }}" alt="background"
                                    class="w-full h-full object-cover">
                            </div>
                        </td>
                        <td class="py-2 px-4 text-center border-b">{{ $araneKewan->title }}</td>
                        <td class="py-2 px-4 text-center border-b">{{ $araneKewan->description }}</td>
                        <td class="py-2 px-4 text-center  border-b">
                            <div class="space-x-2 flex justify-center">
                                <a href="{{ route('arane_kewan.show', $araneKewan->id) }}"
                                    class="bg-gradient-to-r from-green-500 to-sky-500 text-white px-4 py-2 rounded-md">Detail</a>
                                <a href="{{ route('arane_kewan.edit', $araneKewan->id) }}"
                                    class="bg-gradient-to-r from-yellow-500 to-blue-500 text-white px-4 py-2 rounded-md">Edit</a>
                                <form action="{{ route('arane_kewan.destroy', $araneKewan->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus arane kewan ini?')">
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
                        <td class="py-4 px-4 text-center" colspan="3">Tidak ada arane kewan saat ini.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-app-layout>
