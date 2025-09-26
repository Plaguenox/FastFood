

<?php $__env->startSection('title', 'Panel de Administración'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
                    <div class="container">
                        <a class="navbar-brand fw-bold" href="<?php echo e(route('admin.dashboard')); ?>">Admin FastFood</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar" aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="adminNavbar">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.products.index')); ?>">Productos</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.categories.index')); ?>">Categorías</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.extras.index')); ?>">Extras</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.users.index')); ?>">Usuarios</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.orders.index')); ?>">Pedidos</a></li>
                            </ul>
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <button class="btn btn-link nav-link" type="submit">Salir</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\Desktop\Universidad\comidarapida\resources\views/layouts/admin.blade.php ENDPATH**/ ?>