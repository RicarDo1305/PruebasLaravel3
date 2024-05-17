<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Clubs;
use App\Models\Ajedrez;
use App\Models\Atletismo;
use App\Models\BandadeGuerra;
use App\Models\Basquetbol;
use App\Models\DanzaFolclorica;
use App\Models\Natacion;
use App\Models\Futbol;
use App\Models\Voleibol;
use App\Models\ArtesPlasticas;
use App\Models\Musica;
use App\Models\Piano;
use App\Models\Escolta;
use App\Models\Taekwondo;
use App\Models\Asistencias;
use Illuminate\Support\Facades\DB;
use LaravelLang\Publisher\Console\Update;
use Symfony\Component\Console\Input\Input;

class listaclubsController extends Controller
{
    public function index(Request $request,$id){
        $texto=trim($request->get('search'));
        $clubs= Clubs::where('id',$id)->first();
        $campo =$clubs->title;
        

        switch ($campo) {
            case 'Atletismo':
                $alumnos = Atletismo::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                $asistencias=Asistencias::all();
                return view('/extraEscolares/paselista', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$id,
                    'titulo'=>$campo,
                    'asistencias'=>$asistencias    
                ]);
                break;
            case 'DanzaFolclorica':
                $alumnos = DanzaFolclorica::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                $asistencias=Asistencias::all();
                return view('/extraEscolares/paselista', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$id,
                    'titulo'=>$campo,
                    'asistencias'=>$asistencias    
                ]);
                break;
            case 'ArtesPlasticas':
                $alumnos = ArtesPlasticas::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                $asistencias=Asistencias::all();
                return view('/extraEscolares/paselista', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$id,
                    'titulo'=>$campo,
                    'asistencias'=>$asistencias    
                ]);
                break;
            case 'Musica':
                $alumnos = Musica::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                $asistencias=Asistencias::all();
                return view('/extraEscolares/paselista', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$id,
                    'titulo'=>$campo,
                    'asistencias'=>$asistencias    
                ]);
                break;
                case 'Piano':
                    $alumnos = Piano::
                    where(function($query) use ($texto) {
                        $query->where('name', 'LIKE', '%' . $texto . '%')
                              ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                    })
                    ->get();
                    $asistencias=Asistencias::all();
                    return view('/extraEscolares/paselista', [
                        'alumnos'=> $alumnos,
                        'texto'=>$texto,
                        'id'=>$id,
                        'titulo'=>$campo,
                        'asistencias'=>$asistencias    
                    ]);
                    break;
            case 'Escolta':
                $alumnos = Escolta::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                $asistencias=Asistencias::all();
                return view('/extraEscolares/paselista', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$id,
                    'titulo'=>$campo,
                    'asistencias'=>$asistencias    
                ]);
                break;
            case 'BandaDeGuerra':
                $alumnos = BandadeGuerra::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                $asistencias=Asistencias::all();
                return view('/extraEscolares/paselista', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$id,
                    'titulo'=>$campo,
                    'asistencias'=>$asistencias    
                ]);
                break;
            case 'Futbol':
                $alumnos = Futbol::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                $asistencias=Asistencias::all();
                return view('/extraEscolares/paselista', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$id,
                    'titulo'=>$campo,
                    'asistencias'=>$asistencias    
                ]);
                break;
            case 'Voleibol':
                $alumnos = Voleibol::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                $asistencias=Asistencias::all();
                return view('/extraEscolares/paselista', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$id,
                    'titulo'=>$campo,
                    'asistencias'=>$asistencias    
                ]);
                break;
            case 'Basquetbol':
                $alumnos = Basquetbol::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                $asistencias=Asistencias::all();
                return view('/extraEscolares/paselista', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$id,
                    'titulo'=>$campo,
                    'asistencias'=>$asistencias    
                ]);
                break;
            case 'Ajedrez':
                $alumnos = Ajedrez::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                $asistencias=Asistencias::all();
                return view('/extraEscolares/paselista', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$id,
                    'titulo'=>$campo,
                    'asistencias'=>$asistencias    
                ]);
                break;
            case 'TaeKwonDo':
                $alumnos = Taekwondo::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                $asistencias=Asistencias::all();
                return view('/extraEscolares/paselista', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$id,
                    'titulo'=>$campo,
                    'asistencias'=>$asistencias    
                ]);
                break;
            case 'Natacion':
                $alumnos = Natacion::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                $asistencias=Asistencias::all();
                return view('/extraEscolares/paselista', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$id,
                    'titulo'=>$campo,
                    'asistencias'=>$asistencias    
                ]);
                break;
        }
       
        return view('extraEscolares.club'); 
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function lista(Request $request,$titulo){
        $texto=trim($request->get('search'));

        switch ($titulo) {
            case 'Atletismo':
                $alumnos = Atletismo::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                $asistencias=Asistencias::all();
                return view('/extraEscolares/asistencias', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$titulo    
                ]);
                break;
            case 'DanzaFolclorica':
                $alumnos = DanzaFolclorica::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                $asistencias=Asistencias::all();
                return view('/extraEscolares/asistencias', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$titulo    
                ]);
                break;
            case 'ArtesPlasticas':
                $alumnos = ArtesPlasticas::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                $asistencias=Asistencias::all();
                return view('/extraEscolares/asistencias', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$titulo   
                ]);
                break;
            case 'Musica':
                $alumnos = Musica::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                $asistencias=Asistencias::all();
                return view('/extraEscolares/asistencias', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$titulo   
                ]);
                break;
            case 'Piano':
                $alumnos = Piano::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                $asistencias=Asistencias::all();
                return view('/extraEscolares/asistencias', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$titulo    
                ]);
                break;
            case 'Escolta':
                $alumnos = Escolta::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                $asistencias=Asistencias::all();
                return view('/extraEscolares/asistencias', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$titulo    
                ]);
                break;
            case 'BandaDeGuerra':
                $alumnos = BandadeGuerra::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                $asistencias=Asistencias::all();
                return view('/extraEscolares/asistencias', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$titulo    
                ]);
                break;
            case 'Futbol':
                $alumnos = Futbol::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                $asistencias=Asistencias::all();
                return view('/extraEscolares/asistencias', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$titulo    
                ]);
                break;
            case 'Voleibol':
                $alumnos = Voleibol::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                $asistencias=Asistencias::all();
                return view('/extraEscolares/asistencias', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$titulo    
                ]);
                break;
            case 'Basquetbol':
                $alumnos = Basquetbol::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                $asistencias=Asistencias::all();
                return view('/extraEscolares/asistencias', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$titulo    
                ]);
                break;
            case 'Ajedrez':
                $alumnos = Ajedrez::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                $asistencias=Asistencias::all();
                return view('/extraEscolares/asistencias', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$titulo    
                ]);
                break;
            case 'TaeKwonDo':
                $alumnos = Taekwondo::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                $asistencias=Asistencias::all();
                return view('/extraEscolares/asistencias', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$titulo    
                ]);
                break;
            case 'Natacion':
                $alumnos = Natacion::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                $asistencias=Asistencias::all();
                return view('/extraEscolares/asistencias', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$titulo    
                ]);
                break;
        }

        return view('extraEscolares.asistencia');

    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function asistencia(Request $request){
        $name = $request->name;
        foreach($name as $selected){
            
            $user = Asistencias::create([
                'name' => $selected,
                'club'=> $request->input('club')
                
            ]);
            }

        return to_route('extraEscolares.index')->with('status', __('Lista tomada'));

    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function listaespecial(Request $request,$titulo){
        $texto=trim($request->get('search'));

        switch ($titulo) {
            case 'Atletismo':
                $alumnos = Atletismo::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                return view('/extraEscolares/listaespecial', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$titulo   
                ]);
                break;
            case 'DanzaFolclorica':
                $alumnos = DanzaFolclorica::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                return view('/extraEscolares/listaespecial', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$titulo   
                ]);
                break;
            case 'ArtesPlasticas':
                $alumnos = ArtesPlasticas::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                return view('/extraEscolares/listaespecial', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$titulo   
                ]);
                break;
            case 'Musica':
                $alumnos = Musica::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                return view('/extraEscolares/listaespecial', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$titulo   
                ]);
                break;
            case 'Piano':
                $alumnos = Piano::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                return view('/extraEscolares/listaespecial', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$titulo  
                ]);
                break;
            case 'Escolta':
                $alumnos = Escolta::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                return view('/extraEscolares/listaespecial', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$titulo  
                ]);
                break;
            case 'BandaDeGuerra':
                $alumnos = BandadeGuerra::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                return view('/extraEscolares/listaespecial', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$titulo    
                ]);
                break;
            case 'Futbol':
                $alumnos = Futbol::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                return view('/extraEscolares/listaespecial', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$titulo     
                ]);
                break;
            case 'Voleibol':
                $alumnos = Voleibol::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                return view('/extraEscolares/listaespecial', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$titulo     
                ]);
                break;
            case 'Basquetbol':
                $alumnos = Basquetbol::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                return view('/extraEscolares/listaespecial', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$titulo     
                ]);
                break;
            case 'Ajedrez':
                $alumnos = Ajedrez::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                return view('/extraEscolares/listaespecial', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$titulo   
                ]);
                break;
            case 'TaeKwonDo':
                $alumnos = Taekwondo::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                return view('/extraEscolares/listaespecial', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$titulo     
                ]);
                break;
            case 'Natacion':
                $alumnos = Natacion::
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                return view('/extraEscolares/listaespecial', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$titulo    
                ]);
                break;
        }

        return view('registro.especial');

    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function descargaespecial($titulo){
        $template=new \PhpOffice\PhpWord\TemplateProcessor(documentTemplate:'files/Registro de Participantes de Actividades Culturales Deportivas.docx');
        $names=request()->name;
        $i=0;
        $where[]= null;
        $p[]=null;
        $a=1;
        foreach($names as $name){
            $arr=json_decode($name,TRUE);
            $p[$i]=$arr;
            $i=$i+1;
        }
    $template->cloneRowAndSetValues('name',$p);
    foreach($names as $aa){
        $template->setValue('num#'.$a,$a);
        $a=$a+1;
    }
    $tempFile=tempnam(sys_get_temp_dir(),'PHPWord');
    $template->saveAs($tempFile);
    $headers = [
        "Content-Type: aplication/octet-stream",
    ];
    return response()->download($tempFile, 'Listaespecial.docx', $headers)->deleteFileAfterSend($shouldDelete = true);
        
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function HorasA($alumno,Request $request){
        $request->validate([
            'horas' => ['required'],
        ]);
        $hora=$request->input('horas');
        $club=$request->input('club');
        $usuario = User::where('noControl', $alumno)->first();
        $ho=$usuario->horas;
        $horastotal=$hora+$ho;
        $horas=User::where('noControl', $alumno)
        ->update(['horas' => $horastotal]);
        $asistencias=Asistencias::where('name',$usuario->name)->where('club',$club)->delete();
        return to_route('extraEscolares.index');
    }
}
