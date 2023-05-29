<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaprinosController extends Controller
{
    public function index()
    {
        return view('Pantalla_principal.Caprinos');
    }
}
