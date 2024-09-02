@extends('adminlte::page')

@section('title', 'Detalles del Comprobante')

@section('content_header')
    <h1>Detalles del Recibo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Recibo #{{ $receipt->id }}</h3>
        </div>
        <div class="card-body">
            <p><strong>ID del Registro: </strong>{{ $receipt->record_id }}</p>
            <p><strong>Fecha de Emisión: </strong>{{ $receipt->fecha_emision }}</p>
            <p><strong>Monto: </strong>{{ $receipt->monto }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('receipts.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
            <a href="{{ route('receipts.edit', $receipt) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
            <form action="{{ route('receipts.destroy', $receipt) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
            </form>
        </div>
    </div>
@stop
