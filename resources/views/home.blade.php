{{-- @extends('adminlte::page')

@section('title', 'Nuestros Productos - GirlsCity')

@section('content_header')
    <h1>Nuestros Productos</h1>
@stop

@section('content')
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text"><strong>Precio:</strong> ${{ number_format($product->price, 2) }}</p>
                        <p class="card-text"><strong>Talla:</strong> {{ $product->size }}</p>
                        <p class="card-text"><strong>Color:</strong> {{ $product->color }}</p>
                        <p class="card-text"><strong>Detalle:</strong> {{ $product->details }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop

@section('css')

    <link rel="stylesheet" href="css/style.css">
@stop

@section('js')
    <script> console.log("Hola, estoy usando el paquete Laravel-AdminLTE!"); </script>
@stop --}}


<h1>Hola

</h1>
