@extends('layouts.app')
@section('title', 'Editar extra')
@section('content')
<div class="container">
	<h2 class="mb-4">Editar extra</h2>
	<form method="POST" action="{{ route('admin.extras.update', $extra->id) }}">
		@csrf
		@method('PUT')
		<div class="mb-3">
			<label for="name" class="form-label">Nombre</label>
			<input type="text" class="form-control" id="name" name="name" value="{{ $extra->name }}" required>
		</div>
		<div class="mb-3">
			<label for="price" class="form-label">Precio</label>
			<input type="number" class="form-control" id="price" name="price" value="{{ $extra->price }}" step="0.01" required>
		</div>
		<button type="submit" class="btn btn-success">Guardar cambios</button>
		<a href="{{ route('admin.extras.index') }}" class="btn btn-secondary">Cancelar</a>
	</form>
</div>
@endsection
