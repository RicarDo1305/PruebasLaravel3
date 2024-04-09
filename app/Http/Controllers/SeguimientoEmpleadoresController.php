<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;

class SeguimientoEmpleadoresController extends Controller
{
    public function store(Request $request){

         $validate = $request->validate([
            'nombreEmpresa' => ['required', 'min:3', 'max:255'],
            'ubicacion' => ['required', 'min:3', 'max:255'],
        ]);
    }
    public function show()
    {
        return view('seguimiento.showEm');
    }
}
