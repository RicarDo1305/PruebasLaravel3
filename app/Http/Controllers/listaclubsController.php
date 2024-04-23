<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Clubs;
use App\Models\Asistencias;
use Illuminate\Support\Facades\DB;

class listaclubsController extends Controller
{
    public function index(Request $request,$id){
        $texto=trim($request->get('search'));
        $clubs= Clubs::where('id',$id)->first();
        $campo =$clubs->title;
        

        $alumnos = User::
        where(function($query) use ($texto) {
            $query->where('name', 'LIKE', '%' . $texto . '%')
                  ->orWhere('noControl', 'LIKE', '%' . $texto . '%')
                  ->orWhere('apaterno', 'LIKE', '%' . $texto . '%')
                  ->orWhere('amaterno', 'LIKE', '%' . $texto . '%');
        })
        ->where('club',$campo)
        ->where('rol', '4')
        ->get();
        $asistencias=Asistencias::all();
        return view('/extraEscolares/paselista', [
            'alumnos'=> $alumnos,
            'texto'=>$texto,
            'id'=>$campo,
            'asistencias'=>$asistencias    
        ]);
        return view('extraEscolares.club'); 
    }

    public function lista(Request $request,$titulo){
        $texto=trim($request->get('search'));
        

        $alumnos = User::
        where(function($query) use ($texto) {
            $query->where('name', 'LIKE', '%' . $texto . '%')
                  ->orWhere('noControl', 'LIKE', '%' . $texto . '%')
                  ->orWhere('apaterno', 'LIKE', '%' . $texto . '%')
                  ->orWhere('amaterno', 'LIKE', '%' . $texto . '%');
        })
        ->where('club',$titulo)
        ->where('rol', '4')
        ->get();
        return view('/extraEscolares/asistencias', [
            'alumnos'=> $alumnos,
            'texto'=>$texto,
            'id'=>$titulo    
        ]);
        return view('extraEscolares.asistencia');

    }

    public function asistencia(Request $request){
        $name = $request->name;
        foreach($name as $selected){
            
            $user = Asistencias::create([
                'name' => $selected,
                
            ]);
            }

        return to_route('extraEscolares.index')->with('status', __('Lista tomada'));

    }
}
