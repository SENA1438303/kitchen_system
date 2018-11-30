<?php
class InsumoModel
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

			$stm = $this->pdo->prepare("SELECT * FROM Insumo");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Insumo();

				$alm->__SET('idInsumo', $r->idInsumo);
				$alm->__SET('Nombre_insumo', $r->Nombre_insumo);
				$alm->__SET('Precio_compra', $r->Precio_compra);
				$alm->__SET('fk_idCategoria', $r->fk_idCategoria);
				$alm->__SET('fk_idProveedor', $r->fk_idProveedor);


				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idInsumo)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM Insumo WHERE idInsumo = ?");
			          

			$stm->execute(array($idInsumo));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Insumo();

				$alm->__SET('idInsumo', $r->idInsumo);
				$alm->__SET('Nombre_insumo', $r->Nombre_insumo);
				$alm->__SET('Precio_compra', $r->Precio_compra);
				$alm->__SET('fk_idCategoria', $r->fk_idCategoria);
				$alm->__SET('fk_idProveedor', $r->fk_idProveedor);

			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idInsumo)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM Insumo WHERE idInsumo = ?");			          

			$stm->execute(array($idInsumo));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Insumo $data)
	{
		try 
		{
			$sql = "UPDATE Insumo SET					
						Nombre_insumo		 	=	?,
						Precio_compra		 	=	?,
						fk_idCategoria		 	=	?,
						fk_idProveedor			=	?

				    WHERE idInsumo = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('Nombre_insumo'),
					$data->__GET('Precio_compra'),
					$data->__GET('fk_idCategoria'),
					$data->__GET('fk_idProveedor'), 
					$data->__GET('idInsumo'),
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	/*
	public function Registrar(Insumo $data)
	{
		try 
		{
		$sql = "INSERT INTO Insumo (idInsumo,Nombre_insumo,Precio_compra,fk_idCategoria,fk_idProveedor) VALUES (NULL, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('Nombre_insumo'),
				$data->__GET('Precio_compra'),
				$data->__GET('fk_idCategoria'),
				$data->__GET('fk_idProveedor'), 
				
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}*/
}