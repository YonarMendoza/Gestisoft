<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuienessomosController extends Controller
{
    public function index()
    {
        return view('Pantalla_principal.Quienes');
    }
}
