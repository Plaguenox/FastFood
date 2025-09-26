<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'FastFood Ecommerce')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body style="background: linear-gradient(135deg, #ffefba 0%, #ff7e5f 100%); min-height: 100vh; font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif; display: flex; flex-direction: column; min-height: 100vh;">
    @include('components.navbar')
    <div style="flex: 1 0 auto;">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Notificaciones tipo popup -->
    <div aria-live="polite" aria-atomic="true" class="position-fixed bottom-0 end-0 p-3" style="z-index: 1080; min-width:300px;">
        @if(session('success'))
            <div class="toast align-items-center text-bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endif
        @if(session('error'))
            <div class="toast align-items-center text-bg-danger border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('error') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endif
        @if($errors->any())
            <div class="toast align-items-center text-bg-danger border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endif
    </div>
    <footer class="mt-5 py-4" style="background: linear-gradient(90deg, #ff7e5f 0%, #feb47b 100%); color: #fff; flex-shrink: 0;">
        <div class="container text-center">
            <h5 class="mb-2">FastFood &copy; {{ date('Y') }}</h5>
            <p>Síguenos en redes sociales: <a href="#" class="text-warning">Instagram</a> | <a href="#" class="text-warning">Facebook</a> | <a href="#" class="text-warning">Twitter</a></p>
            <p class="mb-0">Contacto: contacto@fastfood.com</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
