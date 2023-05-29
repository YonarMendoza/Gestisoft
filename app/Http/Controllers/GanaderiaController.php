<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GanaderiaController extends Controller
{
    public function index()
    {
        return view('Pantalla_principal.Ganaderia');
    }
}
