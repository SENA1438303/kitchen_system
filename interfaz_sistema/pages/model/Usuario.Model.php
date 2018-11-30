<?php
class UsuarioModel
{
	private $pdo;

	public function __CONSTRUCT()	
	{
		try
		{
			$this->pdo = new PDO('mysql:host=localhost;dbname=db_kitchen_system', 'root', '');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		        
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM `usuario`");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Usuario();

				$alm->__SET('idUsuario', $r->idUsuario);
				$alm->__SET('Nombre_usuario', $r->Nombre_usuario);
				$alm->__SET('Apellido_usuario', $r->Apellido_usuario);
				$alm->__SET('fk_idGenero', $r->fk_idGenero);
				$alm->__SET('fk_idTipo_documento', $r->fk_idTipo_documento);
				$alm->__SET('Numero_documento', $r->Numero_documento);
				$alm->__SET('Telefono_usuario', $r->Telefono_usuario);				
				$alm->__SET('Direccion_usuario', $r->Direccion_usuario);
				$alm->__SET('Correo_usuario', $r->Correo_usuario);
				$alm->__SET('Contrasena_ingreso', $r->Contrasena_ingreso);
				$alm->__SET('fk_idRol', $r->fk_idRol);
				$alm->__SET('fk_idEstado', $r->fk_idEstado);

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idUsuario)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM `usuario` INNER JOIN genero ON usuario.`fk_idGenero` = genero.`idGenero` INNER JOIN tipo_documento ON usuario.`fk_idTipo_documento` = tipo_documento.`idTipo_documento` INNER JOIN rol ON usuario.`fk_idRol` = rol.`idRol` INNER JOIN estado ON usuario.`fk_idEstado` = estado.`idEstado` WHERE idUsuario = ?");
			          

			$stm->execute(array($idUsuario));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Usuario();

				$alm->__SET('idUsuario', $r->idUsuario);
				$alm->__SET('Nombre_usuario', $r->Nombre_usuario);
				$alm->__SET('Apellido_usuario', $r->Apellido_usuario);
				$alm->__SET('idGenero', $r->idGenero);
				$alm->__SET('idTipo_documento', $r->idTipo_documento);
				$alm->__SET('Numero_documento', $r->Numero_documento);
				$alm->__SET('Telefono_usuario', $r->Telefono_usuario);
				$alm->__SET('Direccion_usuario', $r->Direccion_usuario);
				$alm->__SET('Correo_usuario', $r->Correo_usuario);	
				$alm->__SET('Contrasena_ingreso', $r->Contrasena_ingreso);			
				$alm->__SET('idRol', $r->idRol);
				$alm->__SET('idEstado', $r->idEstado);


			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idUsuario)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM usuario WHERE idUsuario = ?");			          

			$stm->execute(array($idUsuario));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Usuario $data)
	{
		try 
		{
			$sql = "UPDATE usuario SET 
						Nombre_usuario              =	?, 
						Apellido_usuario            =	?,
						fk_idGenero 				=	?,
						fk_idTipo_documento         =	?, 
						Numero_documento 		    =	?,
						Telefono_usuario       		=	?,
						Direccion_usuario          	=	?,
						Correo_usuario         		=	?,
						Contrasena_ingreso          =   ?,
						fk_idRol 					= 	?,
						fk_idEstado					=	?
						WHERE idUsuario 			= 	?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('Nombre_usuario'), 
					$data->__GET('Apellido_usuario'), 
					$data->__GET('fk_idGenero'), 
					$data->__GET('fk_idTipo_documento'),
					$data->__GET('Numero_documento'),
					$data->__GET('Telefono_usuario'),
					$data->__GET('Direccion_usuario'),					
					$data->__GET('Correo_usuario'),
					$data->__GET('Contrasena_ingreso'),
					$data->__GET('fk_idRol'),
					$data->__GET('fk_idEstado'),
					$data->__GET('idUsuario')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	/*
	public function Registrar(Usuario $data, $Numero_document)
	{
		try 
		{
		$sql = "INSERT INTO `usuario` (`idUsuario`, `Nombre_usuario`, `Apellido_usuario`, `fk_idGenero`, `fk_idTipo_documento`, `Numero_documento`, `Telefono_usuario`, `Direccion_usuario`, `Correo_usuario`, `Contrasena_ingreso`, `fk_idRol`, `fk_idEstado`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		->execute(
				array(
				$data->__GET('Nombre_usuario'), 
				$data->__GET('Apellido_usuario'),
				$data->__GET('fk_idGenero'), 
				$data->__GET('fk_idTipo_documento'),
				$data->__GET('Numero_documento'),
				$data->__GET('Telefono_usuario'),
				$data->__GET('Direccion_usuario'),
				$data->__GET('Correo_usuario'),
				$data->__GET('Contrasena_ingreso'),
				$data->__GET('fk_idRol'),
				$data->__GET('fk_idEstado')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}		
	}*/
}
?>