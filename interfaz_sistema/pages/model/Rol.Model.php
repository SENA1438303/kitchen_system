<?php
class RolModel
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

	private function Listar_dueño()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM `rol`");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Rol();

				$alm->__SET('idRol', $r->idRol);
				$alm->__SET('Descripcion_rol', $r->Descripcion_rol);


				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar_admin()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM `rol` WHERE `idRol` != '15'");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Rol();

				$alm->__SET('idRol', $r->idRol);
				$alm->__SET('Descripcion_rol', $r->Descripcion_rol);


				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idRol)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM rol WHERE idRol = ?");
			          

			$stm->execute(array($idRol));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Rol();

				$alm->__SET('idRol', $r->idRol);
				$alm->__SET('Descripcion_rol', $r->Descripcion_rol);

			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idRol)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM rol WHERE idRol = ?");			          

			$stm->execute(array($idRol));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Rol $data)
	{
		try 
		{
			$sql = "UPDATE rol SET 
						
						Descripcion_rol		 =?
				    WHERE idRol = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('Descripcion_rol'), 
					$data->__GET('idRol')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Rol $data)
	{
		try 
		{
		$sql = "INSERT INTO rol (Descripcion_rol) 
		        VALUES (?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('Descripcion_rol')
				
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}