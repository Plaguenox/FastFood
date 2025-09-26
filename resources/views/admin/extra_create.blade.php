@extends('layouts.app')
@section('title', 'Agregar extra')
@section('content')
<div class="container">
	<h2 class="mb-4">Agregar extra</h2>
	<form method="POST" action="{{ route('admin.extras.store') }}">
		@csrf
		<div class="mb-3">
			<label for="name" class="form-label">Nombre</label>
			<input type="text" class="form-control" id="name" name="name" required>
		</div>
		<div class="mb-3">
			<label for="price" class="form-label">Precio</label>
			<input type="number" class="form-control" id="price" name="price" step="0.01" required>
		</div>
		<button type="submit" class="btn btn-success">Guardar</button>
		<a href="{{ route('admin.extras.index') }}" class="btn btn-secondary">Cancelar</a>
	</form>
</div>
@endsection
