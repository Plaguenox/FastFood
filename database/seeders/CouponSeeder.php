<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Coupon;

class CouponSeeder extends Seeder
{
    public function run(): void
    {
        $coupons = [
            ['code' => 'BIENVENIDO10', 'discount' => 10, 'type' => 'percentage', 'expires_at' => now()->addMonths(2)],
            ['code' => 'FAMILIA20', 'discount' => 20, 'type' => 'fixed', 'expires_at' => now()->addMonths(1)],
            ['code' => '2X1COMBO', 'discount' => 50, 'type' => 'percentage', 'expires_at' => now()->addWeeks(3)],
        ];
        foreach ($coupons as $coupon) {
            Coupon::create($coupon);
        }
    }
}
