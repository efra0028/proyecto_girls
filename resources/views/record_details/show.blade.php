@extends('adminlte::page')

@section('title', 'Detalle de Registro')

@section('content_header')
    <h1>Detalle de Registro</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $recordDetail->id }}</p>
            <p><strong>Registro:</strong> {{ $recordDetail->record->id }}</p>
            <p><strong>Producto:</strong> {{ $recordDetail->product->name }}</p>
            <p><strong>Cantidad:</strong> {{ $recordDetail->quantity }}</p>
            <p><strong>Precio:</strong> {{ $recordDetail->price }}</p>
        </div>
    </div>
    <a href="{{ route('record_details.index') }}" class="btn btn-secondary">Volver</a>
@stop
