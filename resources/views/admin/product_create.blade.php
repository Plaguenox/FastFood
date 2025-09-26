@extends('layouts.app')
@section('title', 'Nuevo producto')
@section('content')
<div class="container">
    <h2 class="mb-4">Nuevo producto</h2>
    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
        <div class="mb-3">
            <label class="form-label">Extras disponibles</label>
            <div class="row">
                @foreach($extras as $extra)
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="extras[]" value="{{ $extra->id }}" id="extra{{ $extra->id }}">
                            <label class="form-check-label" for="extra{{ $extra->id }}">
                                {{ $extra->name }} (${{ number_format($extra->price, 2) }})
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Categoría</label>
            <select class="form-select" id="category_id" name="category_id" required>
                <option value="">Seleccione</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Precio</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
