<?php
class Tipo_documento
{

	private $idTipo_documento;
	private $Descripcion_documento;

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