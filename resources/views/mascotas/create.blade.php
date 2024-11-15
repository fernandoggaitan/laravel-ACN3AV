<x-base title="Mascota nueva">

    <x-h1> Mascota nueva </x-h1>

    @if ($errors->any())
        <x-alert-danger>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-alert-danger>
    @endif

    <form class="mx-auto" action="{{ route('mascotas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-5 group">
            <div class="mb-5">
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Ingrese el nombre de la mascota </label>
                <input type="text" name="nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nombre de la mascota" value="{{ old('nombre') }}">
            </div>
            <div class="mb-5">
                <label for="fecha_nacimiento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Ingrese la fecha de nacimiento de la mascota </label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nombre de la mascota" value="{{ old('fecha_nacimiento') }}">
            </div>
            <div class="mb-5 group">
                <div class="mb-5">
                    <label for="categoria_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">  Ingrese la categoría de la mascota </label>
                    <select name="categoria_id" id="categoria_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">  </option>
                        @foreach ($categorias as $categoria)
                            <option @selected($categoria->id == old('categoria_id')) value="{{ $categoria->id }}"> {{ $categoria->nombre }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-5 group">
                <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Ingrese la descripción de la mascota </label>
                <textarea name="descripcion" id="descripcion" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Características de la mascota">{{ old('descripcion') }}</textarea>
            </div>
            <div class="mb-5 group">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="imagen"> Imagen </label>
                <input type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="imagen" id="imagen">
            </div>
            <div>
                <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"> Agregar mascota </button>
                <x-btn-primary href="{{ route('mascotas.index') }}"> Volver </x-btn-primary>
            </div>
        </div>
    </form>

</x-base>