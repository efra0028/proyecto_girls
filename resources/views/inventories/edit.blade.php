@extends('adminlte::page')

@section('title', 'Editar Inventario')

@section('content_header')
    <h1>Editar Inventario</h1>
@stop

@section('content')
    <form action="{{ route('inventories.update', $inventory) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="product_id">Producto</label>
                    <select id="product_id" name="product_id" class="form-control" required>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" {{ $inventory->product_id == $product->id ? 'selected' : '' }}>
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="quantity">Cantidad</label>
                    <input type="number" id="quantity" name="quantity" class="form-control" value="{{ $inventory->quantity }}" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="update_date">Fecha de Actualización</label>
                    <input type="date" id="update_date" name="update_date" class="form-control" value="{{ $inventory->update_date }}" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@stop
