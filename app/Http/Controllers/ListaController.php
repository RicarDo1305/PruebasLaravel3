<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ListaController extends Controller
{
    public function index(Request $request)
    {
        $texto=trim($request->get('search'));
        
        

        $alumnos = User::
        where(function($query) use ($texto) {
            $query->where('name', 'LIKE', '%' . $texto . '%')
                  ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
        })
        ->where('rol', '4')
        ->get();
        return view('extraEscolares.alumnos', [
            'alumnos'=> $alumnos,
            'texto'=>$texto    
        ]);
        return view('extraEscolares.alumnos');
    }
}
