<?php
class StockModel
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

			$stm = $this->pdo->prepare("SELECT * FROM Stock");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Stock();

				$alm->__SET('idStock', $r->idStock);
				$alm->__SET('fk_idInsumo', $r->fk_idInsumo);
				$alm->__SET('Cantidad', $r->Cantidad);
				$alm->__SET('fk_idAccion_e_s', $r->fk_idAccion_e_s);
							
				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idStock)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM Stock WHERE idStock = ?");
			          

			$stm->execute(array($idStock));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Stock();

				$alm->__SET('idStock', $r->idStock);
				$alm->__SET('fk_idInsumo', $r->fk_idInsumo);
				$alm->__SET('Cantidad', $r->Cantidad);
				$alm->__SET('fk_idAccion_e_s', $r->fk_idAccion_e_s);

			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idStock)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM Stock WHERE idStock = ?");			          

			$stm->execute(array($idStock));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Stock $data)
	{
		try 
		{
			$sql = "UPDATE Stock SET
						fk_idInsumo		 =?				
						Cantidad		 =?,
						fk_idAccion_e_s	 =?,												
				    WHERE idStock = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('fk_idInsumo'),
					$data->__GET('Cantidad'),
					$data->__GET('fk_idAccion_e_s'), 
					$data->__GET('idStock'),
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Stock $data)
	{
		try 
		{
		$sql = "INSERT INTO Stock (idStock,fk_idInsumo,Cantidad,fk_idAccion_e_s) VALUES (NULL, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('fk_idInsumo'),
				$data->__GET('Cantidad'),
				$data->__GET('fk_idAccion_e_s'),			
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}