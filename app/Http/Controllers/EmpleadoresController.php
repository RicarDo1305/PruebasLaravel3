<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpleadoresController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos de la pregunta
    $validatedData = $request->validate([
        'nombreEm' => 'required|string|max:255',
        'ubicacion' => 'required|string|max:255',
        'email' => 'required|string|max:255',
    ]);

    $user = Auth::user();
    // Crear la pregunta
    User::create([
        'name' => $validatedData['nombreEm'],
        'email' => $validatedData['email'],
        'ubicacion' => $validatedData['ubicacion'],
        'noControl' => $validatedData['nombreEm'],
        'password' => $validatedData['nombreEm'],
        'rol' => '6',
    ]);

     return to_route('seguimiento.index')->with('status', __('Empleador agregado'));// Redireccionar o devolver alguna respuesta

    }

    public function show(){
        $empleadores = User::where('rol', 6)->latest()->get();

        return view('seguimiento.showEm', [
        'empleadores' => $empleadores,
        ]);
     }

      public function edit(User $empleador)
    { 
        //$this->authorize('update', $empleador);

       return view('seguimiento.empleadorEditar', [
            'empleador' => $empleador
       ]);
    }

    public function update(Request $request, User $empleador)
    {
        //$this->authorize('update', $empleador);
    
        $validate = $request->validate([
            'nombreEm' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
        ]);

        $empleador->update([
            'name' => $validate['nombreEm'],
            'ubicacion' => $validate['ubicacion'],
        ]);

        return to_route('seguimiento.listaEm.show')->with('status', __('Empleador Editado exitosamente'));
    }

    public function destroy(User $empleador)
    {
        //$this->authorize('delete', $pregunta);

        $empleador->delete();

        return to_route('seguimiento.listaEm.show')->with('status', __('Empleador eliminado exitosamente'));
    }




}
