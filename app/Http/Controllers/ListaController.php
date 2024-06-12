<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
                  ->orWhere('sexo', 'LIKE', '%' . $texto . '%')
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
    public function subircarta(Request $request){
        $file=$request->file('hoja');
        $destinationPath = 'files/';
        $filename = 'HojaLiberacion'.'.docx';
        $uploadsucces = $request->file('hoja')->move($destinationPath,$filename);
        return to_route('extraEscolares.alumnos')->with('status', __('Subido exitosamente'));
    }

    public function generarcarta( Request $request,$alumno){
        $alumno=DB::table('users')->where('id',$alumno)->first();
        $encargado=DB::table('users')->where('rol','1')->first();
        $template=new \PhpOffice\PhpWord\TemplateProcessor(documentTemplate:'files/HojaLiberacion.docx');
        $template->setValue(search:'autor',replace:auth()->user()->name);
        $template->setValue(search:'name',replace:$alumno->name);
        $template->setValue(search:'apaterno',replace:$alumno->apaterno);
        $template->setValue(search:'amaterno',replace:$alumno->amaterno);
        $template->setValue(search:'noControl',replace:$alumno->noControl);
        $template->setValue(search:'carrera',replace:$alumno->carrera);
        $template->setValue(search:'encargado',replace:$encargado->name);
        $tempFile=tempnam(sys_get_temp_dir(),'PHPWord');
        $template->saveAs($tempFile);

        $headers = [
            "Content-Type: aplication/octet-stream",
        ];
        return response()->download($tempFile, 'Carta de Liberacion '.$alumno->noControl.'.docx', $headers)->deleteFileAfterSend($shouldDelete = true);
    }
}
