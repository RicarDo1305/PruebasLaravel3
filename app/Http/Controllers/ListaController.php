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
                  ->orWhere('noControl', 'LIKE', '%' . $texto . '%')
                  ->orWhere('apaterno', 'LIKE', '%' . $texto . '%')
                  ->orWhere('amaterno', 'LIKE', '%' . $texto . '%')
                  ->orWhere('carrera', 'LIKE', '%' . $texto . '%')
                  ->orWhere('semestre', 'LIKE', '%' . $texto . '%');
        })
        ->where('rol', '4')
        ->get();
        return view('extraEscolares.alumnos', [
            'alumnos'=> $alumnos,
            'texto'=>$texto    
        ]);
        return view('extraEscolares.alumnos');
    }

    public function encargados(Request $request){
        $texto=trim($request->get('search'));
        
        

        $alumnos = User::
        where(function($query) use ($texto) {
            $query->where('name', 'LIKE', '%' . $texto . '%')
                  ->orWhere('noControl', 'LIKE', '%' . $texto . '%')
                  ->orWhere('apaterno', 'LIKE', '%' . $texto . '%')
                  ->orWhere('amaterno', 'LIKE', '%' . $texto . '%');
        })
        ->where('rol', '3')
        ->get();
        return view('extraEscolares.encargados', [
            'alumnos'=> $alumnos,
            'texto'=>$texto    
        ]);
        return view('extraEscolares.encargados');        
    }

    public function indexen($id){
        $encargados=User::where('id',$id)->get();
        return view('/extraEscolares/editarencargado',['encargados'=>$encargados]);

    }

    public function edit(Request $request){
        $request->validate([
            'name' => ['required'],
            'email'=>['required','string'],
            'nss'=>['required','string'],
            'curp'=>['required','string'],
            'apaterno'=>['required','string'],
            'amaterno'=>['required','string'],
        ]);
        $help=$request->input('id');
        $encargados=User::where('id',$help);
        $encargados->update([
            'name' => $request->input('name'),
            'email'=>$request->input('email'),
            'nss' => $request->input('nss'),
            'curp' => $request->input('curp'),
            'apaterno' => $request->input('apaterno'),
            'amaterno' => $request->input('amaterno'),
        ]);


return to_route('extraEscolares.encargados')->with('status', __('Editado exitosamente'));
    }
    

    public function delete(User $id){
        $id->delete();
        return to_route('extraEscolares.encargados')->with('status', __('Eliminado exitosamente'));

    }
}
