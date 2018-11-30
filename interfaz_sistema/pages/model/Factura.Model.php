<?php
class FacturaModel
{
	private $pdo;

	public function __CONSTRUCT()	
	{
		try
		{
			$this->pdo = new PDO('mysql:host=localhost;dbname=db_kitchen_system', 'root', '');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		        
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM `factura` WHERE '1'");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Factura();

				$alm->__SET('idFactura', $r->idFactura);
				$alm->__SET('Nombres_cliente', $r->Nombres_cliente);
				$alm->__SET('Apellidos_cliente', $r->Apellidos_cliente);
				$alm->__SET('Cedula_cliente', $r->Cedula_cliente);
				$alm->__SET('Telefono_cliente', $r->Telefono_cliente);
				$alm->__SET('Fecha_impresion', $r->Fecha_impresion);
				$alm->__SET('Fecha_impresion', $r->Fecha_impresion);
				$alm->__SET('Numero_mesa', $r->Numero_mesa);
				$alm->__SET('fk_idForma_pago', $r->fk_idForma_pago);
				$alm->__SET('fk_idUsuario', $r->fk_idUsuario);
				$alm->__SET('fk_idProducto', $r->fk_idProducto);
				$alm->__SET('Total_factura', $r->Total_factura);
				

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idFactura)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM `factura` WHERE idFactura = ?");
			          

			$stm->execute(array($idFactura));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Factura();

				$alm->__SET('idFactura', $r->idFactura);				
				$alm->__SET('Nombres_cliente', $r->Nombres_cliente);
				$alm->__SET('Apellidos_cliente', $r->Apellidos_cliente);
				$alm->__SET('Cedula_cliente', $r->Cedula_cliente);
				$alm->__SET('Telefono_cliente', $r->Telefono_cliente);
				$alm->__SET('Fecha_impresion', $r->Fecha_impresion);
				$alm->__SET('Numero_mesa', $r->Numero_mesa);
				$alm->__SET('fk_idForma_pago', $r->fk_idForma_pago);
				$alm->__SET('fk_idUsuario', $r->fk_idUsuario);
				$alm->__SET('fk_idProducto', $r->fk_idProducto);
				$alm->__SET('Total_factura', $r->Total_factura);
				

			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idFactura)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM factura WHERE idFactura = ?");			          

			$stm->execute(array($idFactura));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Factura $data)
	{
		try 
		{
			$sql = "UPDATE factura SET 
						Nombres_cliente      		= 	?,
						Apellidos_cliente      		= 	?,
						Cedula_cliente      		= 	?,
						Telefono_cliente      		= 	?,
						Fecha_impresion             =	?, 
						Numero_mesa            		=	?,
						fk_idForma_pago 			=	?,
						fk_idUsuario         		=	?,
						fk_idProducto				=	?,
						Total_factura				=	?
						WHERE idFactura 			= 	?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('Nombres_cliente'),
					$data->__GET('Apellidos_cliente'),
					$data->__GET('Cedula_cliente'),
					$data->__GET('Telefono_cliente'),
					$data->__GET('Fecha_impresion'), 
					$data->__GET('Numero_mesa'),
					$data->__GET('fk_idForma_pago'), 
					$data->__GET('fk_idUsuario'),
					$data->__GET('fk_idProducto'),
					$data->__GET('Total_factura'),
					$data->__GET('idFactura')

					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Factura $data)
	{
		try 
		{
		$sql = "INSERT INTO `factura`(`idFactura`,`Nombres_cliente`,`Apellidos_cliente`,`Cedula_cliente`,`Telefono_cliente`,`Fecha_impresion`,`Numero_mesa`,`fk_idForma_pago`,`fk_idUsuario`,`fk_idProducto`, `Total_factura`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		->execute(
				array(
				$data->__GET('Nombres_cliente'),
				$data->__GET('Apellidos_cliente'),
				$data->__GET('Cedula_cliente'),
				$data->__GET('Telefono_cliente'),
				$data->__GET('Fecha_impresion'), 
				$data->__GET('Numero_mesa'),
				$data->__GET('fk_idForma_pago'),
				$data->__GET('fk_idUsuario'),  
				$data->__GET('fk_idProducto'),
				$data->__GET('Total_factura'),
				
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
?>