
<?php $__env->startSection('title', 'Catálogo'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <h3 class="mt-4 mb-3 fw-bold" style="color:#ff9800; font-size:2rem;"><?php echo e($category->name); ?></h3>
    <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col">
                    <div class="card h-100 shadow card-animate" style="border-radius:24px; background: #fffbe9; border: 2px solid #ffe259; min-height:420px;">
                        <img src="<?php echo e(asset('images/' . $product->image)); ?>" class="card-img-top card-img-zoom" alt="<?php echo e($product->name); ?>" style="height:220px; object-fit:cover; border-radius:24px 24px 0 0; border-bottom: 4px solid #ffe259;">
                        <div class="card-body">
                            <h5 class="card-title text-danger fw-bold" style="font-size:1.3rem;"><?php echo e($product->name); ?></h5>
                            <p class="card-text mb-1"><span class="badge bg-dark"><?php echo e($category->name); ?></span></p>
                            <p class="card-text text-dark fw-bold" style="font-size:1.1rem;">$<?php echo e(number_format($product->price, 2)); ?></p>
                            <p class="card-text"><?php echo e($product->description); ?></p>
                            <a href="<?php echo e(route('product.detail', $product->id)); ?>" class="btn btn-warning btn-sm me-2 btn-animate" style="border-radius:15px;">Ver detalle</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\Desktop\Universidad\comidarapida\resources\views/client/catalog.blade.php ENDPATH**/ ?>