<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class EstudiantesController extends Controller
{
    
    public function estudiantes()
    {
        return view('listaestudiantes');
    }

    public function estudiantesNotas()
    {
        return view('estudiantesnotas');
    }
}