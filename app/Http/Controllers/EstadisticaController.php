<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstadisticaController extends Controller
{
    public function index(Request $request) {
        $texto = $request->input('carrera');
        $semestre = $request->input('semestre');
        $ustota = DB::table('users')->where('rol', '4')->count();
    
        $usuarios = DB::table('users')
            ->where('rol', '4')
            ->where(function($query) use ($texto, $semestre) {
                if (!empty($texto)) {
                    $query->where('carrera', 'LIKE', '%' . $texto . '%');
                }
                if (!empty($semestre)) {
                    $query->where('semestre', 'LIKE', '%' . $semestre . '%');
                }
            })
            ->count();
    
        $uclub = DB::table('users')
            ->whereNotNull('club')
            ->where('rol', '4')
            ->where(function($query) use ($texto, $semestre) {
                if (!empty($texto)) {
                    $query->where('carrera', 'LIKE', '%' . $texto . '%');
                }
                if (!empty($semestre)) {
                    $query->where('semestre', 'LIKE', '%' . $semestre . '%');
                }
            })
            ->count();
    
        return view('/extraEscolares/estadisticas', [
            'usuarios' => $usuarios,
            'uclub' => $uclub,
            'ustota' => $ustota,
            'opcion' => $texto
        ]);
    }
    
    }
    
