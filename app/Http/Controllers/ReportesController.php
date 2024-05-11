<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use Illuminate\Http\Request;

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

        dd("dame dame");

        //$reporte->delete();

        return to_route('reportes.index')->with('status', __('Reporte descargado exitosamente'));
    }


    public function descargar(Reporte $reporte)
    {

        dd("dame dame descargado");

        //$reporte->delete();

        return to_route('reportes.index')->with('status', __('Reporte elimindado exitosamente'));
    }
}
