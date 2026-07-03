<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RedSocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('redes_sociales')->truncate();
        
        DB::table('redes_sociales')->insert([
                [
                    'id' => 1,
                    'departamento_id' => null,
                    'nombre' => 'TikTok',
                    'url' => 'https://www.tiktok.com/@siresuunach',
                    'activo' => 1,
                    'created_at' => '2026-04-12 06:19:08',
                    'updated_at' => '2026-04-12 06:19:08',
                ],
                [
                    'id' => 2,
                    'departamento_id' => null,
                    'nombre' => 'Facebook',
                    'url' => 'https://www.facebook.com/OficialSIRESU',
                    'activo' => 1,
                    'created_at' => '2026-04-12 06:19:29',
                    'updated_at' => '2026-04-12 06:19:29',
                ],
                [
                    'id' => 3,
                    'departamento_id' => null,
                    'nombre' => 'YouTube',
                    'url' => 'https://www.youtube.com/@siresuunach423',
                    'activo' => 1,
                    'created_at' => '2026-04-12 06:35:23',
                    'updated_at' => '2026-04-12 06:35:23',
                ],
            ]);
        Schema::enableForeignKeyConstraints();
    }
}