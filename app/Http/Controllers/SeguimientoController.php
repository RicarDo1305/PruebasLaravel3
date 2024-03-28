<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;

#Este controlador es para egresados
class SeguimientoController extends Controller
{
    public function index()
    {
        #return view('chirps.index', [
        #    'chirps' => Chirp::with('user')->latest()->get()
        #]); de esta forma atribuyes a un usuario con sus repectivos datos
        #ademas de sus creaciones

        return view('seguimiento.index');
    
    }
    public function store(Request $request){

         $validate = $request->validate([
            'nombre' => ['required', 'min:3', 'max:255'],
            'carrera' => ['required', 'min:3', 'max:255'],
        ]);
    }
    public function show()
    {
        return view('seguimiento.showEg', [
            'chirps' => Chirp::with('user')->latest()->get()
        ]);
        return view('seguimiento.showEg');
    }
    


}
