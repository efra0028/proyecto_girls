<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Registro GirlsCity</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- MATERIAL DESIGN ICONIC FONT -->
        <link rel="stylesheet" href="{{ asset('fonts/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">

        <!-- STYLE CSS -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>

    <body>

        <div class="wrapper">
            <div class="inner">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <h3>Registra tu nueva cuenta</h3>

                    <!-- Nombre -->
                    <div class="form-wrapper">
                        <label for="name" class="label-input">Nombre</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <!-- Correo Electrónico -->
                    <div class="form-wrapper">
                        <label for="email" class="label-input">Correo Electrónico</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <!-- Contraseña -->
                    <div class="form-wrapper">
                        <label for="password" class="label-input">Contraseña</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <!-- Confirmación de contraseña -->
                    <div class="form-wrapper">
                        <label for="password_confirmation" class="label-input">Confirmar Contraseña</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                        @if ($errors->has('password_confirmation'))
                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Registrarse</button>

                    <div class="form-wrapper">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-block">Volver</a>
                    </div>
                </form>
                <div class="image-holder">
                    <img src="{{ asset('images/registration-form-5.jpg') }}" alt="Registro">
                </div>
            </div>
        </div>

        <!-- Scripts de Bootstrap si necesitas funcionalidad JavaScript -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>
