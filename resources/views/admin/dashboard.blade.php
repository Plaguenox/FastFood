@extends('layouts.app')
@section('title', 'Panel de administración')
@section('content')
<div class="container">
    <h2 class="mb-4">Panel de administración</h2>
    <div class="row">
        <div class="col-md-3">
            <div class="card text-center shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="card-title">Ventas</h5>
                    <p class="card-text">${{ number_format($ventas, 2) }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="card-title">Pedidos</h5>
                    <p class="card-text">{{ $pedidos }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="card-title">Productos</h5>
                    <p class="card-text">{{ $productos }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="card-title">Usuarios</h5>
                    <p class="card-text">{{ $usuarios }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-3">
            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-primary w-100 mb-2">Gestión de Productos</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('admin.extras.index') }}" class="btn btn-outline-primary w-100 mb-2">Gestión de Extras</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-primary w-100 mb-2">Gestión de Usuarios</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-primary w-100 mb-2">Gestión de Pedidos</a>
        </div>
    </div>
</div>
@endsection
