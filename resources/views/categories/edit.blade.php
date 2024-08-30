@extends('adminlte::page')
@section('title', 'Editar Categoria')
@section('content_header')
    <h1>Editar Categoria</h1>
@stop
@section('content')
<form action="{{route('categories.update', $category)}}" method="POST">
    @csrf
    @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{$category->name}}" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="description">Descripcion</label>
                    <input type="text" id="description" name="description" class="form-control" value="{{$category->description}}" required>
                </div>
            </div>
        </div>
    
        <button type="submit" class="btn btn-primary">Guardar</button>

</form>
@stop
