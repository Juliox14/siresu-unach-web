<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->date('fecha_evento');
            $table->string('horario');
            $table->string('categoria');

            // --- NUEVOS CAMPOS DE UBICACIÓN ---
            $table->string('ciudad')->nullable();      // Ej: Tuxtla Gutiérrez, Chiapas
            $table->string('direccion')->nullable();   // Ej: Auditorio Los Constituyentes
            $table->text('mapa_iframe')->nullable();   // Aquí pegarán el código <iframe...>
            // -----------------------------------

            $table->string('icono');
            $table->text('descripcion');
            $table->string('imagen');
            $table->string('link_facebook')->nullable();
            $table->string('link_instagram')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
