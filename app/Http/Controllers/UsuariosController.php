<?php

namespace App\Http\Controllers;

use App\Models\UsuariosModel;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuario = UsuariosModel::all();
        return view("paginas.Usuarios");
    }
    public function contarUsuarios()
    {
        $cantidadUsuarios = UsuariosModel::count();
        return $cantidadUsuarios;
    }
    public function centroUsuarioBuscar($textoUsuario, Request $request)
    {
        if ($request->ajax()) {
            if ($textoUsuario == "-") {
                $centroUsuario = UsuariosModel::where('id', '!=', '0')->get();

                return $centroUsuario;
            } else {

                $centroUsuario = UsuariosModel::where('name', 'like', '%' . $textoUsuario . '%')
                    ->orWhere('email', 'like', '%' . $textoUsuario . '%')
                    ->get();
                return $centroUsuario;
            }
        }
    }
    public function show($usuario)
    {
        $usuario = UsuariosModel::where('id', $usuario)->get();

        if (count($usuario) != 0) {
            return view("paginas.editarusuario", array("Usuario" => $usuario));
        } else {
            return view("paginas.editarusuario", array("estatus" => 404));
        }
    }

    public function update($id, Request $request)
    {
        $datos = array(
            "name" => $request->input("name"),
            "email" => $request->input("email"),
            "Tipo_usuario" => $request->input("Tipo_usuario")

        );

        if (!empty($datos)) {
            $Usuario = UsuariosModel::where("id", $id)->update($datos);
            return redirect(("/usuarios"));
        }
    }

    public function destroy($id)
    {
        return $Usuario = UsuariosModel::where("id", $id)->delete();
    }

    public function agregar()
    {
        $usuario = UsuariosModel::all();
        return view('paginas.agregarUsuario', array('usuario' => $usuario));
    }

    public function store(Request $request)
    {
        $password = $request->input("password");
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $datos = array(
            "name" => $request->input("name"),
            "email" => $request->input("email"),
            "Tipo_usuario" => $request->input("Tipo_usuario"),
            "password" => $hashedPassword
        );
        if (!empty($datos)) {
            $usuarios = UsuariosModel::insert($datos);
            return redirect("/usuarios");
        }
    }
}
