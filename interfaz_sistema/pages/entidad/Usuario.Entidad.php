<?php
class Usuario
{
	private $idUsuario;
	private $Nombre_usuario;
	private $Apellido_usuario;
	private $fk_idGenero;
	private $fk_idTipo_documento;
	private $Numero_documento;
	private $Telefono_usuario;
	private $Direccion_usuario;
	private $Correo_usuario;
	private $Contrasena_ingreso;
	private $fk_idRol;
	private $fk_idEstado;
	
	//Genero

	private $idGenero;
	private $Descripcion_genero;

	//Tipo de documento

	private $idTipo_documento;
	private $Descripcion_documento;

	// Rol

	private $idRol;
	private $Descripcion_Rol;

	// Estado

	private $idEstado;
	private $Descripcion_Estado;


	public function __GET($k)
	{ 
		return $this->$k; 
	}
	public function __SET($k, $v)
	{ 
		return $this->$k = $v; 
	}
}
?>