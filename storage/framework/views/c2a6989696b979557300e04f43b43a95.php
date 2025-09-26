
<?php $__env->startSection('title', 'Carrito de compras'); ?>
<?php $__env->startSection('content'); ?>
<div class="container py-4" style="background: linear-gradient(135deg, #fffbe6 0%, #ffe259 100%); border-radius: 16px; box-shadow: 0 2px 16px #ffe25940;">
    <h2 class="mb-4 fw-bold text-primary"><i class="bi bi-cart4"></i> Carrito de compras</h2>
    <?php if(count($cart) === 0): ?>
        <div class="alert alert-info">El carrito está vacío.</div>
    <?php else: ?>
        <form method="POST" action="<?php echo e(route('cart.update')); ?>">
            <?php echo csrf_field(); ?>
            <div class="row g-3">
                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $product = \App\Models\Product::find($item['product_id']);
                        $extras = \App\Models\Extra::whereIn('id', $item['extras'])->get();
                    ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card shadow-sm mb-3 h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <img src="<?php echo e(asset('images/' . ($product->image ?? 'default.png'))); ?>" alt="<?php echo e($product->name ?? 'Producto eliminado'); ?>" class="me-3" style="width:60px; height:60px; object-fit:cover; border-radius:12px;">
                                    <div>
                                        <h5 class="card-title mb-0 fw-bold text-orange"><?php echo e($product->name ?? 'Producto eliminado'); ?></h5>
                                        <small class="text-muted">$<?php echo e($product->price ?? '0.00'); ?></small>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <span class="fw-bold">Extras:</span>
                                    <?php $__empty_1 = true; $__currentLoopData = $extras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <span class="badge bg-warning text-dark me-1"><?php echo e($extra->name); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <span class="text-muted">Sin extras</span>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-2">
                                    <span class="fw-bold">Cantidad:</span>
                                    <input type="number" name="quantities[<?php echo e($key); ?>]" value="<?php echo e($item['quantity']); ?>" min="1" class="form-control d-inline-block" style="width:80px;">
                                </div>
                                <div class="mb-2">
                                    <span class="fw-bold">Notas:</span> <span class="text-muted"><?php echo e($item['notes']); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <button type="submit" class="btn btn-primary mt-3"><i class="bi bi-arrow-repeat"></i> Actualizar cantidades</button>
        </form>
        <div class="row g-3 mt-2">
            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-lg-4">
                    <form method="POST" action="<?php echo e(route('cart.remove', $key)); ?>" class="mb-2">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-danger btn-sm w-100"><i class="bi bi-trash"></i> Eliminar</button>
                    </form>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="mt-4 text-end">
            <a href="<?php echo e(route('checkout')); ?>" class="btn btn-success btn-lg"><i class="bi bi-credit-card"></i> Proceder al checkout</a>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\Desktop\Universidad\comidarapida\resources\views/client/cart.blade.php ENDPATH**/ ?>