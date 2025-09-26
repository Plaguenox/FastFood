@extends('layouts.app')
@section('title', $product->name)
@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-md-6">
            <img src="{{ asset('images/' . ($product->image ?? 'default.png')) }}" class="img-fluid rounded shadow" alt="{{ $product->name }}">
        </div>
        <div class="col-md-6">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
            <h4 class="text-success">${{ number_format($product->price, 2) }}</h4>
            <form method="POST" action="{{ route('cart.add') }}">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="mb-3">
                    <label class="form-label">Extras:</label>
                    @foreach($product->extras as $extra)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="extras[]" value="{{ $extra->id }}" id="extra{{ $extra->id }}">
                            <label class="form-check-label" for="extra{{ $extra->id }}">
                                {{ $extra->name }} (+${{ number_format($extra->price, 2) }})
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Cantidad</label>
                    <input type="number" class="form-control" name="quantity" id="quantity" value="1" min="1">
                </div>
                <div class="mb-3">
                    <label for="notes" class="form-label">Notas para el pedido</label>
                    <input type="text" class="form-control" name="notes" id="notes" placeholder="Ej: sin mayonesa, entregar en portón">
                </div>
                <button type="submit" class="btn btn-success">Agregar al carrito</button>
            </form>
        </div>
    </div>
</div>
@endsection
