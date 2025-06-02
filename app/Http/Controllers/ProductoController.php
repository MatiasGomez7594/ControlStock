<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;



class ProductoController extends Controller
{
    //
    public function index()
    {
        $productos = Producto::with('categoria')->get(); // opcional si usás relaciones
        return view('productos.index', compact('productos'));
    }
    public function nuevo()
    {
        $categorias = Categoria::all();
        return view('productos.nuevo', compact('categorias'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'cantidad' => 'required|numeric',
            'id_categoria' => 'required|exists:categoria,id',
        ]);

        Producto::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'stock' => $request->cantidad,
            'id_categoria' => $request->id_categoria,
        ]);

        return redirect()->route('productos.nuevo')->with('status', 'Producto creado correctamente.');
    }

  

public function edit(Producto $producto)
{
    $categorias = Categoria::all();
    return view('productos.edit', compact('producto', 'categorias'));
}

public function update(Request $request, Producto $producto)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'precio' => 'required|numeric',
        'stock' => 'required|numeric',
        'id_categoria' => 'required|exists:categoria,id',
    ]);

    $producto->update($request->all());

    return redirect()->route('productos.index')->with('status', 'Producto actualizado correctamente.');
}

public function delete(Producto $producto)
{
    $producto->delete();
    return redirect()->route('productos.index')->with('status', 'Producto eliminado.');
}
}
