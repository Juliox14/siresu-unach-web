<?php

namespace App\Http\Controllers;

use App\Models\Area; // Asegúrate de importar el modelo Area
use Illuminate\Http\Request;

class DirectorioController extends Controller
{
    public function show()
    {
        $areas = Area::with(['personas' => function($query) {
            $query->orderBy('orden');
        }])->orderBy('orden')->get();

        return view('directorio.show', compact('areas'));
    }
}