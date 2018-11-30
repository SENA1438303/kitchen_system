<?php
class Estado
{
	private $idEstado;
	private $Descripcion_estado;

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