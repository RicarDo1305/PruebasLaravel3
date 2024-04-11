<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clubs;
use App\Models\User;

class clubsController extends Controller
{
    public function index(){
        $clubs=Clubs::all();
        $encargados=User::where('rol','3')->get();
        return view('/extraEscolares/editarclub',['clubs'=>$clubs],['encargados'=>$encargados]);
    }

    public function edit(Request $request,Clubs $club){

        $request->validate([
            'img' => ['required'],
            'incharge' => ['required','string','max:255'],
            'description'=>['required','string','max:255'],
        ]);
        $help=$request->input('id');
        $clubs=Clubs::where('id',$help);
        $clubs->update([
            'img' => $request->input('img'),
            'incharge' => $request->input('incharge'),
            'description' => $request->input('description'),
        ]);


return to_route('club.editar')->with('status', __('Editado exitosamente'));
    }
    public function update(){
        return view('/extraEscolares/editarclub');
    }

}
