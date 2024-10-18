<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstadisticaController extends Controller
{
    public function index(Request $request){
        $texto=request()->input('carrera');
        $ustota=DB::table('users')->where('rol','4')->count();
        $usuarios= DB::table('users')->where(function($query) use ($texto) {
            $query->where('carrera', 'LIKE', '%' . $texto . '%');
        })->where('rol','4')->count();
        $uclub=DB::table('users')->whereNotNull('club')->where('rol','4')->where(function($query) use ($texto) {
            $query->where('carrera', 'LIKE', '%' . $texto . '%');
        })->count();
        return view('/extraEscolares/estadisticas', [
            'usuarios'=> $usuarios,
            'uclub'=>$uclub,
            'ustota'=>$ustota,
            'opcion'=>$texto   
        ]);
}
    }
    
