<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Clubs;

class FormularioclubController extends Controller
{
    
    public function index($id){
        $club= Clubs::where('id',$id)->first();
        $campo =$club->title;
        $clubs = Clubs::all();
        return view('/extraEscolares/registroaclub',['clubs'=>$clubs],['id'=>$campo]);
    }

    public function store(Request $request)
    //{{ auth()->user()->name }}
    {
        $request->validate([
            'carrera' => ['required'],
            'semestre'=>['required','string'],
            'sexo' => ['required','string'],
            'nss'=>['required','string','max:255'],
            'club'=>['required','string'],
            'fechaingreso'=>['required','string'],
            'tiposangre'=>['required','string'],
            'nombretutor'=>['required','string'],
            'telefonotutor'=>['required','string'],
            'padecimiento'=>['required','string'],
            'parentesco'=>['required','string'],
            'telefonoparticular'=>['required','string'],
            'estatura'=>['required','string'],
            'peso'=>['required','string'],
            'curp'=>['required','string'],

        ]);

            $clubs = Clubs::all();
            User::where('id',  auth()->user()->id)
                ->update(['carrera' => $request->input('carrera'),
                         'semestre'=>$request->input('semestre'),
                         'sexo'=>$request->input('sexo'),
                         'nss'=>$request->input('nss'),
                         'club'=>$request->input('club'),
                         'fechaingreso'=>$request->input('fechaingreso'),
                         'tiposangre'=>$request->input('tiposangre'),
                         'nombretutor'=>$request->input('nombretutor'),
                         'telefonotutor'=>$request->input('telefonotutor'),
                         'padecimiento'=>$request->input('padecimiento'),
                         'parentesco'=>$request->input('parentesco'),
                         'telefonoparticular'=>$request->input('telefonoparticular'),
                         'estatura'=>$request->input('estatura'),
                         'peso'=>$request->input('peso'),
                         'curp'=>$request->input('curp')]
    );
        
        return to_route('extraEscolares.index')->with('status', __('Registrado exitosamente'));

        


    }
}
