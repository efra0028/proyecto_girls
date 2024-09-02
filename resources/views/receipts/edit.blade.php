@extends('adminlte::page')

@section('title', 'Edit Receipt')

@section('content_header')
    <h1>Editar Recibo</h1>
@stop

@section('content')
    <form action="{{ route('receipts.update', $receipt) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="receipt_type">Tipo de Recibo</label>
                    <input type="text" id="receipt_type" name="receipt_type" class="form-control" value="{{ $receipt->receipt_type }}" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="series">Serie</label>
                    <input type="text" id="series" name="series" class="form-control" value="{{ $receipt->series }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="number">Numero</label>
                    <input type="text" id="number" name="number" class="form-control" value="{{ $receipt->number }}" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="issue_date">Fecha de emision</label>
                    <input type="date" id="issue_date" name="issue_date" class="form-control" value="{{ $receipt->issue_date }}" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="amount">Monto</label>
                    <input type="number" step="0.01" id="amount" name="amount" class="form-control" value="{{ $receipt->amount }}" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="record_id">Venta</label>
                    <select id="record_id" name="record_id" class="form-control" required>
                        @foreach ($records as $record)
                            <option value="{{ $record->id }}" {{ $record->id == $receipt->record_id ? 'selected' : '' }}>{{ $record->id }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@stop
