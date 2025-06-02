<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Editar Producto') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <form method="POST" action="{{ route('productos.update', $producto->id) }}">
            @csrf
            @method('PUT')

            {{-- Nombre --}}
            <div class="mb-4">
                <x-input-label for="nombre" :value="__('Nombre')" />
                <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" value="{{ old('nombre', $producto->nombre) }}" required autofocus />
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>

            {{-- Precio --}}
            <div class="mb-4">
                <x-input-label for="precio" :value="__('Precio')" />
                <x-text-input id="precio" class="block mt-1 w-full" type="number" name="precio" step="0.01" value="{{ old('precio', $producto->precio) }}" required />
                <x-input-error :messages="$errors->get('precio')" class="mt-2" />
            </div>

            {{-- Stock --}}
            <div class="mb-4">
                <x-input-label for="stock" :value="__('Stock')" />
                <x-text-input id="stock" class="block mt-1 w-full" type="number" name="stock" step="0.01" value="{{ old('stock', $producto->stock) }}" required />
                <x-input-error :messages="$errors->get('stock')" class="mt-2" />
            </div>

            {{-- Categoría --}}
            <div class="mb-4">
                <x-input-label for="id_categoria" :value="__('Categoría')" />
                <select name="id_categoria" id="id_categoria" class="block mt-1 w-full rounded-md border-gray-300">
                    <option value="">Selecciona una categoría</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $producto->id_categoria == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('id_categoria')" class="mt-2" />
            </div>

            {{-- Botones --}}
            <div class="flex items-center justify-end">
                <a href="{{ route('productos.index') }}" class="text-white underline mr-4">Cancelar</a>
                <x-primary-button>{{ __('Guardar cambios') }}</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
