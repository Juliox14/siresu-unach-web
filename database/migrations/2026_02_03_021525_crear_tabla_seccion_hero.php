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
        Schema::create('secciones_hero', function(Blueprint $table){
            $table->id();
            $table->string('titulo');
            $table->string('subtitulo')->nullable();
            $table->string('imagen');
            $table->string('texto_alt')->nullable();
            $table->string('texto_boton')->nullable();
            $table->string('enlace_boton')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secciones_hero');
    }
};
