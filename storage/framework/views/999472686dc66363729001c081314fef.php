
<?php $__env->startSection('title', 'Checkout'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <h2 class="mb-4">Resumen de compra</h2>
    <?php if(count($cart) === 0): ?>
        <div class="alert alert-info">El carrito está vacío.</div>
    <?php else: ?>
        <form method="POST" action="<?php echo e(route('checkout')); ?>">
            <?php echo csrf_field(); ?>
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Extras</th>
                        <th>Cantidad</th>
                        <th>Notas</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $product = \App\Models\Product::find($item['product_id']);
                            $extras = \App\Models\Extra::whereIn('id', $item['extras'])->get();
                            $subtotal = ($product->price + $extras->sum('price')) * $item['quantity'];
                            $total += $subtotal;
                        ?>
                        <tr>
                            <td><?php echo e($product->name ?? 'Producto eliminado'); ?></td>
                            <td>
                                <?php $__currentLoopData = $extras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="badge bg-secondary"><?php echo e($extra->name); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td><?php echo e($item['quantity']); ?></td>
                            <td><?php echo e($item['notes']); ?></td>
                            <td>$<?php echo e(number_format($subtotal, 2)); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="mb-3">
                <label for="address" class="form-label">Dirección de entrega</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo e(auth()->user()->address); ?>" required>
            </div>
            <div class="mb-3">
                <label for="payment_method" class="form-label">Método de pago</label>
                <select class="form-select" id="payment_method" name="payment_method" required>
                    <option value="efectivo">Efectivo</option>
                    <option value="tarjeta">Tarjeta</option>
                </select>
            </div>
            <div class="mb-3">
                <strong>Total: $<?php echo e(number_format($total, 2)); ?></strong>
            </div>
            <button type="submit" class="btn btn-success">Confirmar pedido</button>
        </form>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\Desktop\Universidad\comidarapida\resources\views/client/checkout.blade.php ENDPATH**/ ?>