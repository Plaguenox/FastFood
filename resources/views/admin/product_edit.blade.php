@extends('layouts.app')
@section('title', 'Editar producto')
@section('content')
<div class="container">
    <h2 class="mb-4">Editar producto</h2>
    <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
        <div class="mb-3">
            <label class="form-label">Extras disponibles</label>
            <div class="row">
                @foreach($extras as $extra)
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="extras[]" value="{{ $extra->id }}" id="extra{{ $extra->id }}"
                                @if(in_array($extra->id, old('extras', $product->extras->pluck('id')->toArray()))) checked @endif>
                            <label class="form-check-label" for="extra{{ $extra->id }}">
                                {{ $extra->name }} (${{ number_format($extra->price, 2) }})
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" required>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Categoría</label>
            <select class="form-select" id="category_id" name="category_id" required>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" @if($cat->id == old('category_id', $product->category_id)) selected @endif>{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Precio</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ old('price', $product->price) }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $product->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Imagen</label>
            @if($product->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Imagen actual" style="max-width:150px;">
                </div>
            @endif
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
