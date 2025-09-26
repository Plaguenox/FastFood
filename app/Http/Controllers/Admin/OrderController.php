<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index() {
        $orders = \App\Models\Order::with('user')->get();
        return view('admin.orders', compact('orders'));
    }
    public function show($id) {
        $order = \App\Models\Order::with('items.product')->findOrFail($id);
        return view('admin.order_detail', compact('order'));
    }
    public function updateStatus($id) {}
    public function destroy($id) {
        $order = \App\Models\Order::findOrFail($id);
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Pedido eliminado correctamente');
    }
}
