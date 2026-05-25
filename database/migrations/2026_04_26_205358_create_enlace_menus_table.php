<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('enlace_menus', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('url')->nullable();
            $table->boolean('es_menu_desplegable')->default(false);
            $table->foreignId('padre_id')->nullable()->constrained('enlace_menus')->nullOnDelete();
            $table->integer('orden')->default(0);
            $table->boolean('nueva_pestana')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enlace_menus');
    }
};