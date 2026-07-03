<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class HeaderLogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('header_logos')->truncate();
        
        DB::table('header_logos')->insert([
                [
                    'id' => 1,
                    'nombre' => 'Logo UNACH',
                    'imagen' => 'header-logos/01KQ6FD759HZRAV4Y399AWTN6B.png',
                    'orden' => 0,
                    'activo' => 1,
                    'created_at' => '2026-04-27 03:12:09',
                    'updated_at' => '2026-04-27 03:23:27',
                ],
                [
                    'id' => 2,
                    'nombre' => 'SIRESU',
                    'imagen' => 'header-logos/01KQ6FEH1TYXWDN99EMNNGSB8R.png',
                    'orden' => 0,
                    'activo' => 0,
                    'created_at' => '2026-04-27 03:12:33',
                    'updated_at' => '2026-06-05 23:52:39',
                ],
                [
                    'id' => 3,
                    'nombre' => 'Educación',
                    'imagen' => 'header-logos/01KQ6FF8NPAXHGKHD2K11VBQVH.png',
                    'orden' => 0,
                    'activo' => 0,
                    'created_at' => '2026-04-27 03:13:06',
                    'updated_at' => '2026-06-05 23:52:50',
                ],
                [
                    'id' => 5,
                    'nombre' => 'Ocelote-unach',
                    'imagen' => 'header-logos/01KTD3AXGPRBBQPVTEYZD8M4N2.png',
                    'orden' => 0,
                    'activo' => 1,
                    'created_at' => '2026-04-27 03:13:47',
                    'updated_at' => '2026-06-05 23:54:15',
                ],
            ]);
        Schema::enableForeignKeyConstraints();
    }
}