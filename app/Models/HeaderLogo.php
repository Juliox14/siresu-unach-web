<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class HeaderLogo extends Model
{
    protected $guarded = [];

    protected $casts = [
        'activo' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saved(fn() => Cache::forget('header_logos'));
        static::deleted(fn() => Cache::forget('header_logos'));
    }
}