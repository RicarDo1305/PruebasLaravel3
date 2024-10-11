<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class ReportesController extends Controller
{
    public function index()
    {
        $reportes = Reporte::all();

        return view('seguimiento.reportes.reportesIndex', [
            'reportes' => $reportes,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'reporte' => ['required'],
        ]);

        if ($request->hasFile('reporte')) {
            $file = $request->file('reporte');
            $destinationPath = 'reportes/';
            $filename = $file->getClientOriginalName();
            $request->file('reporte')->move($destinationPath, $filename);


            Reporte::create([
                'reporte' => $filename,
            ]);


            return to_route('reportes.index')->with('status', __('Subido exitosamente'));
        }
    }

    public function destroy(Request $request, Reporte $reporte)
    {

        $user = Auth::user();

         $request->validate([
        'password' => 'required|string',
        ]);

     // Verificar si la contraseña proporcionada coincide con la contraseña del usuario autenticado
     if (Hash::check($request->password, $user->password)) {
        // Obtener la ruta del archivo a eliminar
        $filePath = 'reportes/' . $reporte->reporte;

        // Verificar si el archivo existe antes de eliminarlo
        if (file_exists($filePath)) {
            // Eliminar el archivo
            unlink($filePath);
        }

        // Eliminar la entrada del reporte de la base de datos
        $reporte->delete();

        return to_route('reportes.index')->with('status', __('Reporte eliminado exitosamente'));

      } else {
        // Si la contraseña no coincide, puedes redirigir de nuevo al formulario con un mensaje de error
        
        return back()->withErrors(['password' => 'La contraseña proporcionada es incorrecta.'])->with('error', __('La contraseña no es correcta'));
    } 

        
    }


    public function descargar(Reporte $reporte)
    {
        // Obtener la ruta del archivo a descargar
        $filePath = 'reportes/' . $reporte->reporte;

        // Verificar si el archivo existe antes de descargarlo
        if (file_exists($filePath)) {
            // Crear una respuesta de descarga
            return Response::download($filePath, $reporte->reporte);
        }
    }
}
