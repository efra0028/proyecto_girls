@extends('adminlte::page')

@section('title', 'Crear')

@section('content_header')
    <h1>Nueva Categoria</h1>
@stop

@section('content')
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="description">Descripcion</label>
                    <input type="text" id="description" name="description" class="form-control" required>
                </div>
            </div>
        </div>
    
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop
