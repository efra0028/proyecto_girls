@extends('adminlte::page')

@section('title', 'Editar Comprobante')

@section('content_header')
    <h1>Editar Comprobante</h1>
@stop

@section('content')
    <form action="{{ route('receipts.update', $receipt) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="record_id">ID del Registro</label>
                    <input type="number" id="record_id" name="record_id" class="form-control" value="{{ $receipt->record_id }}" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="fecha_emision">Fecha de Emisión</label>
                    <input type="date" id="fecha_emision" name="fecha_emision" class="form-control" value="{{ $receipt->fecha_emision }}" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="monto">Monto</label>
                    <input type="number" step="0.01" id="monto" name="monto" class="form-control" value="{{ $receipt->monto }}" required>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop
