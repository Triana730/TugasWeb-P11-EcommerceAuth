<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Daftar Postingan</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">

            @if (session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded">{{ session('success') }}</div>
            @endif

            @can('create', App\Models\Post::class)
                <a href="{{ route('posts.create') }}"
                   class="inline-block bg-gray-800 text-white px-4 py-2 rounded">+ Tambah Post</a>
            @endcan

            @forelse ($posts as $post)
                <div class="bg-white shadow-sm sm:rounded-lg p-6">
                    <h3 class="font-bold text-lg">{{ $post->title }}</h3>
                    <p class="text-sm text-gray-500">Oleh: {{ $post->user->name }}</p>
                    <p class="mt-2 text-gray-700">{{ Str::limit($post->content, 120) }}</p>

                    <div class="mt-3 flex gap-2">
                        @can('update', $post)
                            <a href="{{ route('posts.edit', $post) }}"
                               class="bg-yellow-400 px-3 py-1 rounded text-sm">Edit</a>
                        @endcan

                        @can('delete', $post)
                            <form action="{{ route('posts.destroy', $post) }}" method="POST"
                                  onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-600 text-white px-3 py-1 rounded text-sm">Hapus</button>
                            </form>
                        @endcan
                    </div>
                </div>
            @empty
                <div class="bg-yellow-100 p-4 rounded">Belum ada postingan.</div>
            @endforelse

            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>