@extends('adminlte::page')

@section('title', 'Crear Comprobante')

@section('content_header')
    <h1>Nuevo Comprobante</h1>
@stop

@section('content')
    <form action="{{ route('receipts.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="record_id">ID del Registro</label>
                    <input type="number" id="record_id" name="record_id" class="form-control" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="fecha_emision">Fecha de Emisión</label>
                    <input type="date" id="fecha_emision" name="fecha_emision" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="monto">Monto</label>
                    <input type="number" step="0.01" id="monto" name="monto" class="form-control" required>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop
