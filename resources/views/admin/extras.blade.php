@extends('layouts.admin')

@section('content')
<div class="container mt-4">
	<div class="d-flex justify-content-between align-items-center mb-3">
		<h2>Gestión de Extras</h2>
		<a href="{{ route('admin.extras.create') }}" class="btn btn-primary">Agregar Extra</a>
	</div>
	@if(session('success'))
		<div class="alert alert-success">{{ session('success') }}</div>
	@endif
	@if(session('error'))
		<div class="alert alert-danger">{{ session('error') }}</div>
	@endif
	<table class="table table-bordered table-hover">
		<thead class="table-light">
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Precio</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@forelse($extras as $extra)
			<tr>
				<td>{{ $extra->id }}</td>
				<td>{{ $extra->name }}</td>
				<td>${{ number_format($extra->price, 2) }}</td>
				<td>
					<a href="{{ route('admin.extras.edit', $extra->id) }}" class="btn btn-sm btn-warning">Editar</a>
					<form action="{{ route('admin.extras.destroy', $extra->id) }}" method="POST" class="d-inline">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este extra?')">Eliminar</button>
					</form>
				</td>
			</tr>
			@empty
			<tr>
				<td colspan="4" class="text-center">No hay extras registrados.</td>
			</tr>
			@endforelse
		</tbody>
	</table>
</div>
@endsection
