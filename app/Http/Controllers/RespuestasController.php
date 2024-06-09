<?php

namespace App\Http\Controllers;

use App\Models\Opcion;
use App\Models\Pregunta;
use App\Models\Respuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RespuestasController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $preguntasGeneral = Pregunta::where('carrera', 'General')->pluck('id');

        // Verificar si el usuario ha respondido a alguna de las preguntas de la carrera General
        if (Respuesta::where('user_id', $user->id)->whereIn('pregunta_id', $preguntasGeneral)->exists()) {
            return redirect()->route('dashboard')->with('status', __('Ya has contestado la encuesta General'));
        } else {

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

            return view('seguimiento.egresado.responderEn', [
                'preguntas' => $preguntas,
                'carrera' => "General",
            ]);
        }
    }
    public function filtroCarrera()
    {
        $user = Auth::user();
        $carrera = $user->carrera;
        $preguntasCarrera = Pregunta::where('carrera', $carrera)->pluck('id');

        // Verificar si el usuario ha respondido a alguna de las preguntas de la carrera General
        if (Respuesta::where('user_id', $user->id)->whereIn('pregunta_id', $preguntasCarrera)->exists()) {
            return redirect()->route('dashboard')->with('status', __('Ya has contestado la encuesta '.$carrera));
        } else {

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

            return view('seguimiento.egresado.responderEn', [
                'preguntas' => $preguntas,
                'carrera' => $carrera,
            ]);
        }
    }
    public function store(Request $request)
    {
        $respuestas = $request->input();

        array_shift($respuestas);

        $user = Auth::user();


        $preguntaId = null;
        foreach ($respuestas as $clave => $valor) {

            if (strpos($clave, 'pregunta_') === 0) {
                $preguntaId = $valor;
            } elseif (strpos($clave, 'opcion_') === 0) {
                Respuesta::create([
                    'pregunta_id' => $preguntaId,
                    'opcion_id' => $valor,
                    'user_id' => $user->id,
                    'tipo' => 1,
                ]);
            }
        }
        return to_route('dashboard')->with('status', __('Encuesta finalizada, gracias por sus respuestas'));
    }
}
