
<?php use Illuminate\Support\Str; ?>
<?php $__env->startSection('title', 'Productos'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <h2 class="mb-4">Productos</h2>
    <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-primary mb-3">Nuevo producto</a>
    <div class="row">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow card-animate" style="border-radius:20px; background: #fffbe9; border: 1px solid #ffe259;">
                <?php if($product->image): ?>
                    <?php
                        $imgSrc = Str::startsWith($product->image, 'products/')
                            ? asset('storage/' . $product->image)
                            : asset('images/' . $product->image);
                    ?>
                    <img src="<?php echo e($imgSrc); ?>" class="card-img-top card-img-zoom" alt="<?php echo e($product->name); ?>" style="height:180px; object-fit:cover; border-radius:20px 20px 0 0; border-bottom: 3px solid #ffe259;">
                <?php endif; ?>
                <div class="card-body">
                    <h5 class="card-title text-danger fw-bold"><?php echo e($product->name); ?></h5>
                    <p class="card-text mb-1"><span class="badge bg-dark"><?php echo e($product->category->name ?? '-'); ?></span></p>
                    <p class="card-text text-dark fw-bold">$<?php echo e(number_format($product->price, 2)); ?></p>
                    <p class="card-text"><?php echo e($product->description); ?></p>
                    <div class="mb-2">
                        <?php if($product->extras && $product->extras->count()): ?>
                            <span class="fw-bold">Extras:</span>
                            <ul class="mb-0 ps-3">
                                <?php $__currentLoopData = $product->extras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($extra->name); ?> ($<?php echo e(number_format($extra->price, 2)); ?>)</li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php else: ?>
                            <span class="text-muted">Sin extras</span>
                        <?php endif; ?>
                    </div>
                    <a href="<?php echo e(route('admin.products.edit', $product->id)); ?>" class="btn btn-warning btn-sm me-2 btn-animate" style="border-radius:15px;">Editar</a>
                    <form action="<?php echo e(route('admin.products.destroy', $product->id)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger btn-sm btn-animate" style="border-radius:15px;" onclick="return confirm('¿Eliminar producto?')">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\Desktop\Universidad\comidarapida\resources\views/admin/products.blade.php ENDPATH**/ ?>