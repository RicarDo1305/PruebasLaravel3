<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Clubs;
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
        return view('/extraEscolares/paselista', [
            'alumnos'=> $alumnos,
            'texto'=>$texto,
            'titulo'=>$campo    
        ]);
        return view('extraEscolares.club'); 
    }
}
