<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NovedadModel;
use App\Models\SemovienteModel;
use App\Models\ResponsableModel;
use Barryvdh\DomPDF\Facade\Pdf;
class NovedadController extends Controller
{
    public function index(){
        $Novedad = NovedadModel::all();
        $Semoviente = SemovienteModel::all();
        return view("paginas.Novedad", array("Novedad" => $Novedad,"Semoviente" => $Semoviente));

    }
    public function contarNovedades()
    {
        $cantidadNovedades = NovedadModel::count();
        return $cantidadNovedades;
    }
    public function pdf(){
        $Novedad = NovedadModel::all();
        $pdf = Pdf::loadView('pdf.novedadpdf',array("Novedad" => $Novedad), compact('Novedad'));
        return $pdf->download('Gestisoft_Novedades.pdf');

    }
    public function centroNovedadBuscar($textoNovedad, Request $request){
        if($request -> ajax()){
            if($textoNovedad == "-"){
                $centroNovedad = NovedadModel::join('semovientes', 'novedad.Id_semoviente', '=', 'semovientes.Id_semoviente')
                ->join('responsables', 'novedad.Id_responsable', '=', 'responsables.Id_responsable')
                ->get();

                return $centroNovedad;
            }
        else{        

            $centroNovedad = NovedadModel::where('Nom_novedad','like','%'.$textoNovedad.'%')
            ->orWhere('Codigo_novedad','like','%'.$textoNovedad.'%')
            ->orWhere('Fech_novedad','like','%'.$textoNovedad.'%')
            ->orWhere('Nom_semoviente','like','%'.$textoNovedad.'%')
            ->orWhere('Descripcion','like','%'.$textoNovedad.'%')
            ->orWhere('Nom_responsable','like','%'.$textoNovedad.'%')
            ->join('semovientes', 'novedad.Id_semoviente', '=', 'semovientes.Id_semoviente')
            ->join('responsables', 'novedad.Id_responsable', '=', 'responsables.Id_responsable')
            ->get();
            return $centroNovedad;
        }
    }

    }

    public function show($novedad){
        $novedad = NovedadModel::where('Id_novedad', $novedad)->get();
        $Semoviente = SemovienteModel::all();
        $responsable = ResponsableModel::all();

        if(count($novedad)!=0){
            return view("paginas.editarnovedad", array("Novedad" => $novedad,"Semoviente" => $Semoviente,"responsable" => $responsable));
        } else{
            return view("paginas.editarnovedad", array("estatus" => 404));
        }
    }

    public function update($Id_novedad, Request $request){
        $datos = array(
            "Fech_novedad" => $request->input("Fech_novedad"),
            "Nom_novedad" => $request->input("Nom_novedad"),
            "Id_semoviente" => $request->input("Id_semoviente"),
            "Descripcion" => $request->input("Descripcion"),
            "Id_responsable" => $request->input("Id_responsable")
            
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
        $responsable = ResponsableModel::all();
        return view("paginas.agregarNovedad", array("Novedad" => $Novedad,"Semoviente" => $Semoviente,"responsable" => $responsable));
    }

    public function store(Request $request){
        $datos = array(
            "Fech_novedad" => $request->input("Fech_novedad"),
            "Nom_novedad" => $request->input("Nom_novedad"),
            "Id_semoviente" => $request->input("Id_semoviente"),
            "Descripcion" => $request->input("Descripcion"),
            "Id_responsable" => $request->input("Id_responsable")
        );
        if (!empty($datos)) {
          $Novedad=NovedadModel::insert($datos);
          return redirect("/novedad");
    }

    }
}
