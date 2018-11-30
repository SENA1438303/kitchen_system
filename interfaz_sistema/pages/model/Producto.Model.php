<?php
class ProductoModel
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

			$stm = $this->pdo->prepare("SELECT * FROM `producto` WHERE '1'");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Producto();

				$alm->__SET('idProducto', $r->idProducto);
				$alm->__SET('Nombre_producto', $r->Nombre_producto);
				$alm->__SET('Precio_producto', $r->Precio_producto);
				$alm->__SET('fk_idInsumo', $r->fk_idInsumo);

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idProducto)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM producto WHERE idProducto = ?");        

			$stm->execute(array($idProducto));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Producto();

				$alm->__SET('idProducto', $r->idProducto);
				$alm->__SET('Nombre_producto', $r->Nombre_producto);
				$alm->__SET('Precio_producto', $r->Precio_producto);
				$alm->__SET('fk_idInsumo', $r->fk_idInsumo);				

			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idProducto)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM producto WHERE idProducto = ?");			          

			$stm->execute(array($idProducto));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Producto $data)
	{
		try 
		{
			$sql = "UPDATE producto SET 
						Nombre_producto      = ?,
						Precio_producto      = ?,
						fk_idInsumo      = ?
				    WHERE idProducto = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('Nombre_producto'),
					$data->__GET('Precio_producto'),
					$data->__GET('fk_idInsumo'),
					$data->__GET('idProducto')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	/*
	public function Registrar(Producto $data)
	{
		try 
		{
		$sql = "INSERT INTO producto (idProducto,Nombre_producto,Precio_producto,fk_idInsumo)VALUES (NULL, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('Nombre_producto'),
				$data->__GET('Precio_producto'),
				$data->__GET('fk_idInsumo')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}*/
}

?>