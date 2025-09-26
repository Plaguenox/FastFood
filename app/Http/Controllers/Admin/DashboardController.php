<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $ventas = \App\Models\Order::where('status', 'entregado')->sum('total');
        $pedidos = \App\Models\Order::count();
        $productos = \App\Models\Product::count();
        $usuarios = \App\Models\User::where('role', 'cliente')->count();
        return view('admin.dashboard', compact('ventas', 'pedidos', 'productos', 'usuarios'));
    }
}
