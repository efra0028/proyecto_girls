@extends('adminlte::page')

@section('title', 'Crear Record')

@section('content_header')
    <h1>Nueva Venta</h1>
@stop

@section('content')
    <form action="{{ route('records.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="customer_id">Cliente</label>
                    <select id="customer_id" name="customer_id" class="form-control" required>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="product_id">Producto</label>
                    <select id="product_id" name="product_id" class="form-control" required>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="record_date">Fecha</label>
                    <input type="date" id="record_date" name="record_date" class="form-control" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="total">Total</label>
                    <input type="text" id="total" name="total" class="form-control" required>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop
