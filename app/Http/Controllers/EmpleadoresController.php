<?php

namespace App\Http\Controllers;

use App\Models\Empleador;
use App\Models\Pregunta;
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
    ]);

    $user = Auth::user();
    // Crear la pregunta
    Empleador::create([
        'nombre' => $validatedData['nombreEm'],
        'ubicacion' => $validatedData['ubicacion'],
        'user_id' => $user->id,
    ]);

     return to_route('seguimiento.index')->with('status', __('Empleador agregado'));// Redireccionar o devolver alguna respuesta

    }

    public function show(){
        $empleadores = Empleador::with('user')->latest()->get();

        return view('seguimiento.showEm', [
        'empleadores' => $empleadores,
        ]);
     }

      public function edit(Empleador $empleador)
    {
        $this->authorize('update', $empleador);

       return view('seguimiento.empleadorEditar', [
            'empleador' => $empleador
       ]);
    }

    public function update(Request $request, Empleador $empleador)
    {
        $this->authorize('update', $empleador);
    
        $validate = $request->validate([
            'nombreEm' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
        ]);

        $empleador->update([
            'nombre' => $validate['nombreEm'],
            'ubicacion' => $validate['ubicacion'],
        ]);

        return to_route('seguimiento.listaEm.show')->with('status', __('Empleador Editado exitosamente'));
    }

    public function destroy(Empleador $empleador)
    {
        //$this->authorize('delete', $pregunta);

        $empleador->delete();

        return to_route('seguimiento.listaEm.show')->with('status', __('Empleador elimindado exitosamente'));
    }




}
