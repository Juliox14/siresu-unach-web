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
        $tables = ['noticias', 'eventos', 'convocatorias'];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->string('estado_publicacion')->default('revision'); // revision, publicado, rechazado
                $table->text('comentarios_revision')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = ['noticias', 'eventos', 'convocatorias'];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->dropColumn(['estado_publicacion', 'comentarios_revision']);
            });
        }
    }
};
