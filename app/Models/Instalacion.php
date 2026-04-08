<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instalacion extends Model
{
    protected $table = 'instalaciones';

    protected $fillable = [
        'nombre',
        'subtitulo',
        'descripcion_corta',
        'caracteristicas',
        'descripcion_detallada',
        'imagen_portada',
        'es_destacado',
        'disponible_renta',
        'telefono',
        'extension',
    ];

    protected $casts = [
        'caracteristicas' => 'array',
    ];

    public function archivos()
    {
        return $this->morphMany(Archivo::class, 'fileable');
    }

    protected static function booted()
    {
        static::saving(function ($instalacion) {
                        if ($instalacion->es_destacado) {
                                static::where('id', '!=', $instalacion->id)
                      ->where('es_destacado', true)
                      ->update(['es_destacado' => false]);
            }
        });
    }
}