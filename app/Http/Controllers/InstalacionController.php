<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instalacion;

class InstalacionController extends Controller
{
    public function index()
    {
        $instalaciones = Instalacion::with('archivos')->get();

        return view('instalaciones.index', compact('instalaciones'));
    }
}
