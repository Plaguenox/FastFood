@extends('layouts.app')
@php use Illuminate\Support\Str; @endphp
@section('title', 'Productos')
@section('content')
<div class="container">
    <h2 class="mb-4">Productos</h2>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Nuevo producto</a>
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow card-animate" style="border-radius:20px; background: #fffbe9; border: 1px solid #ffe259;">
                @if($product->image)
                    @php
                        $imgSrc = Str::startsWith($product->image, 'products/')
                            ? asset('storage/' . $product->image)
                            : asset('images/' . $product->image);
                    @endphp
                    <img src="{{ $imgSrc }}" class="card-img-top card-img-zoom" alt="{{ $product->name }}" style="height:180px; object-fit:cover; border-radius:20px 20px 0 0; border-bottom: 3px solid #ffe259;">
                @endif
                <div class="card-body">
                    <h5 class="card-title text-danger fw-bold">{{ $product->name }}</h5>
                    <p class="card-text mb-1"><span class="badge bg-dark">{{ $product->category->name ?? '-' }}</span></p>
                    <p class="card-text text-dark fw-bold">${{ number_format($product->price, 2) }}</p>
                    <p class="card-text">{{ $product->description }}</p>
                    <div class="mb-2">
                        @if($product->extras && $product->extras->count())
                            <span class="fw-bold">Extras:</span>
                            <ul class="mb-0 ps-3">
                                @foreach($product->extras as $extra)
                                    <li>{{ $extra->name }} (${{ number_format($extra->price, 2) }})</li>
                                @endforeach
                            </ul>
                        @else
                            <span class="text-muted">Sin extras</span>
                        @endif
                    </div>
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm me-2 btn-animate" style="border-radius:15px;">Editar</a>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm btn-animate" style="border-radius:15px;" onclick="return confirm('¿Eliminar producto?')">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
