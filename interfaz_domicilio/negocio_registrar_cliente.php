<?php
	class Registro_cliente
	{	  
		public function registrar_clien($nombre_clien,$apellido_clien,$correo_clien,$contrasena_clien,$telefono_clien)
		{
			include('../conexion_db.php');
				
			$contexistencia=0;
				
			//Consultar si existe un usuario

			$sql = "SELECT * FROM cliente_domicilio WHERE Correo_cliente_domi = '$correo_clien'";

			if(!$result = $db->query($sql))
			{
				die('Datos no encontrados!!! [' . $db->error . ']');
			}
			while($row = $result->fetch_assoc())
			{
				$ccoreo_client=stripslashes($row["Correo_cliente_domi"]);
				$contexistencia=$contexistencia+1;
		    }
		  	//Final de consulta de un ususario
		
			if ($contexistencia == '0')
			{
				$sql2 = "INSERT INTO cliente_domicilio (idCliente_domicilio, Nombre_cliente_domi, Apellido_cliente_domi, Correo_cliente_domi, Contrasena_cliente_domi, Telefono_cliente_domi) VALUES (NULL, '$nombre_clien', '$apellido_clien', '$correo_clien', '$contrasena_clien', '$telefono_clien')";
	  			
				if(!$result2 = $db->query($sql2))
				{
		  			die('Datos no encontrados!!! [' . $db->error . ']');
				}
					echo "Usuario Registrado!!!!!!";
			}
				
				if ($contexistencia != '0')
				{
					echo "No se puede registrar!!! ";
				}
		}
	}

$nuevo=new Registro_cliente();
$nuevo->registrar_clien($_POST["$nombre_clien"],$_POST["apellido_clien"],$_POST["correo_clien"],$_POST["contrasena_clien"],$_POST["telefono_clien"])

?>