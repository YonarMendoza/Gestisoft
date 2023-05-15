<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MortalidadModel;
use App\Models\SemovienteModel;
class MortalidadController extends Controller
{
    public function index(){
        $Mortalidad = MortalidadModel::all();
        $Semoviente = SemovienteModel::all();
        return view("paginas.Mortalidad", array("Mortalidad" => $Mortalidad,"Semoviente" => $Semoviente));

    }

    public function show($mortalidad){
        $mortalidad = MortalidadModel::where('Id_mortalidad', $mortalidad)->get();
        $Semoviente = SemovienteModel::all();

        if(count($mortalidad)!=0){
            return view("paginas.editarmortalidad", array("Mortalidad" => $mortalidad,"Semoviente" => $Semoviente));
        } else{
            return view("paginas.editarmortalidad", array("estatus" => 404));
        }
    }

    public function update($Id_mortalidad, Request $request){
        $datos = array(
            "Codigo_mortalidad" => $request->input("Codigo_mortalidad"),
            "Fech_mortalidad" => $request->input("Fech_mortalidad"),
            "Id_semoviente" => $request->input("Id_semoviente"),
            "Descripcion" => $request->input("Descripcion"),
            "Responsable" => $request->input("Responsable")
            
        );

        if (!empty($datos)) {
                $mortalidad= MortalidadModel::where("Id_mortalidad",$Id_mortalidad)->update($datos);
                return redirect(("/mortalidad"));
        }
    }

    public function destroy($Id_mortalidad){
        return $Mortalidad = MortalidadModel::where("Id_mortalidad", $Id_mortalidad) -> delete();
    }

    public function agregar(){
        $Mortalidad = MortalidadModel::all();
        $Semoviente = SemovienteModel::all();
        return view("paginas.agregarMortalidad", array("Mortalidad" => $Mortalidad,"Semoviente" => $Semoviente));
    }

    public function store(Request $request){
        $datos = array(
            "Codigo_mortalidad" => $request->input("Codigo_mortalidad"),
            "Fech_mortalidad" => $request->input("Fech_mortalidad"),
            "Id_semoviente" => $request->input("Id_semoviente"),
            "Descripcion" => $request->input("Descripcion"),
            "Responsable" => $request->input("Responsable")
        );
        if (!empty($datos)) {
          $Mortalidad=MortalidadModel::insert($datos);
          return redirect("/mortalidad");
    }

    }
}
