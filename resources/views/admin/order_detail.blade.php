@extends('layouts.app')
@section('title', 'Detalle de pedido')
@section('content')
<div class="container">
    <h2 class="mb-4">Detalle de pedido #{{ $order->id }}</h2>
    <div class="mb-3">
        <strong>Estado:</strong> {{ ucfirst($order->status) }}<br>
        <strong>Fecha:</strong> {{ $order->created_at->format('d/m/Y H:i') }}<br>
        <strong>Dirección:</strong> {{ $order->address }}<br>
        <strong>Total:</strong> ${{ number_format($order->total, 2) }}
    </div>
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
            @foreach($order->items as $item)
                @php
                    $product = $item->product;
                    $extrasIds = is_array($item->extras) ? $item->extras : (is_string($item->extras) && $item->extras ? json_decode($item->extras, true) : []);
                    $extras = \App\Models\Extra::whereIn('id', $extrasIds)->get();
                @endphp
                <tr>
                    <td>{{ $product->name ?? 'Producto eliminado' }}</td>
                    <td>
                        @foreach($extras as $extra)
                            <span class="badge bg-secondary">{{ $extra->name }}</span>
                        @endforeach
                    </td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->notes ?? '' }}</td>
                    <td>${{ number_format($item->price, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary mt-3">Volver a la gestión</a>
</div>
@endsection
