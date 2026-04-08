<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('convocatorias', function (Blueprint $table) {
            $table->id();

            $table->string('titulo');
            $table->date('fecha_limite');

            $table->string('categoria');
            $table->string('estado')->default('Abierta');

            $table->string('imagen');

            $table->string('archivo_pdf')->nullable();
            $table->string('link_externo')->nullable();

            $table->boolean('activo')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('convocatorias');
    }
};
