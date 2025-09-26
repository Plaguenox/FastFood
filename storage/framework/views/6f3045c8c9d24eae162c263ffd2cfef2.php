

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
	<div class="d-flex justify-content-between align-items-center mb-3">
		<h2>Gestión de Extras</h2>
		<a href="<?php echo e(route('admin.extras.create')); ?>" class="btn btn-primary">Agregar Extra</a>
	</div>
	<?php if(session('success')): ?>
		<div class="alert alert-success"><?php echo e(session('success')); ?></div>
	<?php endif; ?>
	<?php if(session('error')): ?>
		<div class="alert alert-danger"><?php echo e(session('error')); ?></div>
	<?php endif; ?>
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
			<?php $__empty_1 = true; $__currentLoopData = $extras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
			<tr>
				<td><?php echo e($extra->id); ?></td>
				<td><?php echo e($extra->name); ?></td>
				<td>$<?php echo e(number_format($extra->price, 2)); ?></td>
				<td>
					<a href="<?php echo e(route('admin.extras.edit', $extra->id)); ?>" class="btn btn-sm btn-warning">Editar</a>
					<form action="<?php echo e(route('admin.extras.destroy', $extra->id)); ?>" method="POST" class="d-inline">
						<?php echo csrf_field(); ?>
						<?php echo method_field('DELETE'); ?>
						<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este extra?')">Eliminar</button>
					</form>
				</td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
			<tr>
				<td colspan="4" class="text-center">No hay extras registrados.</td>
			</tr>
			<?php endif; ?>
		</tbody>
	</table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\Desktop\Universidad\comidarapida\resources\views/admin/extras.blade.php ENDPATH**/ ?>