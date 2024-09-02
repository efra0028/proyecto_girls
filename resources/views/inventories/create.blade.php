@extends('adminlte::page')

@section('title', 'Crear Inventario')

@section('content_header')
    <h1>Nuevo Inventario</h1>
@stop

@section('content')
    <form action="{{ route('inventories.store') }}" method="POST">
        @csrf
        <div class="row">
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
            <div class="col-md-6">
                <div class="form-group">
                    <label for="quantity">Cantidad</label>
                    <input type="number" id="quantity" name="quantity" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="update_date">Fecha de Actualización</label>
                    <input type="date" id="update_date" name="update_date" class="form-control" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop
