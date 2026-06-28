<?php

namespace App\Http\Controllers;

use App\Models\Convocatoria;
use Illuminate\Http\Request;

class ConvocatoriaController extends Controller
{
    public function show(Convocatoria $convocatoria)
    {
        if (!$convocatoria->activo || $convocatoria->estado_publicacion !== 'publicado') {
            abort(404);
        }

        $convocatoria->load(['archivos', 'departamento']);
        return view('convocatorias.show', compact('convocatoria'));
    }
}
