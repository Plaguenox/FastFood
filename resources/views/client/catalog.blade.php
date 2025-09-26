@extends('layouts.app')
@section('title', 'Catálogo')
@section('content')
<div class="container">
    @foreach ($categories as $category)
    <h3 class="mt-4 mb-3 fw-bold" style="color:#ff9800; font-size:2rem;">{{ $category->name }}</h3>
    <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($category->products as $product)
                <div class="col">
                    <div class="card h-100 shadow card-animate" style="border-radius:24px; background: #fffbe9; border: 2px solid #ffe259; min-height:420px;">
                        <img src="{{ asset('images/' . $product->image) }}" class="card-img-top card-img-zoom" alt="{{ $product->name }}" style="height:220px; object-fit:cover; border-radius:24px 24px 0 0; border-bottom: 4px solid #ffe259;">
                        <div class="card-body">
                            <h5 class="card-title text-danger fw-bold" style="font-size:1.3rem;">{{ $product->name }}</h5>
                            <p class="card-text mb-1"><span class="badge bg-dark">{{ $category->name }}</span></p>
                            <p class="card-text text-dark fw-bold" style="font-size:1.1rem;">${{ number_format($product->price, 2) }}</p>
                            <p class="card-text">{{ $product->description }}</p>
                            <a href="{{ route('product.detail', $product->id) }}" class="btn btn-warning btn-sm me-2 btn-animate" style="border-radius:15px;">Ver detalle</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
@endsection
