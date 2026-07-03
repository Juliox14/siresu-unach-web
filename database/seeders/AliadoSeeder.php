<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AliadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('aliados')->truncate();
        
        DB::table('aliados')->insert([
                [
                    'id' => 1,
                    'nombre' => 'CUMEX',
                    'imagen' => 'aliados/01KHCJNWV51CVW72VB8Y710KF3.png',
                    'url' => 'https://www.cumex.org.mx/',
                    'activo' => 1,
                    'created_at' => '2026-02-13 22:34:25',
                    'updated_at' => '2026-02-13 22:42:35',
                ],
                [
                    'id' => 2,
                    'nombre' => 'Virtual Educa',
                    'imagen' => 'aliados/01KHCJFHTRBPEP1N8DDJC6MFF4.png',
                    'url' => 'http://www.virtualeduca.org/',
                    'activo' => 1,
                    'created_at' => '2026-02-13 22:36:21',
                    'updated_at' => '2026-02-13 22:38:25',
                ],
                [
                    'id' => 3,
                    'nombre' => 'Anuies',
                    'imagen' => 'aliados/01KHCK0DH3GER4A9SKRKZFDY40.png',
                    'url' => 'http://www.anuies.mx/',
                    'activo' => 1,
                    'created_at' => '2026-02-13 22:47:37',
                    'updated_at' => '2026-02-13 22:47:37',
                ],
                [
                    'id' => 4,
                    'nombre' => 'Copaes',
                    'imagen' => 'aliados/01KHCK1K3R2K3MAM75JXMBZ0WZ.png',
                    'url' => 'http://www.copaes.org/',
                    'activo' => 1,
                    'created_at' => '2026-02-13 22:48:16',
                    'updated_at' => '2026-02-13 22:48:16',
                ],
                [
                    'id' => 5,
                    'nombre' => 'CIEES',
                    'imagen' => 'aliados/01KHCK3D1Z3P6V6TFHCZ83G0CF.png',
                    'url' => 'https://www.ciees.edu.mx/',
                    'activo' => 1,
                    'created_at' => '2026-02-13 22:49:15',
                    'updated_at' => '2026-02-13 22:49:15',
                ],
                [
                    'id' => 6,
                    'nombre' => 'Contraloria Social',
                    'imagen' => 'aliados/01KHCK4TT06ZHFM21P5J378A8V.jpg',
                    'url' => 'http://www.contraloriasocial.unach.mx/',
                    'activo' => 1,
                    'created_at' => '2026-02-13 22:50:02',
                    'updated_at' => '2026-02-13 22:50:02',
                ],
                [
                    'id' => 7,
                    'nombre' => 'CUDI',
                    'imagen' => 'aliados/01KHCK92EAYD0VH6NMJCW192F1.png',
                    'url' => 'http://www.cudi.mx',
                    'activo' => 1,
                    'created_at' => '2026-02-13 22:52:21',
                    'updated_at' => '2026-02-13 22:52:21',
                ],
                [
                    'id' => 8,
                    'nombre' => 'ECOESAD',
                    'imagen' => 'aliados/01KHCKA4JE9GGQB2719WSHNX79.png',
                    'url' => 'https://www.ecoesad.org.mx/',
                    'activo' => 1,
                    'created_at' => '2026-02-13 22:52:56',
                    'updated_at' => '2026-02-13 22:52:56',
                ],
                [
                    'id' => 9,
                    'nombre' => 'SINED',
                    'imagen' => 'aliados/01KHCKC4KF28F4TWJNDSTCMHH3.png',
                    'url' => 'http://www.sined.mx/sined/',
                    'activo' => 1,
                    'created_at' => '2026-02-13 22:54:01',
                    'updated_at' => '2026-02-13 22:54:01',
                ],
                [
                    'id' => 10,
                    'nombre' => 'Educontinua Amecyd',
                    'imagen' => 'aliados/01KHCKD6ZSZRNTCFN1R8GQ8YZT.png',
                    'url' => 'https://www.congresointernacional.ceune.unach.mx/',
                    'activo' => 1,
                    'created_at' => '2026-02-13 22:54:37',
                    'updated_at' => '2026-02-13 22:57:29',
                ],
            ]);
        Schema::enableForeignKeyConstraints();
    }
}