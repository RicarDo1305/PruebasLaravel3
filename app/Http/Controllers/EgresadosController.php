<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EgresadosController extends Controller
{

    public function store(Request $request)
    {
        // Validar los datos de la pregunta
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'carrera' => 'required|string|max:255',
            'noControl' => 'required|string|max:255',
        ]);

        //$user = Auth::user(); //Esto se usa para obtener los datos del usuario autentificado

        User::create([
            'name' => $validatedData['nombre'],
            'email' => $validatedData['email'],
            'carrera' => $validatedData['carrera'],
            'password' => $validatedData['noControl'],
            'noControl' => $validatedData['noControl'],
            'rol' => '5',
        ]);




        return to_route('seguimiento.index')->with('status', __('Egresado agregado exitosamente')); // Redireccionar a la vista de inicio (de seguimiento)
    }

    public function show()
    {
        $egresados = User::where('rol', 5)->latest()->get();

        $noEgresados = $egresados->count();

        return view('seguimiento.showEg', [
            'egresados' => $egresados,
            'carrera' => 'General',
            'noEgresados' => $noEgresados,
        ]);
    }
    public function filtroCarrera($carrera)
    {
        if ($carrera == 'General') {
            $egresados = User::where('rol', 5)->latest()->get();
        } else {
            $egresados = User::where('rol', 5)
                ->where('carrera', $carrera)
                ->latest()
                ->get();
        }

        $noEgresados = $egresados->count();

        return view('seguimiento.showEg', [
            'egresados' => $egresados,
            'carrera' => $carrera,
            'noEgresados' => $noEgresados,
        ]);
    }

    public function edit(User $egresado)
    {

        return view('seguimiento.egresadoEditar', [
            'egresado' => $egresado,
        ]);
    }

    public function update(Request $request, User $egresado)
    {
        //$this->authorize('update', $pregunta);

        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'carrera' => 'required|string|max:255',
            'noControl' => 'required|string|max:255',
        ]);

        $egresado->update([
            'name' => $validatedData['nombre'],
            'email' => $validatedData['email'],
            'carrera' => $validatedData['carrera'],
            'noControl' => $validatedData['noControl'],
        ]);


        return to_route('seguimiento.lista.show')->with('status', __('Egresado editado exitosamente'));
    }

    public function destroy(Request $request, User $tipo)
    {
       $user = Auth::user();

         $request->validate([
        'password' => 'required|string',
        ]);

     // Verificar si la contraseña proporcionada coincide con la contraseña del usuario autenticado
     if (Hash::check($request->password, $user->password)) {
         $tipo->delete();
         return to_route('seguimiento.lista.show')->with('status', __('Alumno eliminado'));
      } else {
        // Si la contraseña no coincide, puedes redirigir de nuevo al formulario con un mensaje de error
        
        return back()->withErrors(['password' => 'La contraseña proporcionada es incorrecta.'])->with('error', __('La contraseña no es correcta'));
    } 

        

    }
}
