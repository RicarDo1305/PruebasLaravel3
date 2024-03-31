<?php

namespace App\Http\Controllers;

use App\Models\Opcion;
use App\Models\Pregunta;
use Illuminate\Http\Request;

class EncuestaEmpleadoresController extends Controller
{
    public function index()
    {
        return view('seguimiento.encuestaEmCrear');
    }

    public function store(Request $request)
    {
        // Validar los datos de la pregunta
    $validatedData = $request->validate([
        'Pregunta' => 'required|string|max:255',
        'Opcion1' => 'required|string|max:255',
        'Opcion2' => 'required|string|max:255', 
        'Opcion3' => 'max:255', 
        'Opcion4' => 'max:255',  
    ]);


    // Crear la pregunta
    $pregunta = Pregunta::create([
        'pregunta' => $validatedData['Pregunta'],
        'tipo' => 2,
    ]);

    Opcion::create([
        'opcion' => $validatedData['Opcion1'],
        'pregunta_id' => $pregunta->id,
    ]);
    Opcion::create([
        'opcion' => $validatedData['Opcion2'],
        'pregunta_id' => $pregunta->id,
    ]);
    if($validatedData['Opcion3'] != null){
    Opcion::create([
        'opcion' => $validatedData['Opcion3'],
        'pregunta_id' => $pregunta->id,
    ]);
    }
    if($validatedData['Opcion4'] != null){
        Opcion::create([
            'opcion' => $validatedData['Opcion4'],
            'pregunta_id' => $pregunta->id,
        ]);
    }

   

    return to_route('seguimiento.encuesta.index')->with('status', __('Pregunta agregada'));// Redireccionar o devolver alguna respuesta
}
  public function show(){
        $preguntas = Pregunta::with('user')->where('tipo', 2)->latest()->get();

        // Obtener las opciones relacionadas con las preguntas
        $opciones = [];
        foreach ($preguntas as $pregunta) {
            $opciones[$pregunta->id] = Opcion::where('pregunta_id', $pregunta->id)->latest()->get();
        }
    
        return view('seguimiento.encuestaLista', [
        'preguntas' => $preguntas,
        ]);
       

     }
}
