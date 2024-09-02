@extends('adminlte::page')

@section('title', 'Crear registro')

@section('content_header')
    <h1>Nuevo Registro</h1>
@stop

@section('content')
    <form action="{{ route('records.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="customer_id">ID del Cliente</label>
                    <input type="number" id="customer_id" name="customer_id" class="form-control" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="product_id">ID del Producto</label>
                    <input type="number" id="product_id" name="product_id" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="purchase_date">Fecha de Compra</label>
                    <input type="date" id="purchase_date" name="purchase_date" class="form-control" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="total">Total</label>
                    <input type="number" step="0.01" id="total" name="total" class="form-control" required>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop
