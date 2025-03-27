<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Asociado Autor',
                'slug' => 'asociado-autor',
                'description' => 'Autor asociado que puede publicar contenido'
            ],
            [
                'name' => 'Asociado Árbitro',
                'slug' => 'asociado-arbitro',
                'description' => 'Árbitro finaliza la revisión de un libro'
            ],
            [
                'name' => 'Asociado Editor',
                'slug' => 'asociado-editor',
                'description' => 'Editor que puede gestionar contenido y revisiones de libros de los autores'
            ],
            [
                'name' => 'Administrador',
                'slug' => 'admin',
                'description' => 'Administrador del sistema con acceso total'
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
