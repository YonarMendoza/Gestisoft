<?php

namespace App\Http\Controllers;

use App\Models\ResponsableModel;
use Illuminate\Http\Request;
use App\Models\UnidadModel;

class ResponsableController extends Controller
{
    public function index()
    {
        $Responsable = ResponsableModel::all();
        return view("paginas.Responsable");
    }
    public function contarResponsables()
    {
        $cantidadResponsables = ResponsableModel::count();
        return $cantidadResponsables;
    }
    public function centroResponsableBuscar($textoResponsable, Request $request)
    {
        if ($request->ajax()) {
            if ($textoResponsable == "-") {
                $centroResponsableTosend = array();
                $centroResponsable = ResponsableModel::join('unidades', 'responsables.Id_unidad', '=', 'unidades.Id_unidad')
                    ->get();
                foreach ($centroResponsable as $key => $responsable) {
                    $centroResponsableTosend[$key] = $responsable;
                    if ($responsable->novedad) {
                        $centroResponsableTosend[$key]['Borrar'] = 'No';
                    } else {
                        $centroResponsableTosend[$key]['Borrar'] = 'Si';
                    }
                }

                return $centroResponsable;
            } else {

                $centroResponsable = ResponsableModel::where('Nom_responsable', 'like', '%' . $textoResponsable . '%')
                    ->orWhere('Correo_responsable', 'like', '%' . $textoResponsable . '%')
                    ->orWhere('Tel_responsable', 'like', '%' . $textoResponsable . '%')
                    ->orWhere('Nom_unidad', 'like', '%' . $textoResponsable . '%')
                    ->join('unidades', 'responsables.Id_unidad', '=', 'unidades.Id_unidad')
                    ->get();
                foreach ($centroResponsable as $key => $responsable) {
                    $centroResponsableTosend[$key] = $responsable;
                    if ($responsable->novedad) {
                        $centroResponsableTosend[$key]['Borrar'] = 'No';
                    } else {
                        $centroResponsableTosend[$key]['Borrar'] = 'Si';
                    }
                }
                return $centroResponsable;
            }
        }
    }
    public function show($responsable)
    {
        $responsable = ResponsableModel::where('Id_responsable', $responsable)->get();
        $unidad = UnidadModel::all();

        if (count($responsable) != 0) {
            return view("paginas.editarresponsable", array("Responsable" => $responsable, "unidad" => $unidad));
        } else {
            return view("paginas.editarresponsable", array("estatus" => 404));
        }
    }

    public function update($Id_responsable, Request $request)
    {
        $datos = array(
            "Nom_responsable" => $request->input("Nom_responsable"),
            "Correo_responsable" => $request->input("Correo_responsable"),
            "Tel_responsable" => $request->input("Tel_responsable"),
            "Id_unidad" => $request->input("Id_unidad"),

        );

        if (!empty($datos)) {
            $Responsable = ResponsableModel::where("Id_responsable", $Id_responsable)->update($datos);
            return redirect(("/responsable"));
        }
    }

    public function destroy($Id_responsable)
    {
        return $Usuario = ResponsableModel::where("Id_responsable", $Id_responsable)->delete();
    }

    public function agregar()
    {
        $unidad = UnidadModel::all();
        $responsable = ResponsableModel::all();
        return view('paginas.agregarResponsable', array('responsable' => $responsable, "unidad" => $unidad));
    }

    public function store(Request $request)
    {
        $datos = array(
            "Nom_responsable" => $request->input("Nom_responsable"),
            "Correo_responsable" => $request->input("Correo_responsable"),
            "Tel_responsable" => $request->input("Tel_responsable"),
            "Id_unidad" => $request->input("Id_unidad"),
        );
        if (!empty($datos)) {
            $responsables = ResponsableModel::insert($datos);
            return redirect("/responsable");
        }
    }
}
