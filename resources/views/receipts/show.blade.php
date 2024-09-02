@extends('adminlte::page')

@section('title', 'Detalles del Recibo')

@section('content_header')
    <h1>Detalles del Recibo</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="receipt_type">Tipo de Recibo:</label>
                <p>{{ $receipt->receipt_type }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="series">Serie:</label>
                <p>{{ $receipt->series }}</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="number">Número:</label>
                <p>{{ $receipt->number }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="issue_date">Fecha de Emisión:</label>
                <p>{{ $receipt->issue_date }}</p>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="amount">Monto:</label>
        <p>{{ $receipt->amount }}</p>
    </div>

    <div class="form-group">
        <label for="record_id">Registro:</label>
        <p>{{ $receipt->record->id }}</p>
    </div>

    <a href="{{ route('receipts.index') }}" class="btn btn-secondary">Volver</a>
@stop
