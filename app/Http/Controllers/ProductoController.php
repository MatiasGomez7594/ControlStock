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
}
