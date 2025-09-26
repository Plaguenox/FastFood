
<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h2>Iniciar sesión</h2>
    <form method="POST" action="<?php echo e(route('login')); ?>">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="carnet" class="form-label">Carnet</label>
            <input type="text" class="form-control" id="carnet" name="carnet" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\Desktop\Universidad\comidarapida\resources\views/auth/login.blade.php ENDPATH**/ ?>