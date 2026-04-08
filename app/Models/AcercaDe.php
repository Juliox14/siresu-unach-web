<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcercaDe extends Model
{
    protected $table = 'acerca_de';

    protected $fillable = [
        'titulo_1',
        'titulo_2',
        'descripcion_hero',
        'imagen_principal',
        'badge_titulo',
        'badge_subtitulo',
        'titulo_puntos',
        'puntos_clave',
        'mision',
        'vision',
        'valores',
        'organigrama',
        'direccion',
        'telefono',
        'extension',
        'mapa_iframe',
        'links_rapidos'
    ];

    protected $casts = [
        'puntos_clave' => 'array',
        'valores' => 'array',
        'links_rapidos' => 'array',
    ];
}
