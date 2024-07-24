<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnidadModel;
use Barryvdh\DomPDF\Facade\Pdf;

class UnidadController extends Controller
{
    public function index()
    {
        $unidad = UnidadModel::all();
        return view("paginas.Unidad");
    }
    public function pdf()
    {
        $unidad = UnidadModel::all();
        $pdf = Pdf::loadView('pdf.unidadpdf', array("unidades" => $unidad), compact('unidad'));
        return $pdf->download('Gestisoft_Unidades.pdf');
    }
    public function contarUnidades()
    {
        $cantidadUnidades = UnidadModel::count();
        return $cantidadUnidades;
    }
    public function centroUnidadBuscar($textoUnidad, Request $request)
    {
        if ($request->ajax()) {
            $centroUnidadTosend = array();
            if ($textoUnidad == "-") {
                $centroUnidad = UnidadModel::where('Id_unidad', '!=', '0')->get();
                foreach ($centroUnidad as $key => $unidad) {
                    $centroUnidadTosend[$key] = $unidad;
                    if ($unidad->semoviente) {
                        $centroUnidadTosend[$key]['Borrar'] = 'No';
                    } else {
                        $centroUnidadTosend[$key]['Borrar'] = 'Si';
                    }
                }
                return $centroUnidad;
            } else {

                $centroUnidad = UnidadModel::where('Nom_unidad', 'like', '%' . $textoUnidad . '%')
                    ->orWhere('Total_animales', 'like', '%' . $textoUnidad . '%')
                    ->get();
                foreach ($centroUnidad as $key => $unidad) {
                    $centroUnidadTosend[$key] = $unidad;
                    if ($unidad->semoviente) {
                        $centroUnidadTosend[$key]['Borrar'] = 'No';
                    } else {
                        $centroUnidadTosend[$key]['Borrar'] = 'Si';
                    }
                }
                return $centroUnidad;
            }
        }
    }

    public function show($unidad)
    {
        $unidad = UnidadModel::where('Id_unidad', $unidad)->get();

        if (count($unidad) != 0) {
            return view("paginas.editarunidad", array("Unidad" => $unidad));
        } else {
            return view("paginas.editarunidad", array("estatus" => 404));
        }
    }

    public function update($Id_unidad, Request $request)
    {
        $datos = array(
            "Nom_unidad" => $request->input("Nom_unidad"),
            "Total_animales" => $request->input("Total_animales")

        );

        if (!empty($datos)) {
            $unidad = UnidadModel::where("Id_unidad", $Id_unidad)->update($datos);
            return redirect(("/unidad"));
        }
    }

    public function destroy($Id_unidad)
    {
        return $Unidad = UnidadModel::where("Id_unidad", $Id_unidad)->delete();
    }

    public function agregar()
    {
        $unidad = UnidadModel::all();
        return view('paginas.agregarUnidad', array('Unidad' => $unidad));
    }

    public function store(Request $request)
    {
        $datos = array(
            "Nom_unidad" => $request->input("Nom_unidad"),
            "Total_animales" => $request->input("Total_animales")
        );
        if (!empty($datos)) {
            $Unidad = UnidadModel::insert($datos);
            return redirect("/unidad");
        }
    }
}
