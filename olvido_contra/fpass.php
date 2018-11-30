<?php
/*session_start();
require_once 'class.user.php';
$user = new USER();

if($user->is_logged_in()!="")
{
	$user->redirect('home.php');
}

if(isset($_POST['btn-submit']))
{
	$email = $_POST['txtemail'];
	
	$stmt = $user->runQuery("SELECT userID FROM tbl_users WHERE userEmail=:email LIMIT 1");
	$stmt->execute(array(":email"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);	
	if($stmt->rowCount() == 1)
	{
		$id = base64_encode($row['userID']);
		$code = md5(uniqid(rand()));
		
		$stmt = $user->runQuery("UPDATE tbl_users SET tokenCode=:token WHERE userEmail=:email");
		$stmt->execute(array(":token"=>$code,"email"=>$email));
		
		$message= "
				   Hello , $email
				   <br /><br />
				   We got requested to reset your password, if you do this then just click the following link to reset your password, if not just ignore                   this email,
				   <br /><br />
				 	Haga clic en siguiente vínculo para restablecer su contraseña
				   <br /><br />
				   <a href='http://localhost/olvide_mi_contrasena/resetpass.php?id=$id&code=$code'>Haga clic aquí para restablecer la contraseña</a>
									
				   <br /><br />
				   Gracias 
				   ";
		$subject = "Password Reset";
		
		$user->send_mail($email,$message,$subject);
		
		$msg = "<div class='alert alert-success'>
					<button class='close' data-dismiss='alert'>&times;</button>
					
				Hemos enviado un correo electrónico a $email,
				Por favor, haga clic en el enlace de restablecimiento de contraseña en el correo electrónico para generar una nueva contraseña. 
			  	</div>";
	}
	else
	{
		$msg = "<div class='alert alert-danger'>
					<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry!</strong>  este correo electrónico no se ha encontrado. 
			    </div>";
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
	<link rel="stylesheet" type="text/css" href="../interfaz_domicilio/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../interfaz_domicilio/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../interfaz_domicilio/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../interfaz_domicilio/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../interfaz_domicilio/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../interfaz_domicilio/css/util.css">
	<link rel="stylesheet" type="text/css" href="../interfaz_domicilio/css/main.css">
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
					<img src="../interfaz_domicilio/images/logo.jpg" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="../evaluar_sesion_domicilios.php">
					<span class="login100-form-title">
						Recuperar contraseña
					</span>

					<h5>
						Por favor, introduzca su dirección de correo electrónico. Recibira las indicaciones para recuperar la contraseña.
					</h5>

					<div class="wrap-input100 validate-input" data-validate = "Ingresar correo: ejemplo@abc.xyz">
						<input class="input100" type="text" name="correo_cliente" placeholder="Correo electronico" autocomplete="off">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
											
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="btn-ingresar" type="submit">
							Enviar
						</button>
					</div>
						
				</form>

				<div class="container-login100-form-btn">
					<a href="../interfaz_domicilio/login_client.php">
						<button class="login100-form-btn">
							Volver
						</button>
					</a>
				</div>

			</div>
		</div>
	</div>
	
<!--===============================================================================================-->	
	<script src="../interfaz_domicilio/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../interfaz_domicilio/vendor/bootstrap/js/popper.js"></script>
	<script src="../interfaz_domicilio/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../interfaz_domicilio/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../interfaz_domicilio/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="../interfaz_domicilio/js/main.js"></script>
  </body>
</html>
