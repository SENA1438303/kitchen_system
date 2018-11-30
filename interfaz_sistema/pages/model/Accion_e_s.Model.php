<?php
class Accion_e_sModel
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

			$stm = $this->pdo->prepare("SELECT * FROM Accion_e_s");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Accion_e_s();

				$alm->__SET('idAccion_e_s', $r->idAccion_e_s);
				$alm->__SET('Descripcion_accion_e_s', $r->Descripcion_accion_e_s);

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idAccion_e_s)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM Stock WHERE idAccion_e_s = ?");
			          

			$stm->execute(array($idAccion_e_s));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Accion_e_s();

				$alm->__SET('idAccion_e_s', $r->idAccion_e_s);
				$alm->__SET('Descripcion_accion_e_s', $r->Descripcion_accion_e_s);

			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idAccion_e_s)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM Stock WHERE idAccion_e_s = ?");			          

			$stm->execute(array($idAccion_e_s));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Accion_e_s $data)
	{
		try 
		{
			$sql = "UPDATE Stock SET					
						Descripcion_accion_e_s		 =?,
				    WHERE idAccion_e_s = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('Descripcion_accion_e_s'), 
					$data->__GET('idAccion_e_s'),
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Accion_e_s $data)
	{
		try 
		{
		$sql = "INSERT INTO Accion_e_s (idAccion_e_s,Descripcion_accion_e_s) VALUES (NULL, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('Descripcion_accion_e_s')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}