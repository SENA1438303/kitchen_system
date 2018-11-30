<?php
class ProveedorModel
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

			$stm = $this->pdo->prepare("SELECT * FROM proveedor");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Proveedor();

				$alm->__SET('idProveedor', $r->idProveedor);
				$alm->__SET('Nombre_empresa', $r->Nombre_empresa);
				$alm->__SET('NIT_empresa', $r->NIT_empresa);
				$alm->__SET('Direccion_empresa', $r->Direccion_empresa);
				$alm->__SET('Telefono_empresa', $r->Telefono_empresa);


				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idProveedor)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM proveedor WHERE idProveedor = ?");
			          

			$stm->execute(array($idProveedor));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Proveedor();

				$alm->__SET('idProveedor', $r->idProveedor);
				$alm->__SET('Nombre_empresa', $r->Nombre_empresa);
				$alm->__SET('NIT_empresa', $r->NIT_empresa);
				$alm->__SET('Direccion_empresa', $r->Direccion_empresa);
				$alm->__SET('Telefono_empresa', $r->Telefono_empresa);

			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idProveedor)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM proveedor WHERE idProveedor = ?");			          

			$stm->execute(array($idProveedor));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Proveedor $data)
	{
		try 
		{
			$sql = "UPDATE proveedor 
					SET Nombre_empresa = ?,
					NIT_empresa = ?,
					Direccion_empresa = ?,
					Telefono_empresa =?
				    WHERE idProveedor = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('Nombre_empresa'),
					$data->__GET('NIT_empresa'),
					$data->__GET('Direccion_empresa'),
					$data->__GET('Telefono_empresa'), 
					$data->__GET('idProveedor')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	/*
	public function Registrar(Proveedor $data)
	{
		try 
		{
		$sql = "INSERT INTO `proveedor`(`idProveedor`, `Nombre_empresa`, `NIT_empresa`, `Direccion_empresa`, `Telefono_empresa`) VALUES (NULL,?,?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('Nombre_empresa'),
				$data->__GET('NIT_empresa'),
				$data->__GET('Direccion_empresa'),
				$data->__GET('Telefono_empresa'),
				
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}*/
}