<?php
class Genero
{
	private $idGenero;
	private $Descripcion_genero;

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