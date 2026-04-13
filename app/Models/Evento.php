<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = [
        'titulo',
        'fecha_evento',
        'horario',
        'categoria',
        'ciudad',
        'direccion',
        'mapa_iframe',
        'archivo_adjunto',
        'link_inscripcion',
        'icono',
        'descripcion',
        'imagen',
        'link_facebook',
        'link_instagram',
        'activo',
        'departamento_id',
    ];

    protected $casts = [
        'fecha_evento' => 'date',
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function archivos()
    {
        return $this->morphMany(Archivo::class, 'fileable');
    }
}
