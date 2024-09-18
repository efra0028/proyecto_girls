@extends('layouts.app')

@section('content')
    <main class="flex items-center justify-center min-h-screen">
        <div class="text-center">
            @if(auth()->check()) {{-- Verificar si el usuario está autenticado --}}
                @if(auth()->user()->hasRole('cliente'))
                    <h1>Bienvenido, Cliente!</h1>
                    <a href="{{ route('customers.dashboard') }}">Comprar productos</a>
                @elseif(auth()->user()->hasRole('admin'))
                    <h1>Bienvenido, Administrador!</h1>
                    <a href="{{ route('admin.dashboard') }}">Administrar negocio</a>
                @elseif(auth()->user()->hasRole('ventas'))
                    <h1>Bienvenido, Encargado de Ventas!</h1>
                    <a href="{{ route('ventas.dashboard') }}">Administrar Ventas</a>
                @endif
            @else
                <h1 class="text-4xl font-bold">¡Bienvenido a Laravel!</h1>
                <p class="mt-4">Explora la mejor manera de crear aplicaciones web.</p>
                <a href="{{ route('login') }}" class="btn btn-primary">Iniciar sesión</a>
            @endif
        </div>

        <!-- Mostrar la lista de productos solo para clientes autenticados o usuarios sin rol -->
        @if(auth()->guest() || auth()->user()->hasRole('cliente'))
            @include('components.productList') {{-- Mostrar productos si es cliente o no está autenticado --}}
        @endif
    </main>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('#products').DataTable({
                "ordering": false,
                "language": {
                    "search": "Buscar",
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Siguiente",
                        "first": "Primero",
                        "last": "Último"
                    }
                }
            });
        });
    </script>
@endsection
