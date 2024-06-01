<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clubs;
use App\Models\Historial;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use DragonCode\Contracts\Cashier\Auth\Auth;
use PhpParser\Node\Expr\FuncCall;

class clubsController extends Controller
{
    public function index($id){
        $clubs=Clubs::where('id',$id)->get();
        $encargados=User::where('rol','3')->get();
        return view('/extraEscolares/editarclub',['clubs'=>$clubs],['encargados'=>$encargados]);
    }

    public function edit(Request $request,Clubs $club){

        $request->validate([
            'img' => ['required'],
            'title'=>['required','string'],
            'incharge' => ['required','string','max:255'],
            'description'=>['required','string','max:255'],
        ]);

        if($request->hasFile('img')){
            $file = $request->file('img');
            $destinationPath = 'img/';
            $filename = $file->getClientOriginalName();
            $uploadsucces = $request->file('img')->move($destinationPath,$filename);

        $help=$request->input('id');
        $clubs=Clubs::where('id',$help);
        $clubs->update([
            'img' => $filename,
            'title'=>$request->input('title'),
            'incharge' => $request->input('incharge'),
            'description' => $request->input('description'),
        ]);


return to_route('extraEscolares.index')->with('status', __('Editado exitosamente'));
    }
    }
    public function update(){
        return view('/extraEscolares/editarclub');
    }
    public function delete(Clubs $id){

        $id->delete();
        return to_route('extraEscolares.index')->with('status', __('Eliminado exitosamente'));
    }

    public function editarinfo(){
        return view('/extraEscolares/editarperfil', []);
    }
    public function updateinfo(Request $request){
        $info=User::where('name', auth()->user()->name)
        ->update(['carrera' => $request->input('carrera'),
        'telefonoparticular'=> $request->input('telefonoparticular'),
        'estatura' => $request->input('estatura'),
        'peso' => $request->input('peso'),
        'padecimiento' => $request->input('padecimiento'),
        'nombretutor' => $request->input('nombretutor'),
        'parentesco' => $request->input('parentesco'),
        'telefonotutor' => $request->input('telefonotutor'),]);
        return to_route('edit.info');
    }

    public function tarjetas($id){
        $club = Clubs::where('id', $id)->first();
        if($club && $club->state == 1){
            // Lógica de actualización aquí
             $state = $club->update(['state' => 0]);
        }elseif($club && $club->state == 0){
            $state = $club->update(['state' => 1]);

        }
        return to_route('extraEscolares.index');
    }

    public function salirclub($title){
        $titulo = preg_replace('([^A-Za-z])', '', $title);

        $salir=DB::table($titulo)->where('name',auth()->user()->name)->delete();
        return back();
    }

    public function historiala($numcontrol){
        $history=Historial::where('noControl',$numcontrol)->get();
        return view('/extraEscolares/historial', [
            'historial'=> $history,   
        ]);
    }
}
