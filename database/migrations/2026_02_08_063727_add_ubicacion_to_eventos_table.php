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
        // Columns already added in create_eventos_table migration
    }

    public function down(): void
    {
        // Columns dropped when dropping events table
    }

};
