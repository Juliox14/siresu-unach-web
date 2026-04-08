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
        Schema::table('convocatorias', function (Blueprint $table) {
            // Lo ponemos como nullable por si ya tienes registros de prueba guardados
            $table->string('slug')->nullable()->unique()->after('titulo');
        });
    }

    public function down(): void
    {
        Schema::table('convocatorias', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
