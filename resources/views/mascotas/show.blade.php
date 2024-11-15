<x-base title="{{ $mascota->nombre }}">

    <x-h1> {{ $mascota->nombre }} </x-h1>

    @if (session('status'))
        <x-alert-success>
            {{ session('status') }}
        </x-alert-success>
    @endif

    <div class="mb-3">
        @if ($mascota->imagen)
            <img src="{{ asset('storage/' . $mascota->imagen) }}" alt="{{ $mascota->nombre }}" class="max-w-36" />
        @endif
    </div>

    <div class="mb-3">
        {{ $mascota->descripcion }}
    </div>

    <div class="mb-3">
        <x-btn-primary href="{{ route('mascotas.index') }}"> Volver a mascotas </x-btn-primary>
        <x-btn-primary href="{{ route('mascotas.edit', $mascota) }}"> Editar mascota </x-btn-primary>
        <form action="{{ route('mascotas.destroy', $mascota) }}" method="POST" class="inline-block">
            @csrf
            @method('DELETE')
            <x-btn-danger> Eliminar </x-btn-danger>
        </form>
    </div>

</x-base>