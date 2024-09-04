<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Registro GirlsCity</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<form action="{{ route('register') }}" method="POST">
                    @csrf
					<h3>Registra tu nueva cuenta</h3>
					<div class="form-wrapper">
						<label for="name" class="label-input">Nombre</label>
						<input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
					</div>
					<div class="form-wrapper">
						<label for="email" class="label-input">Correo Electronico</label>
						<input type="text" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
					</div>
                    <div class="form-wrapper">
                        <label for="password" class="label-input">Contraseña</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-wrapper">
                        <label for="password_confirmation" class="label-input">Confirmar Contraseña</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                    </div>
					<button type="submit" class="btn btn-primary btn-block" >Registrarse</button>
                    <div class="form-wrapper">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-block">Volver</a>
                    </div>
				</form>
				<div class="image-holder">
					<img src="images/registration-form-5.jpg" alt="">
				</div>
			</div>
		</div>
         <!-- Scripts de Bootstrap si necesitas funcionalidad JavaScript -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/main.js"></script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

