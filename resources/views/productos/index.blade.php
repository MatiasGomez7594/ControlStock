<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Listado de Productos') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <h1 class="text-white mb-4">Listado de Productos</h1>

        @if(session('status'))
            <div class="alert alert-success text-white mb-4">{{ session('status') }}</div>
        @endif

        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Categoría</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                    <tr>
                        <td>{{ $producto->nombre }}</td>
                        <td>${{ $producto->precio }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>{{ $producto->categoria->nombre ?? 'Sin categoría' }}</td>
                        
                        {{-- Botón Editar --}}
                        <td>
                            <a href="{{ route('productos.edit', $producto->id) }}">
                                <x-primary-button>Editar</x-primary-button>
                            </a>
                        </td>

                        {{-- Botón Eliminar --}}
                        <td>
                            <form action="{{ route('productos.delete', $producto->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este producto?');">
                                @csrf
                                @method('DELETE')
                                <x-danger-button>Eliminar</x-danger-button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
