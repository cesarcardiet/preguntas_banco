<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use App\Models\Respuesta;
use Illuminate\Http\Request;

class ExamenController extends Controller
{
    public function index()
    {
        $preguntas = Pregunta::all();
        return view('examen.index', compact('preguntas'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $respuestas = $request->input('respuestas');
        $correctas = 0;

        foreach ($respuestas as $pregunta_id => $respuesta) {
            $pregunta = Pregunta::find($pregunta_id);
            $correcta = $pregunta->respuesta_correcta == $respuesta;
            Respuesta::create([
                'user_id' => $user->id,
                'pregunta_id' => $pregunta_id,
                'correcta' => $correcta,
            ]);
            if ($correcta) {
                $correctas++;
            }
        }

        return redirect()->route('examen.index')
                         ->with('success', "Examen completado. Correctas: $correctas");
    }
}
