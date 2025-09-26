<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Deliveryman;

class DeliverymanSeeder extends Seeder
{
    public function run(): void
    {
        $deliverymen = [
            ['name' => 'Pedro Repartidor', 'phone' => '70000100', 'status' => 'activo'],
            ['name' => 'Lucía Entregas', 'phone' => '70000101', 'status' => 'activo'],
            ['name' => 'Carlos Moto', 'phone' => '70000102', 'status' => 'activo'],
        ];
        foreach ($deliverymen as $d) {
            Deliveryman::create($d);
        }
    }
}
