@extends('adminlte::page')

@section('title', 'Detalles del Registro')

@section('content_header')
    <h1>Detalles del Registro</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Registro #{{ $record->id }}</h3>
        </div>
        <div class="card-body">
            <p><strong>ID del Cliente: </strong>{{ $record->customer_id }}</p>
            <p><strong>ID del Producto: </strong>{{ $record->product_id }}</p>
            <p><strong>Fecha de Compra: </strong>{{ $record->purchase_date }}</p>
            <p><strong>Total: </strong>{{ $record->total }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('records.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
            <a href="{{ route('records.edit', $record) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
            <form action="{{ route('records.destroy', $record) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
            </form>
        </div>
    </div>
@stop
