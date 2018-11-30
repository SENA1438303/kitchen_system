<?php
class Stock
{

	private $idStock;
	private $fk_idInsumo;
	private $Cantidad;	
	private $fk_idAccion_e_s;
	
	//Stock insumo

	private $idInsumo;
	private $Nombre_insumo;

	//Entrada o salida

	private $idAccion_e_s;
	private $Entrada_acci;
	private $Salida_acci;


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