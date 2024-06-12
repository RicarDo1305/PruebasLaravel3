<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use App\Models\Opcion;
use App\Models\Pregunta;
use App\Models\Respuesta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

#Este controlador es para egresados
class SeguimientoController extends Controller
{
    public function index()
    {
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

        $respuestas = Respuesta::where('tipo', 1)->get();
      return view('seguimiento.graficosRespuestas',[
        'preguntas' => $preguntas,
        'respuestas' => $respuestas,
        'titulo' => "Estadisticas de la encuesta a egresados (General)",
        'carrera' => "General",
        'rutaEliminar' => "seguimiento.respuestasEgDelete.index",
        'tipo' => 1,
        'Hidden' => ''
      ]);    
    }
    

    public function filtroCarrera($carrera)
    {
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

      $respuestas = Respuesta::where('tipo', 1)->get();
      return view('seguimiento.graficosRespuestas',[
        'preguntas' => $preguntas,
        'respuestas' => $respuestas,
        'titulo' => "Estadisticas de la encuesta a egresados "."(".$carrera.")",
        'carrera' => $carrera,
        'rutaEliminar' => "seguimiento.respuestasEgDelete.index",
        'tipo' => 1,
        'Hidden' => ''
      ]);    
        
    }
    

    public function show()
    {
       $preguntas = Pregunta::with('user')->where('tipo', 2)->latest()->get();

        // Obtener las opciones relacionadas con las preguntas
        $opciones = [];
        foreach ($preguntas as $pregunta) {
            $opciones[$pregunta->id] = Opcion::where('pregunta_id', $pregunta->id)->latest()->get();
        }

      $respuestas = Respuesta::where('tipo', 2)->get();
      return view('seguimiento.graficosRespuestas',[
        'preguntas' => $preguntas,
        'respuestas' => $respuestas,
        'carrera' => "",
        'titulo' => "Estadisticas de la encuesta a empleadores",
        'rutaEliminar' => "seguimiento.respuestasEmDelete.index",
        'tipo' => 2,
        'Hidden' => 'hidden'
      ]);    
        
    }
    
   

    public function destroy(int $tipo, Request $request)
    {
         $user = Auth::user();

         $request->validate([
        'password' => 'required|string',
        ]);

     // Verificar si la contraseña proporcionada coincide con la contraseña del usuario autenticado
     if (Hash::check($request->password, $user->password)) {
        // Si la contraseña coincide, puedes proceder con la eliminación de los registros
        $respuestas = Respuesta::where('tipo', $tipo)->get();
        foreach ($respuestas as $respuesta) {
          $respuesta->delete();
         }
         return to_route('seguimiento.index')->with('status', __('Los graficos han sido limpiados'));
      } else {
        // Si la contraseña no coincide, puedes redirigir de nuevo al formulario con un mensaje de error
        
        return back()->withErrors(['password' => 'La contraseña proporcionada es incorrecta.'])->with('error', __('La contraseña no es correcta'));
    } 
        
    }


    public function muestra(Request $request){
    
         $validatedData = $request->validate([
            'poblacion' => 'required|numeric|max:999',
        ]);

        $n = 0;
        $N = $validatedData['poblacion'];
        $Z = 1.65;
        $p = 0.95;
        $q = (1-$p);
        $E = 0.05;

        $up = $N*($Z*$Z)*$p*$q;
        $down =(0.1*0.1)*($N-1)+($Z*$Z)*$p*$q;
        $res = ceil($up/$down);

        return view('seguimiento.muestra', [
            'resultado' => $res]);
    }
    


}
