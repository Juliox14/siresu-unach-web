<?php

namespace App\Http\Controllers;

use App\Models\Convocatoria;
use Illuminate\Http\Request;

class ConvocatoriaController extends Controller
{
    public function show(Convocatoria $convocatoria)
    {
        $convocatoria->load(['archivos', 'departamento']);
        return view('convocatorias.show', compact('convocatoria'));

    }
}
