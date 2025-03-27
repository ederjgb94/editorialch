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

        // Crear usuarios de prueba adicionales
        User::factory()->count(10)->create();
    }
}
