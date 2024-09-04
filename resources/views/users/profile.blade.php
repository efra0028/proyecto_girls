@extends('adminlte::page')

@section('title', 'Perfil de Usuario')

@section('content_header')
    <h1>Perfil de Usuario</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" id="name" class="form-control" value="{{ auth()->user()->name }}" readonly>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" class="form-control" value="{{ auth()->user()->email }}" readonly>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="created_at">Fecha de Registro</label>
                <input type="text" id="created_at" class="form-control" value="{{ auth()->user()->created_at->format('d/m/Y') }}" readonly>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="updated_at">Última Actualización</label>
                <input type="text" id="updated_at" class="form-control" value="{{ auth()->user()->updated_at->format('d/m/Y') }}" readonly>
            </div>
        </div>
    </div>

    <a href="{{ route('user.edit', auth()->user()->id) }}" class="btn btn-warning">Editar Perfil</a>
@stop
