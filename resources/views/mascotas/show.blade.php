<x-base title="{{ $mascota->nombre }}">

    <x-h1> {{ $mascota->nombre }} </x-h1>

    @if (session('status'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="mb-3">
        {{ $mascota->descripcion }}
    </div>

    <div class="mb-3">
        <x-btn-primary href="{{ route('mascotas.index') }}"> Volver a mascotas </x-btn-primary>
        <x-btn-primary href="{{ route('mascotas.edit', $mascota) }}"> Editar mascota </x-btn-primary>
        <form action="{{ route('mascotas.destroy', $mascota) }}" method="POST" class="inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"> Eliminar </button>
        </form>
    </div>

</x-base>