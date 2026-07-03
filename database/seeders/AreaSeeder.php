<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('areas')->truncate();
        
        DB::table('areas')->insert([
                [
                    'id' => 1,
                    'nombre' => 'Secretaría',
                    'orden' => 1,
                    'created_at' => '2026-02-15 22:38:53',
                    'updated_at' => '2026-04-23 06:33:36',
                ],
                [
                    'id' => 2,
                    'nombre' => 'Dirección de Proyectos y Programas',
                    'orden' => 2,
                    'created_at' => '2026-02-15 23:11:17',
                    'updated_at' => '2026-04-23 06:33:36',
                ],
                [
                    'id' => 3,
                    'nombre' => 'Dirección de Integración Universitaria',
                    'orden' => 3,
                    'created_at' => '2026-02-15 23:14:33',
                    'updated_at' => '2026-04-23 06:33:36',
                ],
                [
                    'id' => 4,
                    'nombre' => 'Dirección Editorial',
                    'orden' => 4,
                    'created_at' => '2026-02-15 23:16:56',
                    'updated_at' => '2026-04-23 06:33:36',
                ],
            ]);
        Schema::enableForeignKeyConstraints();
    }
}