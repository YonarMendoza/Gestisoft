<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NovedadModel;
use App\Models\SemovienteModel;
class NovedadController extends Controller
{
    public function index(){
        $Novedad = NovedadModel::all();
        $Semoviente = SemovienteModel::all();
        return view("paginas.Novedad", array("Novedad" => $Novedad,"Semoviente" => $Semoviente));

    }

    public function show($novedad){
        $novedad = NovedadModel::where('Id_novedad', $novedad)->get();
        $Semoviente = SemovienteModel::all();

        if(count($novedad)!=0){
            return view("paginas.editarnovedad", array("Novedad" => $novedad,"Semoviente" => $Semoviente));
        } else{
            return view("paginas.editarnovedad", array("estatus" => 404));
        }
    }

    public function update($Id_novedad, Request $request){
        $datos = array(
            "Codigo_novedad" => $request->input("Codigo_novedad"),
            "Fech_novedad" => $request->input("Fech_novedad"),
            "Nom_novedad" => $request->input("Nom_novedad"),
            "Id_semoviente" => $request->input("Id_semoviente"),
            "Descripcion" => $request->input("Descripcion"),
            "Responsable" => $request->input("Responsable")
            
        );

        if (!empty($datos)) {
                $novedad= NovedadModel::where("Id_novedad",$Id_novedad)->update($datos);
                return redirect(("/novedad"));
        }
    }

    public function destroy($Id_novedad){
        return $Novedad = NovedadModel::where("Id_novedad", $Id_novedad) -> delete();
    }

    public function agregar(){
        $Novedad = NovedadModel::all();
        $Semoviente = SemovienteModel::all();
        return view("paginas.agregarNovedad", array("Novedad" => $Novedad,"Semoviente" => $Semoviente));
    }

    public function store(Request $request){
        $datos = array(
            "Codigo_novedad" => $request->input("Codigo_novedad"),
            "Fech_novedad" => $request->input("Fech_novedad"),
            "Nom_novedad" => $request->input("Nom_novedad"),
            "Id_semoviente" => $request->input("Id_semoviente"),
            "Descripcion" => $request->input("Descripcion"),
            "Responsable" => $request->input("Responsable")
        );
        if (!empty($datos)) {
          $Novedad=NovedadModel::insert($datos);
          return redirect("/novedad");
    }

    }
}
