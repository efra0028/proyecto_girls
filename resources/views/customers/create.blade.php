@extends('adminlte::page')

@section('title', 'Crear cliente')

@section('content_header')
    <h1>Nuevo Cliente</h1>
@stop

@section('content')
    <form action="{{ route('customers.store') }}" method="POST">
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
                    <label for="email">Correo</label>
                    <input type="text" id="email" name="email" class="form-control" required>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone">Telefono</label>
                    <input type="text" id="phone" name="phone" class="form-control" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="address">Direccion</label>
                    <input type="text" id="address" name="address" class="form-control" required>
                </div>
            </div>
        </div>
        
            
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="city">Ciudad</label>
                    <input type="text" id="city" name="city" class="form-control" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group ">
                    <label for="country">Pais</label>
                    <input type="text" id="country" name="country" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="birth_date">Fecha de nacimiento</label>
                    <input type="date" id="birth_date" name="birth_date" class="form-control" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="gender">Género</label>
                    <select id="gender" name="gender" class="form-control" required>
                        <option value="male">Masculino</option>
                        <option value="female">Femenino</option>
                    </select>
                </div>
            </div>
        </div>
    
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop
