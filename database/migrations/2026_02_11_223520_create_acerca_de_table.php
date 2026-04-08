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
        Schema::create('acerca_de', function (Blueprint $table) {
            $table->id();

            $table->string('titulo_1')->default('Identidad y');
            $table->string('titulo_2')->default('Responsabilidad Social');
            $table->text('descripcion_hero');

            $table->string('imagen_principal')->nullable();
            $table->string('badge_titulo')->default('Compromiso');
            $table->string('badge_subtitulo')->default('Universitario');
            $table->string('titulo_puntos')->default('Fortaleciendo nuestra comunidad');
            $table->json('puntos_clave')->nullable();

            $table->text('mision');
            $table->text('vision');
            $table->json('valores')->nullable();

            $table->string('organigrama')->nullable();
            $table->text('direccion');
            $table->string('telefono');
            $table->string('extension')->nullable();
            $table->text('mapa_iframe')->nullable();

            $table->json('links_rapidos')->nullable();

            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acerca_de');
    }
};
