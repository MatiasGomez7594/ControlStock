<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Agregar Producto') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('productos.store') }}">
                @csrf

                <div class="mb-4">
                    <x-input-label for="nombre" :value="'Nombre'" />
                    <x-text-input id="nombre" name="nombre" class="block w-full mt-1" required />
                    <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="precio" :value="'Precio'" />
                    <x-text-input id="precio" name="precio" type="number" step="0.01" class="block w-full mt-1" required />
                    <x-input-error :messages="$errors->get('precio')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="cantidad" :value="'Cantidad'" />
                    <x-text-input id="cantidad" name="cantidad" type="number" class="block w-full mt-1" required />
                    <x-input-error :messages="$errors->get('cantidad')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="id_categoria" :value="'Categoría'" />
                    <select name="id_categoria" id="id_categoria" class="block w-full mt-1 rounded text-black">
                        <option value="">Seleccione una categoría</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ old('id_categoria') == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('id_categoria')" class="mt-2" />
                </div>

                <x-primary-button class="mt-4">
                    Guardar Producto
                </x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>
