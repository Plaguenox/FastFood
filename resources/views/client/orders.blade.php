@extends('layouts.app')
@section('title', 'Historial de pedidos')
@section('content')
<div class="container">
    <h2 class="mb-4">Historial de pedidos</h2>
    @if($orders->isEmpty())
        <div class="alert alert-info">No hay pedidos aún.</div>
    @else
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ ucfirst($order->status) }}</td>
                        <td>${{ number_format($order->total, 2) }}</td>
                        <td>
                            <a href="{{ route('orders.detail', $order->id) }}" class="btn btn-info btn-sm">Ver detalle</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
