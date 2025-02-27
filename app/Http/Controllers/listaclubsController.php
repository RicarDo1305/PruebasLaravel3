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
use App\Models\Desfile;
use App\Models\Historial;
use Illuminate\Support\Facades\DB;
use LaravelLang\Publisher\Console\Update;
use Symfony\Component\Console\Input\Input;

class listaclubsController extends Controller
{
    public function index(Request $request,$id){
        $texto=trim($request->get('search'));
        $clubs= Clubs::where('id',$id)->first();
        $campo =$clubs->title;
        $cadena =str_replace(' ', '', $campo);
        
        $alumnos = DB::table($cadena)->
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%')
                          ->orWhere('semestre', 'LIKE', '%' . $texto . '%')
                          ->orWhere('carrera', 'LIKE', '%' . $texto . '%');
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
        return view('extraEscolares.club'); 
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function lista(Request $request,$titulo){
        $cadena =str_replace(' ', '', $titulo);
        $texto=trim($request->get('search'));

        $alumnos = DB::table($cadena)->
                where(function($query) use ($texto) {
                    $query->where('name', 'LIKE', '%' . $texto . '%')
                          ->orWhere('noControl', 'LIKE', '%' . $texto . '%')
                          ->orWhere('semestre', 'LIKE', '%' . $texto . '%')
                          ->orWhere('carrera', 'LIKE', '%' . $texto . '%');
                })
                ->get();
                $asistencias=Asistencias::all();
                return view('/extraEscolares/asistencias', [
                    'alumnos'=> $alumnos,
                    'texto'=>$texto,
                    'id'=>$titulo    
                ]);
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
    $cadena =str_replace(' ', '', $titulo);
    $cadena = strtolower($cadena);
    $texto=trim($request->get('search'));
    switch ($cadena) {
        case 'atletismo':
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
        case 'danzafolclorica':
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
        case 'artesplasticas':
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
        case 'musica':
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
        case 'piano':
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
        case 'escolta':
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
        case 'bandadeguerra':
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
        case 'futbol':
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
        case 'voleibol':
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
        case 'basquetbol':
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
        case 'ajedrez':
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
        case 'taekwondo':
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
            case 'desfile':
                $alumnos = Desfile::
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
        case 'natacion':
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

        foreach($p as $item) {
            Historial::create([
                'name' => $item['name'],
                'carrera' => $item['carrera'],
                'semestre' => $item['semestre'],
                'noControl' => $item['noControl'],
                'horas' => '2',
                'club' => $titulo.' '.'especial'
            ]);
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
    return response()->download($tempFile, 'Listaespecial'.$titulo.'.docx', $headers)->deleteFileAfterSend($shouldDelete = true);
        
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
        $historial=Historial::Create([
            'name' => $usuario->name,
            'carrera' => $usuario->carrera,
            'semestre' => $usuario->semestre,
            'noControl' => $usuario->noControl,
            'horas'=>$hora,
            'club'=>$club
        ]);
        $ss=DB::table($club)->where('noControl',$alumno)->first();
        $smas=$ss->semestre+1;
        $semestre=DB::table($club)->where('noControl',$usuario->noControl)->update(['semestre'=>$smas]);
        $horas=User::where('noControl', $alumno)
        ->update(['horas' => $horastotal]);
        $asistencias=Asistencias::where('name',$usuario->name)->where('club',$club)->delete();
        return to_route('extraEscolares.index');
    }
}
