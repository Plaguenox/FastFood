
<?php $__env->startSection('title', $product->name); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-6">
            <img src="<?php echo e(asset('images/' . ($product->image ?? 'default.png'))); ?>" class="img-fluid rounded shadow" alt="<?php echo e($product->name); ?>">
        </div>
        <div class="col-md-6">
            <h2><?php echo e($product->name); ?></h2>
            <p><?php echo e($product->description); ?></p>
            <h4 class="text-success">$<?php echo e(number_format($product->price, 2)); ?></h4>
            <form method="POST" action="<?php echo e(route('cart.add')); ?>">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                <div class="mb-3">
                    <label class="form-label">Extras:</label>
                    <?php $__currentLoopData = $product->extras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="extras[]" value="<?php echo e($extra->id); ?>" id="extra<?php echo e($extra->id); ?>">
                            <label class="form-check-label" for="extra<?php echo e($extra->id); ?>">
                                <?php echo e($extra->name); ?> (+$<?php echo e(number_format($extra->price, 2)); ?>)
                            </label>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Cantidad</label>
                    <input type="number" class="form-control" name="quantity" id="quantity" value="1" min="1">
                </div>
                <div class="mb-3">
                    <label for="notes" class="form-label">Notas para el pedido</label>
                    <input type="text" class="form-control" name="notes" id="notes" placeholder="Ej: sin mayonesa, entregar en portón">
                </div>
                <button type="submit" class="btn btn-success">Agregar al carrito</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\Desktop\Universidad\comidarapida\resources\views/client/product.blade.php ENDPATH**/ ?>