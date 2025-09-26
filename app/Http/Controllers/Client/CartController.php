<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        return view('client.cart', compact('cart'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'extras' => 'array',
            'notes' => 'nullable|string|max:255',
        ]);

        $cart = session('cart', []);
        $key = $request->product_id . '-' . implode('-', $request->extras ?? []);
        if (isset($cart[$key])) {
            $cart[$key]['quantity'] += $request->quantity;
        } else {
            $cart[$key] = [
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'extras' => $request->extras ?? [],
                'notes' => $request->notes,
            ];
        }
        session(['cart' => $cart]);
        return redirect()->route('cart')->with('success', 'Producto agregado al carrito');
    }

    public function update(Request $request)
    {
        $request->validate([
            'quantities' => 'required|array',
        ]);
        $cart = session('cart', []);
        foreach ($request->quantities as $key => $quantity) {
            if (isset($cart[$key]) && $quantity > 0) {
                $cart[$key]['quantity'] = $quantity;
            }
        }
        session(['cart' => $cart]);
        return redirect()->route('cart')->with('success', 'Carrito actualizado correctamente');
    }

    public function remove($key)
    {
        $cart = session('cart', []);
        unset($cart[$key]);
        session(['cart' => $cart]);
        return redirect()->route('cart');
    }
}
