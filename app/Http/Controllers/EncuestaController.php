<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use App\Models\Opcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LaravelLang\Publisher\Console\Update;

class EncuestaController extends Controller
{
    public function index()
    {   
        //return view('seguimiento.encuestaCrear');
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
        'carrera' => 'required', 
    ]);

    $user = Auth::user();
    // Crear la pregunta
    $pregunta = Pregunta::create([
        'pregunta' => $validatedData['Pregunta'],
        'carrera' => $validatedData['carrera'],
        'user_id' => $user->id,
        'tipo' => 1,
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
        $preguntas = Pregunta::with('user')
            ->where('tipo', 1)
            ->where('carrera', 'General')
            ->latest()
            ->get();

        // Obtener las opciones relacionadas con las preguntas
        $opciones = [];
        foreach ($preguntas as $pregunta) {
            $opciones[$pregunta->id] = Opcion::where('pregunta_id', $pregunta->id)->latest()->get();
        }
    
        return view('seguimiento.encuestaLista', [
        'preguntas' => $preguntas,
        'carrera' => "General",
        ]);
       

     }

      public function filtroCarrera($carrera){
        $preguntas = Pregunta::with('user')
            ->where('tipo', 1)
            ->where('carrera', $carrera)
            ->latest()
            ->get();

        // Obtener las opciones relacionadas con las preguntas
        $opciones = [];
        foreach ($preguntas as $pregunta) {
            $opciones[$pregunta->id] = Opcion::where('pregunta_id', $pregunta->id)->latest()->get();
        }
    
        return view('seguimiento.encuestaLista', [
        'preguntas' => $preguntas,
        'carrera' => $carrera,
        ]);
       

     }

     public function edit(Pregunta $pregunta)
    {
        $this->authorize('update', $pregunta);

       return view('seguimiento.encuestaEditar', [
            'pregunta' => $pregunta
       ]);
    }

    public function update(Request $request, Pregunta $pregunta)
    {
        $this->authorize('update', $pregunta);

        $validatedData = $request->validate([
            'Pregunta' => 'required|string|max:255',
            'Opcion1' => 'required|string|max:255',
            'Opcion3' => 'required|string|max:255', 
            'Opcion5' => 'max:255', 
            'Opcion7' => 'max:255',
            'carrera' => 'required',  
        ]);

        $pregunta->update([
            'pregunta' => $validatedData['Pregunta'],
            'carrera' => $validatedData['carrera'],
        ]);

        $i=1;
        foreach ($pregunta->opciones as $opcion) {
        $opcion->update([
            'opcion' => $validatedData['Opcion'.$i],
        ]);
        $i=$i+2;
    }

      

        return to_route('seguimiento.encuesta.show')->with('status', __('Pregunta editada exitosamente'));
    }

    public function destroy(Pregunta $pregunta)
    {
        $this->authorize('delete', $pregunta);

        $pregunta->delete();

        return to_route('seguimiento.encuesta.show')->with('status', __('Pregunta elimindada exitosamente'));
    }


}


