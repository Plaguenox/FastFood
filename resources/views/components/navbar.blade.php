<nav class="navbar navbar-expand-lg" style="background: linear-gradient(90deg, #ff7e5f 0%, #feb47b 100%); box-shadow: 0 2px 12px #ff7e5f80;">
    <div class="container">
    <a class="navbar-brand fw-bold text-danger" href="/" style="font-size:2rem; text-shadow: 2px 2px 8px #fff000;">🍔 FastFood</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link text-dark fw-bold" style="border-radius:20px; background:#ffe259; margin-right:8px;" href="{{ route('catalog') }}">Catálogo</a></li>
                <li class="nav-item"><a class="nav-link text-dark fw-bold" style="border-radius:20px; background:#ffefba; margin-right:8px;" href="/cart">Carrito</a></li>
                <li class="nav-item"><a class="nav-link text-dark fw-bold" style="border-radius:20px; background:#ff7e5f; margin-right:8px; color:#fff;" href="/orders">Pedidos</a></li>
                @auth
                    @if(auth()->user()->role === 'admin')
                        <li class="nav-item"><a class="nav-link fw-bold" style="border-radius:20px; background:#d35400; color:#fff; margin-right:8px;" href="{{ route('admin.dashboard') }}">Administrador</a></li>
                    @endif
                @endauth
            </ul>
            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item"><a class="nav-link fw-bold" style="border-radius:20px; background:#ffe259; color:#d35400; margin-right:8px;" href="/login">Iniciar sesión</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold" style="border-radius:20px; background:#ffefba; color:#d35400; margin-right:8px;" href="/register">Registrarse</a></li>
                @else
                    <li class="nav-item"><a class="nav-link fw-bold" style="border-radius:20px; background:#ffe259; color:#d35400; margin-right:8px;" href="/profile">Perfil</a></li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-link nav-link fw-bold" style="border-radius:20px; background:#ff7e5f; color:#fff; margin-right:8px;" type="submit">Salir</button>
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
