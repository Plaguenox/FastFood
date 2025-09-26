
<?php $__env->startSection('title', 'Agregar extra'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
	<h2 class="mb-4">Agregar extra</h2>
	<form method="POST" action="<?php echo e(route('admin.extras.store')); ?>">
		<?php echo csrf_field(); ?>
		<div class="mb-3">
			<label for="name" class="form-label">Nombre</label>
			<input type="text" class="form-control" id="name" name="name" required>
		</div>
		<div class="mb-3">
			<label for="price" class="form-label">Precio</label>
			<input type="number" class="form-control" id="price" name="price" step="0.01" required>
		</div>
		<button type="submit" class="btn btn-success">Guardar</button>
		<a href="<?php echo e(route('admin.extras.index')); ?>" class="btn btn-secondary">Cancelar</a>
	</form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\Desktop\Universidad\comidarapida\resources\views/admin/extra_create.blade.php ENDPATH**/ ?>