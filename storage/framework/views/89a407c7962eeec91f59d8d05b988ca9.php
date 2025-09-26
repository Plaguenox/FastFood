
<?php $__env->startSection('title', 'Bienvenido a FastFood'); ?>
<?php $__env->startSection('content'); ?>
<div class="container py-5" style="background: linear-gradient(135deg, #ffefba 0%, #ff7e5f 100%); min-height: 100vh;">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="display-4 fw-bold mb-3 text-danger" style="text-shadow: 2px 2px 8px #fff000;">¡Bienvenido a FastFood!</h1>
            <p class="lead mb-4 text-dark">Disfruta la mejor hamburguesería online. Haz tu pedido fácil, rápido y seguro. Elige entre hamburguesas, papas, wraps, combos y mucho más.</p>
            <a href="<?php echo e(route('catalog')); ?>" class="btn btn-lg me-2" style="background: #ff7e5f; color: #fff; font-weight: bold; border-radius: 30px; box-shadow: 0 2px 8px #ff7e5f80;">Ver catálogo</a>
            <?php if(auth()->guard()->guest()): ?>
                <a href="<?php echo e(route('register')); ?>" class="btn btn-lg" style="background: #ffe259; color: #d35400; font-weight: bold; border-radius: 30px; box-shadow: 0 2px 8px #ffe25980;">Regístrate</a>
            <?php endif; ?>
        </div>
        <div class="col-md-6 text-center">
            <img src="https://images.unsplash.com/photo-1550547660-d9450f859349?auto=format&fit=crop&w=600&q=80" class="img-fluid rounded shadow" alt="Hamburguesa deliciosa" style="border: 6px solid #ff7e5f; box-shadow: 0 4px 24px #ff7e5f80;">
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <h2 class="mb-4 text-warning" style="text-shadow: 2px 2px 8px #d35400;">¿Por qué elegirnos?</h2>
            <div class="row justify-content-center">
                <div class="col-md-3 mb-3">
                    <div class="card h-100 shadow-sm" style="background: linear-gradient(135deg, #ffe259 0%, #ffa751 100%); border: none;">
                        <div class="card-body">
                            <span class="fs-1">🍔</span>
                            <h5 class="card-title mt-2 text-danger">Variedad</h5>
                            <p class="card-text text-dark">Hamburguesas, wraps, papas, postres y más.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card h-100 shadow-sm" style="background: linear-gradient(135deg, #ff7e5f 0%, #feb47b 100%); border: none;">
                        <div class="card-body">
                            <span class="fs-1">⚡</span>
                            <h5 class="card-title mt-2 text-danger">Rápido y fácil</h5>
                            <p class="card-text text-dark">Compra en minutos y recibe en tu puerta.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card h-100 shadow-sm" style="background: linear-gradient(135deg, #f7971e 0%, #ffd200 100%); border: none;">
                        <div class="card-body">
                            <span class="fs-1">🎁</span>
                            <h5 class="card-title mt-2 text-danger">Promociones</h5>
                            <p class="card-text text-dark">Descuentos y combos exclusivos cada semana.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card h-100 shadow-sm" style="background: linear-gradient(135deg, #43cea2 0%, #185a9d 100%); border: none;">
                        <div class="card-body">
                            <span class="fs-1">🔒</span>
                            <h5 class="card-title mt-2 text-danger">Seguro</h5>
                            <p class="card-text text-dark">Tus datos y pagos protegidos siempre.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\Desktop\Universidad\comidarapida\resources\views/landing.blade.php ENDPATH**/ ?>