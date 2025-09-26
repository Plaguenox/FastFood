<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Extra;

class ExtraSeeder extends Seeder
{
    public function run(): void
    {
        $extras = [
            ['name' => 'Doble carne', 'price' => 8],
            ['name' => 'Queso extra', 'price' => 3],
            ['name' => 'Sin salsa', 'price' => 0],
            ['name' => 'Tocino', 'price' => 5],
            ['name' => 'Cebolla caramelizada', 'price' => 2],
        ];
        foreach ($extras as $extra) {
            Extra::create($extra);
        }
    }
}
