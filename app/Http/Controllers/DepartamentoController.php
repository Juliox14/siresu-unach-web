<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function show($slug)
    {
        $departamento = Departamento::where('slug', $slug)
            ->with('modulos.archivos') 
            ->firstOrFail();

        $noticias = $departamento->noticias()->latest('fecha_publicacion')->get();
        
        $eventos = $departamento->eventos()->latest('created_at')->get(); 
        $convocatorias = $departamento->convocatorias()->latest('created_at')->get();

        return view('departamentos.show', compact('departamento', 'noticias', 'eventos', 'convocatorias'));
    }
}