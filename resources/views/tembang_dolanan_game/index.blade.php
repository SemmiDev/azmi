<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-gray-600">
            {{ __('Daftar Tembang Dolanan Game') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-8 p-5 rounded-xl bg-gradient-to-r from-sky-200 to-pink-200 shadow-md">

        <div class="flex justify-end mb-4 gap-2">
            <a href="{{ route('tembang_dolanan.index') }}"
                class="bg-gradient-to-r from-red-500 to-red-500 text-white px-4 py-2 rounded-md">Kembali</a>

            <a href="{{ route('tembang_dolanan_game.create', ['tembangDolanan' => $tembangDolanan]) }}"
                class="bg-gradient-to-r from-green-500 to-sky-500 text-white px-4 py-2 rounded-md">Tambah Soal</a>
        </div>

        <table class="min-w-full border border-gray-300 rounded-md">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Pertanyaan</th>
                    <th class="py-2 px-4 border-b">Jawaban</th>
                    <th class="py-2 px-4 border-b">Options</th>
                    <th class="py-2 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($games as $game)
                    <tr>
                        <td class="py-2 px-4 text-center border-b">{{ $game->question }}</td>
                        <td class="py-2 px-4 text-center border-b">{{ $game->answer }}</td>
                        <td class="py-2 px-4 border-b">
                            @foreach ($game->options as $key => $option)
                                {{ strtoupper($key) }}: {{ $option }}<br>
                            @endforeach
                        </td>
                        <td class="py-2 px-4 text-start border-b">
                            <div class="space-x-2 flex justify-center">
                                <form action="{{ route('tembang_dolanan_game.destroy', ['game' => $game->id]) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus permainan ini?')">
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
                        <td class="py-4 px-4 text-center" colspan="3">Tidak ada soal saat ini.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
