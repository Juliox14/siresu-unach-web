<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Configuracion;

class ConfiguracionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $configuraciones = [
            [
                'clave' => 'requerir_aprobacion_noticias',
                'modulo' => 'Gobernanza',
                'nombre_descriptivo' => 'Requerir aprobación para publicar noticias',
                'tipo_dato' => 'boolean',
                'valor' => '1',
            ],
            [
                'clave' => 'requerir_aprobacion_eventos',
                'modulo' => 'Gobernanza',
                'nombre_descriptivo' => 'Requerir aprobación para publicar eventos',
                'tipo_dato' => 'boolean',
                'valor' => '1',
            ],
            [
                'clave' => 'requerir_aprobacion_convocatorias',
                'modulo' => 'Gobernanza',
                'nombre_descriptivo' => 'Requerir aprobación para publicar convocatorias',
                'tipo_dato' => 'boolean',
                'valor' => '1',
            ],
        ];

        foreach ($configuraciones as $configuracion) {
            Configuracion::firstOrCreate(['clave' => $configuracion['clave']], $configuracion);
        }
    }
}
