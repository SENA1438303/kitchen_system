<?php

/*session_start();
require_once '../olvido_contra/class.user.php';
$client_login = new Cliente();

if($client_login->is_logged_in()!="")
{
	$client_login->redirect('index_client.php');
}

if(isset($_POST['btn-ingresar']))
{
	$email = trim($_POST['correo_cliente']);
	$upass = trim($_POST['contrasena_ingreso_cliente']);
	
	if($client_login->login($email,$upass))
	{
		$client_login->redirect('index_client.php');
	}
}*/
?>


<!DOCTYPE html>
<html lang="es">
<head>
	<title>Login cliente</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<!--<div class="alert alert-error">
			<button class="close" data-dismiss="alert">&times;</button>
				<strong>Lo sentimos!!</strong>
				Esta cuenta no se encuenta registrada.
		</div>-->
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/logo.jpg" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="../evaluar_sesion_domicilios.php">
					<span class="login100-form-title">
						Iniciar Sesion
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Ingresar correo: ejemplo@abc.xyz">
						<input class="input100" type="text" name="correo_cliente" placeholder="Correo electronico" autocomplete="off">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Contraseña requerida">
						<input class="input100" type="password" name="contrasena_ingreso_cliente" placeholder="Contraseña">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="btn-ingresar" type="submit">
							Ingresar
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt2">
							¿Olvidaste la contraseña?
						</span>
						<a class="txt5" href="../olvido_contra/fpass.php">
							Click aqui
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt5" href="registrar_cliente.html">
							Registrarse
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>