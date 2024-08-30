@extends('adminlte::page')

@section('title', 'Modificar Categoria')
@section('content_header')
@section('content')
<h1>Detalles de la Categoria</h1>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{$category->name}}</h3>
        </div>
        <div class="card-body">
            <p><strong>ID: </strong>{{$category->id}}</p>
            <p><strong>nombre: </strong>{{$category->name}}</p>
            <p><strong>Descripcion: </strong>{{$category->description}}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('categories.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> </a>
            <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning"><i class="fas fa-edit"></i> </a>
            <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> </button>
            </form>
        </div>

    </div>
@stop