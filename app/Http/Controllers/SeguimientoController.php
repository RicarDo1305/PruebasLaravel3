<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use App\Models\Opcion;
use App\Models\Pregunta;
use App\Models\Respuesta;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

#Este controlador es para egresados
class SeguimientoController extends Controller
{
    public function index()
    {
      $preguntas = Pregunta::with('user')->where('tipo', 1)->latest()->get();

        // Obtener las opciones relacionadas con las preguntas
        $opciones = [];
        foreach ($preguntas as $pregunta) {
            $opciones[$pregunta->id] = Opcion::where('pregunta_id', $pregunta->id)->latest()->get();
        }

      $respuestas = Respuesta::all();
      return view('seguimiento.egresadoRespuestas',[
        'preguntas' => $preguntas,
        'respuestas' => $respuestas
      ]);    
    }
    

    public function show()
    {
        //return view('seguimiento.muestra');
    }


    public function muestra(Request $request){
    
         $validatedData = $request->validate([
            'poblacion' => 'required|numeric|max:999',
        ]);

        $n = 0;
        $N = $validatedData['poblacion'];
        $Z = 1.96;
        $p = 0.5;
        $q = (1-$p);
        $E = 0.09;

        $up = $N*($Z*$Z)*$p*$q;
        $down =($N-1)*($E*$E)+($Z*$Z)*$p*$q;
        $res = ceil($up/$down);

        return view('seguimiento.muestra', [
            'resultado' => $res]);
    }
    


}
