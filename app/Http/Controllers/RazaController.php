<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RazaModel;

class RazaController extends Controller
{
    public function index(){
       
        return view("paginas.Raza");

    }
    public function centroRazaBuscar($textoRaza, Request $request){
        if($request -> ajax()){
            if($textoRaza == "-"){
                $centroRaza = RazaModel::where('Id_raza','!=','0')->get();
                return $centroRaza;
            }
        else{        

            $centroRaza = RazaModel::where('Nom_raza','like','%'.$textoRaza.'%')
            ->orWhere('Codigo_raza','like','%'.$textoRaza.'%')
            ->get();
            return $centroRaza;
        }
    }

    }

    public function show($raza){
        $raza = RazaModel::where('Id_raza', $raza)->get();

        if(count($raza)!=0){
            return view("paginas.editarraza", array("Raza" => $raza));
        } else{
            return view("paginas.editarraza", array("estatus" => 404));
        }
    }

    public function update($Id_raza, Request $request){
        $datos = array(
            "Codigo_raza" => $request->input("Codigo_raza"),
            "Nom_raza" => $request->input("Nom_raza")
        );

        if (!empty($datos)) {
                $Raza= RazaModel::where("Id_raza",$Id_raza)->update($datos);
                return redirect(("/raza"));
        }
    }

    public function destroy($Id_raza){
        return $Raza = RazaModel::where("Id_raza", $Id_raza) -> delete();
    }

    public function agregar(){
        $raza = RazaModel::all();
        return view('paginas.agregarRaza', array('Raza' => $raza));
    }

    public function store(Request $request){
        $datos = array(
            "Codigo_raza" => $request->input("Codigo_raza"),
            "Nom_raza" => $request->input("Nom_raza")
        );
        if (!empty($datos)) {
          $Raza=RazaModel::insert($datos);
          return redirect("/raza");
    }

    }
}
