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
        Schema::table('departamentos', function (Blueprint $table) {
            // Solo agregamos los nuevos campos, porque el rollback ya limpió lo anterior
            $table->string('imagen_portada')->nullable()->after('slug');
            $table->text('descripcion')->nullable()->after('imagen_portada');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('departamentos', function (Blueprint $table) {
            //
        });
    }
};
