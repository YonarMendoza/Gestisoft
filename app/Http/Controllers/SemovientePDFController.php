<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SemovientePDFController extends Controller
{
    public function generarPDF($Nom_unidad)
    {
        $query = "SELECT semovientes.Id_semoviente, semovientes.Placa_inventario, unidades.Nom_unidad, semovientes.Nom_semoviente, razas.Nom_raza, semovientes.Tipo_semoviente, semovientes.Fech_nacimiento, semovientes.Peso_nacimiento, semovientes.Sexo_semoviente, semovientes.Fech_ingreso, semovientes.Tipo_ingreso FROM semovientes INNER JOIN unidades ON semovientes.Id_unidad = unidades.Id_unidad INNER JOIN razas ON semovientes.Id_raza = razas.Id_raza WHERE unidades.Nom_unidad = ? AND Activo='Si' ORDER BY Nom_unidad ASC,Placa_inventario ASC";
        $data = DB::select($query, [$Nom_unidad]);

        // Verificar si se encontraron resultados
        if (count($data) === 0) {
            return redirect()->back()->with('error', 'No se encontraron registros para la unidad seleccionada.');
        }

        $nombreUnidad = $data[0]->Nom_unidad;
        $data = array_map(function ($item) {
            return (array) $item;
        }, $data);

        $pdf = PDF::loadView('pdf.semovientepdf', compact('data', 'nombreUnidad'));

        $nombreArchivo = 'Gestisoft_Reporte_' . Str::slug($nombreUnidad) . '.pdf';

        return $pdf->download($nombreArchivo);
    }
}