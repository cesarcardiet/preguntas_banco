<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use App\Models\Subcategoria;
use Illuminate\Http\Request;

class PreguntaController extends Controller
{
    public function index()
    {
        $preguntas = Pregunta::all();
        return view('preguntas.index', compact('preguntas'));
    }

    public function create()
    {
        $subcategorias = Subcategoria::all(); // Obtener todas las subcategorías para el formulario
        return view('preguntas.create', compact('subcategorias'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'opcion1' => 'required|string|max:255',
            'opcion2' => 'required|string|max:255',
            'opcion3' => 'required|string|max:255',
            'opcion4' => 'required|string|max:255',
            'respuesta_correcta' => 'required|integer',
            'subcategoria_id' => 'required|exists:subcategorias,id',
        ]);

        Pregunta::create($data);

        return redirect()->route('preguntas.index');
    }

    public function edit(Pregunta $pregunta)
    {
        $subcategorias = Subcategoria::all(); // Obtener todas las subcategorías para el formulario
        return view('preguntas.edit', compact('pregunta', 'subcategorias'));
    }

    public function update(Request $request, Pregunta $pregunta)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'opcion1' => 'required|string|max:255',
            'opcion2' => 'required|string|max:255',
            'opcion3' => 'required|string|max:255',
            'opcion4' => 'required|string|max:255',
            'respuesta_correcta' => 'required|integer',
            'subcategoria_id' => 'required|exists:subcategorias,id',
        ]);

        $pregunta->update($data);

        return redirect()->route('preguntas.index');
    }

    public function destroy(Pregunta $pregunta)
    {
        $pregunta->delete();

        return redirect()->route('preguntas.index');
    }
}
