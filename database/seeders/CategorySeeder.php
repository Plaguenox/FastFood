<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Hamburguesas', 'description' => 'Hamburguesas clásicas y especiales'],
            ['name' => 'Papas', 'description' => 'Papas fritas y acompañamientos'],
            ['name' => 'Bebidas', 'description' => 'Bebidas frías y calientes'],
            ['name' => 'Postres', 'description' => 'Dulces y postres'],
            ['name' => 'Wraps', 'description' => 'Wraps variados'],
            ['name' => 'Hot Dogs', 'description' => 'Hot dogs clásicos y especiales'],
            ['name' => 'Combos', 'description' => 'Combos familiares y promociones'],
        ];
        foreach ($categories as $cat) {
            Category::create($cat);
        }
    }
}
