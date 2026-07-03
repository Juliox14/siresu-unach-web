<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        
        DB::table('users')->insert([
                [
                    'id' => 1,
                    'name' => 'admin',
                    'email' => 'admin@unach.mx',
                    'rol' => 'super_admin',
                    'email_verified_at' => null,
                    'password' => '$2y$12$1K4bnoxz35F12Vo3KuJD9e2ddlt7F.zFeYjlLh2rz65Wf6kHL/ZTO',
                    'remember_token' => null,
                    'created_at' => '2026-02-02 16:03:39',
                    'updated_at' => '2026-02-02 16:03:39',
                    'departamento_id' => null,
                ],
                [
                    'id' => 2,
                    'name' => 'Gabriel Velázquez Toledo',
                    'email' => 'direccioneditorial@unach.mx',
                    'rol' => 'editor',
                    'email_verified_at' => null,
                    'password' => '$2y$12$frl0ZqmU.29dwL6qBndKvuAeaCZ7hle2VMglR6Dd/kXkZgJVsRqe6',
                    'remember_token' => null,
                    'created_at' => '2026-03-04 00:13:02',
                    'updated_at' => '2026-03-04 00:13:02',
                    'departamento_id' => 2,
                ],
                [
                    'id' => 3,
                    'name' => 'Editor',
                    'email' => 'editor@unach.mx',
                    'rol' => 'editor',
                    'email_verified_at' => null,
                    'password' => '$2y$12$cI2a4IOh4JGOXS0VTVAeUOmhA4USuItQlN6X2ZcxlgcPnSCaV9Az.',
                    'remember_token' => null,
                    'created_at' => '2026-04-23 00:46:47',
                    'updated_at' => '2026-04-23 00:46:47',
                    'departamento_id' => 3,
                ],
            ]);
        Schema::enableForeignKeyConstraints();
    }
}