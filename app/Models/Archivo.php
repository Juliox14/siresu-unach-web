<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $fillable = ['nombre', 'ruta', 'tipo', 'fileable_id', 'fileable_type'];

    public function fileable()
    {
        return $this->morphTo();
    }
}