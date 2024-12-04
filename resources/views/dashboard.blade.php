<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />

                <!-- Mostrar opciones administrativas solo para el usuario con ID 12 -->
                @if(Auth::check() && Auth::id() == 12)
                <a href="{{ route('posts.create') }}" class="btn btn-primary">Crear Post</a>
                <a href="{{ route('posts.edit', $post->id ?? 0) }}" class="btn btn-secondary">Editar Post</a>
                <form action="{{ route('posts.destroy', $post->id ?? 0) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar Post</button>
                </form>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>