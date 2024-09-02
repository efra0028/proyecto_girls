@extends('adminlte::page')

@section('title', 'Crear Detalle de Registro')

@section('content_header')
    <h1>Nuevo Detalle de Registro</h1>
@stop

@section('content')
    <form action="{{ route('record_details.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="record_id">Registro</label>
                    <select id="record_id" name="record_id" class="form-control" required>
                        @foreach($records as $record)
                            <option value="{{ $record->id }}">{{ $record->id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="product_id">Producto</label>
                    <select id="product_id" name="product_id" class="form-control" required>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantity">Cantidad</label>
                    <input type="number" id="quantity" name="quantity" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="price">Precio</label>
                    <input type="text" id="price" name="price" class="form-control" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop
