@extends('adminlte::page')

@section('title', 'Clientes')
@section('content_header')
@section('content')
<h1>Detalles del Cliente</h1>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{$customer->name}}</h3>
        </div>
        <div class="card-body">
            <p><strong>ID: </strong>{{$customer->id}}</p>
            <p><strong>Correo: </strong>{{$customer->email}}</p>
            <p><strong>Telefono: </strong>{{$customer->phone}}</p>
            <p><strong>Direccion: </strong>{{$customer->address}}</p>
            <p><strong>Ciudad: </strong>{{$customer->city}}</p>
            <p><strong>Pais: </strong>{{$customer->country}}</p>
            <p><strong>Fecha Nacimiento: </strong>{{$customer->birth_date}}</p>
            <p><strong>Genero: </strong>{{$customer->gender}}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('customers.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> </a>
            <a href="{{ route('customers.edit', $customer) }}" class="btn btn-warning"><i class="fas fa-edit"></i> </a>
            <form action="{{ route('customers.destroy', $customer) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> </button>
            </form>
        </div>

    </div>
@stop