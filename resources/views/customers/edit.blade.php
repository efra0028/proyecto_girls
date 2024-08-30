@extends('adminlte::page')
@section('title', 'Editar cliente')
@section('content_header')
    <h1>Editar cliente</h1>
@stop
@section('content')
<form action="{{route('customers.update', $customer)}}" method="POST">
    @csrf
    @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{$customer->name}}" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Correo</label>
                    <input type="text" id="email" name="email" class="form-control" value="{{$customer->email}}" required>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone">Telefono</label>
                    <input type="text" id="phone" name="phone" class="form-control" value="{{$customer->phone}}" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="address">Direccion</label>
                    <input type="text" id="address" name="address" class="form-control" value="{{$customer->address}}" required>
                </div>
            </div>
        </div>
        
            
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="city">Ciudad</label>
                    <input type="text" id="city" name="city" class="form-control" value="{{$customer->city}}" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="country">Pais</label>
                    <input type="text" id="country" name="country" class="form-control"  value="{{$customer->country}}" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="birth_date">Fecha de nacimiento</label>
                    <input type="date" id="birth_date" name="birth_date" class="form-control" value="{{$customer->birth_date}}" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="gender">Género</label>
                    <select id="gender" name="gender" class="form-control" required>
                        <option value="male" {{ $customer->gender == 'male' ? 'selected' : '' }}>Masculino</option>
                        <option value="female" {{ $customer->gender == 'female' ? 'selected' : '' }}>Femenino</option>
                    </select>
                </div>
            </div>
        </div>
    
        <button type="submit" class="btn btn-primary">Guardar</button>

</form>
@stop
