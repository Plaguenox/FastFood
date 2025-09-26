<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Administrador',
            'carnet' => 'A0001',
            'phone' => '70000001',
            'address' => 'Oficina central',
            'email' => 'admin@fastfood.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Clientes
        User::create([
            'name' => 'Cliente Demo',
            'carnet' => 'C0001',
            'phone' => '70000002',
            'address' => 'Calle 123',
            'email' => 'cliente@fastfood.com',
            'password' => Hash::make('cliente123'),
            'role' => 'cliente',
        ]);
        User::create([
            'name' => 'Ana Pérez',
            'carnet' => 'C0002',
            'phone' => '70000003',
            'address' => 'Av. Libertad 456',
            'email' => 'ana@fastfood.com',
            'password' => Hash::make('ana123'),
            'role' => 'cliente',
        ]);
        User::create([
            'name' => 'Luis Gómez',
            'carnet' => 'C0003',
            'phone' => '70000004',
            'address' => 'Calle Falsa 789',
            'email' => 'luis@fastfood.com',
            'password' => Hash::make('luis123'),
            'role' => 'cliente',
        ]);
        User::create([
            'name' => 'María López',
            'carnet' => 'C0004',
            'phone' => '70000005',
            'address' => 'Plaza Central 101',
            'email' => 'maria@fastfood.com',
            'password' => Hash::make('maria123'),
            'role' => 'cliente',
        ]);
    }
}
