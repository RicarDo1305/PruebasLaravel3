<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Clubs;

class FormularioclubController extends Controller
{
    
    public function index(){
        $clubs = Clubs::all();
        return view('/extraEscolares/registroaclub', [
            'clubs' => Clubs::all(),
        ]);
        return view('/extraEscolares/registroaclub');
    }

    public function store(Request $request)
    //{{ auth()->user()->name }}
    {

            $clubs = Clubs::all();
            User::where('id',  auth()->user()->id)
                ->update(['carrera' => $request->input('carrera'),
                         'semestre'=>$request->input('semestre'),
                         'sexo'=>$request->input('sexo'),
                         'nss'=>$request->input('nss'),
                         'club'=>$request->input('club')]
    );
        
        return to_route('extraEscolares.index')->with('status', __('Registrado exitosamente'));

        


    }
}
