@extends('layouts.app')
@section('title', 'Carrito de compras')
@section('content')
<div class="container py-4" style="background: linear-gradient(135deg, #fffbe6 0%, #ffe259 100%); border-radius: 16px; box-shadow: 0 2px 16px #ffe25940;">
    <h2 class="mb-4 fw-bold text-primary"><i class="bi bi-cart4"></i> Carrito de compras</h2>
    @if(count($cart) === 0)
        <div class="alert alert-info">El carrito está vacío.</div>
    @else
        <form method="POST" action="{{ route('cart.update') }}">
            @csrf
            <div class="row g-3">
                @foreach($cart as $key => $item)
                    @php
                        $product = \App\Models\Product::find($item['product_id']);
                        $extras = \App\Models\Extra::whereIn('id', $item['extras'])->get();
                    @endphp
                    <div class="col-md-6 col-lg-4">
                        <div class="card shadow-sm mb-3 h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <img src="{{ asset('images/' . ($product->image ?? 'default.png')) }}" alt="{{ $product->name ?? 'Producto eliminado' }}" class="me-3" style="width:60px; height:60px; object-fit:cover; border-radius:12px;">
                                    <div>
                                        <h5 class="card-title mb-0 fw-bold text-orange">{{ $product->name ?? 'Producto eliminado' }}</h5>
                                        <small class="text-muted">${{ $product->price ?? '0.00' }}</small>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <span class="fw-bold">Extras:</span>
                                    @forelse($extras as $extra)
                                        <span class="badge bg-warning text-dark me-1">{{ $extra->name }}</span>
                                    @empty
                                        <span class="text-muted">Sin extras</span>
                                    @endforelse
                                </div>
                                <div class="mb-2">
                                    <span class="fw-bold">Cantidad:</span>
                                    <input type="number" name="quantities[{{ $key }}]" value="{{ $item['quantity'] }}" min="1" class="form-control d-inline-block" style="width:80px;">
                                </div>
                                <div class="mb-2">
                                    <span class="fw-bold">Notas:</span> <span class="text-muted">{{ $item['notes'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary mt-3"><i class="bi bi-arrow-repeat"></i> Actualizar cantidades</button>
        </form>
        <div class="row g-3 mt-2">
            @foreach($cart as $key => $item)
                <div class="col-md-6 col-lg-4">
                    <form method="POST" action="{{ route('cart.remove', $key) }}" class="mb-2">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm w-100"><i class="bi bi-trash"></i> Eliminar</button>
                    </form>
                </div>
            @endforeach
        </div>
        <div class="mt-4 text-end">
            <a href="{{ route('checkout') }}" class="btn btn-success btn-lg"><i class="bi bi-credit-card"></i> Proceder al checkout</a>
        </div>
    @endif
</div>
@endsection
