<?php
class Formapago
{

	private $idForma_pago;
	private $Descripcion_forma_pago;

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