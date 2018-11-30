<?php
class Insumo
{

	private $idInsumo;
	private $Nombre_insumo;
	private $Precio_compra;
	private $fk_idCategoria;
	private $fk_idProveedor;

	//Stock producto

	private $idCategoria;
	private $Descripcion_categoria;

	//Entrada o salida

	private $idProveedor;
	private $Nombre_empresa;

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