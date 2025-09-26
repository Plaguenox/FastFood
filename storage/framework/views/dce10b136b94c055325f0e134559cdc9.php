
<?php $__env->startSection('title', 'Panel de administración'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <h2 class="mb-4">Panel de administración</h2>
    <div class="row">
        <div class="col-md-3">
            <div class="card text-center shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="card-title">Ventas</h5>
                    <p class="card-text">$<?php echo e(number_format($ventas, 2)); ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="card-title">Pedidos</h5>
                    <p class="card-text"><?php echo e($pedidos); ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="card-title">Productos</h5>
                    <p class="card-text"><?php echo e($productos); ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="card-title">Usuarios</h5>
                    <p class="card-text"><?php echo e($usuarios); ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-3">
            <a href="<?php echo e(route('admin.products.index')); ?>" class="btn btn-outline-primary w-100 mb-2">Gestión de Productos</a>
        </div>
        <div class="col-md-3">
            <a href="<?php echo e(route('admin.extras.index')); ?>" class="btn btn-outline-primary w-100 mb-2">Gestión de Extras</a>
        </div>
        <div class="col-md-3">
            <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-outline-primary w-100 mb-2">Gestión de Usuarios</a>
        </div>
        <div class="col-md-3">
            <a href="<?php echo e(route('admin.orders.index')); ?>" class="btn btn-outline-primary w-100 mb-2">Gestión de Pedidos</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\Desktop\Universidad\comidarapida\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>