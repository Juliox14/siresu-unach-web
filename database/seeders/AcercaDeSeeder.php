<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AcercaDeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('acerca_de')->truncate();
        
        DB::table('acerca_de')->insert([
                [
                    'id' => 1,
                    'titulo_1' => 'Identidad y',
                    'titulo_2' => 'Responsabilidad Social',
                    'descripcion_hero' => 'La Universidad Autónoma de Chiapas tiene clara la función social que desarrolla en nuestra entidad federativa. Desde el inicio de la actual Gestión Rectoral, hemos comenzado un proceso de reestructura y reingeniería para abatir los problemas históricos, sin soslayar nuestra responsabilidad social.',
                    'imagen_principal' => 'acerca_de/01KH7ME856G2YCGWJ56JTBHKVN.jpg',
                    'badge_titulo' => 'Compromiso',
                    'badge_subtitulo' => 'Universitario',
                    'titulo_puntos' => 'Fortaleciendo nuestra comunidad',
                    'puntos_clave' => '[{"titulo":"Creaci\\u00f3n de la SIRESU","descripcion":"Se crea la Secretar\\u00eda de Identidad y Responsabilidad Social Universitaria con el objetivo de difundir la pluriculturalidad chiapaneca, el deporte y los servicios universitarios. Buscamos extender los beneficios a la sociedad con la mayor amplitud posible.","icono":"heroicon-o-user-group"},{"titulo":"Pertenencia y Valores","descripcion":"Promovemos el sentido de pertenencia de la comunidad y su compromiso con el entorno. Establecemos acciones que permiten fortalecer la identidad universitaria y la responsabilidad social, promoviendo el desarrollo basado en nuestros valores.","icono":"heroicon-o-heart"}]',
                    'mision' => 'Liderar con excelencia e innovación la gestión de la identidad y responsabilidad social, transformando la comunidad universitaria y contribuyendo al desarrollo sostenible de Chiapas.',
                    'vision' => 'Aspiramos a ser el referente nacional en la integración de la responsabilidad social universitaria, creando espacios que inspiren progreso, cultura y bienestar estudiantil.',
                    'valores' => '[{"valor":"Pluriculturalidad"},{"valor":"Responsabilidad Social"},{"valor":"Compromiso \\u00c9tico"},{"valor":"Identidad Universitaria"}]',
                    'organigrama' => 'acerca_de/01KH7MPFDWV733HM8PSKVM5ZJE.jpg',
                    'direccion' => '4a. Poniente Sur #171
Colonia Centro, C.P. 29000.
Tuxtla Gutiérrez, Chiapas.',
                    'telefono' => '961 617 8000',
                    'extension' => '5551',
                    'mapa_iframe' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3820.46683397405!2d-93.12217512484933!3d16.753434084029628!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85ecd9000d6ca2dd%3A0x35ccba4ae4a5186c!2sSecretaria%20de%20Identidad%20y%20Responsabilidad%20Social%20Universitaria%20UNACH!5e0!3m2!1ses!2smx!4v1770855741172!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                    'links_rapidos' => '[{"texto":"Tienda UNACH","url":"https:\\/\\/tienda.unach.mx","icono":"heroicon-o-shopping-bag"},{"texto":"Protecci\\u00f3n Civil","url":"https:\\/\\/proteccioncivil.chiapas.gob.mx\\/","icono":"heroicon-o-shield-check"},{"texto":"Seguridad y Vigilancia","url":"https:\\/\\/proteccioncivil.chiapas.gob.mx\\/","icono":"heroicon-o-eye"}]',
                    'created_at' => '2026-02-12 00:23:51',
                    'updated_at' => '2026-02-12 00:40:57',
                ],
            ]);
        Schema::enableForeignKeyConstraints();
    }
}