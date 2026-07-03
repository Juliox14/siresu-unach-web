<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        $this->call([
            UserSeeder::class,
            DepartamentoSeeder::class,
            AcercaDeSeeder::class,
            AliadoSeeder::class,
            AreaSeeder::class,
            ConfiguracionSeeder::class,
            EnlaceMenuSeeder::class,
            EnlaceRapidoSeeder::class,
            EventoSeeder::class,
            HeaderLogoSeeder::class,
            InstalacionSeeder::class,
            ModuloSeeder::class,
            NoticiaSeeder::class,
            PersonaSeeder::class,
            RedSocialSeeder::class,
            SpatieRolePermissionSeeder::class,
        ]);

        Schema::enableForeignKeyConstraints();
    }
}