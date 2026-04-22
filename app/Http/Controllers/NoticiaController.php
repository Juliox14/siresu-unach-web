<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\Evento;
use App\Models\Departamento; // NUEVO: Importamos el modelo Departamento
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function index()
    {
        return view('noticias-eventos.index');
    }
}
