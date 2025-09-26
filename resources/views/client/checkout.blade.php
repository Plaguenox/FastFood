@extends('layouts.app')
@section('title', 'Checkout')
@section('content')
<div class="container">
    <h2 class="mb-4">Resumen de compra</h2>
    @if(count($cart) === 0)
        <div class="alert alert-info">El carrito está vacío.</div>
    @else
        <form method="POST" action="{{ route('checkout') }}">
            @csrf
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Extras</th>
                        <th>Cantidad</th>
                        <th>Notas</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($cart as $item)
                        @php
                            $product = \App\Models\Product::find($item['product_id']);
                            $extras = \App\Models\Extra::whereIn('id', $item['extras'])->get();
                            $subtotal = ($product->price + $extras->sum('price')) * $item['quantity'];
                            $total += $subtotal;
                        @endphp
                        <tr>
                            <td>{{ $product->name ?? 'Producto eliminado' }}</td>
                            <td>
                                @foreach($extras as $extra)
                                    <span class="badge bg-secondary">{{ $extra->name }}</span>
                                @endforeach
                            </td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>{{ $item['notes'] }}</td>
                            <td>${{ number_format($subtotal, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mb-3">
                <label for="address" class="form-label">Dirección de entrega</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ auth()->user()->address }}" required>
            </div>
            <div class="mb-3">
                <label for="payment_method" class="form-label">Método de pago</label>
                <select class="form-select" id="payment_method" name="payment_method" required>
                    <option value="efectivo">Efectivo</option>
                    <option value="tarjeta">Tarjeta</option>
                </select>
            </div>
            <div class="mb-3">
                <strong>Total: ${{ number_format($total, 2) }}</strong>
            </div>
            <button type="submit" class="btn btn-success">Confirmar pedido</button>
        </form>
    @endif
</div>
@endsection
