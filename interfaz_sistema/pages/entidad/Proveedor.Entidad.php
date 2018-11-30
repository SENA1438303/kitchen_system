<?php
class Proveedor
{
	private $idProveedor;
	private $Nombre_empresa;
	private $NIT_empresa;
	private $Direccion_empresa;
	private $Telefono_empresa;

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