<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SemovienteModel;
use App\Models\RazaModel;
use App\Models\UnidadModel;
use Barryvdh\DomPDF\Facade\Pdf;

class SemovienteController extends Controller
{
    public function index()
    {
        $Semoviente =  "SELECT semovientes.Id_semoviente, semovientes.Placa_inventario, unidades.Nom_unidad, semovientes.Nom_semoviente, razas.Nom_raza, semovientes.Tipo_semoviente, semovientes.Fech_nacimiento, semovientes.Peso_nacimiento, semovientes.Sexo_semoviente, semovientes.Fech_ingreso, semovientes.Tipo_ingreso FROM semovientes INNER JOIN unidades ON semovientes.Id_unidad = unidades.Id_unidad INNER JOIN razas ON semovientes.Id_raza = razas.Id_raza ORDER BY Nom_unidad ASC,Placa_inventario ASC";
        return view("paginas.Semoviente", array("Semoviente" => $Semoviente));
    }
    public function contarSemovientes()
    {
        $cantidadSemovientes = SemovienteModel::count();
        return $cantidadSemovientes;
    }
    public function pdf()
    {
        $Semoviente = SemovienteModel::all();
        $raza = RazaModel::all();
        $unidad = UnidadModel::all();
        $pdf = Pdf::loadView('pdf.semovientepdf', array("Semoviente" => $Semoviente, "raza" => $raza, "unidad" => $unidad), compact('Semoviente'));
        return $pdf->download('Gestisoft_Semovientes.pdf');
    }
    public function centroSemovienteBuscar($textoSemoviente, Request $request)
    {
        if ($request->ajax()) {
            if ($textoSemoviente == "-") {
                $centroSemovienteTosend = array();
                $centroSemoviente = SemovienteModel::join('unidades', 'semovientes.Id_unidad', '=', 'unidades.Id_unidad')
                    ->join('razas', 'semovientes.Id_raza', '=', 'razas.Id_raza')
                    ->get();
                foreach ($centroSemoviente as $key => $Semoviente) {
                    $centroSemovienteTosend[$key] = $Semoviente;
                    if ($Semoviente->novedad) {
                        $centroSemovienteTosend[$key]['Borrar'] = 'No';
                    } else {
                        $centroSemovienteTosend[$key]['Borrar'] = 'Si';
                    }
                }
                return $centroSemoviente;
            } else {

                $centroSemoviente = SemovienteModel::where('Nom_Semoviente', 'like', '%' . $textoSemoviente . '%')

                    ->orWhere('razas.Nom_raza', 'like', '%' . $textoSemoviente . '%')
                    ->orWhere('unidades.Nom_unidad', 'like', '%' . $textoSemoviente . '%')
                    ->orWhere('Tipo_semoviente', 'like', '%' . $textoSemoviente . '%')
                    ->orWhere('Sexo_Semoviente', 'like', '%' . $textoSemoviente . '%')
                    ->orWhere('Fech_nacimiento', 'like', '%' . $textoSemoviente . '%')
                    ->orWhere('Peso_nacimiento', 'like', '%' . $textoSemoviente . '%')
                    ->orWhere('Placa_inventario', 'like', '%' . $textoSemoviente . '%')
                    ->orWhere('Fech_ingreso', 'like', '%' . $textoSemoviente . '%')
                    ->orWhere('Tipo_ingreso', 'like', '%' . $textoSemoviente . '%')
                    ->join('razas', 'semovientes.Id_raza', '=', 'razas.Id_raza')
                    ->join('unidades', 'semovientes.Id_unidad', '=', 'unidades.Id_unidad')
                    ->get();
                foreach ($centroSemoviente as $key => $Semoviente) {
                    $centroSemovienteTosend[$key] = $Semoviente;
                    if ($Semoviente->novedad) {
                        $centroSemovienteTosend[$key]['Borrar'] = 'No';
                    } else {
                        $centroSemovienteTosend[$key]['Borrar'] = 'Si';
                    }
                }
                return $centroSemoviente;
            }
        }
    }

    public function show($semoviente)
    {
        $semoviente = SemovienteModel::where('Id_semoviente', $semoviente)->get();
        $raza = RazaModel::all();
        $unidad = UnidadModel::all();
        if (count($semoviente) != 0) {
            return view("paginas.editarsemoviente", array("Semoviente" => $semoviente, "raza" => $raza, "unidad" => $unidad));
        } else {
            return view("paginas.editarsemoviente", array("estatus" => 404));
        }
    }

    public function update($Id_semoviente, Request $request)
    {
        $datos = array(
            "Placa_inventario" => $request->input("Placa_inventario"),
            "Id_unidad" => $request->input("Id_unidad"),
            "Nom_semoviente" => $request->input("Nom_semoviente"),
            "Id_raza" => $request->input("Id_raza"),
            "Tipo_semoviente" => $request->input("Tipo_semoviente"),
            "Sexo_semoviente" => $request->input("Sexo_semoviente"),
            "Fech_nacimiento" => $request->input("Fech_nacimiento"),
            "Peso_nacimiento" => $request->input("Peso_nacimiento"),
            "Fech_ingreso" => $request->input("Fech_ingreso"),
            "Tipo_ingreso" => $request->input("Tipo_ingreso"),
        );

        if (!empty($datos)) {
            $Semoviente = SemovienteModel::where("Id_semoviente", $Id_semoviente)->update($datos);
            return redirect(("/semoviente"));
        }
    }

    public function destroy($Id_semoviente)
    {
        return $Semoviente = SemovienteModel::where("Id_semoviente", $Id_semoviente)->delete();
    }

    public function agregar()
    {
        $raza = RazaModel::all();
        $unidad = UnidadModel::all();
        $semoviente = SemovienteModel::all();
        return view('paginas.agregarSemoviente', array('Semoviente' => $semoviente, "raza" => $raza, "unidad" => $unidad));
    }

    public function cambiarEstadoSemoviente(Request $request){
        $id_semoviente = $request->input('Id_semoviente');
        $Activo = $request->input('Activo');
        $nuevoEstado = "";
        if($Activo == 'Si'){
            $nuevoEstado = 'No';
        } else{
            $nuevoEstado = 'Si';
        }
        $centroSemoviente = SemovienteModel::where('Id_semoviente',$id_semoviente)->update(['Activo'=> $nuevoEstado]);
        return response()->json(['message' => 'Estado Actualizado'.$centroSemoviente]);
    }


    public function store(Request $request)
    {
        $datos = array(
            "Placa_inventario" => $request->input("Placa_inventario"),
            "Id_unidad" => $request->input("Id_unidad"),
            "Nom_semoviente" => $request->input("Nom_semoviente"),
            "Id_raza" => $request->input("Id_raza"),
            "Tipo_semoviente" => $request->input("Tipo_semoviente"),
            "Sexo_semoviente" => $request->input("Sexo_semoviente"),
            "Fech_nacimiento" => $request->input("Fech_nacimiento"),
            "Peso_nacimiento" => $request->input("Peso_nacimiento"),
            "Fech_ingreso" => $request->input("Fech_ingreso"),
            "Tipo_ingreso" => $request->input("Tipo_ingreso"),
        );
        if (!empty($datos)) {
            $Semoviente = SemovienteModel::insert($datos);
            return redirect("/semoviente");
        }
    }
}
