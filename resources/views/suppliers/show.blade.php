@extends('adminlte::page')

@section('title', 'Mostrar Proveedor')
@section('content_header')
@section('content')
<h1>Detalles del Proveedor</h1>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{$supplier->name}}</h3>
        </div>
        <div class="card-body">
            <p><strong>Correo: </strong>{{$supplier->email}}</p>
            <p><strong>Telefono: </strong>{{$supplier->phone}}</p>
            <p><strong>Direccion: </strong>{{$supplier->address}}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('suppliers.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> </a>
            <a href="{{ route('suppliers.edit', $supplier) }}" class="btn btn-warning"><i class="fas fa-edit"></i> </a>
            <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> </button>
            </form>
        </div>

    </div>
@stop