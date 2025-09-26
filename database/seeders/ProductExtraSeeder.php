<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Extra;

class ProductExtraSeeder extends Seeder
{
    public function run(): void
    {
        // Relacionar productos con extras sugeridos
        $relaciones = [
            // Hamburguesas
            'Hamburguesa Simple' => ['Queso extra', 'Cebolla caramelizada', 'Sin salsa'],
            'Hamburguesa Doble' => ['Tocino', 'Sin salsa', 'Queso extra'],
            'Hamburguesa de Pollo' => ['Queso extra', 'Sin salsa'],
            'Hamburguesa Vegetariana' => ['Queso extra', 'Sin salsa'],
            'Hamburguesa BBQ' => ['Cebolla caramelizada', 'Jalapeños', 'Queso extra'],
            // Papas
            'Papas Clásicas' => ['Sin salsa', 'Queso extra'],
            'Papas con Queso' => ['Tocino', 'Cebolla caramelizada'],
            'Papas con Carne' => ['Jalapeños', 'Cebolla caramelizada'],
            'Papas Rancheras' => ['Tocino'],
            'Papas Picantes' => ['Cebolla caramelizada'],
            // Wraps
            'Wrap de Pollo' => ['Queso extra', 'Sin salsa'],
            'Wrap Vegetariano' => ['Queso extra', 'Sin salsa'],
            'Wrap Picante' => ['Cebolla caramelizada'],
            'Wrap de Atún' => ['Queso extra'],
            // Hot Dogs
            'Perrito Clásico' => ['Sin salsa', 'Cebolla caramelizada'],
            'Perrito Americano' => ['Tocino', 'Jalapeños'],
            'Perrito Picante' => ['Queso extra'],
            'Perrito Mexicano' => ['Jalapeños', 'Queso extra'],
            'Perrito Doble' => ['Sin salsa', 'Queso extra'],
        ];
        foreach ($relaciones as $producto => $extras) {
            $product = Product::where('name', $producto)->first();
            if ($product) {
                $extraIds = Extra::whereIn('name', $extras)->pluck('id')->toArray();
                $product->extras()->sync($extraIds);
            }
        }
    }
}
