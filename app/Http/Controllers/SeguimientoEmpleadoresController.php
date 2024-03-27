<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeguimientoEmpleadoresController extends Controller
{
    public function store(Request $request){

         $validate = $request->validate([
            'nombreEmpresa' => ['required', 'min:3', 'max:255'],
            'ubicacion' => ['required', 'min:3', 'max:255'],
        ]);
    }
}
