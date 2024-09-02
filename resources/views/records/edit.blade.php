@extends('adminlte::page')

@section('title', 'Editar Record')

@section('content_header')
    <h1>Editar Record</h1>
@stop

@section('content')
    <form action="{{ route('records.update', $record) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="customer_id">Cliente</label>
                    <select id="customer_id" name="customer_id" class="form-control" required>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}" @if($customer->id == $record->customer_id) selected @endif>{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="product_id">Producto</label>
                    <select id="product_id" name="product_id" class="form-control" required>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" @if($product->id == $record->product_id) selected @endif>{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="record_date">Fecha</label>
                    <input type="date" id="record_date" name="record_date" class="form-control" value="{{ $record->record_date }}" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="total">Total</label>
                    <input type="text" id="total" name="total" class="form-control" value="{{ $record->total }}" required>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@stop
