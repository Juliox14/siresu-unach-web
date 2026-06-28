<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    protected $table = 'configuracion';
    
    protected $fillable = [
        'clave',
        'modulo',
        'nombre_descriptivo',
        'tipo_dato',
        'valor',
    ];

    public static function requiereAprobacionNoticias(): bool
    {
        return self::where('clave', 'requerir_aprobacion_noticias')->first()?->valor === '1';
    }

    public static function requiereAprobacionEventos(): bool
    {
        return self::where('clave', 'requerir_aprobacion_eventos')->first()?->valor === '1';
    }

    public static function requiereAprobacionConvocatorias(): bool
    {
        return self::where('clave', 'requerir_aprobacion_convocatorias')->first()?->valor === '1';
    }
}
