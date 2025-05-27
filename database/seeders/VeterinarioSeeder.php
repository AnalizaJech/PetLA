<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class VeterinarioSeeder extends Seeder
{
    public function run(): void
    {
        $veterinarios = [
            ['nombre' => 'Dra. Ana Soto', 'email' => 'ana.soto@petla.com'],
            ['nombre' => 'Dr. Carlos Ruiz', 'email' => 'carlos.ruiz@petla.com'],
            ['nombre' => 'Dra. Beatriz Torres', 'email' => 'beatriz.torres@petla.com'],
            ['nombre' => 'Dr. Mario López', 'email' => 'mario.lopez@petla.com'],
        ];

        foreach ($veterinarios as $index => $vet) {
            $password = Str::random(10);

            User::create([
                'name' => $vet['nombre'],
                'email' => $vet['email'],
                'password' => Hash::make($password),
                'role' => 'veterinario',
            ]);

            // Mostrar en consola
            echo "Veterinario #" . ($index + 1) . "\n";
            echo "Nombre: {$vet['nombre']}\n";
            echo "Email:  {$vet['email']}\n";
            echo "Password: $password\n\n";
        }
    }
}
