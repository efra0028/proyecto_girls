@extends('adminlte::page')

@section('title', 'Detalles del Inventario')

@section('content_header')
    <h1>Detalles del Inventario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p><strong>Producto:</strong> {{ $inventory->product->name }}</p>
            <p><strong>Cantidad:</strong> {{ $inventory->quantity }}</p>
            <p><strong>Fecha de Actualización:</strong> {{ $inventory->update_date }}</p>
        </div>
    </div>
    <a href="{{ route('inventories.index') }}" class="btn btn-primary">Volver a la lista</a>
@stop
