

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2>Editar Usuario</h2>
    <form method="POST" action="<?php echo e(route('admin.users.update', $user->id)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name', $user->name)); ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email', $user->email)); ?>" required>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Rol</label>
            <select class="form-select" id="role" name="role" required>
                <option value="admin" <?php if($user->role == 'admin'): ?> selected <?php endif; ?>>Administrador</option>
                <option value="cliente" <?php if($user->role == 'cliente'): ?> selected <?php endif; ?>>Cliente</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña (dejar vacío para no cambiar)</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\Desktop\Universidad\comidarapida\resources\views/admin/user_edit.blade.php ENDPATH**/ ?>