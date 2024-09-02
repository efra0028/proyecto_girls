@extends('adminlte::page')

@section('title', 'Detalles del Record')

@section('content_header')
    <h1>Detalles del Record</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="customer_name">Cliente</label>
                <input type="text" id="customer_name" class="form-control" value="{{ $record->customer->name }}" disabled>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="product_name">Producto</label>
                <input type="text" id="product_name" class="form-control" value="{{ $record->product->name }}" disabled>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="record_date">Fecha</label>
                <input type="date" id="record_date" class="form-control" value="{{ $record->record_date }}" disabled>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="total">Total</label>
                <input type="text" id="total" class="form-control" value="{{ $record->total }}" disabled>
            </div>
        </div>
    </div>

    <a href="{{ route('records.index') }}" class="btn btn-primary">Volver</a>
@stop
