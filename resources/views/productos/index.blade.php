
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Listado de Productos') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <h1 class="text-white">Listado de Productos</h1>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Categoría</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                    <tr>
                        <td>{{ $producto->nombre }}</td>
                        <td>${{ $producto->precio }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>{{ $producto->categoria->nombre ?? 'Sin categoría' }}</td>
                        <td><button>Editar</button></td>
                        <td><button>Eliminar</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
