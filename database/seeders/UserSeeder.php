<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear usuario administrador por defecto
        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'admin@chavira.com',

            'password' => Hash::make('admin'),
        ]);

        // Asignar rol de administrador
        $admin->assignRole('admin');

        // Crear 3 árbitros
        for ($i = 1; $i <= 3; $i++) {
            $arbitro = User::create([
                'name' => "Árbitro Unico $i",
                'email' => "arbitro$i@chavira.com",
                'password' => Hash::make('asdqwe123'),
            ]);
            $arbitro->assignRole('asociado-arbitro');
        }

        // Crear 2 editores
        for ($i = 1; $i <= 2; $i++) {
            $editor = User::create([
                'name' => "Editor Unico $i",
                'email' => "editor$i@chavira.com",
                'password' => Hash::make('asdqwe123'),
            ]);
            $editor->assignRole('asociado-editor');
        }

        // Crear 3 autores
        for ($i = 1; $i <= 3; $i++) {
            $autor = User::create([
                'name' => "Autor Unico $i",
                'email' => "autor$i@chavira.com",
                'password' => Hash::make('asdqwe123'),
            ]);
            $autor->assignRole('asociado-autor');
        }

        // Crear usuarios de prueba adicionales
        User::factory()->count(10)->create();
    }
}
