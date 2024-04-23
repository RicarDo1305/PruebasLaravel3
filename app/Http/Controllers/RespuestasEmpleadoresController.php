<?php

namespace App\Http\Controllers;

use App\Models\Opcion;
use App\Models\Pregunta;
use App\Models\Respuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RespuestasEmpleadoresController extends Controller
{
     public function index(){
        $user = Auth::user();
        if (Respuesta::where('user_id', $user->id)->exists()) {

            return to_route('dashboard')->with('status', __('Ya has contestado la encuesta'));

        }else{

        $preguntas = Pregunta::with('user')->where('tipo', 2)->latest()->get();

        // Obtener las opciones relacionadas con las preguntas
        $opciones = [];
        foreach ($preguntas as $pregunta) {
            $opciones[$pregunta->id] = Opcion::where('pregunta_id', $pregunta->id)->latest()->get();
        }
    
        return view('seguimiento.empleador.responderEnEm', [
        'preguntas' => $preguntas,
        ]);
        }

    }

     public function store(Request $request){
        $respuestas = $request->input();

        array_shift($respuestas);

        $user = Auth::user();
  
        
     $preguntaId = null;
        foreach ($respuestas as $clave => $valor) {

         if (strpos($clave, 'pregunta_') === 0) {
              $preguntaId = $valor;
         }elseif (strpos($clave, 'opcion_') === 0) {
            Respuesta::create([
            'pregunta_id' => $preguntaId,
            'opcion_id' => $valor,
            'user_id' => $user->id,
            'tipo' => 2,
            ]);
            }
        
        }
        return to_route('dashboard')->with('status', __('Encuesta finalizada, gracias por sus respuestas'));
    
    
    
}
}
