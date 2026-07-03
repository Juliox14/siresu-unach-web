<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SpatieRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        
        // Truncate spatie tables
        DB::table('role_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();

        DB::table('roles')->insert([
            [
                'id' => 1,
                'name' => 'Editor',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 2,
                'name' => 'super_admin',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
        ]);
        DB::table('permissions')->insert([
            [
                'id' => 1,
                'name' => 'ViewAny:Convocatoria',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 2,
                'name' => 'View:Convocatoria',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 3,
                'name' => 'Create:Convocatoria',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 4,
                'name' => 'Update:Convocatoria',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 5,
                'name' => 'Delete:Convocatoria',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 6,
                'name' => 'Restore:Convocatoria',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 7,
                'name' => 'ForceDelete:Convocatoria',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 8,
                'name' => 'ForceDeleteAny:Convocatoria',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 9,
                'name' => 'RestoreAny:Convocatoria',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 10,
                'name' => 'Replicate:Convocatoria',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 11,
                'name' => 'Reorder:Convocatoria',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 12,
                'name' => 'ViewAny:Evento',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 13,
                'name' => 'View:Evento',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 14,
                'name' => 'Create:Evento',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 15,
                'name' => 'Update:Evento',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 16,
                'name' => 'Delete:Evento',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 17,
                'name' => 'Restore:Evento',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 18,
                'name' => 'ForceDelete:Evento',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 19,
                'name' => 'ForceDeleteAny:Evento',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 20,
                'name' => 'RestoreAny:Evento',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 21,
                'name' => 'Replicate:Evento',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 22,
                'name' => 'Reorder:Evento',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 23,
                'name' => 'ViewAny:Noticia',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 24,
                'name' => 'View:Noticia',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 25,
                'name' => 'Create:Noticia',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 26,
                'name' => 'Update:Noticia',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 27,
                'name' => 'Delete:Noticia',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 28,
                'name' => 'Restore:Noticia',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 29,
                'name' => 'ForceDelete:Noticia',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 30,
                'name' => 'ForceDeleteAny:Noticia',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 31,
                'name' => 'RestoreAny:Noticia',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 32,
                'name' => 'Replicate:Noticia',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 33,
                'name' => 'Reorder:Noticia',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:00:39',
                'updated_at' => '2026-03-04 00:00:39',
            ],
            [
                'id' => 34,
                'name' => 'ViewAny:AcercaDe',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 35,
                'name' => 'View:AcercaDe',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 36,
                'name' => 'Create:AcercaDe',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 37,
                'name' => 'Update:AcercaDe',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 38,
                'name' => 'Delete:AcercaDe',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 39,
                'name' => 'Restore:AcercaDe',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 40,
                'name' => 'ForceDelete:AcercaDe',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 41,
                'name' => 'ForceDeleteAny:AcercaDe',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 42,
                'name' => 'RestoreAny:AcercaDe',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 43,
                'name' => 'Replicate:AcercaDe',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 44,
                'name' => 'Reorder:AcercaDe',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 45,
                'name' => 'ViewAny:Aliado',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 46,
                'name' => 'View:Aliado',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 47,
                'name' => 'Create:Aliado',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 48,
                'name' => 'Update:Aliado',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 49,
                'name' => 'Delete:Aliado',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 50,
                'name' => 'Restore:Aliado',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 51,
                'name' => 'ForceDelete:Aliado',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 52,
                'name' => 'ForceDeleteAny:Aliado',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 53,
                'name' => 'RestoreAny:Aliado',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 54,
                'name' => 'Replicate:Aliado',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 55,
                'name' => 'Reorder:Aliado',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 56,
                'name' => 'ViewAny:Area',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 57,
                'name' => 'View:Area',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 58,
                'name' => 'Create:Area',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 59,
                'name' => 'Update:Area',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 60,
                'name' => 'Delete:Area',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 61,
                'name' => 'Restore:Area',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 62,
                'name' => 'ForceDelete:Area',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 63,
                'name' => 'ForceDeleteAny:Area',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 64,
                'name' => 'RestoreAny:Area',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 65,
                'name' => 'Replicate:Area',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 66,
                'name' => 'Reorder:Area',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 67,
                'name' => 'ViewAny:Departamento',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 68,
                'name' => 'View:Departamento',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 69,
                'name' => 'Create:Departamento',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 70,
                'name' => 'Update:Departamento',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 71,
                'name' => 'Delete:Departamento',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 72,
                'name' => 'Restore:Departamento',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 73,
                'name' => 'ForceDelete:Departamento',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 74,
                'name' => 'ForceDeleteAny:Departamento',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 75,
                'name' => 'RestoreAny:Departamento',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 76,
                'name' => 'Replicate:Departamento',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 77,
                'name' => 'Reorder:Departamento',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 78,
                'name' => 'ViewAny:EnlaceRapido',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 79,
                'name' => 'View:EnlaceRapido',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 80,
                'name' => 'Create:EnlaceRapido',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 81,
                'name' => 'Update:EnlaceRapido',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 82,
                'name' => 'Delete:EnlaceRapido',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 83,
                'name' => 'Restore:EnlaceRapido',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 84,
                'name' => 'ForceDelete:EnlaceRapido',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 85,
                'name' => 'ForceDeleteAny:EnlaceRapido',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 86,
                'name' => 'RestoreAny:EnlaceRapido',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 87,
                'name' => 'Replicate:EnlaceRapido',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 88,
                'name' => 'Reorder:EnlaceRapido',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 89,
                'name' => 'ViewAny:Instalacion',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 90,
                'name' => 'View:Instalacion',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 91,
                'name' => 'Create:Instalacion',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 92,
                'name' => 'Update:Instalacion',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 93,
                'name' => 'Delete:Instalacion',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 94,
                'name' => 'Restore:Instalacion',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 95,
                'name' => 'ForceDelete:Instalacion',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 96,
                'name' => 'ForceDeleteAny:Instalacion',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 97,
                'name' => 'RestoreAny:Instalacion',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 98,
                'name' => 'Replicate:Instalacion',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 99,
                'name' => 'Reorder:Instalacion',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 100,
                'name' => 'ViewAny:SeccionHero',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 101,
                'name' => 'View:SeccionHero',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 102,
                'name' => 'Create:SeccionHero',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 103,
                'name' => 'Update:SeccionHero',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 104,
                'name' => 'Delete:SeccionHero',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 105,
                'name' => 'Restore:SeccionHero',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 106,
                'name' => 'ForceDelete:SeccionHero',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 107,
                'name' => 'ForceDeleteAny:SeccionHero',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 108,
                'name' => 'RestoreAny:SeccionHero',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 109,
                'name' => 'Replicate:SeccionHero',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 110,
                'name' => 'Reorder:SeccionHero',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 111,
                'name' => 'ViewAny:User',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 112,
                'name' => 'View:User',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 113,
                'name' => 'Create:User',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 114,
                'name' => 'Update:User',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 115,
                'name' => 'Delete:User',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 116,
                'name' => 'Restore:User',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 117,
                'name' => 'ForceDelete:User',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 118,
                'name' => 'ForceDeleteAny:User',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 119,
                'name' => 'RestoreAny:User',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 120,
                'name' => 'Replicate:User',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 121,
                'name' => 'Reorder:User',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 122,
                'name' => 'ViewAny:Role',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 123,
                'name' => 'View:Role',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 124,
                'name' => 'Create:Role',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 125,
                'name' => 'Update:Role',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 126,
                'name' => 'Delete:Role',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 127,
                'name' => 'Restore:Role',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 128,
                'name' => 'ForceDelete:Role',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 129,
                'name' => 'ForceDeleteAny:Role',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 130,
                'name' => 'RestoreAny:Role',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 131,
                'name' => 'Replicate:Role',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 132,
                'name' => 'Reorder:Role',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 133,
                'name' => 'View:WelcomeWidget',
                'guard_name' => 'web',
                'created_at' => '2026-03-04 00:17:29',
                'updated_at' => '2026-03-04 00:17:29',
            ],
            [
                'id' => 134,
                'name' => 'ViewAny:RedSocial',
                'guard_name' => 'web',
                'created_at' => '2026-04-23 02:53:40',
                'updated_at' => '2026-04-23 02:53:40',
            ],
            [
                'id' => 135,
                'name' => 'View:RedSocial',
                'guard_name' => 'web',
                'created_at' => '2026-04-23 02:53:40',
                'updated_at' => '2026-04-23 02:53:40',
            ],
            [
                'id' => 136,
                'name' => 'Create:RedSocial',
                'guard_name' => 'web',
                'created_at' => '2026-04-23 02:53:40',
                'updated_at' => '2026-04-23 02:53:40',
            ],
            [
                'id' => 137,
                'name' => 'Update:RedSocial',
                'guard_name' => 'web',
                'created_at' => '2026-04-23 02:53:40',
                'updated_at' => '2026-04-23 02:53:40',
            ],
            [
                'id' => 138,
                'name' => 'Delete:RedSocial',
                'guard_name' => 'web',
                'created_at' => '2026-04-23 02:53:40',
                'updated_at' => '2026-04-23 02:53:40',
            ],
            [
                'id' => 139,
                'name' => 'Restore:RedSocial',
                'guard_name' => 'web',
                'created_at' => '2026-04-23 02:53:40',
                'updated_at' => '2026-04-23 02:53:40',
            ],
            [
                'id' => 140,
                'name' => 'ForceDelete:RedSocial',
                'guard_name' => 'web',
                'created_at' => '2026-04-23 02:53:40',
                'updated_at' => '2026-04-23 02:53:40',
            ],
            [
                'id' => 141,
                'name' => 'ForceDeleteAny:RedSocial',
                'guard_name' => 'web',
                'created_at' => '2026-04-23 02:53:40',
                'updated_at' => '2026-04-23 02:53:40',
            ],
            [
                'id' => 142,
                'name' => 'RestoreAny:RedSocial',
                'guard_name' => 'web',
                'created_at' => '2026-04-23 02:53:40',
                'updated_at' => '2026-04-23 02:53:40',
            ],
            [
                'id' => 143,
                'name' => 'Replicate:RedSocial',
                'guard_name' => 'web',
                'created_at' => '2026-04-23 02:53:40',
                'updated_at' => '2026-04-23 02:53:40',
            ],
            [
                'id' => 144,
                'name' => 'Reorder:RedSocial',
                'guard_name' => 'web',
                'created_at' => '2026-04-23 02:53:40',
                'updated_at' => '2026-04-23 02:53:40',
            ],
            [
                'id' => 145,
                'name' => 'ViewAny:EnlaceMenu',
                'guard_name' => 'web',
                'created_at' => '2026-06-23 23:09:26',
                'updated_at' => '2026-06-23 23:09:26',
            ],
            [
                'id' => 146,
                'name' => 'View:EnlaceMenu',
                'guard_name' => 'web',
                'created_at' => '2026-06-23 23:09:26',
                'updated_at' => '2026-06-23 23:09:26',
            ],
            [
                'id' => 147,
                'name' => 'Create:EnlaceMenu',
                'guard_name' => 'web',
                'created_at' => '2026-06-23 23:09:26',
                'updated_at' => '2026-06-23 23:09:26',
            ],
            [
                'id' => 148,
                'name' => 'Update:EnlaceMenu',
                'guard_name' => 'web',
                'created_at' => '2026-06-23 23:09:26',
                'updated_at' => '2026-06-23 23:09:26',
            ],
            [
                'id' => 149,
                'name' => 'Delete:EnlaceMenu',
                'guard_name' => 'web',
                'created_at' => '2026-06-23 23:09:26',
                'updated_at' => '2026-06-23 23:09:26',
            ],
            [
                'id' => 150,
                'name' => 'Restore:EnlaceMenu',
                'guard_name' => 'web',
                'created_at' => '2026-06-23 23:09:26',
                'updated_at' => '2026-06-23 23:09:26',
            ],
            [
                'id' => 151,
                'name' => 'ForceDelete:EnlaceMenu',
                'guard_name' => 'web',
                'created_at' => '2026-06-23 23:09:26',
                'updated_at' => '2026-06-23 23:09:26',
            ],
            [
                'id' => 152,
                'name' => 'ForceDeleteAny:EnlaceMenu',
                'guard_name' => 'web',
                'created_at' => '2026-06-23 23:09:26',
                'updated_at' => '2026-06-23 23:09:26',
            ],
            [
                'id' => 153,
                'name' => 'RestoreAny:EnlaceMenu',
                'guard_name' => 'web',
                'created_at' => '2026-06-23 23:09:26',
                'updated_at' => '2026-06-23 23:09:26',
            ],
            [
                'id' => 154,
                'name' => 'Replicate:EnlaceMenu',
                'guard_name' => 'web',
                'created_at' => '2026-06-23 23:09:26',
                'updated_at' => '2026-06-23 23:09:26',
            ],
            [
                'id' => 155,
                'name' => 'Reorder:EnlaceMenu',
                'guard_name' => 'web',
                'created_at' => '2026-06-23 23:09:26',
                'updated_at' => '2026-06-23 23:09:26',
            ],
            [
                'id' => 156,
                'name' => 'ViewAny:HeaderLogo',
                'guard_name' => 'web',
                'created_at' => '2026-06-23 23:13:36',
                'updated_at' => '2026-06-23 23:13:36',
            ],
            [
                'id' => 157,
                'name' => 'View:HeaderLogo',
                'guard_name' => 'web',
                'created_at' => '2026-06-23 23:13:36',
                'updated_at' => '2026-06-23 23:13:36',
            ],
            [
                'id' => 158,
                'name' => 'Create:HeaderLogo',
                'guard_name' => 'web',
                'created_at' => '2026-06-23 23:13:36',
                'updated_at' => '2026-06-23 23:13:36',
            ],
            [
                'id' => 159,
                'name' => 'Update:HeaderLogo',
                'guard_name' => 'web',
                'created_at' => '2026-06-23 23:13:36',
                'updated_at' => '2026-06-23 23:13:36',
            ],
            [
                'id' => 160,
                'name' => 'Delete:HeaderLogo',
                'guard_name' => 'web',
                'created_at' => '2026-06-23 23:13:36',
                'updated_at' => '2026-06-23 23:13:36',
            ],
            [
                'id' => 161,
                'name' => 'Restore:HeaderLogo',
                'guard_name' => 'web',
                'created_at' => '2026-06-23 23:13:36',
                'updated_at' => '2026-06-23 23:13:36',
            ],
            [
                'id' => 162,
                'name' => 'ForceDelete:HeaderLogo',
                'guard_name' => 'web',
                'created_at' => '2026-06-23 23:13:36',
                'updated_at' => '2026-06-23 23:13:36',
            ],
            [
                'id' => 163,
                'name' => 'ForceDeleteAny:HeaderLogo',
                'guard_name' => 'web',
                'created_at' => '2026-06-23 23:13:36',
                'updated_at' => '2026-06-23 23:13:36',
            ],
            [
                'id' => 164,
                'name' => 'RestoreAny:HeaderLogo',
                'guard_name' => 'web',
                'created_at' => '2026-06-23 23:13:36',
                'updated_at' => '2026-06-23 23:13:36',
            ],
            [
                'id' => 165,
                'name' => 'Replicate:HeaderLogo',
                'guard_name' => 'web',
                'created_at' => '2026-06-23 23:13:36',
                'updated_at' => '2026-06-23 23:13:36',
            ],
            [
                'id' => 166,
                'name' => 'Reorder:HeaderLogo',
                'guard_name' => 'web',
                'created_at' => '2026-06-23 23:13:36',
                'updated_at' => '2026-06-23 23:13:36',
            ],
            [
                'id' => 167,
                'name' => 'View:AjustesSistema',
                'guard_name' => 'web',
                'created_at' => '2026-06-28 08:41:56',
                'updated_at' => '2026-06-28 08:41:56',
            ],
        ]);
        DB::table('model_has_roles')->insert([
            [
                'role_id' => 1,
                'model_type' => 'App\\Models\\User',
                'model_id' => 2,
            ],
            [
                'role_id' => 1,
                'model_type' => 'App\\Models\\User',
                'model_id' => 3,
            ],
            [
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 1,
            ],
        ]);
        DB::table('role_has_permissions')->insert([
            [
                'permission_id' => 1,
                'role_id' => 1,
            ],
            [
                'permission_id' => 1,
                'role_id' => 2,
            ],
            [
                'permission_id' => 2,
                'role_id' => 1,
            ],
            [
                'permission_id' => 2,
                'role_id' => 2,
            ],
            [
                'permission_id' => 3,
                'role_id' => 1,
            ],
            [
                'permission_id' => 3,
                'role_id' => 2,
            ],
            [
                'permission_id' => 4,
                'role_id' => 1,
            ],
            [
                'permission_id' => 4,
                'role_id' => 2,
            ],
            [
                'permission_id' => 5,
                'role_id' => 1,
            ],
            [
                'permission_id' => 5,
                'role_id' => 2,
            ],
            [
                'permission_id' => 6,
                'role_id' => 1,
            ],
            [
                'permission_id' => 6,
                'role_id' => 2,
            ],
            [
                'permission_id' => 7,
                'role_id' => 1,
            ],
            [
                'permission_id' => 7,
                'role_id' => 2,
            ],
            [
                'permission_id' => 8,
                'role_id' => 1,
            ],
            [
                'permission_id' => 8,
                'role_id' => 2,
            ],
            [
                'permission_id' => 9,
                'role_id' => 1,
            ],
            [
                'permission_id' => 9,
                'role_id' => 2,
            ],
            [
                'permission_id' => 10,
                'role_id' => 1,
            ],
            [
                'permission_id' => 10,
                'role_id' => 2,
            ],
            [
                'permission_id' => 11,
                'role_id' => 1,
            ],
            [
                'permission_id' => 11,
                'role_id' => 2,
            ],
            [
                'permission_id' => 12,
                'role_id' => 1,
            ],
            [
                'permission_id' => 12,
                'role_id' => 2,
            ],
            [
                'permission_id' => 13,
                'role_id' => 1,
            ],
            [
                'permission_id' => 13,
                'role_id' => 2,
            ],
            [
                'permission_id' => 14,
                'role_id' => 1,
            ],
            [
                'permission_id' => 14,
                'role_id' => 2,
            ],
            [
                'permission_id' => 15,
                'role_id' => 1,
            ],
            [
                'permission_id' => 15,
                'role_id' => 2,
            ],
            [
                'permission_id' => 16,
                'role_id' => 1,
            ],
            [
                'permission_id' => 16,
                'role_id' => 2,
            ],
            [
                'permission_id' => 17,
                'role_id' => 1,
            ],
            [
                'permission_id' => 17,
                'role_id' => 2,
            ],
            [
                'permission_id' => 18,
                'role_id' => 1,
            ],
            [
                'permission_id' => 18,
                'role_id' => 2,
            ],
            [
                'permission_id' => 19,
                'role_id' => 1,
            ],
            [
                'permission_id' => 19,
                'role_id' => 2,
            ],
            [
                'permission_id' => 20,
                'role_id' => 1,
            ],
            [
                'permission_id' => 20,
                'role_id' => 2,
            ],
            [
                'permission_id' => 21,
                'role_id' => 1,
            ],
            [
                'permission_id' => 21,
                'role_id' => 2,
            ],
            [
                'permission_id' => 22,
                'role_id' => 1,
            ],
            [
                'permission_id' => 22,
                'role_id' => 2,
            ],
            [
                'permission_id' => 23,
                'role_id' => 1,
            ],
            [
                'permission_id' => 23,
                'role_id' => 2,
            ],
            [
                'permission_id' => 24,
                'role_id' => 1,
            ],
            [
                'permission_id' => 24,
                'role_id' => 2,
            ],
            [
                'permission_id' => 25,
                'role_id' => 1,
            ],
            [
                'permission_id' => 25,
                'role_id' => 2,
            ],
            [
                'permission_id' => 26,
                'role_id' => 1,
            ],
            [
                'permission_id' => 26,
                'role_id' => 2,
            ],
            [
                'permission_id' => 27,
                'role_id' => 1,
            ],
            [
                'permission_id' => 27,
                'role_id' => 2,
            ],
            [
                'permission_id' => 28,
                'role_id' => 1,
            ],
            [
                'permission_id' => 28,
                'role_id' => 2,
            ],
            [
                'permission_id' => 29,
                'role_id' => 1,
            ],
            [
                'permission_id' => 29,
                'role_id' => 2,
            ],
            [
                'permission_id' => 30,
                'role_id' => 1,
            ],
            [
                'permission_id' => 30,
                'role_id' => 2,
            ],
            [
                'permission_id' => 31,
                'role_id' => 1,
            ],
            [
                'permission_id' => 31,
                'role_id' => 2,
            ],
            [
                'permission_id' => 32,
                'role_id' => 1,
            ],
            [
                'permission_id' => 32,
                'role_id' => 2,
            ],
            [
                'permission_id' => 33,
                'role_id' => 1,
            ],
            [
                'permission_id' => 33,
                'role_id' => 2,
            ],
            [
                'permission_id' => 34,
                'role_id' => 2,
            ],
            [
                'permission_id' => 35,
                'role_id' => 2,
            ],
            [
                'permission_id' => 36,
                'role_id' => 2,
            ],
            [
                'permission_id' => 37,
                'role_id' => 2,
            ],
            [
                'permission_id' => 38,
                'role_id' => 2,
            ],
            [
                'permission_id' => 39,
                'role_id' => 2,
            ],
            [
                'permission_id' => 40,
                'role_id' => 2,
            ],
            [
                'permission_id' => 41,
                'role_id' => 2,
            ],
            [
                'permission_id' => 42,
                'role_id' => 2,
            ],
            [
                'permission_id' => 43,
                'role_id' => 2,
            ],
            [
                'permission_id' => 44,
                'role_id' => 2,
            ],
            [
                'permission_id' => 45,
                'role_id' => 2,
            ],
            [
                'permission_id' => 46,
                'role_id' => 2,
            ],
            [
                'permission_id' => 47,
                'role_id' => 2,
            ],
            [
                'permission_id' => 48,
                'role_id' => 2,
            ],
            [
                'permission_id' => 49,
                'role_id' => 2,
            ],
            [
                'permission_id' => 50,
                'role_id' => 2,
            ],
            [
                'permission_id' => 51,
                'role_id' => 2,
            ],
            [
                'permission_id' => 52,
                'role_id' => 2,
            ],
            [
                'permission_id' => 53,
                'role_id' => 2,
            ],
            [
                'permission_id' => 54,
                'role_id' => 2,
            ],
            [
                'permission_id' => 55,
                'role_id' => 2,
            ],
            [
                'permission_id' => 56,
                'role_id' => 2,
            ],
            [
                'permission_id' => 57,
                'role_id' => 2,
            ],
            [
                'permission_id' => 58,
                'role_id' => 2,
            ],
            [
                'permission_id' => 59,
                'role_id' => 2,
            ],
            [
                'permission_id' => 60,
                'role_id' => 2,
            ],
            [
                'permission_id' => 61,
                'role_id' => 2,
            ],
            [
                'permission_id' => 62,
                'role_id' => 2,
            ],
            [
                'permission_id' => 63,
                'role_id' => 2,
            ],
            [
                'permission_id' => 64,
                'role_id' => 2,
            ],
            [
                'permission_id' => 65,
                'role_id' => 2,
            ],
            [
                'permission_id' => 66,
                'role_id' => 2,
            ],
            [
                'permission_id' => 67,
                'role_id' => 2,
            ],
            [
                'permission_id' => 68,
                'role_id' => 2,
            ],
            [
                'permission_id' => 69,
                'role_id' => 2,
            ],
            [
                'permission_id' => 70,
                'role_id' => 2,
            ],
            [
                'permission_id' => 71,
                'role_id' => 2,
            ],
            [
                'permission_id' => 72,
                'role_id' => 2,
            ],
            [
                'permission_id' => 73,
                'role_id' => 2,
            ],
            [
                'permission_id' => 74,
                'role_id' => 2,
            ],
            [
                'permission_id' => 75,
                'role_id' => 2,
            ],
            [
                'permission_id' => 76,
                'role_id' => 2,
            ],
            [
                'permission_id' => 77,
                'role_id' => 2,
            ],
            [
                'permission_id' => 78,
                'role_id' => 2,
            ],
            [
                'permission_id' => 79,
                'role_id' => 2,
            ],
            [
                'permission_id' => 80,
                'role_id' => 2,
            ],
            [
                'permission_id' => 81,
                'role_id' => 2,
            ],
            [
                'permission_id' => 82,
                'role_id' => 2,
            ],
            [
                'permission_id' => 83,
                'role_id' => 2,
            ],
            [
                'permission_id' => 84,
                'role_id' => 2,
            ],
            [
                'permission_id' => 85,
                'role_id' => 2,
            ],
            [
                'permission_id' => 86,
                'role_id' => 2,
            ],
            [
                'permission_id' => 87,
                'role_id' => 2,
            ],
            [
                'permission_id' => 88,
                'role_id' => 2,
            ],
            [
                'permission_id' => 89,
                'role_id' => 2,
            ],
            [
                'permission_id' => 90,
                'role_id' => 2,
            ],
            [
                'permission_id' => 91,
                'role_id' => 2,
            ],
            [
                'permission_id' => 92,
                'role_id' => 2,
            ],
            [
                'permission_id' => 93,
                'role_id' => 2,
            ],
            [
                'permission_id' => 94,
                'role_id' => 2,
            ],
            [
                'permission_id' => 95,
                'role_id' => 2,
            ],
            [
                'permission_id' => 96,
                'role_id' => 2,
            ],
            [
                'permission_id' => 97,
                'role_id' => 2,
            ],
            [
                'permission_id' => 98,
                'role_id' => 2,
            ],
            [
                'permission_id' => 99,
                'role_id' => 2,
            ],
            [
                'permission_id' => 100,
                'role_id' => 2,
            ],
            [
                'permission_id' => 101,
                'role_id' => 2,
            ],
            [
                'permission_id' => 102,
                'role_id' => 2,
            ],
            [
                'permission_id' => 103,
                'role_id' => 2,
            ],
            [
                'permission_id' => 104,
                'role_id' => 2,
            ],
            [
                'permission_id' => 105,
                'role_id' => 2,
            ],
            [
                'permission_id' => 106,
                'role_id' => 2,
            ],
            [
                'permission_id' => 107,
                'role_id' => 2,
            ],
            [
                'permission_id' => 108,
                'role_id' => 2,
            ],
            [
                'permission_id' => 109,
                'role_id' => 2,
            ],
            [
                'permission_id' => 110,
                'role_id' => 2,
            ],
            [
                'permission_id' => 111,
                'role_id' => 2,
            ],
            [
                'permission_id' => 112,
                'role_id' => 2,
            ],
            [
                'permission_id' => 113,
                'role_id' => 2,
            ],
            [
                'permission_id' => 114,
                'role_id' => 2,
            ],
            [
                'permission_id' => 115,
                'role_id' => 2,
            ],
            [
                'permission_id' => 116,
                'role_id' => 2,
            ],
            [
                'permission_id' => 117,
                'role_id' => 2,
            ],
            [
                'permission_id' => 118,
                'role_id' => 2,
            ],
            [
                'permission_id' => 119,
                'role_id' => 2,
            ],
            [
                'permission_id' => 120,
                'role_id' => 2,
            ],
            [
                'permission_id' => 121,
                'role_id' => 2,
            ],
            [
                'permission_id' => 122,
                'role_id' => 2,
            ],
            [
                'permission_id' => 123,
                'role_id' => 2,
            ],
            [
                'permission_id' => 124,
                'role_id' => 2,
            ],
            [
                'permission_id' => 125,
                'role_id' => 2,
            ],
            [
                'permission_id' => 126,
                'role_id' => 2,
            ],
            [
                'permission_id' => 127,
                'role_id' => 2,
            ],
            [
                'permission_id' => 128,
                'role_id' => 2,
            ],
            [
                'permission_id' => 129,
                'role_id' => 2,
            ],
            [
                'permission_id' => 130,
                'role_id' => 2,
            ],
            [
                'permission_id' => 131,
                'role_id' => 2,
            ],
            [
                'permission_id' => 132,
                'role_id' => 2,
            ],
            [
                'permission_id' => 133,
                'role_id' => 2,
            ],
            [
                'permission_id' => 134,
                'role_id' => 2,
            ],
            [
                'permission_id' => 135,
                'role_id' => 2,
            ],
            [
                'permission_id' => 136,
                'role_id' => 2,
            ],
            [
                'permission_id' => 137,
                'role_id' => 2,
            ],
            [
                'permission_id' => 138,
                'role_id' => 2,
            ],
            [
                'permission_id' => 139,
                'role_id' => 2,
            ],
            [
                'permission_id' => 140,
                'role_id' => 2,
            ],
            [
                'permission_id' => 141,
                'role_id' => 2,
            ],
            [
                'permission_id' => 142,
                'role_id' => 2,
            ],
            [
                'permission_id' => 143,
                'role_id' => 2,
            ],
            [
                'permission_id' => 144,
                'role_id' => 2,
            ],
            [
                'permission_id' => 145,
                'role_id' => 2,
            ],
            [
                'permission_id' => 146,
                'role_id' => 2,
            ],
            [
                'permission_id' => 147,
                'role_id' => 2,
            ],
            [
                'permission_id' => 148,
                'role_id' => 2,
            ],
            [
                'permission_id' => 149,
                'role_id' => 2,
            ],
            [
                'permission_id' => 150,
                'role_id' => 2,
            ],
            [
                'permission_id' => 151,
                'role_id' => 2,
            ],
            [
                'permission_id' => 152,
                'role_id' => 2,
            ],
            [
                'permission_id' => 153,
                'role_id' => 2,
            ],
            [
                'permission_id' => 154,
                'role_id' => 2,
            ],
            [
                'permission_id' => 155,
                'role_id' => 2,
            ],
            [
                'permission_id' => 156,
                'role_id' => 2,
            ],
            [
                'permission_id' => 157,
                'role_id' => 2,
            ],
            [
                'permission_id' => 158,
                'role_id' => 2,
            ],
            [
                'permission_id' => 159,
                'role_id' => 2,
            ],
            [
                'permission_id' => 160,
                'role_id' => 2,
            ],
            [
                'permission_id' => 161,
                'role_id' => 2,
            ],
            [
                'permission_id' => 162,
                'role_id' => 2,
            ],
            [
                'permission_id' => 163,
                'role_id' => 2,
            ],
            [
                'permission_id' => 164,
                'role_id' => 2,
            ],
            [
                'permission_id' => 165,
                'role_id' => 2,
            ],
            [
                'permission_id' => 166,
                'role_id' => 2,
            ],
            [
                'permission_id' => 167,
                'role_id' => 2,
            ],
        ]);
        
        Schema::enableForeignKeyConstraints();
    }
}