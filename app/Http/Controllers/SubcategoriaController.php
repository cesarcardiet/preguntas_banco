<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Http\Request;

class SubcategoriaController extends Controller
{
    public function index()
    {
        $subcategorias = Subcategoria::with('categoria')->get();
        return view('subcategorias.index', compact('subcategorias'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('subcategorias.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        Subcategoria::create($request->all());

        return redirect()->route('subcategorias.index')
                         ->with('success', 'Subcategoría creada exitosamente.');
    }

    public function edit(Subcategoria $subcategoria)
    {
        $categorias = Categoria::all();
        return view('subcategorias.edit', compact('subcategoria', 'categorias'));
    }

    public function update(Request $request, Subcategoria $subcategoria)
    {
        $request->validate([
            'nombre' => 'required',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $subcategoria->update($request->all());

        return redirect()->route('subcategorias.index')
                         ->with('success', 'Subcategoría actualizada exitosamente.');
    }

    public function destroy(Subcategoria $subcategoria)
    {
        $subcategoria->delete();

        return redirect()->route('subcategorias.index')
                         ->with('success', 'Subcategoría eliminada exitosamente.');
    }
}
