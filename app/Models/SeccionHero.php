<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeccionHero extends Model
{
    // Laravel por defecto busca "seccion_heros", así que especificamos:
    protected $table = 'secciones_hero'; 

    // Campos que permitiremos llenar (Mass Assignment)
    protected $fillable = ['titulo', 'subtitulo', 'imagen', 'texto_alt', 'texto_boton', 'enlace_boton'];
}
