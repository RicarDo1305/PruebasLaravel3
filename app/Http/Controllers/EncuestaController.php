<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use App\Models\Opcion;
use Illuminate\Http\Request;

class EncuestaController extends Controller
{
    public function index()
    {
        return view('seguimiento.encuestaCrear');
    }

    public function store(Request $request)
    {
        // Validar los datos de la pregunta
    $validatedData = $request->validate([
        'Pregunta' => 'required|string|max:255',
        'Opciones' => 'required|array', // Asegúrate de que 'opciones' sea un array
        'Opciones.*' => 'required|string|max:255', // Asegúrate de que cada opción sea una cadena de texto
    ]);


    // Crear la pregunta
    $pregunta = Pregunta::create([
        'pregunta' => $validatedData['Pregunta'],
    ]);

    // Crear las opciones relacionadas con la pregunta
    foreach ($validatedData['Opciones'] as $opcionText) {
        $opcion = new Opcion();
        $opcion->pregunta_id = $pregunta->id;
        $opcion->opcion = $opcionText;
        $opcion->save();
    }

    return to_route('seguimiento.encuesta.index')->with('status', __('Pregunta agregada'));// Redireccionar o devolver alguna respuesta
} 

}


