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
        Schema::table('eventos', function (Blueprint $table) {
            // Agregamos los campos nuevos "después" de categoria para mantener orden
            $table->string('ciudad')->nullable()->after('categoria');
            $table->string('direccion')->nullable()->after('ciudad');
            $table->text('mapa_iframe')->nullable()->after('direccion');
        });
    }

    public function down(): void
    {
        Schema::table('eventos', function (Blueprint $table) {
            // Por si queremos deshacer el cambio
            $table->dropColumn(['ciudad', 'direccion', 'mapa_iframe']);
        });
    }

};
