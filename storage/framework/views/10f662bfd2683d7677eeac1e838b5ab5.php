
<?php $__env->startSection('title', 'Detalle de pedido'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <h2 class="mb-4">Detalle de pedido #<?php echo e($order->id); ?></h2>
    <div class="mb-3">
        <strong>Estado:</strong> <?php echo e(ucfirst($order->status)); ?><br>
        <strong>Fecha:</strong> <?php echo e($order->created_at->format('d/m/Y H:i')); ?><br>
        <strong>Dirección:</strong> <?php echo e($order->address); ?><br>
        <strong>Total:</strong> $<?php echo e(number_format($order->total, 2)); ?>

    </div>
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
            <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $product = $item->product;
                    $extrasIds = is_array($item->extras) ? $item->extras : (is_string($item->extras) && $item->extras ? json_decode($item->extras, true) : []);
                    $extras = \App\Models\Extra::whereIn('id', $extrasIds)->get();
                ?>
                <tr>
                    <td><?php echo e($product->name ?? 'Producto eliminado'); ?></td>
                    <td>
                        <?php $__currentLoopData = $extras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="badge bg-secondary"><?php echo e($extra->name); ?></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td><?php echo e($item->quantity); ?></td>
                    <td><?php echo e($item->notes ?? ''); ?></td>
                    <td>$<?php echo e(number_format($item->price, 2)); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <a href="<?php echo e(route('admin.orders.index')); ?>" class="btn btn-secondary mt-3">Volver a la gestión</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\Desktop\Universidad\comidarapida\resources\views/admin/order_detail.blade.php ENDPATH**/ ?>