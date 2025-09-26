
<?php $__env->startSection('title', 'Editar producto'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <h2 class="mb-4">Editar producto</h2>
    <form method="POST" action="<?php echo e(route('admin.products.update', $product->id)); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="mb-3">
        <div class="mb-3">
            <label class="form-label">Extras disponibles</label>
            <div class="row">
                <?php $__currentLoopData = $extras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="extras[]" value="<?php echo e($extra->id); ?>" id="extra<?php echo e($extra->id); ?>"
                                <?php if(in_array($extra->id, old('extras', $product->extras->pluck('id')->toArray()))): ?> checked <?php endif; ?>>
                            <label class="form-check-label" for="extra<?php echo e($extra->id); ?>">
                                <?php echo e($extra->name); ?> ($<?php echo e(number_format($extra->price, 2)); ?>)
                            </label>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name', $product->name)); ?>" required>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Categoría</label>
            <select class="form-select" id="category_id" name="category_id" required>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cat->id); ?>" <?php if($cat->id == old('category_id', $product->category_id)): ?> selected <?php endif; ?>><?php echo e($cat->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Precio</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" value="<?php echo e(old('price', $product->price)); ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea class="form-control" id="description" name="description"><?php echo e(old('description', $product->description)); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Imagen</label>
            <?php if($product->image): ?>
                <div class="mb-2">
                    <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="Imagen actual" style="max-width:150px;">
                </div>
            <?php endif; ?>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    <a href="<?php echo e(route('admin.products.index')); ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\Desktop\Universidad\comidarapida\resources\views/admin/product_edit.blade.php ENDPATH**/ ?>