<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $fillable = ['nombre', 'slug', 'imagen_portada', 'descripcion'];


    protected static function booted(): void
    {
        // Se ejecuta automáticamente justo DESPUÉS de guardar un nuevo Departamento
        static::created(function (Departamento $departamento) {
            Area::create([
                'nombre' => $departamento->nombre,
                // El campo 'orden' se pondrá en 0 automáticamente
            ]);
        });
        
        // (Opcional) Si se quiere que cuando se le cambie el nombre al departamento, 
        // también se le cambie al área, descomentar este bloque:
        /*
        static::updated(function (Departamento $departamento) {
            if ($departamento->isDirty('nombre')) {
                Area::where('nombre', $departamento->getOriginal('nombre'))
                    ->update(['nombre' => $departamento->nombre]);
            }
        });
        */
    }

    public function modulos()
    {
        return $this->hasMany(Modulo::class);
    }

    public function usuarios()
    {
        return $this->hasMany(User::class);
    }

    public function noticias()
    {
        return $this->hasMany(Noticia::class);
    }

    public function eventos()
    {
        return $this->hasMany(Evento::class);
    }

    public function convocatorias()
    {
        return $this->hasMany(Convocatoria::class);
    }
}
