<?php
class Producto
{
	private $idProducto;
	private $Nombre_producto;
	private $Precio_producto;
	private $fk_idInsumo;

	//Insumos

	private $idInsumo;
	private $Nombre_insumo;
	
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