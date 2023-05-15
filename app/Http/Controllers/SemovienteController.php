<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SemovienteModel;
use App\Models\RazaModel;
use App\Models\UnidadModel;
class SemovienteController extends Controller
{
    public function index(){
        $Semoviente = SemovienteModel::all();
        $raza = RazaModel::all();
        $unidad= UnidadModel::all();
        return view("paginas.Semoviente", array("Semoviente" => $Semoviente,"raza"=> $raza,"unidad"=>$unidad));

    }

    public function show($semoviente){
        $semoviente = SemovienteModel::where('Id_semoviente', $semoviente)->get();
        $raza = RazaModel::all();
        $unidad= UnidadModel::all();
        if(count($semoviente)!=0){
            return view("paginas.editarsemoviente", array("Semoviente" => $semoviente,"raza"=> $raza,"unidad"=>$unidad));
        } else{
            return view("paginas.editarsemoviente", array("estatus" => 404));
        }
    }

    public function update($Id_semoviente, Request $request){
        $datos = array(
            "Codigo_semoviente" => $request->input("Codigo_semoviente"),
            "Id_unidad" => $request->input("Id_unidad"),
            "Nom_semoviente" => $request->input("Nom_semoviente"),
            "Id_raza" => $request->input("Id_raza"),
            "Tipo_semoviente" => $request->input("Tipo_semoviente"),
            "Sexo_semoviente" => $request->input("Sexo_semoviente"),
            "Fech_nacimiento" => $request->input("Fech_nacimiento"),
            "Peso_nacimiento" => $request->input("Peso_nacimiento"),
            "Placa_inventario" => $request->input("Placa_inventario"),
            "Fech_ingreso" => $request->input("Fech_ingreso"),
            "Tipo_ingreso" => $request->input("Tipo_ingreso"),
        );

        if (!empty($datos)) {
                $Semoviente= SemovienteModel::where("Id_semoviente",$Id_semoviente)->update($datos);
                return redirect(("/semoviente"));
        }
    }

    public function destroy($Id_semoviente){
        return $Semoviente = SemovienteModel::where("Id_semoviente", $Id_semoviente) -> delete();
    }

    public function agregar(){
        $raza = RazaModel::all();
        $unidad= UnidadModel::all();
        $semoviente = SemovienteModel::all();
        return view('paginas.agregarSemoviente', array('Semoviente' => $semoviente,"raza"=> $raza,"unidad"=>$unidad));
    }

    public function store(Request $request){
        $datos = array(
            "Codigo_semoviente" => $request->input("Codigo_semoviente"),
            "Id_unidad" => $request->input("Id_unidad"),
            "Nom_semoviente" => $request->input("Nom_semoviente"),
            "Id_raza" => $request->input("Id_raza"),
            "Tipo_semoviente" => $request->input("Tipo_semoviente"),
            "Sexo_semoviente" => $request->input("Sexo_semoviente"),
            "Fech_nacimiento" => $request->input("Fech_nacimiento"),
            "Peso_nacimiento" => $request->input("Peso_nacimiento"),
            "Placa_inventario" => $request->input("Placa_inventario"),
            "Fech_ingreso" => $request->input("Fech_ingreso"),
            "Tipo_ingreso" => $request->input("Tipo_ingreso"),
        );
        if (!empty($datos)) {
          $Semoviente=SemovienteModel::insert($datos);
          return redirect("/semoviente");
    }

    }
}
