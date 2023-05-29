<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OvinosController extends Controller
{
    public function index()
    {
        return view('Pantalla_principal.Ovinos');
    }
}
