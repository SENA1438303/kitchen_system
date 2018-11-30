<?php
class Factura
{
	private $idFactura;
	private $Nombres_cliente;
	private $Apellidos_cliente;
	private $Cedula_cliente;
	private $Telefono_cliente;
	private $Fecha_impresion;
	private $Numero_mesa;
	private $fk_idForma_pago;
	private $fk_idUsuarios;
	private $fk_idProducto;
	private $Total_factura;

	//Forma de pago

	private $idForma_pago;
	private $Descripcion_forma_pago;

	//Usuario atencion

	private $idUsuario;
	private $Nombre_usuario;

	//Productos (Platos)

	private $idProducto;
	private $Nombre_producto;

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