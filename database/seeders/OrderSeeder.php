<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Product;
use App\Models\Deliveryman;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $cliente = User::where('role', 'cliente')->first();
        $deliveryman = Deliveryman::first();
        $order = Order::create([
            'user_id' => $cliente->id,
            'status' => 'pendiente',
            'notes' => 'Sin mayonesa',
            'address' => $cliente->address,
            'total' => 35,
            'scheduled_at' => now()->addHour(),
            'deliveryman_id' => $deliveryman->id,
        ]);
        $producto = Product::where('name', 'Papas con Carne')->first();
        if ($producto) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $producto->id,
                'quantity' => 1,
                'extras' => json_encode([]),
                'price' => 45,
            ]);
        }
        $producto2 = Product::where('name', 'Papas Clásicas')->first();
        if ($producto2) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $producto2->id,
                'quantity' => 1,
                'extras' => json_encode([]),
                'price' => 30,
            ]);
        }
    }
}
