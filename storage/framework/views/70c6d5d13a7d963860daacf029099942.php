
<?php $__env->startSection('title', 'Historial de pedidos'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <h2 class="mb-4">Historial de pedidos</h2>
    <?php if($orders->isEmpty()): ?>
        <div class="alert alert-info">No hay pedidos aún.</div>
    <?php else: ?>
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($order->id); ?></td>
                        <td><?php echo e($order->created_at->format('d/m/Y H:i')); ?></td>
                        <td><?php echo e(ucfirst($order->status)); ?></td>
                        <td>$<?php echo e(number_format($order->total, 2)); ?></td>
                        <td>
                            <a href="<?php echo e(route('orders.detail', $order->id)); ?>" class="btn btn-info btn-sm">Ver detalle</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\Desktop\Universidad\comidarapida\resources\views/client/orders.blade.php ENDPATH**/ ?>