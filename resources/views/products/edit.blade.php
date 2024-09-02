@extends('adminlte::page')

@section('title', 'Editar Producto')

@section('content_header')
    <h1>Editar Producto</h1>
@stop

@section('content')
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $product->name }}" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea id="description" name="description" class="form-control" required>{{ $product->description }}</textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="price">Precio</label>
                    <input type="number" step="0.01" id="price" name="price" class="form-control" value="{{ $product->price }}" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" id="stock" name="stock" class="form-control" value="{{ $product->stock }}" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="category_id">Categoría</label>
                    <select id="category_id" name="category_id" class="form-control" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="supplier_id">Proveedor</label>
                    <select id="supplier_id" name="supplier_id" class="form-control" required>
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" {{ $product->supplier_id == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="image">Imagen</label>
                    <input type="text" id="image" name="image" class="form-control" value="{{ $product->image }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="size">Tamaño</label>
                    <input type="text" id="size" name="size" class="form-control" value="{{ $product->size }}" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="color">Color</label>
                    <input type="text" id="color" name="color" class="form-control" value="{{ $product->color }}" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="details">Detalles</label>
                    <textarea id="details" name="details" class="form-control">{{ $product->details }}</textarea>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@stop
