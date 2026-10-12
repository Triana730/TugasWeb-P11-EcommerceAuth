<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Postingan</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('posts.store') }}" method="POST"
                  class="bg-white shadow-sm sm:rounded-lg p-6 space-y-4">
                @csrf
                <div>
                    <label class="block font-medium">Judul</label>
                    <input type="text" name="title" value="{{ old('title') }}"
                           class="w-full border-gray-300 rounded">
                    @error('title') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block font-medium">Isi</label>
                    <textarea name="content" rows="6"
                              class="w-full border-gray-300 rounded">{{ old('content') }}</textarea>
                    @error('content') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
                <button class="bg-gray-800 text-white px-4 py-2 rounded">Simpan</button>
                <a href="{{ route('posts.index') }}" class="px-4 py-2">Batal</a>
            </form>
        </div>
    </div>
</x-app-layout>