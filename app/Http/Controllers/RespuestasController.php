<?php

namespace App\Http\Controllers;

use App\Models\Opcion;
use App\Models\Pregunta;
use Illuminate\Http\Request;

class RespuestasController extends Controller
{

    public function index(){
    $preguntas = Pregunta::with('user')->where('tipo', 1)->latest()->get();

        // Obtener las opciones relacionadas con las preguntas
        $opciones = [];
        foreach ($preguntas as $pregunta) {
            $opciones[$pregunta->id] = Opcion::where('pregunta_id', $pregunta->id)->latest()->get();
        }
    
        return view('seguimiento.egresado.responderEn', [
        'preguntas' => $preguntas,
        ]);

    }
    public function store(Request $request){
        $respuestas = $request->all();
        dd($respuestas);
    }
}

