<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnidadModel;

class UnidadController extends Controller
{
    public function index(){
        $Unidad = UnidadModel::all();
        return view("paginas.Unidad", array("Unidad" => $Unidad));

    }

    public function show($unidad){
        $unidad = UnidadModel::where('Id_unidad', $unidad)->get();

        if(count($unidad)!=0){
            return view("paginas.editarunidad", array("Unidad" => $unidad));
        } else{
            return view("paginas.editarunidad", array("estatus" => 404));
        }
    }

    public function update($Id_unidad, Request $request){
        $datos = array(
            "Codigo_unidad" => $request->input("Codigo_unidad"),
            "Nom_unidad" => $request->input("Nom_unidad"),
            "Total_animales" => $request->input("Total_animales")
            
        );

        if (!empty($datos)) {
                $unidad= UnidadModel::where("Id_unidad",$Id_unidad)->update($datos);
                return redirect(("/unidad"));
        }
    }

    public function destroy($Id_unidad){
        return $Unidad = UnidadModel::where("Id_unidad", $Id_unidad) -> delete();
    }

    public function agregar(){
        $unidad = UnidadModel::all();
        return view('paginas.agregarUnidad', array('Unidad' => $unidad));
    }

    public function store(Request $request){
        $datos = array(
            "Codigo_unidad" => $request->input("Codigo_unidad"),
            "Nom_unidad" => $request->input("Nom_unidad"),
            "Total_animales" => $request->input("Total_animales")
        );
        if (!empty($datos)) {
          $Unidad=UnidadModel::insert($datos);
          return redirect("/unidad");
    }

    }
}
