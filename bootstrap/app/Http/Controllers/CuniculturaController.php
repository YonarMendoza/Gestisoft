<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CuniculturaController extends Controller
{
    public function index()
    {
        return view('Pantalla_principal.Cunicultura');
    }
}
