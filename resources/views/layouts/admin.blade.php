@extends('layouts.app')

@section('title', 'Panel de Administración')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
                    <div class="container">
                        <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard') }}">Admin FastFood</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar" aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="adminNavbar">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item"><a class="nav-link" href="{{ route('admin.products.index') }}">Productos</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('admin.categories.index') }}">Categorías</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('admin.extras.index') }}">Extras</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('admin.users.index') }}">Usuarios</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('admin.orders.index') }}">Pedidos</a></li>
                            </ul>
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="btn btn-link nav-link" type="submit">Salir</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @yield('content')
            </div>
        </div>
    </div>
@endsection
