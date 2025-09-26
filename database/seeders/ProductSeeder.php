<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Obtener categorías
        $categories = [
            'Hamburguesas' => ['bur_bbq.png','bur_doble.png','bur_pollo.png','bur_simple.png','bur_vegetariana.png'],
            'Bebidas' => ['bebda_chocolate.png','bebda_cola.png','bebda_frutilla.png','bebda_lima.png','bebda_naranja.png'],
            'Combos' => ['combo_clasico.png','combo_doble.png','combo_kids.png','combo_pollo.png','combo_vegetariano.png'],
            'Papas' => ['pap_carne.png','pap_clasica.png','pap_picantes.png','pap_queso.png','pap_ranchera.png'],
            'Hot Dogs' => ['perrito_americano.png','perrito_clasico.png','perrito_doble.png','perrito_mexicano.png','perrito_picante.png'],
            'Postres' => ['pstr_brownie.png','pstr_galleta.png','pstr_heladomix.png','pstr_sundae.png','pstr_tarta.png'],
            'Wraps' => ['wrap_atun.png','wrap_carne.png','wrap_picante.png','wrap_pollo.png','wrap_vegetariano.png'],
        ];
        $catMap = [];
        foreach ($categories as $catName => $imgs) {
            $catMap[$catName] = Category::where('name', $catName)->first();
        }
        $products = [
            // Hamburguesas
            [
                'name' => 'Hamburguesa BBQ',
                'description' => 'Carne a la parrilla, salsa BBQ y cebolla caramelizada.',
                'price' => 70.00,
                'image' => 'bur_bbq.png',
            ],
            [
                'name' => 'Hamburguesa Doble',
                'description' => 'Doble carne, doble queso y vegetales frescos.',
                'price' => 85.00,
                'image' => 'bur_doble.png',
            ],
            [
                'name' => 'Hamburguesa de Pollo',
                'description' => 'Pechuga de pollo empanizada, lechuga y mayonesa.',
                'price' => 65.00,
                'image' => 'bur_pollo.png',
            ],
            [
                'name' => 'Hamburguesa Simple',
                'description' => 'Carne de res, queso y pan artesanal.',
                'price' => 60.00,
                'image' => 'bur_simple.png',
            ],
            [
                'name' => 'Hamburguesa Vegetariana',
                'description' => 'Hamburguesa de vegetales y garbanzos.',
                'price' => 68.00,
                'image' => 'bur_vegetariana.png',
            ],
            // Bebidas
            [
                'name' => 'Chocolate Frío',
                'description' => 'Bebida refrescante de chocolate.',
                'price' => 25.00,
                'image' => 'bebda_chocolate.png',
            ],
            [
                'name' => 'Cola',
                'description' => 'Refresco de cola tradicional.',
                'price' => 20.00,
                'image' => 'bebda_cola.png',
            ],
            [
                'name' => 'Frutilla',
                'description' => 'Bebida sabor frutilla natural.',
                'price' => 22.00,
                'image' => 'bebda_frutilla.png',
            ],
            [
                'name' => 'Lima',
                'description' => 'Bebida cítrica de lima.',
                'price' => 22.00,
                'image' => 'bebda_lima.png',
            ],
            [
                'name' => 'Naranja',
                'description' => 'Jugo de naranja natural.',
                'price' => 23.00,
                'image' => 'bebda_naranja.png',
            ],
            // Combos
            [
                'name' => 'Combo Clásico',
                'description' => 'Hamburguesa, papas y bebida.',
                'price' => 95.00,
                'image' => 'combo_clasico.png',
            ],
            [
                'name' => 'Combo Doble',
                'description' => 'Doble hamburguesa, papas y bebida.',
                'price' => 120.00,
                'image' => 'combo_doble.png',
            ],
            [
                'name' => 'Combo Kids',
                'description' => 'Mini hamburguesa, papas y jugo.',
                'price' => 70.00,
                'image' => 'combo_kids.png',
            ],
            [
                'name' => 'Combo Pollo',
                'description' => 'Hamburguesa de pollo, papas y bebida.',
                'price' => 100.00,
                'image' => 'combo_pollo.png',
            ],
            [
                'name' => 'Combo Vegetariano',
                'description' => 'Hamburguesa vegetariana, papas y bebida.',
                'price' => 98.00,
                'image' => 'combo_vegetariano.png',
            ],
            // Papas
            [
                'name' => 'Papas con Carne',
                'description' => 'Papas fritas con carne y queso.',
                'price' => 45.00,
                'image' => 'pap_carne.png',
            ],
            [
                'name' => 'Papas Clásicas',
                'description' => 'Papas fritas tradicionales.',
                'price' => 30.00,
                'image' => 'pap_clasica.png',
            ],
            [
                'name' => 'Papas Picantes',
                'description' => 'Papas fritas con salsa picante.',
                'price' => 35.00,
                'image' => 'pap_picantes.png',
            ],
            [
                'name' => 'Papas con Queso',
                'description' => 'Papas fritas con queso fundido.',
                'price' => 38.00,
                'image' => 'pap_queso.png',
            ],
            [
                'name' => 'Papas Rancheras',
                'description' => 'Papas fritas con aderezo ranch.',
                'price' => 40.00,
                'image' => 'pap_ranchera.png',
            ],
            // Perritos
            [
                'name' => 'Perrito Americano',
                'description' => 'Hot dog clásico americano.',
                'price' => 42.00,
                'image' => 'perrito_americano.png',
            ],
            [
                'name' => 'Perrito Clásico',
                'description' => 'Hot dog tradicional.',
                'price' => 40.00,
                'image' => 'perrito_clasico.png',
            ],
            [
                'name' => 'Perrito Doble',
                'description' => 'Hot dog doble salchicha.',
                'price' => 50.00,
                'image' => 'perrito_doble.png',
            ],
            [
                'name' => 'Perrito Mexicano',
                'description' => 'Hot dog con jalapeños y guacamole.',
                'price' => 48.00,
                'image' => 'perrito_mexicano.png',
            ],
            [
                'name' => 'Perrito Picante',
                'description' => 'Hot dog con salsa picante.',
                'price' => 45.00,
                'image' => 'perrito_picante.png',
            ],
            // Postres
            [
                'name' => 'Brownie',
                'description' => 'Brownie de chocolate con nuez.',
                'price' => 28.00,
                'image' => 'pstr_brownie.png',
            ],
            [
                'name' => 'Galleta',
                'description' => 'Galleta de vainilla y chispas de chocolate.',
                'price' => 18.00,
                'image' => 'pstr_galleta.png',
            ],
            [
                'name' => 'Helado Mix',
                'description' => 'Helado mixto de vainilla y chocolate.',
                'price' => 25.00,
                'image' => 'pstr_heladomix.png',
            ],
            [
                'name' => 'Sundae',
                'description' => 'Sundae de fresa y chocolate.',
                'price' => 22.00,
                'image' => 'pstr_sundae.png',
            ],
            [
                'name' => 'Tarta',
                'description' => 'Tarta de frutas frescas.',
                'price' => 30.00,
                'image' => 'pstr_tarta.png',
            ],
            // Wraps
            [
                'name' => 'Wrap de Atún',
                'description' => 'Wrap relleno de atún y vegetales.',
                'price' => 38.00,
                'image' => 'wrap_atun.png',
            ],
            [
                'name' => 'Wrap de Carne',
                'description' => 'Wrap relleno de carne y salsa especial.',
                'price' => 42.00,
                'image' => 'wrap_carne.png',
            ],
            [
                'name' => 'Wrap Picante',
                'description' => 'Wrap con salsa picante y pollo.',
                'price' => 40.00,
                'image' => 'wrap_picante.png',
            ],
            [
                'name' => 'Wrap de Pollo',
                'description' => 'Wrap relleno de pollo y vegetales.',
                'price' => 39.00,
                'image' => 'wrap_pollo.png',
            ],
            [
                'name' => 'Wrap Vegetariano',
                'description' => 'Wrap de vegetales frescos y hummus.',
                'price' => 36.00,
                'image' => 'wrap_vegetariano.png',
            ],
        ];
        // Poblar productos en sus categorías
        foreach ($products as $prod) {
            // Detectar categoría por imagen
            $catId = null;
            foreach ($catMap as $catName => $catObj) {
                if (in_array($prod['image'], $categories[$catName])) {
                    $catId = $catObj ? $catObj->id : null;
                    break;
                }
            }
            if ($catId) {
                Product::create([
                    'name' => $prod['name'],
                    'description' => $prod['description'],
                    'price' => $prod['price'],
                    'category_id' => $catId,
                    'image' => $prod['image'],
                ]);
            }
        }
    }
}
