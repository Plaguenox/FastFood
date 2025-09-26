
<?php $__env->startSection('title', 'Editar extra'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
	<h2 class="mb-4">Editar extra</h2>
	<form method="POST" action="<?php echo e(route('admin.extras.update', $extra->id)); ?>">
		<?php echo csrf_field(); ?>
		<?php echo method_field('PUT'); ?>
		<div class="mb-3">
			<label for="name" class="form-label">Nombre</label>
			<input type="text" class="form-control" id="name" name="name" value="<?php echo e($extra->name); ?>" required>
		</div>
		<div class="mb-3">
			<label for="price" class="form-label">Precio</label>
			<input type="number" class="form-control" id="price" name="price" value="<?php echo e($extra->price); ?>" step="0.01" required>
		</div>
		<button type="submit" class="btn btn-success">Guardar cambios</button>
		<a href="<?php echo e(route('admin.extras.index')); ?>" class="btn btn-secondary">Cancelar</a>
	</form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\Desktop\Universidad\comidarapida\resources\views/admin/extra_edit.blade.php ENDPATH**/ ?>