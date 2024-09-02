@extends('adminlte::page')

@section('title', 'Detalle del Producto')

@section('content_header')
    <h1>Detalle del Producto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4>Nombre:</h4>
                    <p>{{ $product->name }}</p>
                </div>
                <div class="col-md-6">
                    <h4>Descripción:</h4>
                    <p>{{ $product->description }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <h4>Precio:</h4>
                    <p>{{ $product->price }}</p>
                </div>
                <div class="col-md-6">
                    <h4>Stock:</h4>
                    <p>{{ $product->stock }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6
