<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use Illuminate\Http\Request;
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

    public function destroy(Reporte $reporte)
    {
        // Obtener la ruta del archivo a eliminar
        $filePath = 'reportes/' . $reporte->reporte;

        // Verificar si el archivo existe antes de eliminarlo
        if (file_exists($filePath)) {
            // Eliminar el archivo
            unlink($filePath);
        }

        // Eliminar la entrada del reporte de la base de datos
        $reporte->delete();

        return to_route('reportes.index')->with('status', __('Reporte descargado exitosamente'));
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
