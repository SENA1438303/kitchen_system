<?php
class Accion_e_s
{

	private $idAccion_e_s;
	private $Descripcion_accion_e_s;

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