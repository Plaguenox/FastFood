<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function cancel($id)
    {
        $order = \App\Models\Order::where('user_id', auth()->id())->where('status', 'pendiente')->findOrFail($id);
        $order->status = 'cancelado';
        $order->save();
        return redirect()->route('orders')->with('success', 'Pedido cancelado correctamente.');
    }
    public function index()
    {
        $orders = \App\Models\Order::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
        return view('client.orders', compact('orders'));
    }

    public function show($id)
    {
        $order = \App\Models\Order::where('user_id', auth()->id())->with('items.product')->findOrFail($id);
        return view('client.order_detail', compact('order'));
    }

    public function checkout(Request $request)
    {
        if ($request->isMethod('get')) {
            $cart = session('cart', []);
            return view('client.checkout', compact('cart'));
        }

        $cart = session('cart', []);
        if (count($cart) === 0) {
            return redirect()->route('cart')->with('error', 'El carrito está vacío.');
        }

        $request->validate([
            'address' => 'required|string|max:255',
            'payment_method' => 'required|in:efectivo,tarjeta',
        ]);

        $user = auth()->user();
        $total = 0;
        foreach ($cart as $item) {
            $product = \App\Models\Product::find($item['product_id']);
            $extras = \App\Models\Extra::whereIn('id', $item['extras'])->get();
            $subtotal = ($product->price + $extras->sum('price')) * $item['quantity'];
            $total += $subtotal;
        }

        $order = \App\Models\Order::create([
            'user_id' => $user->id,
            'status' => 'pendiente',
            'notes' => null,
            'address' => $request->address,
            'total' => $total,
        ]);

        foreach ($cart as $item) {
            $product = \App\Models\Product::find($item['product_id']);
            $extras = \App\Models\Extra::whereIn('id', $item['extras'])->get();
            $subtotal = ($product->price + $extras->sum('price')) * $item['quantity'];
            \App\Models\OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'extras' => $item['extras'],
                'price' => $subtotal,
                'notes' => $item['notes'] ?? null,
            ]);
        }

        session()->forget('cart');
        return redirect()->route('orders')->with('success', '¡Pedido realizado con éxito!');
    }
}
